@extends('layout.dashboard')

@section('style')
    <link rel="stylesheet" href="{{ URL . 'scripts/dataTables/jquery.dataTables.min.css' }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ URL. 'posts/create' }}" class="btn btn-primary">Postingan Baru</a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <table id="posts-table" class="table table-responsive">
                <thead>
                    <tr>
                        <th></th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Tanggal</th>
                        <th>Kategori</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            <img src="{{ URL . 'images/' . (empty($post->image) ? 'placeholder.png' : $post->image) }}" style="max-width: 100px;">
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->author->fullname }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->category }}</td>
                        <td>
                            <a href="{{ URL . 'posts/edit/' . $post->id }}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{ URL . 'posts/delete/' . $post->id }}" class="btn btn-primary btn-sm">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL . 'scripts/dataTables/jquery.dataTables.min.js' }}"></script>
    <script>
        $(function () {
            $("#posts-table").DataTable({
                language: {
                    paginate: {
                        next: "<span class='ion-chevron-right'></span>",
                        previous: "<span class='ion-chevron-left'></span>"
                    },
                    search: "Cari",
                    info: "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "lengthMenu": 'Tampilkan <select>'+
                        '<option value="10">10</option>'+
                        '<option value="20">20</option>'+
                        '<option value="30">30</option>'+
                        '<option value="40">40</option>'+
                        '<option value="50">50</option>'+
                        '<option value="-1">All</option>'+
                        '</select> postingan'
                }
            });
        })
    </script>
@endsection