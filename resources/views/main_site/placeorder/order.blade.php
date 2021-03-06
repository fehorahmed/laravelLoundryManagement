@extends('main_site.layout.main')

@section('main_content')
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 text-black">


                    <form action="{{ route('order.store') }}" method="post">
                        @csrf

                        <h2 class="fw-bold">Place An Order</h2>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="productid">Product Name</label>

                            <select class="form-select" name="productid" id="productid"
                                aria-label="Default select example">
                                <option value="">Open this select menu</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id . '+' . $product->price . '+' . $product->name }}">
                                        {{ $product->name }}</option>
                                @endforeach

                            </select>

                            @error('productid')
                                <div>
                                    <span class='text-danger'>{{ $message }}</span>
                                </div>
                            @enderror

                        </div>



                        <div class="form-outline mb-4">
                            <label class="form-label" for="quantity">Quantity</label>
                            <input type="number" name="quantity" id="quantity" class="form-control form-control-lg"
                                value="{{ old('quantity') }}" />
                            @error('quantity')
                                <div>
                                    <span class='text-danger'>{{ $message }}</span>
                                </div>
                            @enderror

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="price">Price (Single product)</label>
                            <input readonly type="text" name="price" id="price" class="form-control form-control-lg"
                                value="" />


                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="address">Address</label>
                            <textarea readonly class="form-control form-control-lg" name="address" id="address" cols="30"
                                rows="5">{{ session('user_address') }}</textarea>

                        </div>


                        <div class="form-outline mb-4">
                            <a class="btn btn-secondary" href="{{ route('user.profile') }}">Change Address</a>
                        </div>

                        <div class="pt-1 mb-4">
                            <button id="button" onclick="return confirm('Are You sure to confirm Order?')"
                                class="btn btn-info btn-lg btn-block" type="submit">Order</button>
                        </div>

                    </form>



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
