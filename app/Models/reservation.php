<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','restaurant_id', 'date', 'time', 'capacity','comment','status', 'avail','notes'];
    protected $guarded = [];
    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(restaurant::class);
    }
}
