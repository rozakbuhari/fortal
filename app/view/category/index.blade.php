@extends('layout.dashboard')

@section('style')
    <link rel="stylesheet" href="{{ URL . 'scripts/dataTables/jquery.dataTables.min.css' }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ URL. 'category/create' }}" class="btn btn-primary">Kategori Baru</a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <table id="categories-table" class="table table-responsive">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Slug</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ '/' . $category->slug }}</td>
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
            $("#categories-table").DataTable({
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
        });
    </script>
@endsection