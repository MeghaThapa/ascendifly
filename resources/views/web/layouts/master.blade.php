<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    @if (isset($setting))
        <!-- App Title -->
        <title>@yield('title') | {{ $setting->title }}</title>

        <!-- App favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/uploads/setting/' . $setting->favicon_path) }}"
            type="image/x-icon">
        <link rel="shortcut icon" href="{{ asset('/uploads/setting/' . $setting->favicon_path) }}" type="image/x-icon">

        @yield('top_meta_tags')
    @endif


    @if (empty($setting))
        <!-- App Title -->
        <title>@yield('title')</title>
    @endif


    <!-- Social Meta Tags -->
    <link rel="canonical" href="{{ route('home') }}">
    @yield('social_meta_tags')


    <!-- Stylesheets -->
    <link href="{{ url('css/bootstrap.css') }}" rel="stylesheet">
    @if ($livechat->status == 1)
        <link href="{{ asset('css/floating-wpp.min.css') }}" rel="stylesheet">
    @endif
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- Custom Style -->
    @if (isset($setting->custom_css))
        <style type="text/css">
            {!! strip_tags($setting->custom_css) !!} .dropdown-toggle {
                background: unset;
            }

            .navbar-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 0 2rem;
            }

            @media only screen and (max-width: 767px) {
                .main-menu .navbar-header {
                    display: flex;
                    align-items: center;
                    text-align: left;
                    width: 100%;
                    padding: 8px 0px;
                    right: 0px;
                    z-index: 9;
                    padding: 0 2rem;
                }
            }
        </style>
    @endif
</head>

<body>

    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Main Header-->
        <header class="main-header header-style-one sticky">

            @if (isset($setting->contact_address) || isset($social))
                <!--Header Top-->
                <div class="header-top">
                    <div class="container">
                        <div class="clearfix">
                            <!--Top Left-->
                            <div class="top-left clearfix">
                                <ul class="links clearfix">
                                    @if (isset($setting->contact_address))
                                        <li><span
                                                class="icon fa fa-map-marker-alt"></span>{{ $setting->contact_address }}
                                        </li>
                                    @endif
                                </ul>
                            </div>

                            <!--Top Right-->
                            <div class="top-right pull-right">
                                <ul class="social-links clearfix">
                                    @if (isset($social->facebook))
                                        <li><a href="{{ $social->facebook }}" target="_blank"><span
                                                    class="icon fab fa-facebook-f"></span></a></li>
                                    @endif
                                    @if (isset($social->twitter))
                                        <li><a href="{{ $social->twitter }}" target="_blank"><span
                                                    class="icon fab fa-twitter"></span></a></li>
                                    @endif
                                    @if (isset($social->instagram))
                                        <li><a href="{{ $social->instagram }}" target="_blank"><span
                                                    class="icon fab fa-instagram"></span></a></li>
                                    @endif
                                    @if (isset($social->linkedin))
                                        <li><a href="{{ $social->linkedin }}" target="_blank"><span
                                                    class="icon fab fa-linkedin-in"></span></a></li>
                                    @endif
                                    @if (isset($social->pinterest))
                                        <li><a href="{{ $social->pinterest }}" target="_blank"><span
                                                    class="icon fab fa-pinterest"></span></a></li>
                                    @endif
                                    @if (isset($social->youtube))
                                        <li><a href="{{ $social->youtube }}" target="_blank"><span
                                                    class="icon fab fa-youtube"></span></a></li>
                                    @endif
                                    @if (isset($social->skype))
                                        <li><a href="skype:{{ $social->skype }}?chat" target="_blank"><span
                                                    class="icon fab fa-skype"></span></a></li>
                                    @endif
                                    @if (isset($social->whatsapp))
                                        <li><a href="https://wa.me/{{ str_replace(' ', '', $social->whatsapp) }}"
                                                target="_blank"><span class="icon fab fa-whatsapp"></span></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif



            <!--Sticky Header-->
            <div class="sticky">
                <!--<div>-->
                @if (isset($setting))
                    <!--Logo-->
                @endif
                <!-- Main Menu -->
                <nav class="main-menu  navbar-expand-lg sticky">

                    <div class="navbar-header">

                        <a href="{{ route('home') }}" class="img-responsive navbar-brand"><img
                                src="{{ asset('/uploads/setting/' . $setting->logo_path) }}" alt="Logo"></a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent1">
                        <ul class="navigation clearfix align-items-center d-flex"
                            style="width: 100%; justify-content: end; margin-right: 2rem;">

                            @php
                                $page_home = \App\Models\PageSetup::page('home');
                            @endphp
                            @if (isset($page_home))
                                <li class="{{ Request::path() == '/' ? 'current' : '' }}"><a
                                        href="{{ route('home') }}">{{ $page_home->title }}</a></li>
                            @endif


                            <li>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Solutions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ url('/audit') }}">Sales Audit</a>
                                        <a class="dropdown-item" href="{{ url('/sales-consulting') }}">Sales
                                            Consulting</a>
                                        <a class="dropdown-item" href="{{ url('/sales-research') }}">Sales Research</a>
                                        <a class="dropdown-item" href="{{ url('/sales-training') }}">Sales Training</a>
                                        <a class="dropdown-item" href="{{ url('/sales-recruitment') }}">Sales
                                            Recruitment</a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Insights
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        @php
                                            $page_blog = \App\Models\PageSetup::page('blog');
                                        @endphp
                                        @if (isset($page_blog))
                                            <a class="dropdown-item"
                                                href="{{ route('blogs') }}">{{ $page_blog->title }}</a>
                                        @endif

                                        <a class="dropdown-item" href="#">News Magazine</a>
                                        <a class="dropdown-item" href="{{ '/sales-personality' }}">Sales
                                            Personality</a>
                                        <a class="dropdown-item" href="#">Reports</a>
                                        <a class="dropdown-item" href="#">Other</a>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        About
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        @php
                                            $page_about = \App\Models\PageSetup::page('about-us');
                                        @endphp
                                        @if (isset($page_about))
                                            <a class="dropdown-item"
                                                href="{{ route('about') }}">{{ $page_about->title }}</a>
                                        @endif

                                        <a class="dropdown-item" href="/partners">Our Partners</a>
                                        <a class="dropdown-item" href="/clients">Our Clients</a>
                                        <a class="dropdown-item" href="#">Events</a>
                                        <a class="dropdown-item" href="#">Career Center(Vacancy
                                            Announcement)</a>
                                        <a class="dropdown-item" href="/gallery">Gallery</a>
                                        <a class="dropdown-item" href="/team">Our Team</a>
                                    </div>
                                </div>
                            </li>



                            {{--
                                @php
                                    $page_about = \App\Models\PageSetup::page('about-us');
                                @endphp
                                @if (isset($page_about))
                                <li class="{{ Request::is('about*') ? 'current' : '' }}"><a href="{{ route('about') }}">{{ $page_about->title }}</a></li>
                                @endif

                                @php
                                    $page_services = \App\Models\PageSetup::page('services');
                                @endphp
                                @if (isset($page_services))
                                <li class="{{ Request::is('service*') ? 'current' : '' }}"><a href="{{ route('services') }}">{{ $page_services->title }}</a></li>
                                @endif

                                @php
                                    $page_portfolio = \App\Models\PageSetup::page('portfolio');
                                @endphp
                                @if (isset($page_portfolio))
                                <li class="{{ Request::is('portfolio*') ? 'current' : '' }}"><a href="{{ route('portfolios') }}">{{ $page_portfolio->title }}</a></li>
                                @endif

                                @php
                                    $page_pricing = \App\Models\PageSetup::page('pricing');
                                @endphp
                                @if (isset($page_pricing))
                                <li class="{{ Request::is('pricing*') ? 'current' : '' }}"><a href="{{ route('pricing') }}">{{ $page_pricing->title }}</a></li>
                                @endif

                                @php
                                    $page_blog = \App\Models\PageSetup::page('blog');
                                @endphp
                                @if (isset($page_blog))
                                <li class="{{ Request::is('blog*') ? 'current' : '' }}"><a href="{{ route('blogs') }}">{{ $page_blog->title }}</a></li>
                                @endif

                                @php
                                    $page_faqs = \App\Models\PageSetup::page('faqs');
                                @endphp
                                @if (isset($page_faqs))
                                <li class="{{ Request::is('faqs*') ? 'current' : '' }}"><a href="{{ route('faqs') }}">{{ $page_faqs->title }}</a></li>
                                @endif
--}}

                            @php
                                $page_contact = \App\Models\PageSetup::page('contact-us');
                            @endphp
                            @if (isset($page_contact))
                                <li class="{{ Request::path() == 'contact' ? 'current' : '' }}"><a
                                        href="{{ route('contact') }}">{{ $page_contact->title }}</a></li>
                            @endif


                            @php
                                $page_quote = \App\Models\PageSetup::page('get-quote');
                            @endphp
                            @if (isset($page_quote))
                                <li class="advisor-box {{ Request::is('get-quote*') ? 'current' : '' }}">
                                    <!--<a href="{{ route('get-quote') }}" class="theme-btn btn-style-three" style="padding: 0.5rem 1rem;">{{ $page_quote->title }}</a>-->
                                    <a href="{{ route('get-quote') }}" class="theme-btn btn-style-three"
                                        style="padding: 0.5rem 1rem;">Book a Demo</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav><!-- Main Menu End-->
            </div>
            <!--</div>-->
            <!--End Sticky Header-->



        </header>
        <!--End Main Header -->


        <!-- Content Start -->
        @yield('content')
        <!-- Content End -->
        <!--@yield('audit_section')-->


        @php
            $section_subscribe = \App\Models\Section::section('subscribe');
        @endphp
        @if (isset($section_subscribe))
            <!--Subscribe Section-->
            <section class="subscribe-section">
                <div class="container">
                    <div class="row clearfix">
                        <!--Form Column-->
                        <div class="title-column col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <h2>{{ $section_subscribe->title }}</h2>
                            <div class="text">{!! $section_subscribe->description !!}</div>
                            <div class="icon-box">
                                <span class="icon flaticon-mail"></span>
                            </div>
                        </div>
                        <!--Form Column-->
                        <div class="form-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="subscribe-form">
                                    <form method="post" action="{{ route('subscribe') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" value=""
                                                placeholder="{{ __('contact.email_address') }}" required>
                                            <button type="submit" class="theme-btn"><i
                                                    class="fab fa-telegram-plane"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--End Subscribe Section-->
        @endif

        <div class="container upper-right"
            style="display: flex; justify-content: space-between; padding: 50px 0;flex-wrap: wrap; flex-direction: row; gap: 1rem">

            <!--Info Box-->
            @if (isset($setting->office_hours))
                <div class="upper-column info-box">
                    <div class="icon-box mb-3"><span class="flaticon-clock info_icon"></span></div>
                    <ul>
                        <li style="clamp(0.9rem, 3vw,1.6rem)"><strong>{{ __('contact.office_time') }}:</strong></li>
                        <li style="font-size: 1rem">{!! strip_tags($setting->office_hours) !!}</li>
                    </ul>
                </div>
            @endif

            @if (isset($setting->phone_one))
                <!--Info Box-->
                <div class="upper-column info-box">
                    <div class="icon-box mb-3"><span class="flaticon-phone-call info_icon"></span></div>
                    <ul>
                        <li style="clamp(0.9rem, 3vw,1.6rem)"><strong>{{ __('contact.phone') }}:</strong></li>
                        <li style="font-size: 1rem">
                            <a href="tel:{{ $setting->phone_one }}">
                                {{ $setting->phone_one }}
                            </a>
                        </li>

                    </ul>
                </div>
            @endif

            @if (isset($setting->email_one))
                <!--Info Box-->
                <div class="upper-column info-box">
                    <div class="icon-box mb-3"><span class="flaticon-email info_icon"></span></div>
                    <ul>
                        <li style="clamp(0.9rem, 3vw,1.6rem)"><strong>{{ __('contact.email') }}:</strong></li>
                        <li style="font-size: 1rem">
                            <a href="mailto:{{ $setting->email_one }}">
                                {{ $setting->email_one }}
                            </a>
                        </li>
                    </ul>
                </div>
            @endif
        </div>

        <!-- Main Footer -->
        <footer class="main-footer"
            style="background-image: url({{ asset('web/images/background/footer-bg.jpg') }});">
            <div class="container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">
                        <div class="big-column col-xl-8 col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <!--Footer Column-->
                                <div class="footer-column col-lg-6 col-md-12 col-sm-12">
                                    <div class="footer-widget about-widget">
                                        @if (isset($setting))
                                            <div class="footer-logo"><a href="{{ route('home') }}"><img
                                                        src="{{ asset('/uploads/setting/' . $setting->logo_path) }}"
                                                        alt="Logo"></a></div>

                                            <div class="widget-content">
                                                <ul class="info-box">
                                                    <li><i
                                                            class="far fa-map"></i><span>{{ __('contact.address') }}:</span>
                                                        {{ $setting->contact_address }}</li>
                                                    <li><i class="fa fa-phone-volume"></i>
                                                        <span>{{ __('contact.phone') }}:</span>
                                                        <a
                                                            href="tel:{{ $setting->phone_one }}@if (isset($setting->phone_two)) , @endif {{ $setting->phone_two }}">
                                                            {{ $setting->phone_one }}@if (isset($setting->phone_two))
                                                                ,
                                                            @endif {{ $setting->phone_two }}
                                                        </a>
                                                    </li>
                                                    <li><i class="fas fa-envelope"></i>
                                                        <span>{{ __('contact.email') }}:</span>
                                                        <a
                                                            href="mailto:{{ $setting->email_one }}@if (isset($setting->email_two)) , @endif {{ $setting->email_two }}">
                                                            {{ $setting->email_one }}@if (isset($setting->email_two))
                                                                ,
                                                            @endif {{ $setting->email_two }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                @if (count($pages) > 0)
                                    <!--Footer Column-->
                                    <div class="footer-column col-lg-6 col-md-12 col-sm-12">
                                        <div class="footer-widget links-widget">
                                            <h2 class="widget-title">{{ __('common.footer_links') }}</h2>
                                            <div class="widget-content">
                                                <ul class="list">
                                                    @foreach ($pages as $key => $page)
                                                        <li><a
                                                                href="{{ route('page.single', $page->slug) }}">{{ $page->title }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if (count($recents) > 0)
                            <div class="big-column col-xl-4 col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <!--Footer Column-->
                                    <div class="footer-column col-lg-12 col-md-12 col-sm-12">
                                        <div class="footer-widget recent-posts">
                                            <h2 class="widget-title">{{ __('common.recent_posts') }}</h2>
                                            <!--Footer Column-->
                                            <div class="widget-content">
                                                <div class="item">
                                                    @foreach ($recents as $key => $recent)
                                                        @if ($key <= 1)
                                                            <div class="post">
                                                                <ul class="post-date">
                                                                    <li>{{ date('F d Y', strtotime($recent->created_at)) }}
                                                                    </li>
                                                                </ul>
                                                                <div class="thumb"><a
                                                                        href="{{ route('blog.single', $recent->slug) }}"><img
                                                                            src="{{ asset('uploads/article/' . $recent->image_path) }}"
                                                                            alt="{{ $recent->title }}"></a></div>
                                                                <h4><a
                                                                        href="{{ route('blog.single', $recent->slug) }}">{!! str_limit(strip_tags($recent->title), 50, ' ...') !!}</a>
                                                                </h4>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!--Footer Bottom-->
            <div class="footer-bottom">
                <div class="container">
                    <div class="inner-container clearfix">
                        @if (isset($setting))
                            <div class="copyright-text">&copy; {!! strip_tags($setting->footer_text, '<p><a><b><i><u><strong>') !!}</div>
                        @endif
                        <div class="social-links">
                            <ul class="social-icon-two">
                                @if (isset($social->facebook))
                                    <li><a href="{{ $social->facebook }}" target="_blank"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if (isset($social->twitter))
                                    <li><a href="{{ $social->twitter }}" target="_blank"><i
                                                class="fab fa-twitter"></i></a></li>
                                @endif
                                @if (isset($social->instagram))
                                    <li><a href="{{ $social->instagram }}" target="_blank"><i
                                                class="fab fa-instagram"></i></a></li>
                                @endif
                                @if (isset($social->linkedin))
                                    <li><a href="{{ $social->linkedin }}" target="_blank"><i
                                                class="fab fa-linkedin-in"></i></a></li>
                                @endif
                                @if (isset($social->pinterest))
                                    <li><a href="{{ $social->pinterest }}" target="_blank"><i
                                                class="fab fa-pinterest"></i></a></li>
                                @endif
                                @if (isset($social->youtube))
                                    <li><a href="{{ $social->youtube }}" target="_blank"><i
                                                class="fab fa-youtube"></i></a></li>
                                @endif
                                @if (isset($social->skype))
                                    <li><a href="skype:{{ $social->skype }}?chat" target="_blank"><i
                                                class="fab fa-skype"></i></a></li>
                                @endif
                                @if (isset($social->whatsapp))
                                    <li><a href="https://wa.me/{{ str_replace(' ', '', $social->whatsapp) }}"
                                            target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Main Footer -->



    </div>

    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fas fa-angle-double-up"></span></div>

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>
    <script src="{{ asset('js/wow.js') }}"></script>
    <script src="{{ asset('js/appear.js') }}"></script>
    <script src="{{ asset('js/isotope.js') }}"></script>
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/mixitup.js') }}"></script>
    @if ($livechat->status == 1)
        <script src="{{ asset('js/floating-wpp.min.js') }}"></script>
    @endif
    <script src="{{ asset('js/script.js') }}"></script>


    @if ($livechat->status == 1)
        <!--Div where the WhatsApp will be rendered-->
        <div id="whatspp_live"></div>

        <script type="text/javascript">
            (function($) {
                "use strict";
                $('#whatspp_live').floatingWhatsApp({
                    phone: '{{ $livechat->whatsapp_no }}', //WhatsApp Business phone number International format
                    headerTitle: '{{ $livechat->whatsapp_title }}', //Popup Title
                    popupMessage: '{{ $livechat->whatsapp_greeting }}', //Popup Message
                    showPopup: true, //Enables popup display
                    buttonImage: '<img src="{{ asset('web/images/social/whatsapp.png') }}">', //Button Image
                    headerColor: '{{ $livechat->whatsapp_color }}', //headerColor: 'crimson', //Custom header color
                    backgroundColor: 'transparent', //backgroundColor: 'crimson', //Custom background button color
                    position: "right"
                });
            })(jQuery);
        </script>
    @endif


    @if ($livechat->status == 0)
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script type="text/javascript">
            (function($) {
                "use strict";

                window.fbAsyncInit = function() {
                    FB.init({
                        xfbml: true,
                        version: 'v8.0'
                    });
                };

                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));

            })(jQuery);
        </script>

        <!-- Your Chat Plugin code -->
        <div class="fb-customerchat" attribution=setup_tool page_id="{{ $livechat->facebook_id }}"
            theme_color="{{ $livechat->facebook_color }}"
            logged_in_greeting="{{ $livechat->facebook_greeting_in }}"
            logged_out_greeting="{{ $livechat->facebook_greeting_out }}">
        </div>
    @endif


    {{--
  <!--Header-Upper-->
         <div class="header-upper">
            <div class="container">
                <div class="clearfix">
                    <div class="nav-inner">

                        @if (isset($setting))
                        <div class="pull-left logo-box">
                            <div class="logo" style="max-width: 180px; max-height: 60px;"><a href="{{ route('home') }}"><img src="{{ asset('/uploads/setting/'.$setting->logo_path) }}" alt="Logo"></a></div>
                        </div>
                        @endif






                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->
     --}}



    {{--
        <!--Header Lower-->
    <div class="header-lower">

            <div class="container">
                <div class="nav-outer clearfix">

                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md">
                        <div class="navbar-header">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix d-flex align-items-center">
                                @php
                                    $page_home = \App\Models\PageSetup::page('home');
                                @endphp
                                @if (isset($page_home))
                                <li class="{{ Request::path() == '/' ? 'current' : '' }}"><a href="{{ route('home') }}">{{ $page_home->title }}</a></li>
                                @endif

                           <!--there was a comment -->
                                @php
                                    $page_about = \App\Models\PageSetup::page('about-us');
                                @endphp
                                @if (isset($page_about))
                                <li class="{{ Request::is('about*') ? 'current' : '' }}"><a href="{{ route('about') }}">{{ $page_about->title }}</a></li>
                                @endif

                             <!--comment end   -->

                                <li>
                                    <div class="dropdown">
                                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Solutions
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Sales Audit</a>
                                        <a class="dropdown-item" href="#">Consulting</a>
                                        <a class="dropdown-item" href="#">Research</a>
                                        <a class="dropdown-item" href="#">Training</a>
                                        <a class="dropdown-item" href="#">Recruitment</a>
                                      </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="dropdown">
                                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Insights
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        @php
                                            $page_blog = \App\Models\PageSetup::page('blog');
                                        @endphp
                                        @if (isset($page_blog))
                                        <a class="dropdown-item" href="{{ route('blogs') }}">{{ $page_blog->title }}</a>
                                        @endif

                                        <a class="dropdown-item" href="#">News Magazine</a>
                                        <a class="dropdown-item" href="#">Sales Personality</a>
                                        <a class="dropdown-item" href="#">Reports</a>
                                        <a class="dropdown-item" href="#">Other</a>
                                      </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="dropdown">
                                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        About
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        @php
                                            $page_about = \App\Models\PageSetup::page('about-us');
                                        @endphp
                                        @if (isset($page_about))
                                        <a class="dropdown-item" href="{{ route('about') }}">{{ $page_about->title }}</a>
                                        @endif

                                        <a class="dropdown-item" href="#">Our Partners</a>
                                        <a class="dropdown-item" href="#">Our Clients</a>
                                        <a class="dropdown-item" href="#">Our Partners</a>
                                        <a class="dropdown-item" href="#">Events</a>
                                        <a class="dropdown-item" href="#">Career Center(Vacancy Announcement)</a>
                                        <a class="dropdown-item" href="#">Gallery</a>
                                        <!--<a class="dropdown-item" href="#">Our Team</a>-->
                                      </div>
                                    </div>
                                </li>

{{--
                                @php
                                    $page_services = \App\Models\PageSetup::page('services');
                                @endphp
                                @if (isset($page_services))
                                <li class="{{ Request::is('service*') ? 'current' : '' }}"><a href="{{ route('services') }}">{{ $page_services->title }}</a></li>
                                @endif

                                @php
                                    $page_portfolio = \App\Models\PageSetup::page('portfolio');
                                @endphp
                                @if (isset($page_portfolio))
                                <li class="{{ Request::is('portfolio*') ? 'current' : '' }}"><a href="{{ route('portfolios') }}">{{ $page_portfolio->title }}</a></li>
                                @endif

                                @php
                                    $page_pricing = \App\Models\PageSetup::page('pricing');
                                @endphp
                                @if (isset($page_pricing))
                                <li class="{{ Request::is('pricing*') ? 'current' : '' }}"><a href="{{ route('pricing') }}">{{ $page_pricing->title }}</a></li>
                                @endif

                                @php
                                    $page_blog = \App\Models\PageSetup::page('blog');
                                @endphp
                                @if (isset($page_blog))
                                <li class="{{ Request::is('blog*') ? 'current' : '' }}"><a href="{{ route('blogs') }}">{{ $page_blog->title }}</a></li>
                                @endif

                                @php
                                    $page_faqs = \App\Models\PageSetup::page('faqs');
                                @endphp
                                @if (isset($page_faqs))
                                <li class="{{ Request::is('faqs*') ? 'current' : '' }}"><a href="{{ route('faqs') }}">{{ $page_faqs->title }}</a></li>
                                @endif
--}}

    {{-- @php
                                    $page_contact = \App\Models\PageSetup::page('contact-us');
                                @endphp
                                @if (isset($page_contact))
                                <li class="{{ Request::path() == 'contact' ? 'current' : '' }}"><a href="{{ route('contact') }}">{{ $page_contact->title }}</a></li>
                                @endif  --}}
    </ul>
    </div>
    </nav>
    <!-- Main Menu End-->



    {{--  <div class="outer-box clearfix">
                        @php
                            $page_quote = \App\Models\PageSetup::page('get-quote');
                        @endphp
                        @if (isset($page_quote))
                        <div class="advisor-box {{ Request::is('get-quote*') ? 'current' : '' }}">
                            <a href="{{ route('get-quote') }}" class="theme-btn advisor-btn">{{ $page_quote->title }}</a>
                        </div>
                        @endif
                    </div>  --}}
    </div>
    </div>

    </div>
    <!--End Header Lower-->



</body>

</html>
