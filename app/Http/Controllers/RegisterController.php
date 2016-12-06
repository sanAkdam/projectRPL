<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Controllers;

class RegisterController extends Controller
{
    public function index(Request $request) {
        $this->validate($request, [
            'nim' => 'required|unique:users|digits_between:12,15|',
            'password' => 'required|min:4',
        ]);

        $user = User::create([
            'nim' => $request['nim'],
            'password' => bcrypt($request['password']),
        ]);

        Auth::login($user);
        return redirect()->route('login');
    }
}
