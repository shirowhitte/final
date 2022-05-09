<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\food;
use App\Models\restaurant;
use App\Models\reservation;
use Session;
use App\Models\Cart;
use Auth;

class FoodController extends Controller
{
    public function show()
    {
        $food = food::all();
        return view('welcome', ['foods'=>$food]);
    }

    public function display()
    {
        $food = food::all();
        return view('home', ['foods'=>$food]);
    } 

    public function getAddToCart(Request $request, $id)
    {
        $food = food::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $res = $cart->restaurant;
        $cart->add($food, $food->id);
        $rest = $food->restaurant_id;
        if($rest == $res || $res == "")
        {

            $request->session()->put('cart', $cart);
            return back();
        }
        else
        {
            Session::forget('cart');
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $cart->add($food, $food->id);
            $request->session()->put('cart', $cart);
            return redirect()->route('food.cart')->with('confirm', 'You are adding item from different store. Your previous cart will be removed.');
        }  
    }

    public function getCart()
    {
        $id = Auth::user()->id;
        $reserve = reservation::where('user_id',$id)
        ->where('status','created')
        ->orderBy('created_at','desc')
        ->get();
        if(!Session::has('cart'))
        {
            return view('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $res = $cart->restaurant;
        return view('cart', ['reservation'=>$reserve, 'food' => $cart->items, 'totalPrice' => $cart->totalPrice, 'restaurant'=>$res]);
     
    }

    public function getReduceByOne(Request $request, $id)
    {
        $food = food::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduce($food, $food->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('food.cart');
    }

    public function getRemoveItem($id) 
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) 
        {
            Session::put('cart', $cart);
        } else 
        {
            Session::forget('cart');
        }
        return redirect()->route('food.cart');
    }

    public function getIncreaseByOne(Request $request, $id) 
    {
        $food = food::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($food, $food->id);
 
        $request->session()->put('cart', $cart);
        return redirect()->route('food.cart');
    }
}
