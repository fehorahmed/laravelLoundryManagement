@extends('admin.layout.main')


@section('admin_content')


<!-- Start Content-->
<div class="container-fluid">

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
                <h4 class="page-title">Delivery Man</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="row">
            <div class="col-3 offset-9 ">
                <a href="{{ route('admin.deliveryman') }}"><button class="btn btn-primary">Back</button></a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route('admin.managedeliverymaneditprocess')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" class="form-control" value="" name="name">
                        </div>
                        @error('name')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" id="email" class="form-control" value="" name="email">

                        </div>
                        @error('email')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password">
                        </div>
                        @error('password')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" id="confirm_password" class="form-control" name="confirm_password">
                        </div>
                        @error('confirm_password')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="number" id="phone" value="{{old('phone')}}" class="form-control" name="phone">
                        </div>
                        @error('phone')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label for="nidnumber" class="form-label">NID Number</label>
                            <input type="number" id="nidnumber" value="{{old('nidnumber')}}" class="form-control" name="nidnumber">
                        </div>
                        @error('nidnumber')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" value="{{old('address')}}" name="address">
                        </div>
                        @error('address')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label for="Status" class="form-label">Status</label>
                            <input type="number" id="Status" value="{{old('status')}}" class="form-control" name="status">
                        </div>
                        @error('status')
                        <div>
                            <span class='text-danger'>Status must be 1 or 0 . "1 for active, 0 for inactive"</span>
                        </div>
                        @enderror

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>



        </div>
        <!-- end page title -->



    </div>
    <!-- container -->


    @stop