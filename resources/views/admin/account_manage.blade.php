@extends('layout.dashboard.account_manage')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Account List</h4>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="text-capitalize" style="background-color: var(--main-primary-color) !important; color: #fff;">
                                    <tr>
                                        <th class="column-name">ID</th>
                                        <th class="column-name">Name</th>
                                        <th class="column-name">Email</th>
                                        <th class="column-name">Avatar</th>
                                        <th class="column-name">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users ?? [] as $item)
                                        @if($item->permission == 0)
                                            <tr>
                                                <td class="column-content">{{ $item->id }}</td>
                                                <td class="column-content">{{ $item->name }}</td>
                                                <td class="column-content">{{ $item->email }}</td>
                                                <td class="column-content">
                                                    <img src="{{ asset('img/avt-user/' . $item->avatar) }}" alt="Avatar" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                                </td>
                                                <td class="column-content">
                                                    <ul class="d-flex justify-content-center">
                                                        {{-- <li class="mr-2"><a href=""
                                                                class="text-primary"><i class="fa fa-edit"></i></a></li> --}}
                                                        <li><a href="{{ route('deleteAccount', $item->id) }}"
                                                                class="text-danger"><i class="ti-trash"></i></a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        @endif
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
