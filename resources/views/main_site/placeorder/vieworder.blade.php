@extends('main_site.layout.main')

@section('main_content')
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="card-header">
                       <h2>Your Orders</h2>
                      </div>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total Price</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $datas)
                                <tr>
                                    <th>{{$datas->id}}</th>
                                    <th>{{$datas->productname}}</th>
                                    <th>{{$datas->price}}</th>
                                    <th>{{$datas->quantity}}</th>
                                    <th>{{$datas->quantity*$datas->price}}</th>
                                    <th>{{session('user_address')}}</th>
                                    <th>
                                        @if($datas->status==0)
                                        <button class="btn btn-primary">Processing. Please wait.</button>
                                        @elseif($datas->status==1)
                                        <button class="btn btn-primary">Delivery Man Assigned. <br> Please wait 30 minute.
                                            <br>Name:
                                            @foreach($deliveryman as $deliverymans)
                                            @if($deliverymans->id == $datas->deliverymanid)
                                            {{$deliverymans->name}}. Phone No. {{$deliverymans->phone}}

                                            @endif

                                            @endforeach
                                        </button>
                                        @elseif($datas->status==2)
                                        <p class="alert alert-secondary">Your Product is <br> on the way to shop.</p>
                                        @elseif($datas->status==3)
                                        <p class="alert alert-primary">Your Product is ready <br> for wash in the shop.</p>
                                        @elseif($datas->status==4)
                                        <button class="btn btn-primary">Delivery Man Assigned to your home <br> Please wait 30 minute.
                                            <br>Name:
                                            @foreach($deliveryman as $deliverymans)
                                            @if($deliverymans->id == $datas->seconddeliverymanid)
                                            {{$deliverymans->name}}. Phone No. {{$deliverymans->phone}} <br>
                                            Your OTP: {{$datas->otp}}

                                            @endif

                                            @endforeach
                                        </button>
                                        @elseif($datas->status==10)
                                        <p class="alert alert-info">You Recived your Product</p>
                                        @endif


                                    </th>

                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                </div>

            </div>
        </div>

    </div>
</section>
@stop

@section('script')



@endsection
