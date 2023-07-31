@extends('web.layouts.master')

<?php
$header = \App\Models\PageSetup::where('title', 'like', 'sale' . '%')->first();
// dd($/header);
?>
@if (isset($header))

    @section('title', $header->meta_title)

    @section('top_meta_tags')
        @if (isset($header->meta_description))
            <meta name="description" content="{!! str_limit(strip_tags($header->meta_description), 160, ' ...') !!}">
        @else
            <meta name="description" content="{!! str_limit(strip_tags($setting->description), 160, ' ...') !!}">
        @endif

        @if (isset($header->meta_keywords))
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
        </div>
    </section>
    <!-- Sales Audit Content End -->


    <!-- process content -->
    @php
        $section_process = \App\Models\Section::section('process');
    @endphp
    @if (count($processes) > 0 && isset($section_process))
        <!--Feautred Section -->
        <section class="feautred-section style-two"
            style="background-image: url({{ asset('web/images/background/process-bg.png') }});">
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
                    @foreach ($processes as $key => $process)
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

    @if (isset($audit))
        <div class="sec-title left">
            <h2>{{ $audit->title }}</h2>
            <div class="separater"></div>
        </div>
    @endif

    <!-- Process Content End -->








@endsection
