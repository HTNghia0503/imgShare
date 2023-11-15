@extends('layout.dashboard.topic_manage')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex header-content">
                            <h4 class="header-title">Update Topic</h4>
                        </div>
                        <form method="POST" action="{{ route('updateTopic', ['id' => $topic->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="topic-title" class="col-form-label input-label" style="font-size: 16px !important;">Title:</label>
                                        <input name="title" class="form-control" type="text" value="{{ old('title', $topic->title ?? '') }}" id="topic-title">
                                        @error('title')
                                            <small id="" class="form-text text-danger">{{ $errors->first('title') }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="topic-description" class="col-form-label input-label" style="font-size: 16px !important;">Description:</label>
                                        <textarea name="description" id="topic-description" class="form-control" style="width: 100%; resize: none;" rows="3">{{ old('description', $topic->description ?? '') }}</textarea>
                                        @error('description')
                                            <small id="" class="form-text text-danger">{{ $errors->first('description') }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex" style="float: right;">
                                <a href="{{ route('topic') }}" class="btn-modal-ctopic">
                                    <button type="button" class="btn btn-secondary mt-3"><span>Back</span></button>
                                </a>
                                <a href="#" class="btn-modal-ctopic-primary" style="margin-left: 16px;">
                                    <button type="submit" class="btn mt-3"><span>Update</span></button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
