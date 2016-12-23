<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Controllers;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function index(Request $request) {
        if (auth()->attempt(['nim' => $request['nim'], 'password' => $request['password'], 'status' => 'admin'])) {
            return redirect()->route('listuser');
        } else if(auth()->attempt(['nim' => $request['nim'], 'password' => $request['password'], 'status' => 'member'])) {
            if ($request['url'] == 'http://localhost:8000/barang/list/ketemu' || $request['url'] == 'http://localhost:8000/barang/list/hilang') {
                return redirect()->intended();
            }
            return redirect()->route('posting');
        }
        return redirect()->back();
    }
}
