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

    <!-- clientels -->
    <section class="slide-option" style="padding: 223px 0 0;">
    	<div class="container">
    		<div class="sec-title centered">
                <h2>Our Clients</h2>
                <div class="text"></div>
                <div class="separater"></div>
            </div>
    	</div>
    	<div id="infinite">
    		<div >
    			<ul style="height: unset;display: flex; flex-wrap: wrap;justify-content: center">
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/annapurnaM.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/cc.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/esewa.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/fone.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/Hard-Rock-Cafe-Logo-1981.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/j.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/jobs.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/karkhana.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/kcm.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/kn.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/nicAsia.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/presidental.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/savlon.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/skoda-logo.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/sukalpa.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/suzuki.png') }} " /></li>
    				<li class="highway-car"><img src=" {{ asset('web/images/clients/veda.png') }} " /></li>
    				
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/annapurnaM.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/cc.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/esewa.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/fone.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/Hard-Rock-Cafe-Logo-1981.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/j.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/jobs.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/karkhana.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/kcm.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/kn.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/nicAsia.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/presidental.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/savlon.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/skoda-logo.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/sukalpa.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/suzuki.png') }} " /></li>-->
    				<!--<li class="highway-car"><img src=" {{ asset('web/images/clients/veda.png') }} " /></li>-->
    			</ul>
    		</div>
    	</div>
    </section>

    
    <!-- clientels end -->
    
@endsection