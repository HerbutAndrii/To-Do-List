<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Mail\Confirmation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function registerView() {
        return view('register');
    }

    public function register(RegisterRequest $request) {
        $request->validated();
        
        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();
        
        $confirmation = new Confirmation();
        Mail::to($request->email)->send($confirmation);
        return view('confirmation', [
            'code' => $confirmation->code,
            'user' => $user
        ]);
    }

    public function confirm(Request $request, User $user, string $code) {
        if($request->code == $code) {
            auth()->login($user);
            return redirect(route('task.index'));
        } else {
            $user->delete();
            return redirect(route('auth.registerView'));
        }
    }
}
