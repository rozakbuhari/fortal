@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div>
                <h3>
                    {{ $post->title }}
                </h3>
                <span style="margin-right: 20px;"><span class="ion-clock"></span> {{ $post->created_at }}</span>
                <span><span class="ion-person"></span> {{ $post->author->fullname }}</span>
            </div>
            <br>
            <div>
                <img src="{{ URL . 'images/' . (empty($post->image) ? 'placeholder.png' : $post->image) }}" class="img-responsive center-block">
            </div>
            <br>
            <div>
                <p>{{ $post->content }}</p>
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
                                <a href="{{ URL . 'posts/show/' . $post->id }}">
                                    <img src="{{ URL . 'images/' . (empty($post->image) ? 'placeholder.png' : $post->image) }}">
                                </a>
                            </figure>
                            <div class="padding">
                                <h1>
                                    <a href="{{ URL . 'posts/show/' . $post->id }}">
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