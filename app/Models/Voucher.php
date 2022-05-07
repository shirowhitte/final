<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    protected $guarded = [];

    public static function findByCode($code)
    {
        return self::where('code', $code)->first();

    }

    public function discount($total)
    {
        if($this->type == 'fixed')
        {
            return $this->value;
        }
        else
        {
            return 0;
        }
    }
}
