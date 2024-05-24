@extends('layout.master')

@section('judul')
   Detail Data Genre
@endsection

@section('content')

   <h1>Jenis Genre : {{$genre->nama}}</h1>

   <a href="/genre" class="btn btn-secondary btn-sm">Kembali</a>
@endsection
