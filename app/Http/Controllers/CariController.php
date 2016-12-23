<?php

namespace App\Http\Controllers;

use App\Posting;
use Illuminate\Http\Request;

class CariController extends Controller
{
    public function cariPostingBarang(Request $request) {
        $postings = Posting::where('judulposting', 'like', '%' . $request['judulposting'] . '%')->get();
        if ($postings->count()) {
            return view('posting.postingcari', compact('postings'));
        } else {
            echo "Maaf, Posting Tidak Ada";
        }
    }
}
