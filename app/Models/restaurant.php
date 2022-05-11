<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    use HasFactory;

    public function food()
    {
        return $this->hasMany(food::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function reservation()
    {
        return $this->hasMany(reservation::class);
    }

    public function order()
    {
        return $this->hasMany(order::class);
    }

}
