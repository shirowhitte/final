<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use Illuminate\Support\Facades\DB;
use Auth;
use Symfony\Component\HttpFoundation\Session\Session;
class DriverController extends Controller
{
    public function index(Request $request)
    {

        $request->session()->put('userlayout', 'layouts.driverlayout');

        if ($request->session()->has('message')) {
            $request->session()->forget('message');
        }
        $orders = DB::table('orders')
            ->join('restaurants', 'restaurants.id', '=', 'orders.restaurant_id')
            ->select('orders.*', 'restaurants.name as restaurant_name')
            ->whereNotIn('status', ['delivered'])
            ->orderBy('orders.id', 'asc')
            ->get();


        $delivered_orders = DB::table('orders')
            ->where('accepted_driver_id', Auth::user()->id)
            ->where('status', 'delivered')
            ->join('restaurants', 'restaurants.id', '=', 'orders.restaurant_id')
            ->select('orders.*', 'restaurants.name as restaurant_name')
            ->orderBy('orders.id', 'asc')
            ->get();

        return view('driver', ['orders' => $orders, "delivered_orders" => $delivered_orders]);

    }

    public function updateStatus(Request $request)
    {

        $request->session()->put('userlayout', 'layouts.driverlayout');
        if ($request->session()->has('message')) {
            $request->session()->forget('message');
        }
        $status = $request->query('status');

        if ($status == "accepted") {
            $order = order::find($request->query('order_id'));
            if ($order->status == "accepted") {
                return redirect('/driver')->with(['message' => 'Order already accepted']);
            }
            $order->accepted_driver_id = Auth::user()->id;
            $order->status = "accepted";
            $order->save();
        }
        else if ($status == "rejected") {
            $order = order::find($request->query('order_id'));
            $order->rejected_driver_ids = $order->rejected_driver_ids . "," . Auth::user()->id;
            $order->save();
        }
        else if (isset($status)) {
            $order = order::find($request->query('order_id'));
            $order->status = $status;
            $order->save();
        }

        return redirect('/driver');
    }
}
