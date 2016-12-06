<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Controllers;

class LoginController extends Controller
{
    public function index(Request $request) {
        if (Auth::attempt(['nim' => $request['nim'], 'password' => $request['password'], 'status' => 'admin'])) {
            return redirect()->route('listuser');
        } else if(Auth::attempt(['nim' => $request['nim'], 'password' => $request['password'], 'status' => 'member'])) {
            return redirect()->route('posting');
        }
        return redirect()->back();
    }
}
