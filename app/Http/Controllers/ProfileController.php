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

    public function edit()
    {
        return view('profile.edit')->with('User', auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user= auth()->user();
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'phone' => $request->phone,
            'address' => $request->address
            
            

        ]);session()->flash('success', 'Profile updated successfully.');
            return redirect()->back;
    }
}
