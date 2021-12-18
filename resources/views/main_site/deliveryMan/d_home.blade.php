@extends('main_site.layout.main')

@section('main_content')

    <!--START Contant -->

    <div class="delivery_content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12 col-12">
                    <p class="btn btn-info btn-lg">Welcome {{ session('delivery_name') }}</p>

                    @if (session('message'))
                        <p class="alert alert-info">{{ session('message') }}</p>
                    @endif
                    <h1>Product Collect List</h1>
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price for Single Product</th>
                            <th>Customer Name</th>
                            <th>Customer Phone No</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $datas)
                                @if ($datas->status < 3)


                                    <tr>
                                        <td>{{ $datas->id }}</td>
                                        <td>{{ $datas->productname }}</td>
                                        <td>{{ $datas->quantity }}</td>
                                        <td>{{ $datas->price }}</td>
                                        @foreach ($customer as $customers)
                                            @if ($datas->customerid == $customers->id)
                                                <td>{{ $customers->name }}</td>
                                                <td>{{ $customers->phone }}</td>
                                                <td>{{ $customers->address }}</td>

                                            @endif
                                        @endforeach
                                        <td>
                                            @if ($datas->status < 3)
                                                <p>Request Received</p>
                                            @else
                                                <p>On Shop</p>
                                            @endif
                                        </td>
                                        @if ($datas->status == 1)
                                            <td>
                                                <a onclick="return confirm('Are You sure?')"
                                                    href="{{ route('recived_by_d', ['id' => $datas->id]) }}"><button
                                                        class="btn btn-primary">Received</button></a>
                                            </td>
                                        @elseif($datas->status== 2)
                                            <td>
                                                <p class="alert alert-primary">You Received the Order.</p>
                                            </td>
                                        @else
                                            <td>
                                                <p class="alert alert-success">Delivered to the shop.</p>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-sm-12 col-12">


                    <h1>Product Delivery List</h1>
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price for Single Product</th>
                            <th>Customer Name</th>
                            <th>Customer Phone No</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $datas)
                                @if ($datas->status > 3 && $datas->seconddeliverymanid == session('delivery_id'))
                                    <tr>
                                        <td>{{ $datas->id }}</td>
                                        <td>{{ $datas->productname }}</td>
                                        <td>{{ $datas->quantity }}</td>
                                        <td>{{ $datas->price }}</td>
                                        @foreach ($customer as $customers)
                                            @if ($datas->customerid == $customers->id)
                                                <td>{{ $customers->name }}</td>
                                                <td>{{ $customers->phone }}</td>
                                                <td>{{ $customers->address }}</td>

                                            @endif
                                        @endforeach
                                        <td>
                                            @if ($datas->status == 4)
                                                <p>On My Hand</p>
                                            @else

                                            @endif
                                        </td>
                                        @if ($datas->status == 4)
                                            <td>
                                                <a href="{{ route('deliveryman.otpview', ['id' => $datas->id]) }}"><button
                                                        class="btn btn-primary">Input OTP</button></a>
                                                {{-- {{ route('delivery.otp', ['id' => $datas->id]) }} --}}
                                            </td>
                                        @elseif ($datas->status == 10)
                                            <td>
                                                <p class="alert alert-success">Delivered </p>
                                            </td>
                                        @endif
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!--END Contant-->
@stop
