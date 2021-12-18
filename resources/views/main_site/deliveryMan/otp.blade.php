@extends('main_site.layout.main')

@section('main_content')

    <!--START Contant -->

    <div class="otp p-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <h2>Input OTP</h2> <a class="btn btn-primary float-end" href="{{route('deliveryman.home')}}">Back</a><br>
                    @if (session()->has('message'))
                        <h4 class="alert alert-danger">{{session('message')}}</h4>
                    @endif

                    <form action="{{route('deliveryman.otpprocess')}}" method="POST">
                        @csrf
                        <label for="otp">OTP</label>
                        <input type="text" class="form-control" value="{{old('otp')}}" name="otp" id="otp">
                        @error('otp')
                        <div>
                            <span class='bg-warning text-dark'>{{$message}}</span>
                        </div>
                        @enderror
                        <br>
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <input type="submit" class="btn btn-primary btn-lg" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--END Contant-->
@stop
