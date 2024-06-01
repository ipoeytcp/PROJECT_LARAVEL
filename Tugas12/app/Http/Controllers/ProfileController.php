<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profile;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DB;

class ProfileController extends Controller
{
    public function index(){
        $iduser = Auth::id();

        $detailProfile = Profile::where('user_id', $iduser)->first();

        return view('profile.index', ['detailProfile' => $detailProfile]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ],
        [
            'alamat.required' => 'Alamat harus diisi',
            'umur.required' => 'Umur harus diisi angka',
            'bio.required' => 'Bio harus diisi ',
        ]);

        $profile = Profile::find(1);

        $profile->umur = $request->umur;
        $profile->alamat = $request->alamat;
        $profile->bio = $request->bio;

        $profile->save();

        return redirect('/profile')->with('toast_success', 'Data Profile Berhasil Diupdate!');
    }
}
