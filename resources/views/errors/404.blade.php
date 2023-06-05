@extends('layouts.home')
@section('title')
الصفحة غير موجودة. &#8211; {{ Config::get('app.title') }}
@endsection

@section('content')
 <!-- ===================================
              START THE HEADER
            ==================================== -->
            <header class="default heade-sticky">

                <div class="un-block-right">
                    <div class="menu-sidebar">
                        <button type="button" name="sidebarMenu" aria-label="sidebarMenu" class="btn" data-bs-toggle="modal"
                            data-bs-target="#mdllSidebar-connected">
                            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="9.3" viewBox="0 0 19 9.3">
                                <g id="Group_8081" data-name="Group 8081" transform="translate(-329 -37)">
                                    <rect id="Rectangle_3986" data-name="Rectangle 3986" width="19" height="2.3"
                                        rx="1.15" transform="translate(329 37)" fill="#222032" />
                                    <rect id="Rectangle_3987" data-name="Rectangle 3987" width="19" height="2.3"
                                        rx="1.15" transform="translate(329 44)" fill="#222032" />
                                </g>
                            </svg>
                        </button>
                    </div>

                <div class="un-title-page go-back">

                    <h1>Error 404</h1>
                </div>




                </div>
                <div class="un-block-right">
                    {{-- <div class="un-notification">
                        الوضع المظلم
                    </div>
                    <div class="un-user-profile">
                        <div class="em_darkMode_menu">

                            <label class="switch_toggle toggle_lg theme-switch" for="switchDark">
                                <input type="checkbox" class="switchDarkMode theme-switch" id="switchDark"
                                    aria-describedby="switchDark">
                                <span class="handle"></span>
                            </label>
                        </div> --}}
                    </div>
                    <a href="{{ url('/') }}">
                        <div class="un-item-logo hide-d">
                            <img class="logo-img light-mode" src="{{ asset('images/logo_b.svg') }}" alt="">
                            <img class="logo-img dark-mode" src="{{ asset('images/logo-white.svg') }}" alt="">
                        </div>
                    </a>
                </div>
            </header>
            <!-- ===================================
              START THE SPACE STICKY
            ==================================== -->
            <div class="space-sticky"></div>
                <section class="un-page-components">

                    <div class="bg-white padding-20">

            <img src="{{asset('images/logo-white.svg')}}" width="500px" height="500px" style=" display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;">
                <div class="space-items"></div>
                <div class="bg-white padding-20 text-center">
                        <h1>Not Found 404</h1>
                        <p class="size-20">.Oops, the page you are looking for does not exist</p>
                </div>
                </div>
            </section>
@endsection
