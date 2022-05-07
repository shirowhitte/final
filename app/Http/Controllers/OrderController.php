<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\reservation;
use App\Models\Cart;
use App\Models\order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        
        $voucher = Voucher::where('code', $request->voucher_code)->first();        
       if(!$voucher)
       {
           $e = 'Invalid Voucher. Please try again.';
           return redirect()->route('food.cart')->with('error', $e);
       }

       

       $s = 'Voucher has been applied.';
           return redirect()->route('food.cart')->with('success', $s);
       
    }

    public function applyVoucher(Request $request)
    {
        return $request->all();
    }

    

    public function getCheckout()
    {

        $id = Auth::user()->id;
      $reserve = reservation::where('user_id',$id)
      ->where('status','created')
      ->orderBy('created_at','desc')
      ->get();
        if (!Session::has('cart')) {
            return view('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('checkout', ['total' => $total, 'reservation'=>$reserve]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) 
        {
            return redirect()->route('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

      

            $cart = serialize($cart);
            $restaurant_id = 2001;
            $type = $request->input('ordertype');
            $comment = 'NA';
            $status = 'created';
            $notes = $request->input('notes');
            $name = $request->input('name');
            $address = $request->input('address');
            $price = $request->input('hey');
            $reservation_id = $request->input('reservation_id');

            
            $payment_type = $request->input('payment_type');;

            $data=array('cart'=>$cart,"restaurant_id"=>$restaurant_id,"type"=>$type
            ,"comment"=>$comment,"status"=>$status,"notes"=>$notes,"name"=>$name,"address"=>$address,"price"=>$price,"reservation_id"=>$reservation_id);

            DB::table('orders')->insert($data);
            
        
     

        Session::forget('cart');
        return redirect()->route('/home')->with('success', 'Successfully purchased products!');
    }


    public function checkout(Request $request)
    {
        $user_id = $request->input('user_id');
        $restaurant_id = $request->input('restaurant');
        $food_id = $request->input('food_id');
        $quantity = $request->input('qty');
        $type = $request->input('ordertype');
        $comment = 'NA';
        $status = 'created';

        $notes = 'wait';
        $price = $request->input('hey');
        $data=array('user_id'=>$user_id,"restaurant_id"=>$restaurant_id,"food_id"=>$food_id,"quantity"=>$quantity,"type"=>$type
        ,"comment"=>$comment,"status"=>$status,"notes"=>$notes,"price"=>$price);


        DB::table('orders')->insert($data);

        return redirect("/checkout")->with('success', 'Order has been created successfully!');



/*order::create([  
    'user_id' =>  request('user_id'),
    'restaurant_id' => request('restaurant'),
    'food_id' => request('food_id'),
    'quantity' => request('qty'),
    'type' => request('ordertype'),
    'comment' => 'none',
    'status' => 'created',
    'notes' => 'wait',
    'price' => request('hey'),

]);
return redirect("/checkout")->with('success', 'Order has been created successfully!');*/
      
    }


}
