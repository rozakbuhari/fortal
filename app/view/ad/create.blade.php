@extends('layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h4>Iklan Baru</h4>
            <hr>
            <form action="{{ URL . 'ads/store' }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputImage" class="col-sm-3">Gambar</label>
                    <div class="col-sm-9">
                        <input type="file" name="image">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputExpired" class="col-sm-3">Text</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="text" id="inputExpired">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputExpired" class="col-sm-3">Tanggal Expired</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="expired" id="inputExpired">
                    </div>
                </div>
                <div class="col-sm-offset-3">
                    <a href="{{ URL . 'posts' }}" class="btn btn-link pull-right">Batal</a>
                    <button type="submit" class="btn btn-primary pull-right">Buat</button>
                </div>
            </form>
        </div>
    </div>
@endsection