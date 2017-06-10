@extends('layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <h4>Postingan Baru</h4>
            <hr>
            <form action="{{ URL . 'posts/store' }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                <input type="hidden" value="{{ Auth::user()->id }}" name="author">
                <div class="form-group">
                    <label for="inputJudul" class="col-sm-3">Judul</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="title" id="inputJudul">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputCategory" class="col-sm-3">Kategori</label>
                    <div class="col-sm-9">
                        <select name="category" class="form-control" id="inputCategory">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputImage" class="col-sm-3">Konten</label>
                    <div class="col-sm-9">
                        <textarea name="content" id="inputImage" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputImage" class="col-sm-3">Gambar</label>
                    <div class="col-sm-9">
                        <input type="file" name="image">
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