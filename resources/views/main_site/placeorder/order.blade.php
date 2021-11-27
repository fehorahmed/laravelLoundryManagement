@extends('main_site.layout.main')

@section('main_content')
<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">



                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form action="" method="post" style="width: 200rem;" mb-3>
                        @csrf

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Place An Order</h3>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="productname">Product Name</label>
                            <input type="text" name="productname" id="productname" value="{{old('productname')}}"
                                class="form-control form-control-lg" />
                            @error('productname')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="quantity">Quantity</label>
                            <input type="number" name="email" id="quantity" class="form-control form-control-lg" value="{{old('quantity')}}" />
                            @error('quantity')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="phone">Total Price</label>
                            <input disabled type="number" name="totalprice" id="totalprice" class="form-control form-control-lg" value="{{old('totalprice')}}" />
                            

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="address">Address</label>
                            <textarea disabled class="form-control form-control-lg" name="address" id="address" cols="30"
                                rows="5"></textarea>
                            @error('address')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        
                        <div class="form-outline mb-4">
                            <a class="btn btn-secondary" href=""></a>
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="submit">Order</button>
                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>
</section>
@stop