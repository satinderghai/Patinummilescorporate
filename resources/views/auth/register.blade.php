@extends('layouts.backendApp')
@section('content')
<div class="nk-block nk-block-middle nk-auth-body wide-xs">
    <div class="card form-card">
        <div class="card-inner card-inner-lg p-0">
            <div class="nk-block-head">
                <div class="nk-block-head-content">
                       <h4 class="nk-block-title text-center text-uppercase">Company Register</h4>
                </div>
            </div>
            <!-- //handleCompanyRegisterAjax -->
            <div class="msg-bar"></div>
            <form method="POST" id="handleCompanyRegisterAjax" action="{{ url('company-registration') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="name">Company Name</label>
                    <div class="form-control-wrap">

                        <input id="company_name" type="text" class="form-control form-control-lg @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" placeholder="Enter your company name" required autocomplete="company_name" autofocus >

                        @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                    <div class="form-group">
                    <label class="form-label" for="email">Upload Company Logo</label>
                    <div class="form-control-wrap">

                       <input type="file" class="form-control form-control-lg @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required>

                       @error('image')
                       <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

                 <div class="form-group">
                    <label class="form-label" for="name">Your Name</label>
                    <div class="form-control-wrap">

                        <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your name" required autocomplete="name" autofocus >

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <div class="form-control-wrap">

                       <input placeholder="Enter your email" id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                       @error('email')
                       <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label class="form-label" for="email">Phone</label>
                <div class="form-control-wrap">

                    <input placeholder="Enter your phone" id="text" type="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror" name="phone" required>

                    @error('phone')
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
                    <em class="passcode-icon icon-show icon ni ni-eye"></em>
                    <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                </a>

                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Enter your passcode" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
        </div>                                    
        <div class="form-group">
            <button type="submit" class="btn btn-lg theme-btn btn-block">
                {{ __('Register Now') }}
            </button>
        </div>
    </form>
    <div class="form-note-s2 text-center pt-4"> Already have an account? <a
        href="{{ url('login') }}"><strong>Login in instead</strong></a>
    </div>
</div>
</div>
</div>

 <script>
     $("#loading").hide();
    $(function(){
     
      $(document).on("submit","#handleCompanyRegisterAjax",function(e){
      e.preventDefault();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

            $.ajax({
        url:"{{ url('company-registration') }}",
        type:"POST",
        dataType: "json",
        data: new FormData(this),
        processData: false,
        contentType: false,
         beforeSend: function(){
     $("#loading").show();
   },
   complete: function(){
     $("#loading").hide();
   },
        success: function (data, status)
        {
       //console.log(data);
            if(data.status == false){
                $('.msg-bar').html('<div class="alert alert-danger">'+data.msg+'</div>');
            }

            if(data.status == true){
                $('.msg-bar').html('<div class="alert alert-success">'+data.msg+'</div>');
            }
        },
        error: function (xhr, desc, err)
        {
           // alert(xhr.responseText);

        }
    });  

        return false;
      });

    });
  </script>
                   
    @endsection