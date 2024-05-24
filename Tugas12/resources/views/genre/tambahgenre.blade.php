@extends('layout.master')

@section('judul')
   Tambah Data Genre
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

    <form action="/genre" method="POST">
        @csrf

        {{-- Form INput --}}
        <div class="form-group">
            <label >Nama</label>
            <input type="text" name="nama" class="form-control" >
        </div>

        {{-- Formulir Input --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
