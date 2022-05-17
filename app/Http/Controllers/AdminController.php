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


class AdminController extends Controller
//view daily report
{
    public function index(Request $request)
    {
        

        $report = order::whereDate('created_at', '>=', Carbon::today()->format("Y-m-d"))->get();

        //sort price according to date to get daily sales 
        //$today = Carbon::today()->format('Y-m-d');
        $totalsales = order::select(
            DB::raw('sum(price) as sums'),

            DB::raw("DATE_FORMAT(created_at,'%D %M %Y') as date")

        )
            ->groupBy('date')
            ->whereDate('created_at', '>=', Carbon::today()->format("Y-m-d"))
            ->get();
        $current = Carbon::now();



        return view('reports.report', ['report' => $report, 'totalsales' => $totalsales]);
    }

    public function search(Request $request)
    {

        
        $fromDate = Carbon::parse($request->fromDate)
            ->toDateTimeString();

        $toDate = Carbon::parse($request->toDate)
            ->toDateTimeString();

        $search = order::whereBetween('created_at', [$fromDate, $toDate])->get();

        $searchsales = order::select(
            DB::raw('sum(price) as sums'),

            DB::raw("DATE_FORMAT(created_at,'%D %M %Y') as date")

        )
            ->groupBy('date')
            ->get();
        return view('reports.search_report', ['search' => $search, 'searchsales' => $searchsales]);
    }


    public function list()
    {
      $expired = reservation::where('status','created')
      ->orderBy('created_at','desc')
      ->with('restaurant')->whereDate('date','<',Carbon::today()->format("Y-m-d") )->get();

      $created = reservation::where('status','created')
      ->orderBy('created_at','desc')
      ->with('restaurant')->whereDate('date','>=',Carbon::today()->format("Y-m-d") )->get();

      return view('/admin_reservation', ['past'=>$expired, 'new'=> $created]);
    }

    public function update($id)
    { 
        $rid = reservation::find($id);
        $data = request()->except(['_token', '_method']);
        $rid->update($data);
        return redirect("/admin_reservation")->with('updated', 'Reservation has been updated');
    }

    public function delete($id)
    {
        $data = reservation::find($id);
        $data->delete();
        return redirect("/admin_reservation")->with('deleted', 'Reservation has been removed.');
    }
}
