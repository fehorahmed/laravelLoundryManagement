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
        <h4 class="page-title">Delivery Man</h4>
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
      <div class="col-8">

      </div>
      <div class="col-3 offset-1">
        <a href="{{route('admin.managedeliveryman')}}"><button class="btn btn-primary">Add Delivery Man</button></a>
      </div>
    </div>

    <div class="card-body">
      <table class="table table-striped" id="table">
        <thead>
          <tr>

            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>

      </table>
    </div>
  </div>
  <!-- end page title -->



</div>
<!-- container -->


@stop
@section('script')

<script type="text/javascript">
  $(function () {

    var table = $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.deliveryman.datatable') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},

            {data: 'email', name: 'email'},
            {data: 'phone', name: 'phone'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
</script>
@endsection
