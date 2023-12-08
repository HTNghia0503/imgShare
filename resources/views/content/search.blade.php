@extends('layout.home.home_layout')
@section('content')
    <div class="search-results">
        @if(count($posts) > 0)
            <main class="img-wrapper">
                @foreach($posts as $post)
                <div class="img-item" id="img">
                    <a href="{{ route('detailPost', ['postId' => $post->id]) }}">
                        <img src="{{ asset('img/home-img/' . $post->img_path) }}" alt="image">
                    </a>
                </div>
                @endforeach
                <div class="img-item"></div>
            </main>
        @else
            <p>Không có kết quả nào phù hợp.</p>
        @endif
    </div>
@stop
