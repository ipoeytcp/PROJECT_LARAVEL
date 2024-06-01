@extends('layout.master')

@section('judul')
   Edit Data Film
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

    <form action="/film/{{$film->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- Form INput --}}
        <div class="form-group">
            <label >Judul</label>
            <input type="text" name="judul" value="{{$film->judul}}" class="form-control" >
        </div>

        <div class="form-group">
            <label >Ringkasan Film</label>
            <textarea name="ringkasan" class="form-control" cols="30" rows="10">{{$film->ringkasan}}</textarea>
        </div>

        <div class="form-group">
            <label >Tahun</label>
            <input type="text" name="tahun" value="{{$film->tahun}}" class="form-control" >
        </div>

        <div class="form-group">
            <label >Poster</label>
            <input type="file" name="poster" class="form-control" >
        </div>

        <div class="form-group">
            <label >Genre</label>
            <select name="genre_id" class="form-control" id="">
                <option value="">--Pilih Genre--</option>
                @forelse ($genre as $item)
                    @if ($item->id === $film->genre_id)
                        <option value="{{$item->id}}" selected>{{$item->nama}}</option>
                    @else
                        <option value="{{$item->id}}">{{$item->nama}}</option>
                    @endif

                @empty
                    <option value="">Tidak Ada Data</option>
                @endforelse
            </select>
        </div>
        {{-- Formulir Input --}}
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
