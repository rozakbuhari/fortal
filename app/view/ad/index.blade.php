@extends('layout.dashboard')

@section('style')
    <link rel="stylesheet" href="{{ URL . 'scripts/dataTables/jquery.dataTables.min.css' }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ URL. 'ads/create' }}" class="btn btn-primary">Iklan Baru</a>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="col-sm-12">
            <table id="posts-table" class="table table-responsive">
                <thead>
                <tr>
                    <th></th>
                    <th>Text</th>
                    <th>Expired</th>
                    <th>Harga</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ads as $ad)
                    <tr>
                        <td>
                            <img src="{{ URL . 'images/' . (empty($ad->image) ? 'placeholder.png' : $ad->image) }}" style="max-width: 100px;">
                        </td>
                        <td>{{ $ad->text }}</td>
                        <td>{{ $ad->expired }}</td>
                        <td><span class="text-success">{{ 'Rp. ' . number_format(500000, 0, ',' , '.') }}</span></td>
                    </tr>
                    <?php $total += 500000 ?>
                @endforeach
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>Total Laba: </td>
                        <td><span class="text-success">{{ 'Rp. ' . number_format($total, 0, ',' , '.') }}</span></td>
                    </tr>
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