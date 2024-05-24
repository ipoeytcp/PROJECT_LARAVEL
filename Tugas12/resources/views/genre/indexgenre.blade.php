@extends('layout.master')

@section('judul')
   Tampil Data Genre
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

    <a href="/genre/creategenre" class="btn btn-primary btn-sm mb-3">Tambah Data</a>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
            @forelse ($genre as $key => $value)
                <tr>
                    <td class="text-center">{{$key + 1}}</td>
                    <td>{{$value->nama}}</td>
                    <td>

                        <form action="/genre/{{$value->id}}" method="POST" class="text-center">
                            @csrf
                            @method('DELETE')
                            <a href="/genre/{{$value->id}}" class="btn btn-info btn-sm">Detail</a>
                            <a href="/genre/{{$value->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            {{-- /<input type="submit" value="Delete" class="btn btn-danger btn-sm show_confirm" id="delete" > --}}

                            <a href="/genre/{{$value->id}}" class="btn btn-danger btn-sm" data-confirm-delete="true">Hapus</a>


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
