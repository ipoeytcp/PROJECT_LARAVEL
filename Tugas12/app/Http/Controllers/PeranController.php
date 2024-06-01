<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peran;


class PeranController extends Controller
{
    public function tambah(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        $idcast = Auth::id();

        $peran = new Peran();

        $peran->cast_id = $idcast;
        $peran->nama = $request->nama;
        $peran->film_id = $id;

        $peran->save();

        return redirect('/film/'.$id);
    }
}
