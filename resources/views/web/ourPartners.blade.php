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
        $section_clients = \App\Models\Section::section('clients');
    @endphp
    @if(count($clients) > 0 && isset($section_clients))
    <!--Clients Section-->
    <section class="clients-section style-two">
        <div class="container" style="padding-top: 9rem">
            <div class="sponsors-outer">
                
                <div class="sec-title centered">
                        <h2>Our Partners</h2>
                        <div class="text"></div>
                        <div class="separater"></div>
                    </div>
                
                <!--Sponsors Carousel-->
                <!--<ul class="sponsors-carousel owl-carousel owl-theme">-->
                <div style="display: flex; gap: 2rem; flex-wrap: wrap; align-items: center; justify-content: center;">
                    @foreach($clients as $client)
                    <div>
                    <!--<li class="slide-item"><figure class="image-box">-->
                        <a href="{{ $client->link }}" target="_blank">
                            <img src="{{ asset('uploads/client/'.$client->image_path) }}" alt="{{ $client->title }}"></a></figure>
                    </div>
                    <!--</li>-->
                    @endforeach
                </div>
                <!--</ul>-->
            </div>
        </div>
    </section>
    <!--End Clients Section-->
    @endif


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection