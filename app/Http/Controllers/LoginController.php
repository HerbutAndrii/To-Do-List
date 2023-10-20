<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function loginView() {
        return view('auth.login');
    }

    public function login(LoginRequest $request) {
        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user?->password)) {
            auth()->login($user);
            return redirect(route('task.index'));
        } else {
            return back()->withErrors([
                'Login' => 'Such user does not exist'
            ])->withInput();
        }
    }

    public function logout() {
        auth()->logout();
        session()->regenerate();
        return redirect("/");
    }
}
