@extends('layout.master')

@section('judul')
   Tambah Data Cast
@endsection

@section('content')
    {{-- Validasi Formulir --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- /validasi formulir --}}

    <form action="/cast" method="POST">
        @csrf

        {{-- Form INput --}}
        <div class="form-group">
            <label >Nama</label>
            <input type="text" name="nama" class="form-control" >
        </div>

        <div class="form-group">
            <label >Umur</label>
            <input type="text" name="umur" class="form-control" >
        </div>
        <div class="form-group">
            <label >Bio</label>
            <textarea name="bio" class="form-control" cols="30" rows="10"></textarea>
        </div>
        {{-- Formulir Input --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
