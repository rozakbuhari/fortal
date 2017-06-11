@extends('layout.master')

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div>
                <h3>
                    {{ $post->title }}
                </h3>
                <span style="margin-right: 20px;"><span class="ion-calendar"></span> {{ \Carbon\Carbon::parse($post->created_at)->format('d-M-Y h:m') }}</span>
                <span><span class="ion-person"></span> {{ $post->author->fullname }}</span>
            </div>
            <br>
            <div>
                <img src="{{ URL . 'images/' . (empty($post->image) ? 'placeholder.png' : $post->image) }}" class="img-responsive center-block">
            </div>
            <br>
            <div style="margin-bottom: 50px;">
                <p>{{ $post->content }}</p>
            </div>
            <div>
                @foreach($post->comments as $comment)
                    <div><span class="ion ion-person" style="margin-right: 10px;"></span> {{ $comment->author->fullname }}</div>
                    <p>{{ $comment->content }}</p>
                    <p class="text-right"><span class="ion-calendar"></span> {{ \Carbon\Carbon::parse($comment->created_at)->format('d-M-Y h:m') }}</p>
                    <hr>
                @endforeach
            </div>
            @if( Auth::authenticated() )
            <div>
                <form action="{{ URL . 'comments/store'  }}" method="post">
                    <input type="hidden" name="post" value="{{ $post->id }}">
                    <div class="form-group">
                        <h4 for="inputKomentar">Komentar</h4>
                        <textarea name="comment" id="inputKomentar" rows="7" class="form-control"></textarea>
                    </div>
                    <div>
                        <button class="btn btn-primary pull-right">Kirim</button>
                    </div>
                </form>
            </div>
            @endif
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
                        @foreach($ads as $ad)
                            <li>
                                <a href="#">
                                    <img src="{{ URL . 'images/' . $ad->image }}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
@endsection