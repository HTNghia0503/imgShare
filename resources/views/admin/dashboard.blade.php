@extends('layout.dashboard_layout')
@section('content')
    <div class="main-content-inner">
        <div class="row">
            <!-- Data Table - Start -->
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Danh sách tài khoản</h4>
                        <div class="data-tables">
                            <table id="dataTable" class="text-center">
                                <thead class="bg-light text-capitalize">
                                    <tr>
                                        <th class="column-name">ID</th>
                                        <th class="column-name">Name</th>
                                        <th class="column-name">Email</th>
                                        <th class="column-name">Permission</th>
                                        <th class="column-name">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users ?? [] as $item)
                                        <tr>
                                            <td class="column-content">{{ $item->id }}</td>
                                            <td class="column-content">{{ $item->name }}</td>
                                            <td class="column-content">{{ $item->email }}</td>
                                            <td class="column-content">
                                                @if($item->permission == 0)
                                                    User
                                                @elseif($item->permission == 1)
                                                    Admin
                                                @endif
                                            </td>
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
                                    {{-- <tr>
                                        <td>1</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Chief Executive Officer (CEO)</td>
                                        <td>London</td>
                                        <td>47</td>
                                        <td>2009/10/09</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td>66</td>
                                        <td>2009/01/12</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>41</td>
                                        <td>2012/10/13</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Software Engineer</td>
                                        <td>San Francisco</td>
                                        <td>28</td>
                                        <td>2011/06/07</td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Pre-Sales Support</td>
                                        <td>New York</td>
                                        <td>29</td>
                                        <td>2011/12/12</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Software Engineer</td>
                                        <td>Edinburgh</td>
                                        <td>21</td>
                                        <td>2012/03/29</td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td>41</td>
                                        <td>2012/10/13</td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>Software Engineer</td>
                                        <td>San Francisco</td>
                                        <td>28</td>
                                        <td>2011/06/07</td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>Pre-Sales Support</td>
                                        <td>New York</td>
                                        <td>29</td>
                                        <td>2011/12/12</td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>Software Engineer</td>
                                        <td>Edinburgh</td>
                                        <td>21</td>
                                        <td>2012/03/29</td>
                                    </tr> --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Table - End -->
        </div>
    </div>
@stop
