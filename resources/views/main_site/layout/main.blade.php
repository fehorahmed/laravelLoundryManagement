 @extends('main_site.layout.master')

 @section('main_layout')
 <!--START HEADER-->

 <header>
     <div class="container">
         <nav>
             <div class="row">
                 <div class="col-xl-3 col-lg-3 col-sm-12 ">
                     <div class="logo-class">
                         <a href="index.html">
                             <img src="{{asset('font_assets/resources/img/logo-1.jpg')}}" alt="Loundry Logo" class="logo">
                         </a>
                     </div>
                 </div>
                 <div class="col-xl-5 offset-xl-4 col-lg-5 offset-lg-4 col-md-7 offset-md-2 col-sm-12">
                     <ul class="top-nav">
                         <a href=""><i class="fas fa-comments"></i>
                             <li>send <br> feedback</li>
                         </a>
                         <a href=""><i class="fas fa-truck-pickup"></i>
                             <li>book a <br> pick up</li>
                         </a>
                         <a href=""><i class="fas fa-file-invoice"></i>
                             <li>online <br> payments</li>
                         </a>
                     </ul>
                 </div>
             </div>
         </nav>
     </div>

 </header>

 <div class="main-nav bg-primary">
     <div class="container">
         <div class="row">
             <nav class="navbar navbar-expand-lg navbar-light bg-primary border-2">
                 <div class="container-fluid">

                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                         data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                         aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarScroll">
                         <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll cus-ul"
                             style="--bs-scroll-height: 100px;">
                             <li class="nav-item">
                                 <a class="nav-link {{request()->routeIs('Home.index*') ? 'active' : '' }}" aria-current="page" href="{{route('Home.index')}}">Home</a>
                             </li>
                             <li class="nav-item ">
                                 <a class="nav-link" href="#">About us</a>
                             </li>

                             <li class="nav-item">
                                 <a class="nav-link" href="#">Laundry Services </a>
                             </li>

                             <li class="nav-item">
                                 <a class="nav-link" href="{{route('pricing.index')}}">Pricing</a>
                             </li>

                             <li class="nav-item">
                                 <a class="nav-link {{request()->routeIs('gallery.index*') ? 'active' : '' }}" href="{{route('gallery.index')}}">Gallery</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link {{request()->routeIs('contact.index*') ? 'active' : '' }}" href="{{route('contact.index')}}">Contact us</a>
                             </li>




                            @if(session()->has('delivery_login'))
                            <li class="nav-item">
                                 <a class="nav-link {{request()->routeIs('deliveryman.home*') ? 'active' : '' }}" href="{{route('deliveryman.home')}}">View Orders</a>
                             </li>
                            <li class="nav-item">
                                 <a class="nav-link" href="{{route('delivery.logout')}}">Log Out</a>
                             </li>
                            @else

                            <li class="nav-item">
                                 <a class="nav-link {{request()->routeIs('order.index*') ? 'active' : '' }}" href="{{route('order.index')}}">Place Order</a>
                             </li>

                            @if (session()->get('user_login')== true)
                            <li class="nav-item">
                                 <a class="nav-link {{request()->routeIs('view.order*') ? 'active' : '' }}" href="{{route('view.order')}}">View Order</a>
                             </li>
                            <li class="nav-item">
                                 <a class="nav-link {{request()->routeIs('user.profile*') ? 'active' : '' }}" href="{{route('user.profile')}}">Profile</a>
                             </li>

                             <li class="nav-item">
                                 <a class="nav-link" href="{{route('user.logout')}}">Log Out</a>
                             </li>
                             @else
                             <li class="nav-item">
                                 <a class="nav-link {{request()->routeIs('userLogin.index*') ? 'active' : '' }}" href="{{route('userLogin.index')}}">Log In</a>
                             </li>

                             <li class="nav-item">
                                 <a class="nav-link {{request()->routeIs('userRegister.index*') ? 'active' : '' }}" href="{{route('userRegister.index')}}">Sign Up</a>
                             </li>
                            @endif



                           @endif

                         </ul>
                         <form class="d-flex">
                             <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                             <button class="btn btn-outline-success" type="submit">Search</button>
                         </form>
                     </div>
                 </div>
             </nav>
         </div>
     </div>
 </div>


@yield('main_content')


 <!--START FOOTER-->
 <div class="footer">
     <div class="container">
         <div class="row">
             <div class="col-md-3 col-sm-6">
                 <h4>About Us</h4>
                 <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio ex, ipsa, distinctio voluptates
                     reiciendis numquam aspernatur dolorum modi debitis ullam cupiditate a ducimus amet, earum harum
                     architecto maiores. Eveniet, praesentium!</p>
                 <a href=""><i class="fas fa-phone-volume"></i></a>
                 <a href=""><i class="fab fa-linkedin-in"></i></a>
                 <a href=""><i class="fab fa-pinterest-p"></i></a>
                 <a href=""><i class="fab fa-instagram"></i></a>
                 <a href=""><i class="fab fa-facebook-f"></i></a>
                 <a href=""><i class="fab fa-twitter"></i></a>
             </div>
             <div class="col-md-3 col-sm-6">
                 <h4>Quick Links</h4>
                 <ul>
                     <li><a href="">Home</a></li>
                     <li><a href="">About us</a></li>
                     <li><a href="">Dry Cleaning</a></li>
                     <li><a href="">Laundry Service</a></li>
                     <li><a href="">Sanitizing Services</a></li>
                     <li><a href="{{route('adminlogin.index')}}">ADMIN LOGIN</a></li>
                     <li><a href="{{route('deliveryman.index')}}">DELIVERY MAN LOGIN</a></li>
                 </ul>
             </div>
             <div class="col-md-3 col-sm-6">
                 <h4>Services</h4>
                 <ul>
                     <li>Wash & Iron</li>
                     <li>Wash & Fold</li>
                     <li>Dryclean</li>
                     <li>Express Laundry</li>
                     <li>Sofa Dryclean</li>
                     <li>Car Dryclean</li>
                     <li>Carpet Dry Clean</li>
                 </ul>
             </div>
             <div class="col-md-3 col-sm-6">
                 <h4>Dry Cleaning Made Simple</h4>
                 <h3 class="f-h">Download the App</h4>
                     <img src="{{asset('font_assets/resources/img/play-store.png')}}" alt="Google Play Store">
                     <img src="{{asset('font_assets/resources/img/Apple-Store.png')}}" alt="Apple App Store">
             </div>
         </div>
     </div>
 </div>


 <div class="last-f text-white p-3">
     <div class="container">
         <div class="row">
             <div class="col-md-6 col-12">
                 <p> &copy; Copyright - 2021 fehorahmed.com.All rights reserved.</p>
             </div>
             <div class="col-md-4 col-md-offset-2 col-12">
                 <p>Designed by <strong>FEHOR AHMED</strong></p>
             </div>
         </div>
     </div>
 </div>

 <!--END FOOTER-->'

 @stop
