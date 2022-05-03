<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\User;


class ProfileController extends Controller
{
    public function index($user)
    {
        $data = User::find($user);
        return view('profile', ['user'=>$data]);
        
    }

    public function edit($user)
    {
        $data = User::find($user);
        return view('edit', ['user'=>$data]);
    }

  public function update($user)
    {
        $u = User::find($user);

        $data = request()->validate([
            'username' => 'required',
            'birthdate' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $u->update($data);

        return redirect("/profile/{$u->id}")->with('status', 'Profile has been updated');
    }

}
