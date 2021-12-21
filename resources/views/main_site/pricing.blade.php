@extends('main_site.layout.main')
@section('active','active')
@section('main_content')

<!--START Gallary-->

<div class="container mt-4">
    <div class="row">
       <div class="col-md-12">
         <h2 class="fw-bold text-center">Product Pricing is here.</h2>
       </div>
       <div class="col-md-12">
       <table class="table table-striped m-4">
         <thead>
           <tr>
             <th>Name</th>
             <th>Price</th>
           </tr>
         </thead>
         <tbody>
           @foreach($product as $products)
           <tr>
             <td>{{$products->name}}</td>
             <td>{{$products->price}}</td>
           </tr>
           @endforeach
         </tbody>
       </table>
      </div>

 </div>



<!--START Gallary-->
@stop







