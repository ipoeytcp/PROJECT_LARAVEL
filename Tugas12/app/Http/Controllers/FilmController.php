<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use App\Models\Genre;
use Illuminate\Support\Facades\File;
use Alert;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
         $this->middleware('auth')->except(['index','show']);
     }


    public function index()
    {
        $film = Film::get();
        return view('film.index',['film' => $film]);

        $title = 'Hapus Data Film!';
        $text = "Yakin mau menghapus data film?";
        confirmDelete($title, $text);
        return view('film.index', compact('film'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genre = Genre::get();
        return view('film.create',['genre' => $genre]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'required|image|mimes:jpg,png,jpeg',
            'genre_id' => 'required',
        ],
        [
            'judul.required' => 'Judul harus diisi',
            'ringkasan.required' => 'Ringkasan harus diisi angka',
            'tahun.required' => 'Tahun harus diisi ',
            'poster.required' => 'Poster harus diisi',
            'genre_id.required' => 'Genre harus di pilih'
        ]);

        $filename = time().'.'.$request->poster->extension();
        $request->poster->move(public_path('images'),$filename);

        $film = new Film();

        $film->judul = $request->judul;
        $film->ringkasan = $request->ringkasan;
        $film->tahun = $request->tahun;
        $film->genre_id = $request->genre_id;
        $film->poster = $filename;

        $film->save();

        return redirect('/film')->with('toast_success', 'Data Film Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::find($id);
        return view('/film/detail', ['film' => $film]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);
        $genre = Genre::get();

        return view('film.update', ['film' => $film, 'genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'ringkasan' => 'required',
            'tahun' => 'required',
            'poster' => 'image|mimes:jpg,png,jpeg',
            'genre_id' => 'required',
        ],
        [
            'judul.required' => 'Judul harus diisi',
            'ringkasan.required' => 'Ringkasan harus diisi angka',
            'tahun.required' => 'Tahun harus diisi ',
            'genre_id.required' => 'Genre harus di pilih'
        ]);

        $film = Film::find($id);

        if($request->has('poster')){
            //Hapus Gambar Lama
            $path = 'images/';
            File::delete($path. $film->poster);

            //Simpan Gambar baru
            $filename = time().'.'.$request->poster->extension();

            $request->poster->move(public_path('images'),$filename);

            //ganti data yang baru
            $film -> poster = $filename;

            $film->save();
        }

        $film->judul =$request['judul'];
        $film->ringkasan =$request['ringkasan'];
        $film->tahun =$request['tahun'];
        $film->genre_id =$request['genre_id'];

        $film->save();

        return redirect('/film')->with('toast_success', 'Data Film Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);

        $path = 'images/';
        File::delete($path. $film->poster);

        $film->delete();

        return redirect('/film');
    }
}
