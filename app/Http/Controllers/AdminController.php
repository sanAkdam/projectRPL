<?php

namespace App\Http\Controllers;

use App\Posting;
use App\Report;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function selectAllUsers() {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.listuser', compact('users'));
    }

    public function userReport() {
        $reports = Report::orderBy('created_at', 'desc')->get();
        return view('admin.pesanreport', compact('reports'));
    }

    public function lihatUserPosting($posting_id) {
        $post = Posting::where('id', $posting_id)->first();
        return view('admin.lihatposting', compact('post'));
    }

    public function deleteUserPosting($posting_id) {
        $post = Posting::where('id', $posting_id)->first();
        $post->delete();
        return redirect()->route('pesanreport');
    }

    public function deleteUserReport($id) {
        $report = Report::where('id', $id)->first();
        $report->delete();
        return redirect()->route('pesanreport');
    }

    public function adminDeleteUser($id) {
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->route('listuser');
    }
}
