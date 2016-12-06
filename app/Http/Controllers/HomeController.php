<?php

namespace App\Http\Controllers;
use App\Posting;

class HomeController extends Controller
{
    public function listBarangHilang() {
        $postings = Posting::where('jenisposting', 1)->orderBy('created_at', 'desc')->get();
        return view('posting.listbaranghilang', compact('postings'));
    }

    public function listBarangKetemu() {
        $postings = Posting::where('jenisposting', 2)->orderBy('created_at', 'desc')->get();
        return view('posting.listbarangketemu', compact('postings'));
    }
}
