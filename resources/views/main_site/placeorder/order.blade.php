@extends('main_site.layout.main')

@section('main_content')
<section class="vh-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 text-black">



                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form action="{{route('order.store')}}" method="post" style="width: 200rem;" mb-3>
                        @csrf

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Place An Order</h3>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="productid">Product Name</label>

                            <select class="form-select" name="productid" id="productid" aria-label="Default select example">
                                <option value="">Open this select menu</option>
                                @foreach($products as $product)
                                <option value="{{$product->id.'+'.$product->price.'+'.$product->name}}">{{$product->name}}</option>
                                @endforeach

                            </select>

                            @error('productid')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        

                        <div class="form-outline mb-4">
                            <label class="form-label" for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control form-control-lg" value="{{old('quantity')}}" />
                            @error('quantity')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="price">Price (Single product)</label>
                            <input readonly type="text" name="price" id="price" class="form-control form-control-lg" value="" />


                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="address">Address</label>
                            <textarea readonly class="form-control form-control-lg" name="address" id="address" cols="30" rows="5">{{session('user_address')}}</textarea>

                        </div>


                        <div class="form-outline mb-4">
                            <a class="btn btn-secondary" href="{{route('user.profile')}}">Change Address</a>
                        </div>

                        <div class="pt-1 mb-4">
                            <button id="button" onclick="return confirm('Are You sure to confirm Order?')" class="btn btn-info btn-lg btn-block" type="submit">Order</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</section>
@stop

@section('script')

<script>
    $(document).ready(function() {


        $("#productid").change(function() {
            var selectedid = $(this).val();
            var arr = selectedid.split('+');
            // alert("You have selected the country - " + arr);
            $('#price').val(arr['1']);
        });
    });
</script>

@endsection