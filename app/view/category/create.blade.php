@extends('layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h4>Kategori Baru</h4>
            <hr>
            <form action="{{ URL . 'category/store' }}" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="inputNama" class="col-sm-3">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" id="inputNama">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputSlug" class="col-sm-3">Slug</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="slug" id="inputSlug">
                    </div>
                </div>
                <div class="col-sm-offset-3">
                    <a href="{{ URL . 'category' }}" class="btn btn-link pull-right">Batal</a>
                    <button type="submit" class="btn btn-primary pull-right">Buat</button>
                </div>
            </form>
        </div>
    </div>
@endsection