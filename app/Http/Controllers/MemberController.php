<?php

namespace App\Http\Controllers;
use App\Posting;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Controllers;

class MemberController extends Controller
{
    public function postingbarang(Request $request) {
        $this->validate($request, [
            'judulposting' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|max:1000',
            'jenisposting' => 'required',
            'foto' => 'required',
        ]);

        $user = Auth::user();
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namafoto = $user->nim . '-' . $file->getClientOriginalName();
            $file->move('posting', $namafoto);
        }

        Posting::create([
            'user_id' => $user->nim,
            'judulposting' => $request['judulposting'],
            'tanggal' => $request['tanggal'],
            'jenisposting' => $request['jenisposting'],
            'foto' => $namafoto,
            'deskripsi' => $request['deskripsi'],
        ]);

        if ($request['jenisposting'] == 1) {
            return redirect()->route('listBarangHilang');
        } else {
            return redirect()->route('listBarangKetemu');
        }
    }

    public function updatePosting($id) {
        $post = Posting::where('id', $id)->first();
        return view('posting.updateposting', compact('post'));
    }

    public function userDeletePosting($id) {
        $post = Posting::where('id', $id)->first();
        $post->delete();
        return redirect()->back();
    }

    public function reportPosting($id) {
        $post = Posting::where('id', $id)->first();
        return view('posting.reportposting', compact('post'));
    }

    public function userReportPosting($id, Request $request) {
        $this->validate($request, [
            'pesan' => 'required',
        ]);

        $posting = Posting::find($id);
        $user = Auth::user();
        Report::create([
            'user_id' => $user->nim,
            'posting_id' => $id,
            'pesan' => $request['pesan'],
        ]);

        if ($posting->jenisposting == 1) {
            return redirect()->route('listBarangHilang');
        } else {
            return redirect()->route('listBarangKetemu');
        }
    }

    public function userUpdatePosting($id, Request $request) {
        $this->validate($request, [
            'judulposting' => 'required',
            'tanggal' => 'required|date',
            'deskripsi' => 'required',
            'jenisposting' => 'required',
            'foto' => 'required',
        ]);

        $user = Auth::user();
        $posting = Posting::find($id);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $request['foto'] = $user->nim . '-' . $file->getClientOriginalName();
            $file->move('posting', $request['foto']);
        }

        $posting->update($request);

        if ($request['jenisposting'] == 1) {
            return redirect()->route('listBarangHilang');
        } else {
            return redirect()->route('listBarangKetemu');
        }
    }
}
