<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\reservation;
use App\Models\User;



class ReservationController extends Controller
{
    public function index($user)
    {
        $data = User::find($user);
        return view('reservation', ['user'=>$data]);
        
    }

    public function create($user)
    {
        $data = User::find($user);
        return view('reservation', ['user'=>$data]);
        
    }
}
