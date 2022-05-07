<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = ['cart','restaurant_id', 'type','comment','status','notes', 'name','address',  'price','reservation_id', 'payment_type' ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function reservation()
    {
        return $this->belongsTo(reservation::class);
    }
}
