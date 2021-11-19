@extends('main_site.layout.main')

@section('main_content')

<div class='row pt-5 pb-5'>
    <div class="col-sm-5">
        <h3>My Profile</h3>
        <table class="table table-striped">

            <tr>
                <td>
                    Name:
                </td>
                <td>
                    {{session()->get('Admin_name')}}
                </td>
            </tr>

            <tr>
                <td>
                    Email:
                </td>
                <td>
                {{session()->get('Admin_email')}}
                </td>
            </tr>

            <tr>
                <td>
                    Phone:
                </td>
                <td>
                {{session()->get('Admin_phone')}}
                </td>
            </tr>

            <tr>
                <td>
                    Address:
                </td>
                <td>
                {{session()->get('Admin_address')}}
                </td>
            </tr>


        </table>

        <button class='btn btn-md btn-primary'> Edit </button>
    </div>

</div>

@stop