<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\restaurant;
use App\Models\food;

class RestaurantController extends Controller
{
    public function index()
    {
		$stores= $this->restaurant->getResInfo();
		$data['stores'] = $stores;
		$this->load->view('dish',$data);
    }
    public function list()
    {
       $restaurant = DB::select('select * from restaurants');
       return view('restaurant', ['restaurants'=>$restaurant]);
    }
    public function displayOne(Request $request)
    {
        $id= $request->id;
        $res = DB::table('restaurants')->where('id', '=', $id)->get();
       return view('dish', ['restaurants'=>$res]);

    }
    public function getDishes(Request $request)
    {
        $id= $request->id;
        $dishes = DB::table('food') ->join('restaurants', 'food.restaurant_id', '=', 'restaurants.id')
        ->select('*')
        ->where('restaurants.id', '=', $id)->get();
       return view('dish', ['food'=>$dishes]);

    }

    

    
}
