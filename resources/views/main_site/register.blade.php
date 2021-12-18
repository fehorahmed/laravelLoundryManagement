@extends('main_site.layout.main')
@section('active','active')
@section('main_content')
<div class="pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-gl-6 col-sm-12 col-12 text-black">

                <h2 class="fw-bold pt-10">Registration Form</h2>

                    <form action="{{route('userRegister.store')}}" method="post">
                        @csrf

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
                            <input type="email" name="email" id="email" class="form-control form-control-lg" value="{{old('email')}}" />
                            @error('email')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label" for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control form-control-lg" value="{{old('phone')}}" />
                            @error('phone')
                            <div>
                                <span class='text-danger'>{{$message}}</span>
                            </div>
                            @enderror

                        </div>

                        <div class="form-outline mb-4">
                            <label for="district" class="form-label">District </label>
                            <select name="districtid" class="form-select form-select-lg selectpicker countrypicker" id="districtid">
                                <option value="">Select One <span class="caret"></span></option>

                                @foreach ($district as $districts)
                                <option value="{{$districts->id}}">{{$districts->name}}</option>
                                @endforeach

                            </select>
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
@stop
