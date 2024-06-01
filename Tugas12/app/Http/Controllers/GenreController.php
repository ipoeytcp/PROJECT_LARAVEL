<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Genre;

class GenreController extends Controller
{
    public function creategenre()
    {
        return view('genre.tambahgenre');
    }

    public function storegenre(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ],
        [
            'nama.required' => 'Nama Genre harus diisi',
        ]);

        DB::table('genre')->insert([
            'nama' => $request['nama']
        ]);

        return redirect('/genre')->with('toast_success', 'Data Genre Berhasil Ditambahkan!');
    }

    public function indexgenre()
    {
        $genre = DB::table('genre')->get();
        // dd($genre);

        $title = 'Hapus Data Genre!';
        $text = "Yakin mau menghapus data genre?";
        confirmDelete($title, $text);
        return view('genre.indexgenre', compact('genre'));
    }
    //     //return view('genre.index', ['genre' => $genre] );



    public function showgenre($id)
    {
        $genre = Genre::find($id);
        return view('genre.detailgenre', ['genre' => $genre]);
    }

    public function editgenre($id)
    {
        $genre = DB::table('genre')->where('id', $id)->first();
        return view('genre.editgenre', ['genre' => $genre]);
    }

    public function updategenre(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
        ],
        [
            'nama.required' => 'Nama Genre harus diisi',
        ]
    );

        DB::table('genre')
        ->where('id', $id)
        ->update(
            [
                'nama' => $request -> nama
                ]
        );

        return redirect('/genre')->with('toast_success', 'Data genre Berhasil Diupdate!');
    }

    public function destroygenre($id)
    {
        DB::table('genre')->where('id', '=', $id)->delete();

        return redirect('/genre');
    }
}
