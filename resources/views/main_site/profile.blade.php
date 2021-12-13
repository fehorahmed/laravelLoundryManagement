@extends('main_site.layout.main')
@section('active','active')
@section('main_content')

<div class="profile">
    <div class="container">
        <div class="row">


            <div class="col-md-8 col-sm-8 col-12 ">
                @if(session('message'))


                <div class="alert alert-info bg-info text-white border-0" role="alert">
                    <strong>{{session('message')}}</strong>
                </div>
                @endif
                <h2 class="fw-bold text-decoration-underline">My Profile</h2>
                <table class="table table-striped">

                    <tr>
                        <th>
                            Name:
                        </th>
                        <td>
                            {{session()->get('user_name')}}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Email:
                        </th>
                        <td>
                            {{session()->get('user_email')}}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Phone:
                        </th>
                        <td>
                            {{session()->get('user_phone')}}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Address:
                        </th>
                        <td>
                            {{session()->get('user_address')}}
                        </td>
                    </tr>


                </table>


                <a class="btn btn-primary btn-lg" href="{{route('user.edit')}}">Edit</a>
            </div>

        </div>
        </div>
</div>

@stop
