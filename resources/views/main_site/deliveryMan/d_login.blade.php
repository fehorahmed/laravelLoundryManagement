@extends('main_site.layout.main')

@section('main_content')

<!--START LOGIN -->

<section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p>

                                @if(session()->has('message'))

                                <div>
                                    <span class='bg-warning text-dark'>{{session('message')}}</span>
                                </div>

                                @endif

                                <form action="{{route('deliveryman.login')}}" method="POST">
                                    @csrf


                                    @error('email')
                                    <div>
                                        <span class='bg-warning text-dark'>{{$message}}</span>
                                    </div>
                                    @enderror
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" value="{{old('email')}}" id="typeEmailX" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>


                                    @error('password')
                                    <div>
                                        <span class='bg-warning text-dark'>{{$message}}</span>
                                    </div>
                                    @enderror
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="password" id="typePasswordX" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Password</label>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>
                                </form>
                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!--END LOGIN-->
@stop