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