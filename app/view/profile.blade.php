@extends('layout.dashboard')

@section('content')
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <h4>Perbarui Profil</h4>
            <hr>
            <form action="#" class="form-horizontal">
                <div class="form-group">
                    <label for="inputNama" class="col-sm-3">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" value="{{ $_SESSION['user']->fullname }}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="radio col-sm-offset-3">
                        <label>
                            <input type="radio" name="gender" value="1" {{ $_SESSION['user']->gender != 1 ?: 'checked' }}> Pria
                        </label>
                        <label>
                            <input type="radio" name="gender" value="2" {{ $_SESSION['user']->gender == 1 ?: 'checked' }}> Wanita
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <label for="reg-username" class="col-sm-3">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="email" id="reg-username" value="{{ $_SESSION['user']->email }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="reg-password" class="col-sm-3">Password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="reg-password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="reg-password-verify" class="col-sm-3">Ulangi password</label>
                    <div class="col-sm-9">
                        <input type="password" class="form-control" id="reg-password-verify">
                    </div>
                </div>
                <div class="col-sm-offset-3">
                    <a href="{{ URL }}" class="btn btn-link pull-right">Batal</a>
                    <button type="submit" class="btn btn-primary pull-right">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
@endsection