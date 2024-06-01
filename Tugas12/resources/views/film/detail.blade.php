@extends('layout.master')

@section('judul')
   Detail Data Film
@endsection

@section('content')



        <img src="{{asset('images/'.$film->poster)}}" class="card-img-top" alt="...">
        <div class="card-body">
            <h3>{{$film->judul}}</h3>
            <p class="card-text ">{{$film->ringkasan}}</p>

        </div>

        <hr>

        <h4>Kritik Penonton</h4>
            @forelse ($film->kritik as $item)
            <div class="media my-3 border p-3">
                    <img src="https://dummyimage.com/300/09f.png/fff" class="mr-3" style="border-radius: 50%;" width="100px" alt="..." >
                    <div class="media-body">
                    <h5 class="mt-0 text-primary">{{$item->user->name}}</h5>
                    <p>{{$item->content}}</p>
                    </div>
              </div>
            @empty
                <h4>Belum ada kritik</h4>
            @endforelse
        <hr>

        <form action="/kritik/{{$film->id}}" method="POST">
            @csrf
            <textarea name="content" cols="30" rows="10" class="form-control" placeholder="Isi Kritik"></textarea>
            <div class="form-group">
                <label >Point</label>
                <input type="text" name="point" class="form-control" placeholder="1 - 10">
            </div>
            @error('content')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
            <input type="submit" value="kritik" class="btn btn-primary btn sm">
        </form>

        <hr>
        <a href="/film" class="btn btn-secondary btn-block btn-sm">Kembali</a>
        <hr>

@endsection
