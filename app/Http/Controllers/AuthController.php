<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view('list.login');
    }

    public function submit(Request $request){
        $user = User::where('email', $request->email)->first();

        if(Hash::check($request->password, $user->password)){
            auth()->login($user);
            return redirect("/");
        } else {
            return back()->withErrors([
                'password' => 'Passwords do not match',
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();
        session()->regenerate();
        return back();
    }
}
