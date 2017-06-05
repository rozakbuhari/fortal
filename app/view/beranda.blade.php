@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="carousel slide" id="featured">
                <div class="carousel-inner">
                    <div class="item active">
                        <article class="featured">
                            <div class="overlay"></div>
                            <figure>
                                <img src="images/news/bos-beras.jpg">
                            </figure>
                            <div class="details">
                                <div class="category"><a href="#">Beras Bulog</a></div>
                                <h1><a href="#">Akibat Gagal Panen, Harga Beras Melonjak Tinggi, Bikin Bos
                                        Beras Melongo</a></h1>
                                <time>29 Mei 2017</time>
                            </div>
                        </article>
                    </div>
                </div>
                <a class="left carousel-control" href="#featured" data-slide="prev">
                    <span class="ion-ios-arrow-left" aria-hidden="true"></span>
                    <span class="sr-only">Sebelumnya</span>
                </a>
                <a class="right carousel-control" href="#featured" data-slide="next">
                    <span class="ion-ios-arrow-right" aria-hidden="true"></span>
                    <span class="sr-only">Berikutnya</span>
                </a>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 sidebar">
            <aside>
                <h1 class="aside-title">POPULER <a href="#" class="all">Lihat Semuanya <i
                                class="ion-ios-arrow-right"></i></a></h1>
                <div class="aside-body">
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
                </div>
            </aside>
            <aside id="sponsored">
                <h1 class="aside-title">IKLAN</h1>
                <div class="aside-body">
                    <ul class="sponsored">
                        <li>
                            <a href="#">
                                <img src="holder.js/175x175">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <img src="holder.js/175x175">
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>
@endsection