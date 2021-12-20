@extends('main_site.layout.main')
@section('active', 'active')
@section('main_content')

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="container py-4">
                @if (session('message'))
                    <p class="alert alert-success">{{ session('message') }}</p>
                @endif
                <!-- Bootstrap 5 starter form -->
                <form id="contactForm" action="{{ route('contact.messageStore') }}" method="post">
                    @csrf
                    <!-- Name input -->
                    <div class="mb-3">
                        <label class="form-label" for="name">Name</label>
                        <input class="form-control" name="name" id="name" value="{{old('name')}}" type="text" placeholder="Name"
                            data-sb-validations="required" />

                        @error('name')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror

                    </div>

                    <!-- Email address input -->
                    <div class="mb-3">
                        <label class="form-label" for="email">Email Address</label>
                        <input class="form-control" id="email" type="email" value="{{old('email')}}" name="email" placeholder="Email Address"
                            data-sb-validations="required, email" />
                        @error('email')
                            <p class="alert alert-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Message input -->
                    <div class="mb-3">
                        <label class="form-label" for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" type="text" placeholder="Message"
                            style="height: 10rem;" data-sb-validations="required">{{old('name')}}</textarea>

                    </div>

                    @error('message')
                        <p class="alert alert-danger">{{ $message }}</p>
                    @enderror

                    

                    <!-- Form submit button -->
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
@stop
