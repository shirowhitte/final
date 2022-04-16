<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    
    function __construct(){
        parent::__construct();
        //Load cart libraray
        $this->load->library('cart');
    }

    public function list($id) {
        $this->load->model('food');
        $dishesh = $this->food->getDishesh($id);

        /*$this->load->model('Store_model');
        $res = $this->Store_model->getStore($id);*/

        $data['dishesh'] = $dishesh;
       // $data['res'] = $res;
 
        $this->view('home', $data);
  
    }

    public function addToCart($id) {
        $this->load->model('Menu_model');
        $dishesh = $this->food->getSingleDish($id);
        $data = array (
            'id'    => $dishesh['id'],
            'restaurant_id'  => $dishesh['restaurant_id'],
            'qty'   =>1,
            'price' => $dishesh['price'],
            'name' => $dishesh['name'],
            'image' => $dishesh['img']
        );
        $this->cart->insert($data);
        redirect(base_url(). 'cart/index');
    }
}
