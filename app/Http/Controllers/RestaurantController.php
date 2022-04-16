<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');

        $this->load->model('Store_model');
		$stores= $this->Store_model->getResInfo();
		$data['stores'] = $stores;
		$this->load->view('front/partials/header');
		$this->load->view('front/restaurant',$data);
		$this->load->view('front/partials/footer');
    }
}
