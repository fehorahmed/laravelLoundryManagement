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
                <h4 class="page-title">Service Product</h4>
            </div>
        </div>
    </div>

    <div class="card">
        <h5 class="card-header">Add Service Product</h5>
        <div class="row">
            <div class="col-3 offset-9 ">
                <a href="{{ route('admin.serviceproduct') }}"><button class="btn btn-primary">Back</button></a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route('admin.manage.serviceproduct.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" class="form-control" value="{{old('name')}}" name="name">
                        </div>
                        @error('name')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror
                     
                      

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" id="price" value="{{old('price')}}" class="form-control" name="price">
                        </div>
                        @error('price')
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

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>



        </div>
        <!-- end page title -->



    </div>
    <!-- container -->


    @stop