@extends('admin.layout.main')


@section('admin_content')


<!-- Start Content-->
<div class="container-fluid">

  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <div class="page-title-right">
          <form class="d-flex">
            <div class="input-group">
              <input type="text" class="form-control form-control-light" id="dash-daterange">
              <span class="input-group-text bg-primary border-primary text-white">
                <i class="mdi mdi-calendar-range font-13"></i>
              </span>
            </div>
            <a href="javascript: void(0);" class="btn btn-primary ms-2">
              <i class="mdi mdi-autorenew"></i>
            </a>
            <a href="javascript: void(0);" class="btn btn-primary ms-1">
              <i class="mdi mdi-filter-variant"></i>
            </a>
          </form>
        </div>
        <h4 class="page-title">Contact Message</h4>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-header">
      @if(session('message'))
      <div class="alert alert-success" role="alert">
        <strong>{{session('message')}}</strong>
      </div>
      @endif
    </div>
    <div class="row">
    </div>

    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>


            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
            
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $datas)
          <tr>
            <td>{{$datas->id}}</td>
            <td>{{$datas->name}}</td>
            <td>{{$datas->email}}</td>
            <td>{{$datas->message}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <!-- end page title -->



</div>
<!-- container -->


@stop