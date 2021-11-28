@extends('main_site.layout.main')

@section('main_content')
<section class="vh-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header">Your Orders</h3>
                    <div class="card-body">
                      
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
                                    <button class="btn btn-primary">Processing</button>
                                        @else
                                        <button class="btn btn-primary">Test</button>
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

    </div>
</section>
@stop

@section('script')



@endsection