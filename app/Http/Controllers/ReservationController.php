<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\reservation;
use App\Models\User;
use App\Models\restaurant;
use Auth;
use Carbon\Carbon;



class ReservationController extends Controller
{
    public function index($user)
    {
        $data = User::find($user);
        return view('reservation', ['user'=>$data]);
        
    }

    public function create()
    {
        $restaurant = restaurant::all();
        return view('r',  ['res'=>$restaurant]);
        
    }
    
    public function store()
    {
        reservation::create([  
            'user_id' =>  request('user'),
            'restaurant_id' => request('restaurant'),
            'date' => request('bookingDate'),
            'time' => request('time'),
            'capacity' => request('capacity'),
            'comment' => 'none',
            'status' => 'created',
            'avail' => 'unavail',
            'notes' => request('note'),
        ]);
        return redirect("/r/create")->with('success', 'Reservation has been added successfully');
    }

    public function list($id)
    {
      $expired = reservation::where('user_id',$id)
      ->where('status','created')
      ->orderBy('created_at','desc')
      ->with('restaurant')->whereDate('created_at','<',Carbon::today()->format("Y-m-d") )->get();

      $created = reservation::where('user_id',$id)
      ->where('status','created')
      ->orderBy('created_at','desc')
      ->with('restaurant')->whereDate('created_at','>=',Carbon::today()->format("Y-m-d") )->get();

      return view('reservation', ['past'=>$expired, 'new'=> $created]);
    }

    public function update($user, $id)
    { 
        $u = User::find($user);
        $rid = reservation::find($id);
        $data = request()->except(['_token', '_method']);
        $rid->update($data);
        return redirect("/reservation/{$u->id}")->with('updated', 'Reservation has been updated');

    }

    public function getReserve($user)
    {
        $u = User::find($user);
        $reserve = DB::select('select * from reservations where user_id=?',[$user]);
        return view('/cart', ['reserves'=>$reserve]);
    }

    public function delete($id)
    {
        $u = Auth::user()->id;
        $data = reservation::find($id);
        $data->delete();
        return redirect("/reservation/{$u}")->with('deleted', 'Reservation has been removed.');
    }



}
