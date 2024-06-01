@extends('layout.master')

@section('judul')
   Detail Data Genre
@endsection

@section('content')

   <h1>Jenis Genre : {{$genre->nama}}</h1>

   @forelse ($genre ->films as $item)
        <div class="col-4">
            <div class="card">
                <img src="{{asset('images/'.$item->poster)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h4>{{$item->judul}}</h4>
                    <p class="card-text">{{ Str::limit($item->ringkasan, 150) }}</p>
                    <a href="/film/{{$item->id}}" class="btn btn-info btn-block btn-sm">Selengkapnya...</a>

                </div>
            </div>

        </div>
   @empty
       <h3>Kategori Ini Tidak Ada Postingan</h3>
   @endforelse

   <a href="/genre" class="btn btn-secondary btn-sm">Kembali</a>
@endsection
