@extends('layout.master')

@section('style')
    <link rel="stylesheet" href="{{ URL . 'scripts/dataTables/jquery.dataTables.min.css' }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="carousel slide" id="featured">
                <div class="carousel-inner">
                    @foreach($posts as $key => $post)
                    <div class="item {{ $key != 0 ?: 'active' }}">
                        <article class="featured">
                            <div class="overlay"></div>
                            <figure>
                                <img src="{{ URL . 'images/' . (empty($post->image) ? 'placeholder.png' : $post->image) }}">
                            </figure>
                            <div class="details">
                                <div class="category"><a href="#">{{ $post->category->name }}</a></div>
                                <h1><a href="{{ URL . 'posts/show/' . $post->id }}">{{ $post->title }}</a></h1>
                                <time><span class="ion ion-clock"></span> {{ \Carbon\Carbon::parse($post->created_at)->format('d-M-Y h:m') }}</time>
                            </div>
                        </article>
                    </div>
                    @endforeach
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
            <div class="line">
                <div>Berita Utama</div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                <article class="col-md-12 article-list">
                    <div class="inner">
                        <figure>
                            <a href="{{ URL . 'posts/show/' . $post->id }}">
                                <img src="{{ URL . 'images/' . (empty($post->image) ? 'placeholder.png' : $post->image) }}">
                            </a>
                        </figure>
                        <div class="details">
                            <div class="detail">
                                <div class="category">
                                    <a href="#">{{ $post->category->name }}</a>
                                </div>
                                <time>{{ \Carbon\Carbon::parse($post->created_at)->format('d-M-Y h:m') }}</time>
                            </div>
                            <h1>
                                <a href="{{ URL . 'posts/show/' . $post->id }}">{{ $post->title }}</a>
                            </h1>
                            <p>
                                {{ substr($post->content, 0, 200).'...' }}
                            </p>
                            <footer>
                                <a class="btn btn-primary more" href="{{ URL . 'posts/show/' . $post->id }}">
                                    <div>Baca</div>
                                    <div><i class="ion-ios-arrow-thin-right"></i></div>
                                </a>
                            </footer>
                        </div>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
        <div class="col-sm-6 col-md-4 sidebar">
            <aside>
                <h1 class="aside-title">POPULER <a href="#" class="all">Lihat Semuanya <i
                                class="ion-ios-arrow-right"></i></a></h1>
                <div class="aside-body">
                    <table class="table" id="table-popular">
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <a href="{{ URL . 'posts/show/' . $post->id }}">
                                        <img src="{{ URL . 'images/' . (empty($post->image) ? 'placeholder.png' : $post->image) }}" class="img-responsive" style="max-width: 100px;">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ URL . 'posts/show/' . $post->id }}">
                                        {{ $post->title }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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

@section('script')
    <script src="{{ URL . 'scripts/dataTables/jquery.dataTables.min.js' }}"></script>
    <script>
        $(function () {
            $("#table-popular").DataTable({
                dom: 'tp',
                columns: [{title: ''}, {title: ''}],
                pageLength: 5,
                language: {
                    paginate: {
                        next: "<span class='ion-chevron-right'></span>",
                        previous: "<span class='ion-chevron-left'></span>"
                    }
                }
            });
        })
    </script>
@endsection