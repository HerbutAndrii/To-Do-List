<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView() {
        return view('login');
    }

    public function login(AuthRequest $request) {
        $request->validated();

        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user?->password)) {
            auth()->login($user);
            return redirect(route('task.index'));
        } else {
            return back()->withErrors([
                'Login' => 'Such user does not exist'
            ]);
        }
    }

    public function logout() {
        auth()->logout();
        session()->regenerate();
        return redirect("/");
    }
}
