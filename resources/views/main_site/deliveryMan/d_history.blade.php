@extends('main_site.layout.main')

@section('main_content')

    <!--START Contant -->

    <div class="delivery_content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12 col-12">
                    <p class="btn btn-info btn-lg mt-1">Welcome {{ session('delivery_name') }}</p>
                    <a href="{{ route('deliveryman.home') }}">
                        <p class="btn btn-primary float-end mt-1">Back</p>
                    </a>

                    @if (session('message'))
                        <p class="alert alert-info">{{ session('message') }}</p>
                    @endif
                    <h1>Product Collect/Delivery History List</h1>
                    <table class="table table-striped">
                        <thead>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price for Single Product</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Recived</th>
                            <th>Delivered</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $datas)
                                @if ($datas->status >= 2)


                                    <tr>
                                        <td>{{ $datas->id }}</td>
                                        <td>{{ $datas->productname }}</td>
                                        <td>{{ $datas->quantity }}</td>
                                        <td>{{ $datas->price }}</td>
                                        @foreach ($customer as $customers)
                                            @if ($datas->customerid == $customers->id)
                                                <td>{{ $customers->name }}</td>
                                                <td>{{ $customers->address }}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            @if ($datas->deliverymanid == session('delivery_id'))
                                                YES
                                            @else
                                                NO
                                            @endif
                                        </td>
                                        <td>
                                            @if ($datas->seconddeliverymanid == session('delivery_id'))
                                                YES
                                            @elseif ($datas->seconddeliverymanid == null)

                                            @else
                                                NO
                                            @endif
                                        </td>
                                        @if ($datas->status == 2)
                                            <td>
                                                <p class="alert alert-primary">You Received the Order.</p>
                                            </td>
                                        @elseif($datas->status== 3)
                                            <td>
                                                <p class="alert alert-primary">On Shop</p>
                                            </td>
                                        @elseif($datas->status== 4)
                                            <td>
                                                <p class="alert alert-primary">On Delivery processing</p>
                                            </td>
                                        @elseif($datas->status== 10)
                                            <td>
                                                <p class="alert alert-primary">Delivery Success</p>
                                            </td>
                                        @else
                                            <td>
                                                <p class="alert alert-success">Error</p>
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
