@extends('admin.layout.main')


@section('admin_content')


    <!-- Start Content-->
    <div class="container">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                <i class="mdi mdi-filter-variant"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">District</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('message'))
                        <div class="card-header">

                            <div class="alert alert-success" role="alert">
                                <strong>{{ session('message') }}</strong>
                            </div>

                        </div>
                    @endif
                    <div class="row">

                            <div class="d-sm-block d-md-none d-block ">
                                <a class="d-grid" href="{{ route('admin.manage.district') }}"><button class="btn btn-info btn-block">Add
                                        District</button></a>
                            </div>

                        <div class="col-12 col-md-9 col-sm-12">
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $datas)
                                            <tr>
                                                <th scope="row">{{ $datas->id }}</th>
                                                <td>{{ $datas->name }}</td>
                                                <td>{{ $datas->status }}</td>
                                                <td><a href="{{ route('admin.manage.district.edit', ['id' => $datas->id]) }}"
                                                        class="btn btn-primary">Edit</a>
                                                    <a onclick="return confirm('Are You sure to Delete?')"
                                                        href="{{ route('admin.manage.district.delete', ['id' => $datas->id]) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3 d-sm-none d-md-block d-none d-sm-block mt-5">
                            <a  href="{{ route('admin.manage.district') }}"><button class="btn btn-info">Add
                                    District</button></a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <!-- end page title -->



    </div>
    <!-- container -->


@stop
