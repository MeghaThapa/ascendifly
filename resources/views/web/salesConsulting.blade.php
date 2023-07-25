@extends('web.layouts.master')

<?php
    $header = \App\Models\PageSetup::get();
    foreach($header as $h){
        if($h->title == "Sales Consulting"){
            $data['title'] = $h->title;
            $data['description'] = $h->description;
            $data["meta_title"] = $h->meta_title;
            $data["keywords"] = $h->meta_keywords;
        }
    }
    // dd($data['description']);
?>


@section('content')

    <!-- Sales Consulting Content -->
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
    <!-- Sales Consulting Content End -->

    <!--<div class="content_title_div">-->
    <!--  <h1 class="content_title">Sales Consulting</h1>-->
    <!--</div>-->
    <!--<div class="bread_crumb">-->
    <!--  <div class="bread_crumb_links">-->
    <!--    <a href="{{ route('home') }}">Home</a>-->
    <!--    <p class="bread_crumb_divider">|</p>-->
    <!--    <a href="#"> <span> Sales Consulting </span> </a>-->
    <!--  </div>-->
    <!--</div>-->
    <!--<section class="sales_main">-->
    <!--  <div class="sales_main_wrapper row">-->
    <!--    <div class="sales_img_div col-lg-6">-->
    <!--      <img-->
    <!--        class="sales_img"-->
    <!--        src="https://images.pexels.com/photos/6476582/pexels-photo-6476582.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"-->
    <!--        alt="Sales Training"-->
    <!--      />-->
    <!--    </div>-->
    <!--    <div class="sales_content_div col-lg-6">-->
    <!--      <p>-->
    <!--        When it comes to sales consulting, we're your go-to experts for-->
    <!--        transforming your sales operations into a powerhouse of success. Our-->
    <!--        team of seasoned consultants is armed with a wealth of experience-->
    <!--        across diverse industries, allowing us to provide customized-->
    <!--        solutions that perfectly align with your unique business needs.-->
    <!--      </p>-->
    <!--      <p>-->
    <!--        Whether you're aiming to optimize your sales processes, fine-tune-->
    <!--        your sales strategy, or boost your team's performance, we've got the-->
    <!--        expertise to deliver tangible results. We understand that every-->
    <!--        organization is different, so we take the time to truly grasp your-->
    <!--        goals, challenges, and opportunities.-->
    <!--      </p>-->
    <!--      <p>-->
    <!--        Through a collaborative approach, we carefully analyze your current-->
    <!--        sales operations to identify areas for improvement. From there, we-->
    <!--        craft a comprehensive plan of action that is both strategic and-->
    <!--        practical. Our aim is to equip you with actionable strategies that-->
    <!--        can be seamlessly integrated within your organization.-->
    <!--      </p>-->
    <!--      <p>-->
    <!--        With our guidance, you can expect to see enhancements in key areas-->
    <!--        such as sales performance, revenue growth, customer acquisition, and-->
    <!--        retention. We'll help you fine-tune your sales processes, align your-->
    <!--        sales strategy with market demands, and empower your team with the-->
    <!--        skills and tools they need to excel.-->
    <!--      </p>-->
    <!--      <p>-->
    <!--        Our sales consulting service is designed to empower you with the-->
    <!--        knowledge and resources necessary to thrive in today's competitive-->
    <!--        landscape. We're not just consultants; we're partners dedicated to-->
    <!--        your success. Count on us for ongoing support and guidance as we-->
    <!--        work together to achieve your sales objectives.-->
    <!--      </p>-->
    <!--      <p>-->
    <!--        Let our experienced consultants be the driving force behind your-->
    <!--        sales transformation. Together, we'll unlock the full potential of-->
    <!--        your sales operations and achieve remarkable results for your-->
    <!--        business. Get ready to take your sales to new heights of success.-->
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