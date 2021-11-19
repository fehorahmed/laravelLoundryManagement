@extends('main_site.layout.main')

@section('main_content')
<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">



                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form action="{{route('userRegister.store')}}" method="post" style="width: 200rem;" mb-3>
                        @csrf

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Registration Form</h3>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{old('name')}}"
                                class="form-control form-control-lg" />
                            @error('name')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg" />
                            @error('email')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control form-control-lg" />
                            @error('phone')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="address">Address</label>
                            <textarea class="form-control form-control-lg" name="address" id="address" cols="30"
                                rows="5"></textarea>
                            @error('address')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" />
                            @error('password')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>
                        <div class="form-outline mb-4">
                            <label class="form-label" for="confirm_password">Confirm Password</label>
                            <input type="password" name='confirm_password' id="confirm_password"
                                class="form-control form-control-lg" />
                                @error('confirm_password')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="submit">Sign Up</button>
                        </div>

                        <p>Already a user? <a href="{{route('userLogin.index')}}" class="link-info">LogIn here</a></p>

                    </form>

                </div>

            </div>

        </div>
    </div>
</section>
@stop