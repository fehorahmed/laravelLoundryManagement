@extends('main_site.layout.main')

@section('main_content')
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-black">



                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <form action="{{ route('useredit.process') }}" method="post" style="width: 200rem;" mb-3>
                            @csrf

                            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Update Form</h3>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ $data->name }}"
                                    class="form-control form-control-lg" />
                                @error('name')
                                    <div>
                                        <span class='text-danger'>{{ $message }}</span>
                                    </div>
                                @enderror

                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" readonly name="email" id="email" class="form-control form-control-lg"
                                    value="{{ $data->email }}" />
                                <div>
                                    <span class='text-danger'>Email is not editable.</span>
                                </div>

                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="phone">Phone</label>
                                <input type="text" readonly name="phone" id="phone" class="form-control form-control-lg"
                                    value="{{ $data->phone }}" />

                                <div>
                                    <span class='text-danger'>Phone number is not editable.</span>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <label for="district" class="form-label">District </label>
                                <select name="districtid" class="form-select form-select-lg selectpicker countrypicker"
                                    id="district">
                                    <option value="">Select One <span class="caret"></span></option>

                                    @foreach ($district as $districts)
                                        @if ($data->district_id == $districts->id)
                                            <option selected value="{{ $districts->id }}">{{ $districts->name }}
                                            </option>
                                        @endif
                                        <option value="{{ $districts->id }}">{{ $districts->name }}</option>
                                    @endforeach
                                </select>
                                @error('districtid')
                                <div>
                                    <span class='alert alert-danger'>{{ $message }}</span>
                                </div>
                            @enderror
                            </div>

                            <div class="form-outline mb-4">
                                <label class="form-label" for="address">Address</label>
                                <textarea class="form-control form-control-lg" name="address" id="address" cols="30"
                                    rows="5">{{ $data->address }}</textarea>
                                @error('address')
                                    <div>
                                        <span class='text-danger'>{{ $message }}</span>
                                    </div>
                                @enderror

                            </div>




                            <div class="pt-1 mb-4">
                                <button class="btn btn-info btn-lg btn-block" type="submit">Update</button>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </section>
@stop
