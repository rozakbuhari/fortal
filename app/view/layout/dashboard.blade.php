<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Fortal - Tempat Berita Kekinian</title>
    <link rel="stylesheet" href="{{ URL . 'scripts/bootstrap/bootstrap.min.css' }}">
    <link rel="stylesheet" href="{{ URL . 'css/style.css' }}">
    <link rel="stylesheet" href="{{ URL . 'scripts/ionicons/css/ionicons.min.css' }}">
    <link rel="stylesheet" href="{{ URL . 'scripts/toast/jquery.toast.min.css' }}">
</head>

<body>
<div class="topbar">
    <div class="container">
        <div class="inner">
            <div class="left">
                <ul class="info">
                    <li>
                        <a href="#"><i class="ion-ios-email-outline"></i> editor@fortal.co.id</a></li>
                </ul>
            </div>
            <div class="right">
                <ul class="topbar-nav">
                    @if(!isset($_SESSION["authenticated"]))
                        <li><a href="#" data-toggle="modal" data-target="#modalDaftar">Daftar</a></li>
                        <li>
                            <a href="#login-modal" data-toggle="modal" data-target="#login-modal">
                                <i class="ion-ios-help-outline"></i> Login
                            </a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ $_SESSION['user']->fullname }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li style="float: none">
                                    <a href="{{ URL. 'auth/profile' }}" style="margin-left: 0; padding: 10px;">Profil</a></li>
                                <li style="float: none">
                                    <a href="{{ URL. 'auth/logout' }}" style="margin-left: 0; padding: 10px;">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<header class="primary">
    <div class="container">
        <div class="brand">
            <a href="#">
                <div class="text">
                    FORTAL
                </div>
            </a>
            <h2>
                Tempat <br> Berita Kekinian <br> Alias Up-to-date!
            </h2>
        </div>
    </div>
    <hr>
</header>

<section>
    <div class="container">
        @yield('content')
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="block">
                    <h1 class="block-title">Tentang Kami</h1>
                    <div class="block-body">
                        <figure class="foot-logo">
                            FORTAL.CO.ID
                        </figure>
                        <p class="brand-description">
                            FORTAL adalah media masa kini yang kekinian alias Up-to-date dan terpercaya tapi engga tajam
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="block">
                    <h1 class="block-title">Kategori Populer
                        <div class="right"><a href="#">Semuanya <i class="ion-ios-arrow-thin-right"></i></a></div>
                    </h1>
                    <div class="block-body">
                        <ul class="tags">
                            <li><a href="#">MotoGP</a></li>
                            <li><a href="#">Gadgets</a></li>
                            <li><a href="#">Moto2</a></li>
                            <li><a href="#">F1 Championship</a></li>
                            <li><a href="#">Superbike</a></li>
                            <li><a href="#">Champion League</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="block">
                    <h1 class="block-title">Berita Terbaru</h1>
                    <div class="block-body">
                        @foreach($posts as $post)
                            <article class="article-mini">
                                <div class="inner">
                                    <figure>
                                        <a href="#">
                                            <img src="holder.js/80x60">
                                        </a>
                                    </figure>
                                    <div class="padding">
                                        <h1>
                                            <a href="#">
                                                {{ $post->title }}
                                            </a>
                                        </h1>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                        <a href="#" class="btn btn-primary btn-magz white btn-block">Lihat Semua <i
                                    class="ion-ios-arrow-thin-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12 col-sm-6">
                <div class="block">
                    <h1 class="block-title">Ikuti Kami</h1>
                    <div class="block-body">
                        <p>Ikuti kami dan tetap terhubung dan dapatkan berita kekinian</p>
                        <ul class="social trp">
                            <li>
                                <a href="#" class="facebook">
                                    <svg>
                                        <rect/>
                                    </svg>
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter">
                                    <svg>
                                        <rect/>
                                    </svg>
                                    <i class="ion-social-twitter-outline"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="youtube">
                                    <svg>
                                        <rect/>
                                    </svg>
                                    <i class="ion-social-youtube-outline"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="rss">
                                    <svg>
                                        <rect/>
                                    </svg>
                                    <i class="ion-social-rss"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="line"></div>
                <div class="block">
                    <div class="block-body no-margin">
                        <ul class="footer-nav-horizontal">
                            <li><a href="#">Beranda</a></li>
                            <li><a href="#">Kontak</a></li>
                            <li><a href="#">Tentang</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    Hak Cipta &copy; Fortal 2017.
                </div>
            </div>
        </div>
    </div>
</footer>

<div id="login-modal" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
                <form action="<?= URL ?>auth/login" method="post" id="formLogin">
                    <div class="form-group">
                        <label for="inputEmail">Email</label>
                        <div>
                            <input type="email" name="email" class="form-control" id="inputEmail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <div>
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="{{ URL . 'auth/forgot' }}" class="btn btn-link">Lupa Password</a>
                <button type="submit" form="formLogin" class="btn btn-primary">Login</button>
            </div>
        </div>

    </div>
</div>

<div id="modalDaftar" class="modal" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Daftar Anggota</h4>
            </div>
            <div class="modal-body">
                <form action="{{ URL . 'auth/register'  }}" method="post" id="form-register">
                    <div class="form-group">
                        <label for="reg-username">Nama</label>
                        <input type="text" class="form-control" name="fullname">
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" value="1" checked> Pria
                        </label>
                        <label>
                            <input type="radio" name="gender" value="2" checked> Wanita
                        </label>
                    </div>

                    <hr>
                    <div class="form-group">
                        <label for="reg-username">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="reg-password">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                        <label for="reg-password-verify">Ulangi password</label>
                        <input type="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <img src="{{ URL . 'auth/captcha' }}" alt="captcha" class="img-thumbnail">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input-lg" name="phrase" placeholder="Insert Captcha">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Batal</button>
                <button type="submit" form="form-register" class="btn btn-primary">Daftar</button>
            </div>
        </div>

    </div>
</div>

<script src="{{ URL . 'js/jquery.js' }}"></script>
<script src="{{ URL . 'js/jquery.migrate.js' }}"></script>
<script src="{{ URL . 'scripts/bootstrap/bootstrap.min.js' }}"></script>
<script src="{{ URL . 'js/e-magz.js' }}"></script>
<script src="{{ URL . 'scripts/toast/jquery.toast.min.js' }}"></script>
<script src="{{ URL . 'scripts/touchswipe/jquery.touchSwipe.min.js' }}"></script>
<script src="{{ URL . 'scripts/jquery-number/jquery.number.min.js' }}"></script>
<script src="{{ URL . 'scripts/holder/holder.min.js' }}"></script>
</body>
</html>