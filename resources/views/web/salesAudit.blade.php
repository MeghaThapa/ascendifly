@extends('web.layouts.master')

<?php
    $header = \App\Models\PageSetup::where("title","like","sale"."%")->first();
    // dd($/header);
?>
@if(isset($header))

    @section('title', $header->meta_title)

    @section('top_meta_tags')
    @if(isset($header->meta_description))
    <meta name="description" content="{!! str_limit(strip_tags($header->meta_description), 160, ' ...') !!}">
    @else
    <meta name="description" content="{!! str_limit(strip_tags($setting->description), 160, ' ...') !!}">
    @endif

    @if(isset($header->meta_keywords))
    <meta name="keywords" content="{!! strip_tags($header->meta_keywords) !!}">
    @else
    <meta name="keywords" content="{!! strip_tags($setting->keywords) !!}">
    @endif
    @endsection

@endif

@section('audit_section')
<style>
    .feautred-section .container {
        margin: 10rem;
    }
    
    .sales_main_wrapper p {
        display: flex;
        gap: 1rem;
        margin: 4rem 2rem;
    }
</style>

     <!-- Sales Audit Content -->
    <div class="content_title_div">
      <h1 class="content_title">{!! $header->title !!}</h1>
    </div>
    <div class="bread_crumb">
      <div class="bread_crumb_links">
        <a href="{{ route('home') }}">Home</a>
        <p class="bread_crumb_divider">|</p>
        <a href="#"> <span> {!! $header->title !!} </span> </a>
      </div>
    </div>
    <section class="sales_main row" style="padding: 0 2rem !important;">
      <div class="sales_main_wrapper col-12">
          {!! $header->description !!}
        <!--<div class="sales_img_div col-lg-6">-->
        <!--  <img-->
        <!--    class="sales_img"-->
        <!--    src="https://images.pexels.com/photos/6476582/pexels-photo-6476582.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"-->
        <!--    alt="Sales Training"-->
        <!--  />-->
        <!--</div>-->
        <!--<div class="sales_content_div col-lg-6">-->
        <!--  <p>-->
        <!--    Our sales audit service is here to give you a comprehensive and-->
        <!--    detailed assessment of your sales activities. Our experienced team-->
        <!--    will carefully analyze your sales processes, strategies, and overall-->
        <!--    performance. We leave no stone unturned as we dig into every aspect-->
        <!--    of your sales operations.-->
        <!--  </p>-->
        <!--  <p>-->
        <!--    From lead generation and pipeline management to customer acquisition-->
        <!--    and retention strategies, we examine it all. Our goal is to uncover-->
        <!--    strengths that can be further capitalized on, weaknesses that need-->
        <!--    attention, and areas where improvements can be made.-->
        <!--  </p>-->
        <!--  <p>-->
        <!--    By conducting this thorough analysis, we identify any hidden-->
        <!--    bottlenecks, inefficiencies, or missed opportunities that may be-->
        <!--    hindering your sales success. Our aim is to provide you with a clear-->
        <!--    understanding of what's working well and what needs adjustment.-->
        <!--  </p>-->
        <!--  <p>-->
        <!--    Once we've completed the audit, we don't leave you hanging. We-->
        <!--    provide you with actionable recommendations tailored to your-->
        <!--    specific situation. These recommendations serve as a roadmap for-->
        <!--    enhancing your sales effectiveness and driving revenue growth.-->
        <!--  </p>-->
        <!--  <p>-->
        <!--    With our sales audit service, you can gain valuable insights into-->
        <!--    your sales processes and strategies. By implementing the recommended-->
        <!--    improvements, you'll be on your way to unlocking your sales team's-->
        <!--    full potential and achieving greater success.-->
        <!--  </p>-->
        <!--  --}}-->
            
        <!--</div>-->
      </div>
    </section>
    <!-- Sales Audit Content End -->

    
    <!-- process content -->
        @php
        $section_process = \App\Models\Section::section('process');
    @endphp
    @if(count($processes) > 0 && isset($section_process))
    <!--Feautred Section -->
    <section class="feautred-section style-two" style="background-image: url({{ asset('web/images/background/process-bg.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sec-title left">
                        <h2>{{ $section_process->title }}</h2>
                        <div class="text">{!! $section_process->description !!}</div>
                        <div class="separater"></div>
                    </div>
                </div>
            </div>
            <div class="featured-box row clearfix">
                @foreach($processes as $key => $process)
                <div class="col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="{{ ($key + 1) * 200 }}ms">
                    <div class="inner-box">
                        <div class="title-box">
                            <h4><span class="numbe-post">{{ $key + 1 }}</span>{{ $process->title }}</h4>
                        </div>
                        <div class="lower-content">
                            <div class="text">{!! $process->description !!}</div> 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--End Feautred Section -->
    @endif
    
        @if(isset($audit))
            <div class="sec-title left">
                <h2>{{ $audit->title }}</h2>
                <div class="separater"></div>
            </div>
    @endif  
    
    <!-- Process Content End -->
    
    
    
    
    
    
   

@endsection