@extends('layout.master')

@section('judul')
   Tampil Data Film
@endsection

@push('scripts')
    <script src="{{asset('/template/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/template/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
    $(function () {
        $("#example1").DataTable();
    });
</script>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush

@section('content')

    @auth
        <a href="/film/create" class="btn btn-primary btn-sm mb-4">Tambah Film</a>
    @endauth

    <div class="row">
        @forelse ($film as $item)
            <div class="col-4">
                <div class="card">
                    <img src="{{asset('images/'.$item->poster)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4>{{$item->judul}}</h4>
                        <span class="badge badge-info">{{$item->genre->nama}}</span>
                        <p class="card-text">{{ Str::limit($item->ringkasan, 150) }}</p>
                        <a href="/film/{{$item->id}}" class="btn btn-info btn-block btn-sm">Selengkapnya...</a>

                        @auth
                            <div class="row my-2">
                                <div class="col">
                                    <a href="/film/{{$item->id}}/edit" class="btn btn-warning btn-block btn-sm">Edit</a>
                                </div>
                                <div class="col">
                                    <form action="/film/{{$item->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="submit" class="btn btn-danger btn-block btn-sm" onclick="return confirm('Yakin dihapus?')" value="Delete"  >
                                    </form>
                                </div>
                            </div>
                        @endauth

                    </div>
                </div>

            </div>
        @empty
            <h2>Tidak Ada Data Film</h2>
        @endforelse



    </div>
@endsection
