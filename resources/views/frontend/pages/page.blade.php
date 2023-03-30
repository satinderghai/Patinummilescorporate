@extends('layouts.frontend.master')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style type="text/css">
    .loader {
    display:none;
    }
    #loadMore {
    cursor: pointer;
}
.our_company {
    padding: 0px !important;
}
.title_banner_page{
     padding-top: 40px !important;
}

.buy_tickets_title.pt-5.pb-5 {
    background: #29aae1;
}


</style>
   
    <div class="section title_banner_page">
        <div class="container">
            <div class="row">
                <div class="buy_tickets_title pt-5 pb-5">
                    <h3 class="text-light text-center">{{ $getPage->title }}</h3>
                    
                   
                </div>
            </div>
        </div>
    </div>
    <!-- footer section -->

     <!-- Our top pick work end-->
    <!-- our company start -->
    <section class="our_company">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 company_info">
                    <div class="about_us_content mt-5">
                        <div class="about_one_text">
                            
                        </div>
                        <div class="about_compny pt-1">
                            <!-- <h3>{{ $getPage->title }}</h3> -->
                            <p class="pt-2">{!! $getPage->content !!}</p>
                        </div>
                        
                    </div>
                </div>
            </div>
    </section>

   
@stop