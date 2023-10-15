@extends('layout.dashboard.topic_manage')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Danh sách chủ đề</h4>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th class="column-name">ID</th>
                                        <th class="column-name">Title</th>
                                        <th class="column-name">Description</th>
                                        <th class="column-name">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($topics ?? [] as $item)
                                        <tr>
                                            <td class="column-content">{{ $item->id }}</td>
                                            <td class="column-content">{{ $item->title }}</td>
                                            <td class="column-content">{{ $item->description }}</td>
                                            <td class="column-content">
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-2"><a href=""
                                                            class="text-primary"><i class="fa fa-edit"></i></a></li>
                                                    <li><a href=""
                                                            class="text-danger"><i class="ti-trash"></i></a></li>
                                                </ul>
                                            </td>
                                            <td></td>
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
