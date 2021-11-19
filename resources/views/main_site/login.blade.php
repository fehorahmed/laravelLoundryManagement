@extends('main_site.layout.main')

@section('main_content')

<!--START LOGIN -->

<section class="vh-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 text-black">



                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                    <form action="{{route('userLogin.auth')}}" method="post" style="width: 23rem;">
                        @csrf
                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>

                        <div class="form-outline mb-4">
                            <input name='email' value="{{old('email')}}" type="email" id="email" class="form-control form-control-lg" />
                            <label class="form-label" for="email">Email address</label>
                            @error('email')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="form-outline mb-4">
                            <input name='password' type="password" id="password" class="form-control form-control-lg" />
                            <label class="form-label" for="password">Password</label>
                            @error('password')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror
                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                        </div>


                        @if(session('message'))
                        <div class='row justify-content-center'>
                            <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                                role="alert">
                                <button type="button" class="btn-close text-white" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                {{session('message')}}
                            </div>
                        </div>
                        @endif

                        <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                        <p>Don't have an account? <a href="{{route('userRegister.index')}}" class="link-info">Register
                                here</a></p>

                    </form>

                </div>

            </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="{{asset('font_assets/resources/img/login.jpg')}}" alt="Login image" class="w-100 vh-100"
                    style="object-fit: cover; object-position: left;">
            </div>
        </div>
    </div>
</section>

<!--END LOGIN-->
@stop