@extends('layout.profile.profile')
@section('content')
    <main class="profile-container">
        <div class="profile-info">
            <div class="profile-info-content">
                <div class="profile-username">{{ $collection->title }}</div>
                <div class="collection-created-at"><b>Ngày khởi tạo: </b>{{ $collection->created_at }}</div>
                <div class="quantity-post-contain"><b>Số ảnh hiện có: </b>{{ $collection->post->count() }}</div>
            </div>
        </div>

        <div class="post-in-colection">
            <div class="d-flex manage-post-coll">
                @foreach ($posts_in as $item)
                @php
                    dd($post->id);
                @endphp

                    <div class="post-saved">
                        <a href="">
                            <div class="post-saved-img">
                                <img src="{{ asset('img/home-img/' . $post->img_path) }}" alt="image" width="335px" height="210px" style="border-radius: 16px; object-fit: cover;">
                            </div>
                            <div class="post-saved-title">{{ $post->title }}</div>
                        </a>
                    </div>
                @endforeach
                <div class="collection-item-last"></div>
            </div>
        </div>
    </main>
@stop
