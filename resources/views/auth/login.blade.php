@extends('layouts.backendApp')

@section('content')
<style type="text/css">
    .verify_mes{

        color:#ce5258;
    }
</style>



<div class="nk-block nk-block-middle nk-auth-body wide-xs">
    @if(isset($_GET['verify']) == 1)
<div class="row">
<div class="col-md-12 text-center">
    <div class="alert alert-success alert-block">
    <!-- <button type="button" class="close" data-dismiss="alert">×</button>  -->
        <strong>Success, Your email is verified, Please login.</strong>
</div>
</div>
</div>
@endif
                       @include('backend.flash-message')
    <div class="card form-card">
        <div class="card-inner card-inner-lg p-0">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                    <h4 class="nk-block-title text-center text-uppercase">Login</h4>
                </div>
            </div>
           <form method="POST" action="{{ url('do-login') }}">
                        @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Email</label>
                    <div class="form-control-wrap">
                 

                        <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your name" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="form-control-wrap">
                        <a href="#" class="form-icon form-icon-right passcode-switch lg"
                        data-target="password">
        
                    </a>

                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your passcode">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>
            </div>                                    
            <div class="form-group">
                <button class="btn btn-lg theme-btn btn-block">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
        <div class="form-note-s2 text-center pt-4"> 

           @if (Route::has('password.request'))
           <a class="" href="{{ route('password.request') }}">
            {{ __('Forgot password') }}
        </a>
        @endif

        |
        <a href="{{ url('join-now') }}"><strong>Sign Up</strong></a>
    </div>
</div>
</div>
</div>
@endsection
