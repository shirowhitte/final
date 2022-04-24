<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\food;
class FoodController extends Controller
{
    function show()
    {
        $food = food::all();
        return view('welcome', ['foods'=> $food]);
        
    }

    function display()
    {
        $food = food::all();
        return view('home', ['foods'=>$food]);
    }
}
