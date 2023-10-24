@extends('layout.profile.profile')
@section('content')
    <main class="profile-container">
        <div class="profile-info">
            <div class="profile-info-content">
                <div class="profile-username">{{ $collection->title }}</div>
                <div class="collection-created-at"><b>Ngày khởi tạo: </b>{{ $collection->created_at }}</div>
                <div class="quantity-post-contain"><b>Số ảnh hiện có: </b>{{ $collection->post->count() }}</div>
            </div>
            <div class="d-flex btn-action-collection-gr" style="justify-content: center;">
                <div class="btn-update-collection">
                    <a href="#" id="updateCollectionLink">Chỉnh sửa bộ sưu tập</a>
                </div>
                <div class="btn-delete-collection">
                    <a href="#" class="delete-collection" data-id="{{ $collection->id }}">Xóa bộ sưu tập</a>
                </div>
            </div>
        </div>

        <div class="post-in-colection">
            <div class="d-flex manage-post-coll">
                @foreach ($posts_in as $item)
                    @foreach ($posts as $post)
                        @if ($post->id === $item->post_id)
                            <div class="post-saved">
                                <a class="post-link" href="{{ route('detailPost', ['postId' => $post->id]) }}">
                                    <div class="post-saved-img">
                                        <img src="{{ asset('img/home-img/' . $post->img_path) }}" alt="image" width="335px" height="210px" style="border-radius: 16px; object-fit: cover;">
                                    </div>
                                    <div class="post-saved-title">{{ $post->title }}</div>
                                </a>
                            </div>
                        @endif
                    @endforeach
                @endforeach
                <div class="collection-item-last"></div>
            </div>
        </div>
    </main>

    {{-- Modal chỉnh sửa collection --}}
    <div class="modal fade" id="updateCollectionModal" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-form" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-collection">
                    <div>
                        <h5 class="modal-title modal-title-collection" id="updateCollectionModalLabel">Chỉnh sửa bộ sưu tập</h5>
                    </div>
                    <!-- Form bộ sưu tập - Start -->
                    <form id="updateCollectionForm" method="POST" action="{{ route('updateCollection', ['id' => $collection->id]) }}">
                        @csrf
                        <div class="mb-2">
                            <label for="collection_name" class="form-label form-label-format">Tên bộ sưu tập</label>
                            <input type="text" name="title" class="form-control form-control-format" id="collection_name" required>
                        </div>
                        @error('title')
                            <small id="" class="form-text text-danger">{{ $errors->first('title') }}</small>
                        @enderror
                        <p class="collection-note">Bạn nên đặt tên bộ sưu tập là cụm từ đại diện dễ nhớ, dễ hiểu nhé !</p>
                        <button type="submit" id="updateCollectionBtn" class="btn btn-primary btn-submit-login btn-collection"><b>Lưu thay đổi</b></button>
                    </form>
                    <!-- Form bộ sưu tập - End -->
                </div>
            </div>
        </div>
    </div>
    {{-- Modal end --}}

    {{-- Modal xác nhận Xóa --}}
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-content-delete">
                <div class="modal-header modal-header-delete">
                    <h5 class="modal-title modal-title-delete" id="updateCollectionModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close btn-close-form" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-collection modal-body-delete-coll">
                    <div class="warning-text">
                        Bạn có chắc chắn muốn xóa bộ sưu tập này?
                    </div>
                <div class="modal-footer">
                    <a href="{{ route('detailCollection', ['collectionId' => $collection->id]) }}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
                    </a>
                    <a href="{{ route('deleteCollection', ['id' => $collection->id]) }}">
                        <button type="button" class="btn btn-danger" id="confirmDeleteButton">Xóa</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- Modal end --}}
    <script>
        $(document).ready(function () {
            $('.delete-collection').click(function (e) {
                e.preventDefault();
                $('#confirmDeleteModal').modal('show');
            });
        });
    </script>

@stop
