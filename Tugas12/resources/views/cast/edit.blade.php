@extends('layout.master')

@section('judul')
   Edit Data Cast
@endsection

@section('content')

    <form action="/cast/{{$cast->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label >Nama</label>
            <input type="text" name="nama" value="{{$cast->nama}}" class="form-control" >
        </div>
        @error('nama')
             <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label >Umur</label>
            <input type="text" name="umur" value="{{$cast->umur}}" class="form-control" >
        </div>
         @error('umur')
             <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="form-group">
            <label >Bio</label>
            <textarea name="bio" class="form-control" cols="30" rows="10">{{$cast->bio}}</textarea>
        </div>
        @error('bio')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
