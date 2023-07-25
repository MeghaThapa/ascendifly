@extends('web.layouts.master')

<?php
    $header = \App\Models\PageSetup::get();
    foreach($header as $h){
        if($h->title == "Sales Recrutment"){
            $data['title'] = $h->title;
            $data['description'] = $h->description;
            $data["meta_title"] = $h->meta_title;
            $data["keywords"] = $h->meta_keywords;
        }
    }
    // dd($data['description']);
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


<!--<div class="content_title_div">-->
<!--      <h1 class="content_title">Sales Recruitment</h1>-->
<!--    </div>-->
<!--    <div class="bread_crumb">-->
<!--      <div class="bread_crumb_links">-->
<!--        <a href="#">Home</a>-->
<!--        <p class="bread_crumb_divider">|</p>-->
<!--        <a href="#"> <span> Sales Recruitment </span> </a>-->
<!--      </div>-->
<!--    </div>-->
<!--    <section class="sales_main">-->
<!--      <div class="sales_main_wrapper row mb-4">-->
<!--        <div class="sales_img_div col-lg-6">-->
<!--          <img-->
<!--            class="sales_img"-->
<!--            src="https://images.pexels.com/photos/6476582/pexels-photo-6476582.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"-->
<!--            alt="Sales Training"-->
<!--          />-->
<!--        </div>-->
<!--        <div class="sales_content_div col-lg-6">-->
<!--          <p>-->
<!--            Building a high-performing sales team is paramount to driving-->
<!--            revenue and achieving business success. At our company, we recognize-->
<!--            the importance of this and offer specialized sales recruitment-->
<!--            services. Our team of dedicated recruitment specialists boasts a-->
<!--            vast network and an in-depth understanding of the sales industry.-->
<!--          </p>-->
<!--          <p>-->
<!--            We don't believe in a one-size-fits-all approach. Instead, we take-->
<!--            the time to truly grasp your specific sales requirements and company-->
<!--            culture. By doing so, we ensure a seamless match between candidates-->
<!--            and your organization. We understand that finding the right fit goes-->
<!--            beyond just skills and experience; it's about finding individuals-->
<!--            who align with your company's values and vision.-->
<!--          </p>-->
<!--          <p>-->
<!--            To identify top talent, we employ a rigorous screening and selection-->
<!--            process. Our goal is to unearth candidates with exceptional sales-->
<!--            skills, a proven track record, and the perfect cultural fit. We-->
<!--            delve deeper than just resumes and interviews. We utilize innovative-->
<!--            assessment methods that evaluate candidates' sales aptitude and-->
<!--            potential.-->
<!--          </p>-->
<!--          <p>-->
<!--            Let us take the hassle out of sales recruitment and help you-->
<!--            assemble a winning sales team. With our expertise and thorough-->
<!--            evaluation methods, you can trust that we'll find the right-->
<!--            individuals who will contribute to your organization's growth and-->
<!--            success.-->
<!--          </p>-->
<!--        </div>-->
<!--      </div>-->
<!--    </section>-->
    
    
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