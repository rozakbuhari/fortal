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

    @yield('style')

</head>

<body>
@include('partial._topbar')
<header class="primary">
    <div class="container">
        <div class="brand">
            <a href="{{ URL }}">
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
<nav class="menu">
    <div class="container">
        <ul>
            <li>
                <a href="{{ URL . 'posts' }}">POSTINGAN</a>
            </li>
            <li>
                <a href="#">KATEGORI</a>
            </li>
            <li>
                <a href="{{ URL . 'ads' }}">IKLAN</a>
            </li>
        </ul>
    </div>
</nav>

<section>
    <div class="container">
        @yield('content')
    </div>
</section>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
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
            <div class="col-md-6 col-xs-12 col-sm-6">
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

<script src="{{ URL . 'js/jquery.js' }}"></script>
<script src="{{ URL . 'js/jquery.migrate.js' }}"></script>
<script src="{{ URL . 'scripts/bootstrap/bootstrap.min.js' }}"></script>
<script src="{{ URL . 'js/e-magz.js' }}"></script>
<script src="{{ URL . 'scripts/toast/jquery.toast.min.js' }}"></script>
<script src="{{ URL . 'scripts/touchswipe/jquery.touchSwipe.min.js' }}"></script>
<script src="{{ URL . 'scripts/jquery-number/jquery.number.min.js' }}"></script>
<script src="{{ URL . 'scripts/jquery.dataTables.min.js' }}"></script>

@yield('script')

</body>
</html>