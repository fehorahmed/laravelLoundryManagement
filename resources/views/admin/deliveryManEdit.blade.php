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
        <h5 class="card-header">Edit Page</h5>
        <div class="row">
            <div class="col-3 offset-9 ">
                <a href="{{ route('admin.deliveryman') }}"><button class="btn btn-primary">Back</button></a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route('admin.deliveryman.editprocess')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" id="name" class="form-control" value="{{$data[0]->name}}" name="name">
                        </div>
                        @error('name')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" id="email" class="form-control" value="{{$data[0]->email}}" name="email">

                        </div>
                        @error('email')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" id="phone" value="{{$data[0]->phone}}" class="form-control" name="phone">
                        </div>
                        @error('phone')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label for="nidnumber" class="form-label">NID Number</label>
                            <input type="number" id="nidnumber" value="{{$data[0]->nidnumber}}" class="form-control" name="nidnumber">
                        </div>
                        @error('nidnumber')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror

                        <div class="mb-3">
                            <label for="districtid" class="form-label">District</label>
                            <select name="districtid" class="form-select form-select selectpicker countrypicker"
                                id="districtid">
                                <option value="">Select One <span class="caret"></span></option>

                                    @foreach ($district as $districts)
                                        @if ($data[0]->district_id == $districts->id)
                                            <option selected value="{{ $districts->id }}">{{ $districts->name }}
                                            </option>
                                        @endif
                                        <option value="{{ $districts->id }}">{{ $districts->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                        @error('districtid')
                            <div>
                                <span class='text-danger'>{{ $message }}</span>
                            </div>
                        @enderror


                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" value="{{$data[0]->address}}" name="address">
                        </div>
                        @error('address')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror
                        <div class="mb-3">
                            <label for="Status" class="form-label">Status</label>
                            <input type="number" id="Status" value="{{$data[0]->status}}" class="form-control" name="status">
                        </div>
                        @error('status')
                        <div>
                            <span class='text-danger'>Status must be 1 or 0 . "1 for active, 0 for inactive"</span>
                        </div>
                        @enderror

                        <input type="hidden" name="id" value="{{$data[0]->id}}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>



        </div>
        <!-- end page title -->



    </div>
    <!-- container -->


    @stop
