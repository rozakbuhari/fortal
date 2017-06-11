@extends('layout.auth')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h4>Forgot Password</h4>
            <hr>
            <form action="{{ URL . 'auth/reset' }}" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="question">Pertanyaan Rahasia</label>
                    <select name="question" id="question" class="form-control">
                        <option value="">Pilih salah satu</option>
                        @foreach($questions as $question)
                            <option value="{{ $question->id }}">{{ $question->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jawaban">Jawaban</label>
                    <input type="text" class="form-control" id="answer" name="answer" autocomplete="false">
                </div>
                <div class="pull-right">
                    <a href="{{ URL }}" class="btn btn-link">Batal</a>
                    <button class="btn btn-primary" type="submit">Kirim</button>
                </div>
            </form>
        </div>
    </div>
@endsection