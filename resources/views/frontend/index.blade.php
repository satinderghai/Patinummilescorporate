<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Platinum</title>
    <!-- custom css link -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
    <!-- boostrap link -->
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <!-- font awewsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--======= header starts ======= -->
    <section class="platinum-header">
        <nav class="navbar navbar-expand-lg">
            <div class="container">

                <a class="navbar-brand" href="#"><img src="{{ asset('public/backend/images/logo.png') }}" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav ms-auto mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ url('page/what-we-do')}}">WHAT WE DO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('page/features')}}">FEATURES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('page/company')}}">COMPANY</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('page/contact')}}">CONTACT</a>
                        </li>
                    </ul>
                  
                    <div class="nav_btn d-flex">
                        @if(Auth::user())
                        <a class="btn btn_login" href="{{ url('admin') }}" role="button">MyAcount</a>&nbsp;&nbsp;
                        @else
                        
                        <a class="btn btn_login" href="{{ url('login') }}" role="button">Login</a>&nbsp;&nbsp;
                        <a class="btn btn-signup" href="{{ url('register') }}" role="button">Free Signup</a>
                        @endif 
                    </div>
                </div>
            </div>
        </nav>
    </section>
    <!--====== header ends =====-->
    <!-- === banner section -->
    <section class="header_banner">
        <div class="container">
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <div class="banner_content_right">
                        <h3>Workforce travel
                            that just works</h3>
                    </div>
                    <div class="banner_btn d-flex justify-content-center">
                        <a class="btn Free_Signup" href="{{ url('register') }}" role="button">Free Signup</a>&nbsp;&nbsp;
                        <a class="btn Hotel_Partners" href="#" role="button">Hotel Partners</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---====banner section end -->
    <!-- ====Travlers section start==== -->
    <section class="traveles">
        <div class="container">
            <div class="row">
                <div class="heading_traveler">
                    <h3 class="text-center">Trusted by 1.2 million travelers</h3>
                    <p class="text-center"> Leveraging unparalleled technology to provide a full-service travel
                        platform. From reservations<br>
                        to billing and reporting, we can help</p>
                </div>
                <div class="col-md-6">
                    <div class="img-box d-flex justify-content-end mt-5">
                        <p>Duty of Care Traveler Mapping</p>
                        <div class="img_boxx box all  d-flex justify-content-center">
                            <img src="{{ asset('public/frontend/img/location.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box d-flex justify-content-start mt-5">
                        <div class="img_boxx box all  d-flex justify-content-center">
                            <img src="{{ asset('public/frontend/img/building.png') }}" alt="">
                        </div>
                        <p>Duty of Care Traveler Mapping</p>
                    </div>
                </div>
            </div>
            <!-- row 2 -->
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box d-flex justify-content-end mt-3">
                        <p>Duty of Care Traveler Mapping</p>
                        <div class="img_boxx box all  d-flex justify-content-center">
                            <img src="{{ asset('public/frontend/img/tower.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box d-flex justify-content-start mt-3">
                        <div class="img_boxx box all  d-flex justify-content-center">
                            <img src="{{ asset('public/frontend/img/tab.png') }}" alt="">
                        </div>
                        <p>Duty of Care Traveler Mapping</p>
                    </div>
                </div>
            </div>
            <!-- row 3 -->
            <div class="row">
                <div class="col-md-6">
                    <div class="img-box d-flex justify-content-end mt-3">
                        <p>Duty of Care Traveler Mapping</p>
                        <div class="img_boxx box all  d-flex justify-content-center">
                            <img src="{{ asset('public/frontend/img/junction.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box d-flex justify-content-start mt-3">
                        <div class="img_boxx box all  d-flex justify-content-center">
                            <img src="{{ asset('public/frontend/img/notes.png') }}" alt="">
                        </div>
                        <p>Duty of Care Traveler Mapping</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====Travlers section end==== -->
    <!-- ===work for you ====-->
    <section class="work">
        <div class="container">
            <div class="row">
                <div class="work_banner">
                    <h3 class="text-center">Your travel investments should work for you</h3>
                </div>
                <div class="col-md-6">
                    <div class="mobile_content">
                        <h5>Book by Desktop, App, or Mobile</h5>
                        <p>User-friendly mobile and desktop apps make it easy to <br>reserve a room on the road.</p>
                    </div>
                    <div class="mobile_content mt-2">
                        <h5>Book by Desktop, App, or Mobile</h5>
                        <p>User-friendly mobile and desktop apps make it easy to <br>reserve a room on the road.</p>
                    </div>
                    <div class="mobile_content mt-2">
                        <h5>Book by Desktop, App, or Mobile</h5>
                        <p>User-friendly mobile and desktop apps make it easy to <br>reserve a room on the road.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('public/frontend/img/computers.png') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- why choose us -->
    <section class="choose_us">
        <div class="container">
            <div class="row">
                <div class="why_chose_us">
                    <h3 class="text-center">Why Choose platinum</h3>
                    <p class="text-center">We offer most competitive rates and offers for wonderful and beautiful
                        places.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 work_txt">
                    <div class="left_text_box text-center">
                      <div class="square">
                      <span class="cone_img"><img src="{{ asset('public/frontend/img/cone1.png') }}" alt=""></span>
                    </div>
                        <h5>Unique Destinations</h5>
                        <p>Looking for a unique vacation destination? Then maybe a trip to one of the 10 most unique
                            tourist destinations might.</p>
                    </div>
                </div>
                <div class="col-md-4 work_txt">
                    <div class="left_text_box content_box_leftt left_icon_box text-center">
                           <div class="square cups">
                      <span class="cone_img dolor_img cups_img"><img src="{{ asset('public/frontend/img/dolar-1.png') }}" alt=""></span>
                    </div>
                        <h5>Unique Destinations</h5>
                        <p>Looking for a unique vacation destination? Then maybe a trip to one of the 10 most unique
                            tourist destinations might.</p>
                    </div>
                </div>
                <div class="col-md-4  work_txt">
                    <div class="left_text_box loc_icon text-center">
                          <div class="square">
                      <span class="cone_img locc_img"><img src="{{ asset('public/frontend/img/locc.png') }}" alt=""></span>
                    </div>
                        <h5>Unique Destinations</h5>
                        <p>Looking for a unique vacation destination? Then maybe a trip to one of the 10 most unique
                            tourist destinations might.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 work_txt">
                      
                    <div class="left_text_box content_box_leftt notee_icon text-center">
                         <div class="square cups">
                      <span class="cone_img nott_img cups_img"><img src="{{ asset('public/frontend/img/nott-1.png') }}" alt=""></span>
                    </div>
                        <h5>Unique Destinations</h5>
                        <p>Looking for a unique vacation destination? Then maybe a trip to one of the 10 most unique
                            tourist destinations might.</p>
                    </div>
                </div>
                <div class="col-md-4  work_txt">
                    <div class="left_text_box logs_icon text-center">
                          <div class="square logss">
                      <span class="cone_img"><img src="{{ asset('public/frontend/img/logs.png') }}" alt=""></span>
                    </div>
                        <h5>Unique Destinations</h5>
                        <p>Looking for a unique vacation destination? Then maybe a trip to one of the 10 most unique
                            tourist destinations might.</p>
                    </div>
                </div>
                <div class="col-md-4 work_txt">
                    <div class="left_text_box content_box_leftt cup_icon text-center"> 
                        <div class="square cups">
                      <span class="cone_img cups_img"><img src="{{ asset('public/frontend/img/cups-1.png') }}" alt=""></span>
                    </div>
                        <h5>Unique Destinations</h5>
                        <p>Looking for a unique vacation destination? Then maybe a trip to one of the 10 most unique
                            tourist destinations might.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===footer -==== -->
    <section class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('public/frontend/img/footer_logo.png') }}" alt="">
                    <p class="text-light pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        <br>Curabitur ut
                        diam et nibh condimentum
                        venenatis eu <br>ac magnasin. Quisque interdum est mauris, eget ullamcorper.</p>
                 <div class="social_icons d-flex justify-content-space-between">
                    <span><a href="#"><i class="fa-brands fa-facebook-f"></i></a></span>
                    <span><a href="#"><i class="fa-brands fa-twitter"></i></a></span>
                    <span><a href="#"><i class="fa-brands fa-instagram"></i></a></span>
                    <span><a href="#"><i class="fa-brands fa-youtube"></i></a></span>
                 </div> 
                </div>
                <div class="col-md-2">
                    <h5 class="text-light pt-4">WHAT WE DO</h5>
                    <ul class="list-group">
                        <li class=""><a href="{{ url('page/features')}}">Features</a></li>
                        
                       
                       
                    </ul>
                </div>
                <div class="col-md-2">
                    <h5 class="text-light pt-4">About</h5>
                    <ul class="list-group">
                        <li class=""><a href="">News & Resources </a></li>
                        <li class=""><a href="{{ url('page/faqs')}}">FAQs</a></li>
                        
                     
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="text-light pt-4">Contact</h5>
                    <ul class="list-group">
                        <li class=""><a href="">support@domain.com</a></li>
                        <li class=""><a href="">Support: (000) 000-0000</a></li>
                        <li class=""><a href="">Become a Hotel Partner</a></li>
                       <li class=""><a href="">venenatis eu ac magnasin. </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ===copyright -->
    <div class="section copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-light">© Platinum. All Rights Reserved.</p>
                </div>
                <div class="col-md-6">
                    <p class="text-light">Privacy Policy Site Map CheckINN Card Terms & Conditions Cookies Settings</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!-- script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
    integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('public/frontend/js/bootstrap.min.js"></script>