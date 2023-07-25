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

    @php
        $section_team = \App\Models\Section::section('team');
    @endphp
    @if(count($members) > 0 && isset($section_team))
    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="sec-title left">
                <h2>{{ $section_team->title }}</h2>
                <div class="text">{!! $section_team->description !!}</div>
                <div class="separater"></div>
            </div>

            <div class="outer-column clearfix">
                <div class="team-carousal">
                    @foreach($members as $member)
                    <!-- Team Block -->
                    <div class="team-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <div class="image"><img src="{{ asset('uploads/member/'.$member->image_path) }}" alt="{{ $member->title }}"></div>
                                
                            </div>
                            <div class="info-box">
                                <h3 class="name"><a>{{ $member->title }}</a></h3>
                                <span class="designation">{{ $member->designation->title }}@if(isset($member->designation->department)), {{ $member->designation->department }}@endif</span>
                                @if(isset($member->email))
                                <span><i class="far fa-envelope"></i> {{ $member->email }}</span>
                                @endif
                                @if(isset($member->phone))
                                <span><i class="fas fa-phone-volume"></i> {{ $member->phone }}</span>
                                @endif
                            </div>
                            <ul class="social-links">
                                @if(isset($member->facebook))
                                <li><a href="{{ $member->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if(isset($member->twitter))
                                <li><a href="{{ $member->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                @endif
                                @if(isset($member->instagram))
                                <li><a href="{{ $member->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                @endif
                                @if(isset($member->linkedin))
                                <li><a href="{{ $member->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </section>
    <!--End Team Section -->
    @endif
    
@endsection