<?php

namespace App\Http\Controllers;

Use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CastController extends Controller
{
    public function create()
    {
        return view('cast.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:6',
            'umur' => 'required',
            'bio' => 'required',
        ],
        [
            'nama.required' => 'Nama harus diisi minimal 6 huruf',
            'umur.required' => 'Umur harus diisi angka',
            'bio.required' => 'Bio harus diisi ',
        ]);

        DB::table('cast')->insert([
            'nama' => $request['nama'],
            'umur' => $request['umur'],
            'bio' => $request['bio']
        ]);

        return redirect('/cast')->with('toast_success', 'Data Cast Berhasil Ditambahkan!');
    }

    public function index()
    {
        $cast = DB::table('cast')->get();
        // dd($cast);

        $title = 'Hapus Data Cast!';
        $text = "Yakin mau menghapus data cast?";
        confirmDelete($title, $text);
        return view('cast.index', compact('cast'));

        //return view('cast.index', ['cast' => $cast] );

    }

    public function show($id)
    {
        $cast = DB::table('cast')->where('id', $id)->first();
        return view('cast.detail', ['cast' => $cast]);
    }

    public function edit($id)
    {
        $cast = DB::table('cast')->where('id', $id)->first();
        return view('cast.edit', ['cast' => $cast]);
    }

    public function update(REquest $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ],
        [
            'nama.required' => 'Nama harus diisi minimal 6 huruf',
            'umur.required' => 'Umur harus diisi angka',
            'bio.required' => 'Bio harus diisi ',
        ]);

        DB::table('cast')
        ->where('id', $id)
        ->update(
            [
                'nama' => $request -> nama,
                'umur' => $request -> umur,
                'bio' => $request -> bio
                ]
        );

        return redirect('/cast')->with('toast_success', 'Data Cast Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        DB::table('cast')->where('id', '=', $id)->delete();

        return redirect('/cast');
    }
}
