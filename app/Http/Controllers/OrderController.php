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
use Carbon\Carbon;

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

    public function getCheckout()
    {

        $id = Auth::user()->id;
        $reserve = reservation::where('user_id',$id)
        ->where('status','created')
        ->orderBy('created_at','desc')
        ->with('restaurant')->whereDate('created_at','>=',Carbon::today()->format("Y-m-d") )->get();
        if (!Session::has('cart')) 
        {
            return view('cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $res = $cart->restaurant;
        return view('checkout', ['total' => $total, 'restaurant' => $res, 'reservation'=>$reserve]);
    }

    public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) 
        {
            return redirect()->route('food.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
   
        $total = $cart->totalPrice;
        $res = $cart->restaurant;

            $cart = serialize($cart);
            $restaurant_id = $res;
            $type = $request->input('ordertype');
            $comment = 'NA';
            $status = 'created';
            $notes = $request->input('notes');
            $created_at = Carbon::now();
            $name = $request->input('name');
            $address = $request->input('address');
            $price = $total;
            $reservation_id = $request->input('reservation_id');
            $payment_type = $request->input('payment_type');
            $deliverlatertime = $request->input('deliverlatertime');

            $u = Auth::user()->id;
            $data=array('cart'=>$cart,"restaurant_id"=>$restaurant_id,"type"=>$type
            ,"comment"=>$comment,"status"=>$status,"notes"=>$notes,"created_at"=>$created_at,"name"=>$name,"address"=>$address,"price"=>$price,"reservation_id"=>$reservation_id
            ,"payment_type"=>$payment_type,"deliverlatertime"=>$deliverlatertime);
            DB::table('orders')->insert($data);
        Session::forget('cart');
        return redirect()->route('order.show', $u)->with('ordered', 'Order has been created successfully!');
    }



    public function list($id)
    {
        $name = Auth::user()->username;
      //$name = User::select('select username from users where id=?', $id );
      $created = order::where('name',$name)
      ->where('status','created')
      ->orWhere('status', 'delivery')
      ->orderBy('created_at','desc')->get();

      $today = Carbon::today()->format('Y-m-d');
      $delivered = DB::select('select * from orders where status = "delivered" or (select date from reservations where date < "'.$today.'" )');

      return view('order', ['new'=>$created, 'past'=> $delivered]);
    }


}
