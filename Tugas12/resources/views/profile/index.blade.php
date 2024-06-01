@extends('layout.master')

@section('judul')
   Halaman Profile
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

        <form action="/profile/{{$detailProfile->id}}" method="POST">
            @csrf
            @method('PUT')
            {{-- Form INput --}}

            <div class="form-group">
                <label >Nama User</label>
                <input type="text"  value="{{$detailProfile->user->name}}" class="form-control" disabled >
            </div>

            <div class="form-group">
                <label >Email user</label>
                <input type="text"  value="{{$detailProfile->user->email}}" class="form-control" disabled>
            </div>

            <div class="form-group">
                <label >Umur</label>
                <input type="number" name="umur" value="{{$detailProfile->umur}}" class="form-control" >
            </div>

            <div class="form-group">
                <label >Bio</label>
                <textarea name="bio" class="form-control" >{{$detailProfile->bio}}</textarea>
            </div>

            <div class="form-group">
                <label >Alamat</label>
                <textarea name="alamat" class="form-control" >{{$detailProfile->alamat}}</textarea>
            </div>

            {{-- Formulir Input --}}
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection
