<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Mail\Confirmation;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function registerView() {
        return view('auth.register');
    }

    public function register(RegisterRequest $request) {
        DB::beginTransaction();

        $user = new User();
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->save();

        if($request->hasFile('avatar')) {
            $request->file('avatar')->storeAs('public/avatars', 'User'.$user->id);
            $filename = $request->file('avatar')->getClientOriginalName();
            $user->avatar = $filename;
            $user->save();
        }

        DB::commit();

        // $confirmation = new Confirmation();
        // Mail::to($request->email)->send($confirmation);
        
        return view('auth.confirmation', [
            'code' => "200",
            'user' => $user
        ]);
    }

    public function confirm(Request $request, User $user, string $code) {
        if($request->code == $code) {
            $user->markEmailAsVerified();
            auth()->login($user);
            return redirect(route('task.index'));
        } else {
            $user->delete();
            return redirect(route('auth.registerView'))->withErrors([
                'code' => 'Confirmation code does not match'
            ]);
        }
    }
}
