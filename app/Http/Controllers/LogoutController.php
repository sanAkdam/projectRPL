<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Controllers;

class LogoutController extends Controller
{
    public function index() {
        Auth::logout();
        return redirect()->route('/');
    }
}
