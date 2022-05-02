<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\food;
use App\Models\restaurant;


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

    public function getRestaurantDishes($id)
    {
        $dishes = food::find($id);
       return view('dish', ['foods'=>$dishes]);

    }

}
