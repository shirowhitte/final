<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\User;


class ProfileController extends Controller
{
    public function show()
    {
        $data = User::all();
        return view('profile', ['profile'=>$data]);
        
    }
}
