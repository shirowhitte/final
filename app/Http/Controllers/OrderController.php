<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Voucher;
use App\Models\reservation;
use App\Models\Cart;
use App\Models\order;
use App\Models\User;
use App\Mail\OrderEmail;
use Carbon\Carbon;
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
            $comment = NULL;
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
            $mail = Auth::user()->email;
            Mail::to($mail)->send(new OrderEmail());
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
        $delivered = DB::select('select * from orders where name = "'.$name.'" and (status = "delivered" or  "'.$today.'" > (select date from reservations where id =  "'.$id.'" ))');

        return view('order', ['new'=>$created, 'past'=> $delivered]);
    }


    public function update(Request $request, $user, $id)
    { 
        $comment = $request->input('comment');

DB::update('update orders set comment=? where id = ?',[$comment,$id]);
return redirect("/order/{$user}")->with('reviewed', 'Order has been reviewed');
    }
//view daily report
    public function report()
    {  
        

        $report= order::whereDate('created_at','>=',Carbon::today()->format("Y-m-d"))->get();
     
        //sort price according to date to get daily sales 
        //$today = Carbon::today()->format('Y-m-d');
        $totalsales = order::select(
            DB::raw('sum(price) as sums'), 
            
            DB::raw("DATE_FORMAT(created_at,'%D %M %Y') as date")
            
            )
        ->groupBy('date')
        ->whereDate('created_at','>=',Carbon::today()->format("Y-m-d"))
        ->get();
        $current=Carbon::now();
        
        
  
        return view ('reports.report',['report'=>$report,'totalsales'=>$totalsales]);
    }

    public function search(Request $request)
    {
        
        
        $fromDate = Carbon::parse($request->fromDate)
                             ->toDateTimeString();

       $toDate = Carbon::parse($request->toDate)
                             ->toDateTimeString();

        $search= order::whereBetween('created_at',[$fromDate,$toDate])->get();

        $searchsales = order::select(
            DB::raw('sum(price) as sums'), 
            
            DB::raw("DATE_FORMAT(created_at,'%D %M %Y') as date")
            
            )
          
        ->groupBy('date')
        ->whereBetween('created_at',[$fromDate,$toDate])  
        ->get();
        return view ('reports.search_report',['search'=>$search,'searchsales'=>$searchsales]);
        
     
      



    }

   
}
    
    
   
   



