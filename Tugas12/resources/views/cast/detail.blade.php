@extends('layout.master')

@section('judul')
   Detail Data Cast
@endsection

@section('content')

   <h1>Nama Artis : {{$cast->nama}}</h1>
   <p>Umur : {{$cast->umur}}</p>
   <p>Bio : {{$cast->bio}}</p>

   <a href="/cast" class="btn btn-secondary btn-sm">Kembali</a>
@endsection
