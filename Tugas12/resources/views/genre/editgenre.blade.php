@extends('layout.master')

@section('judul')
   Edit Data Genre
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
    <form action="/genre/{{$genre->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label >Nama</label>
            <input type="text" name="nama" value="{{$genre->nama}}" class="form-control" >
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
