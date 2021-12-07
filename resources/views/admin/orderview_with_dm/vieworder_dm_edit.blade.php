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
        <h5 class="card-header">Edit Page</h5>
        <div class="row">
            <div class="col-3 offset-9 ">
                <a href="{{ route('admin.orderview_with_dm') }}"><button class="btn btn-primary">Back</button></a>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route('admin.edit.deliveryman.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="customerid" class="form-label">Customer Name</label>
                            <input type="text" readonly id="customerid" class="form-control" value="{{$customer[0]->name}}" name="customerid">
                        </div>
                        @error('customerid')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror

                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" readonly id="name" class="form-control" value="{{$data[0]->productname}}" name="name">
                        </div>
                        @error('name')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror

                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" readonly id="price" value="{{$data[0]->price}}" class="form-control" name="price">
                        </div>
                        @error('price')
                        <div>
                            <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror

                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="text" readonly id="quantity" class="form-control" value="{{$data[0]->quantity}}" name="quantity">
                        </div>
                        <div class="mb-3">
                            <label for="deliveryman" class="form-label">Add Delivery Man</label>
                            <select class="form-select" name="deliverymanid" id="deliverymanid">
                                @foreach($deliveryman as $deliverymans)
                                @if($data[0]->deliverymanid == $deliverymans->id)
                                <option selected value="{{$deliverymans->id}}">{{$deliverymans->name}}</option>
                                @else

                                <option value="{{$deliverymans->id}}">{{$deliverymans->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        @error('deliverymanid')
                        <div>
                        <span class='text-danger'>{{$message}}</span>
                        </div>
                        @enderror

                        <input type="hidden" readonly name="id" value="{{$data[0]->id}}">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>



        </div>
        <!-- end page title -->



    </div>
    <!-- container -->


    @stop