@extends('layout.dashboard.post_manage')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Post List</h4>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="text-capitalize" style="background-color: var(--main-primary-color) !important; color: #fff;">
                                    <tr>
                                        <th class="column-name">ID</th>
                                        <th class="column-name">Title</th>
                                        <th class="column-name">Description</th>
                                        <th class="column-name">Uploader</th>
                                        <th class="column-name">Like</th>
                                        <th class="column-name">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts ?? [] as $item)
                                        <tr>
                                            <td class="column-content">{{ $item->id }}</td>
                                            <td class="column-content">{{ $item->title }}</td>
                                            {{-- <td class="column-content column-des truncate">{{ $item->description }}</td> --}}
                                            <td class="column-content column-des truncate" data-toggle="tooltip" data-placement="top" title="{{ $item->description }}">{{ $item->description }}</td>
                                            <td class="column-content">{{ $item->user->name }}</td>
                                            <td class="column-name">{{ $item->likequantity }}</td>
                                            <td class="column-content">
                                                <ul class="d-flex justify-content-center">
                                                    <li><a href="{{ route('deletePostUser', $item->id) }}"
                                                            class="text-danger"><i class="ti-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
