@extends('web.layouts.master')

@php
    $header = \App\Models\PageSetup::page('pricing');
@endphp
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

@section('content')

      <h2 class="text-center mb-4" style="padding-top: 170px">Gallery</h2>
    <section class="gallery_sec d-flex justify-content-center">
      <div class="gallery_sec_wrapper row">
        <figure
          class="gallery_img_div col-lg-4 col-md-6 col-sm-12 mt-3"
        >
          <img
            class="gallery_img"
            src="{{asset('uploads/portfolio/1_1604078770.jpg')}}"
            alt=""
          />
        </figure>
        <figure
          class="gallery_img_div col-lg-4 col-md-6 col-sm-12 mt-3"
        >
          <img
            class="gallery_img"
            src="{{asset('uploads/portfolio/2_1604078816.jpg')}}"
            alt=""
          />
        </figure>
        <figure
          class="gallery_img_div col-lg-4 col-md-6 col-sm-12 mt-3"
        >
          <img
            class="gallery_img"
            src="{{asset('uploads/portfolio/3_1604078850.jpg')}}"
            alt=""
          />
        </figure>
        <figure
          class="gallery_img_div col-lg-4 col-md-6 col-sm-12 mt-3"
        >
          <img
            class="gallery_img"
            src="{{asset('uploads/portfolio/4_1604078886.jpg')}}"
            alt=""
          />
        </figure>
        <figure
          class="gallery_img_div col-lg-4 col-md-6 col-sm-12 mt-3"
        >
          <img
            class="gallery_img"
            src="{{asset('uploads/portfolio/5_1604078920.jpg')}}"
            alt=""
          />
        </figure>
        <figure
          class="gallery_img_div col-lg-4 col-md-6 col-sm-12 mt-3"
        >
          <img
            class="gallery_img"
            src="{{asset('uploads/portfolio/6_1604079038.jpg')}}"
            alt=""
          />
        </figure>
        <figure
          class="gallery_img_div col-lg-4 col-md-6 col-sm-12 mt-3"
        >
          <img
            class="gallery_img"
            src="{{asset('uploads/portfolio/Ascendifly Sales _11zon_1688112731.jpg')}}"
            alt=""
          />
        </figure>
        <figure
          class="gallery_img_div col-lg-4 col-md-6 col-sm-12 mt-3"
        >
          <img
            class="gallery_img"
            src="{{asset('uploads/portfolio/Ascendifly Sales Consulting_11zon_1688111475.jpg')}}"
            alt=""
          />
        </figure>
        <figure
          class="gallery_img_div col-lg-4 col-md-6 col-sm-12 mt-3"
        >
          <img
            class="gallery_img"
            src="{{asset('uploads/portfolio/Ascendifly Sales Training_11zon_1688111152.jpg')}}"
            alt=""
          />
        </figure>
      </div>
    </section>

    @php
        $section_portfolio = \App\Models\Section::section('portfolio');
    @endphp
    @if(count($portfolios) > 0 && isset($section_portfolio))
    
    
    <!--portfolio Section-->
    <section class="gallery-section">
        <!--Sortable Masonry-->
        <div class="sortable-masonry">
            <div class="container" style="padding-top: 83px">
                <div class="sec-title centered">
                    <h2>Our Portfolio</h2>
                    <div class="text">{!! $section_portfolio->description !!}</div>
                    <div class="separater"></div>
                </div>
                <!--Filter-->
                <div class="filters row clearfix">
                    
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter=".all">{{ __('common.all') }}</li>
                        @foreach($portfolio_categories as $portfolio_category)
                        <li class="filter" data-role="button" data-filter=".{{ $portfolio_category->slug }}">{{ $portfolio_category->title }}</li>
                        @endforeach
                    </ul>
                </div>
            
                <div class="row clearfix items-container">
                    
                    @foreach($portfolios as $portfolio)
                    <!--Default Portfolio Item-->
                    <div class="default-portfolio-item mix masonry-item all 
                        @foreach($portfolio->categories as $category)
                            {{ $category->slug }} 
                        @endforeach
                     col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <figure class="image-box"><img src="{{ asset('uploads/portfolio/'.$portfolio->image_path) }}" alt="{{ $portfolio->title }}"></figure>
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <div class="content-inner">
                                            <div class="tags">
                                                @foreach($portfolio->categories as $category)
                                                    > {{ $category->title }} 
                                                @endforeach
                                            </div>
                                            <h3><a href="{{ route('portfolio.single', $portfolio->slug) }}">{{ $portfolio->title }}</a></h3>
                                        </div>
                                        <a href="{{ route('portfolio.single', $portfolio->slug) }}" class="link-btn">{{ __('common.read_more') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

                @php
                    $page_portfolio = \App\Models\PageSetup::page('portfolio');
                @endphp
                @if(isset($page_portfolio))
                <div class="load-more-btn text-center">
                    <a href="{{ route('portfolios') }}" class="theme-btn btn-style-four">{{ __('common.view_more') }}</a>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!--End Portfolio Section-->
    @endif
@endsection