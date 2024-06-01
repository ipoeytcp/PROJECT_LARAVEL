<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kritik;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class KritikController extends Controller
{
    public function tambah(Request $request, $id)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $iduser = Auth::id();

        $kritik = new Kritik();

        $kritik->user_id = $iduser;
        $kritik->content = $request->content;
        $kritik->point = $request->point;
        $kritik->film_id = $id;

        $kritik->save();

        return redirect('/film/'.$id);
    }
}
