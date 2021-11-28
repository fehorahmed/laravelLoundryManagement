@extends('main_site.layout.main')

@section('main_content')

<div class='row pt-5 pb-5'>


    <div class="col-sm-5">
        @if(session('message'))


        <div class="alert alert-info bg-info text-white border-0" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
        @endif
        <h3>My Profile</h3>
        <table class="table table-striped">

            <tr>
                <td>
                    Name:
                </td>
                <td>
                    {{session()->get('user_name')}}
                </td>
            </tr>

            <tr>
                <td>
                    Email:
                </td>
                <td>
                    {{session()->get('user_email')}}
                </td>
            </tr>

            <tr>
                <td>
                    Phone:
                </td>
                <td>
                    {{session()->get('user_phone')}}
                </td>
            </tr>

            <tr>
                <td>
                    Address:
                </td>
                <td>
                    {{session()->get('user_address')}}
                </td>
            </tr>


        </table>

        
        <a class="btn btn-primary" href="{{route('user.edit')}}">Edit</a>
    </div>

</div>

@stop