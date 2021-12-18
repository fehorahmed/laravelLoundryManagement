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
                    <h4 class="page-title">Order View</h4>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('message') }}</strong>
                    </div>
                @endif
                @error('seconddeliverymanid')
                    <div>
                        <span class='text-danger'>{{ $message }}</span>
                    </div>
                @enderror
            </div>
            <div class="row">
            </div>

            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>


                            <th scope="col">ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Customer Phone</th>

                            <th scope="col">Delivery Man</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $datas)
                            <tr>
                                <th scope="row">{{ $datas->id }}</th>
                                <td>{{ $datas->productname }}</td>

                                <td>{{ $datas->quantity }}</td>
                                @foreach ($customer as $customers)
                                    @if ($datas->customerid == $customers->id)

                                        <td>{{ $customers->name }}</td>
                                        <td>{{ $customers->phone }}</td>
                                    @endif
                                @endforeach

                                @foreach ($deliveryman as $deliverymans)
                                    @if ($datas->status == 4)

                                        @if ($datas->seconddeliverymanid == $deliverymans->id)

                                            <td>{{ $deliverymans->name }}--{{ $deliverymans->id }}</td>
                                        @endif
                                    @elseif ($datas->deliverymanid == $deliverymans->id)

                                        <td>{{ $deliverymans->name }}--{{ $deliverymans->id }}</td>
                                    @endif

                                @endforeach

                                @if ($datas->status == 2)
                                    <td><a href="{{ route('admin.recived_product_from_dm', ['id' => $datas->id]) }}"
                                            class="btn btn-primary">Reciving Product from Delivery Man</a></td>
                                @elseif($datas->status==3)
                                    <td>
                                        <p class="alert alert-primary">Product Recived. <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#myModal_{{ $key }}">
                                            Assign Delivery Man
                                        </button></p>


                                        <div class="modal" id="myModal_{{ $key }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Assign Delivery Man</h4>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <form action="{{ route('admin.assign_second_delivery_man') }}"
                                                        method="post">
                                                        @csrf
                                                        <!-- Modal body -->
                                                        <div class="modal-body">

                                                            <label for="" class="form-label">Delivery Man</label>
                                                            <select name="seconddeliverymanid" class="form-select"
                                                                id="seconddeliverymanid">
                                                                <option value="">Select one</option>
                                                                @foreach ($deliveryman as $deliverymans)
                                                                    <option value="{{ $deliverymans->id }}">
                                                                        {{ $deliverymans->name }}</option>
                                                                @endforeach

                                                            </select>

                                                            @error('seconddeliverymanid')
                                                                <div>
                                                                    <span class='text-danger'>{{ $message }}</span>
                                                                </div>
                                                            @enderror

                                                            <input type="hidden" name="id" value="{{ $datas->id }}">

                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-primary" value="Submit">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                @elseif($datas->status==4)
                                <td>
                                    Man Assigned for Delivery
                                </td>
                                    {{-- <td>
                                        Assigned Delivery <button type="button" class="btn btn-primary"
                                            data-bs-toggle="modal" data-bs-target="#myModal_{{ $key }}">
                                            Edit Delivery Man
                                        </button>


                                        <div class="modal" id="myModal_{{ $key }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Assign Delivery Man {{ $datas->id }}
                                                        </h4>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal"></button>
                                                    </div>

                                                    <form action="{{ route('admin.assign_second_delivery_man') }}"
                                                        method="post">
                                                        @csrf
                                                        <!-- Modal body -->
                                                        <div class="modal-body">

                                                            <label for="" class="form-label">Delivery Man</label>
                                                            <select name="seconddeliverymanid" class="form-select"
                                                                id="seconddeliverymanid">
                                                                <option value="">Select one</option>
                                                                @foreach ($deliveryman as $deliverymans)
                                                                    <option value="{{ $deliverymans->id }}">
                                                                        {{ $deliverymans->name }}</option>
                                                                @endforeach

                                                            </select>

                                                            @error('seconddeliverymanid')
                                                                <div>
                                                                    <span class='text-danger'>{{ $message }}</span>
                                                                </div>
                                                            @enderror

                                                            <input type="hidden" name="id" value="{{ $datas->id }}">

                                                        </div>

                                                        <!-- Modal footer -->
                                                        <div class="modal-footer">
                                                            <input type="submit" class="btn btn-primary" value="Submit">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td> --}}
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

            <!-- The Modal -->

        </div>
        <!-- end page title -->



    </div>
    <!-- container -->


@stop
