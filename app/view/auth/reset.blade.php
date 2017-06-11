@extends('layout.auth')

@section('content')
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h4>Reset Password</h4>
            <hr>
            <form action="{{ URL . 'auth/resetUpdate' }}" class="form-horizontal" method="post">
                <input type="hidden" name="user" value="{{ $user->id }}">
                <div class="form-group">
                    <label for="reg-password">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="reg-password-verify">Ulangi password</label>
                    <input type="password" class="form-control">
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Ganti</button>
                </div>
            </form>
        </div>
    </div>
@endsection