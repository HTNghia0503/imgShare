@extends('layout.home.home_layout')
@section('content')
    <main class="img-wrapper">
        @foreach($posts as $post)
        <div class="img-item">
            <a href="{{ route('detailPost', ['postId' => $post->id]) }}">
                <img src="{{ asset('img/home-img/' . $post->img_path) }}" alt="image">
            </a>
        </div>
        @endforeach
        <div class="img-item"></div>
    </main>
@stop
