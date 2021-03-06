<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $restaurant = null;

    public function __construct($oldCart)
    {
        if ($oldCart) 
        {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->restaurant = $oldCart->restaurant;
        }
    }

    public function add($item, $id) 
    {
        $storedItem = ['qty' => 0, 'pri' => $item->price, 'item' => $item, 'res' => $item->restaurant_id];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['pri'] = $item->price * $storedItem['qty'];
        $storedItem['res'] = $item->restaurant_id; 
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
        $this->restaurant =  $storedItem['res'];
    }

    public function reduce($item, $id) 
    {
        $storedItem = ['qty' => 0, 'pri' => $item->price, 'item' => $item];
        if ($this->items) 
        {
            if (array_key_exists($id, $this->items)) 
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']--;
        $storedItem['pri'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty--;
        $this->totalPrice -= $item->price;

        if ($this->items[$id]['qty'] <= 0) 
        {
            unset($this->items[$id]);
        }
    }

    public function increaseByOne($item,$id) 
    {
        $storedItem = ['qty' => 0, 'pri' => $item->price, 'item' => $item];
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['pri'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }

    public function removeItem($id) 
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['pri'];
        unset($this->items[$id]);
    }
}
