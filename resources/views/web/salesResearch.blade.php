@extends('web.layouts.master')

<?php
    $header = \App\Models\PageSetup::get();
    foreach($header as $h){
        if($h->title == "Sales Research"){
            $data['title'] = $h->title;
            $data['description'] = $h->description;
            $data["meta_title"] = $h->meta_title;
            $data["keywords"] = $h->meta_keywords;
        }
    }
    // dd($data['title']);
?>


@section('content')

    <!-- Sales Audit Content -->
    <div class="content_title_div">
      <h1 class="content_title">{!! $data['title'] !!}</h1>
    </div>
    <div class="bread_crumb">
      <div class="bread_crumb_links">
        <a href="{{ route('home') }}">Home</a>
        <p class="bread_crumb_divider">|</p>
        <a href="#"> <span> {!! $data['title'] !!} </span> </a>
      </div>
    </div>
    <section class="sales_main row" style="padding: 0 2rem !important;">
      <div class="sales_main_wrapper col-12">
          {!! $data['description'] !!}
      </div>
    </section>
    <!-- Sales Audit Content End -->

    <!-- Sales Audit Content -->
    <!--<div class="content_title_div">-->
    <!--  <h1 class="content_title">{!! $data['title'] !!}</h1>-->
    <!--</div>-->
    <!--<div class="bread_crumb">-->
    <!--  <div class="bread_crumb_links">-->
    <!--    <a href="{{ route('home') }}">Home</a>-->
    <!--    <p class="bread_crumb_divider">|</p>-->
    <!--    <a href="#"> <span> {!! $data['title'] !!} </span> </a>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<section class="sales_main row" style="padding: 0 2rem !important;">-->
    <!--  <div class="sales_main_wrapper col-12">-->
    <!--      {!! $data['description'] !!}-->
    <!--  </div>-->
    <!--</section>-->
    <!--<div class="content_title_div">-->
    <!--  <h1 class="content_title">Sales Research</h1>-->
    <!--</div>-->
    <!--<div class="bread_crumb">-->
    <!--  <div class="bread_crumb_links">-->
    <!--    <a href="#">Home</a>-->
    <!--    <p class="bread_crumb_divider">|</p>-->
    <!--    <a href="#"> <span> Sales Research</span> </a>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<section class="sales_main">-->
    <!--  <div class="sales_main_wrapper row mb-4">-->
    <!--    <div class="sales_img_div col-lg-6">-->
    <!--      <img-->
    <!--        class="sales_img"-->
    <!--        src="https://images.pexels.com/photos/6476582/pexels-photo-6476582.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"-->
    <!--        alt="Sales Training"-->
    <!--      />-->
    <!--    </div>-->
    <!--    <div class="sales_content_div col-lg-6">-->
    <!--      <p>-->
    <!--        At our core, we are dedicated to providing you with valuable-->
    <!--        insights and data-driven solutions that give you a competitive edge.-->
    <!--        With our extensive expertise in sales research, market analysis, and-->
    <!--        consumer behaviour, we uncover hidden trends and identify untapped-->
    <!--        opportunities to help maximize your sales growth.-->
    <!--      </p>-->
    <!--      <p>-->
    <!--        Our team of experts utilizes cutting-edge methodologies and-->
    <!--        state-of-the-art technologies to gather and analyze data. This-->
    <!--        enables us to offer you a comprehensive understanding of your target-->
    <!--        market and customers. Whether you need competitor analysis, market-->
    <!--        segmentation, or sales forecasting, we have the tools and expertise-->
    <!--        to deliver accurate and reliable results.-->
    <!--      </p>-->
    <!--      <p>-->
    <!--        We believe that data is the key to making informed decisions. That's-->
    <!--        why we go above and beyond, diving deep into the numbers to provide-->
    <!--        you with actionable recommendations. Our research is not just-->
    <!--        surface-level; we aim to uncover meaningful insights that can shape-->
    <!--        your sales strategy and drive real results.-->
    <!--      </p>-->
    <!--      <p>-->
    <!--        By partnering with us, you gain access to a wealth of knowledge and-->
    <!--        expertise. We are passionate about helping you uncover hidden-->
    <!--        opportunities and understand the ever-changing dynamics of your-->
    <!--        market. We work closely with you to ensure that our research aligns-->
    <!--        with your goals and objectives. Let our sales research services be-->
    <!--        your compass in navigating the complex world of sales.-->
    <!--      </p>-->
    <!--    </div>-->
    <!--  </div>-->
    <!--</section>-->
    
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
@endsection