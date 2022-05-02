<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\restaurant;
use App\Models\food;

class RestaurantController extends Controller
{
    public function list()
    {
       $restaurant = restaurant::all();
       return view('restaurant', ['restaurants'=>$restaurant]);
    }

    public function getRestaurant($id)
    {
      $dishes = DB::select('select * from food where restaurant_id=?',[$id]);
      $rest = restaurant::find($id);
      return view('dish', ['foods'=>$dishes, 'res'=>$rest]);
    }





    
}


