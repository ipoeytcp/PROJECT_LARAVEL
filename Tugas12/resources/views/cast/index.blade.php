@extends('layout.master')

@section('judul')
   Tampil Data Cast
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

    <a href="/cast/create" class="btn btn-primary btn-sm mb-3">Tambah Data</a>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Umur</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($cast as $key => $value)
                <tr>
                    <td>{{$key + 1}}</td>
                    <td>{{$value->nama}}</td>
                    <td>{{$value->umur}}</td>
                    <td>

                        <form action="/cast/{{$value->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/cast/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/cast/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            {{-- /<input type="submit" value="Delete" class="btn btn-danger btn-sm show_confirm" id="delete" > --}}

                            <a href="/cast/{{$value->id}}" class="btn btn-danger btn-sm" data-confirm-delete="true">Hapus</a>


                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
      </table>

@endsection
