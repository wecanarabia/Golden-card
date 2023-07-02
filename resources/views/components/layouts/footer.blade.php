  <!--====== APPIE FOOTER PART START ======-->

  <section class="appie-footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div @class(["footer-about-widget","text-right"=>app()->getLocale()==='ar'])>
                    <div class="logo">
                        <a href="#"><img src="assets/images/logo.png" alt=""></a>
                    </div>
                    <p>@lang('landing.GOLFENCARD')</p>
                    <div class="social mt-30">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div @class(["footer-navigation","text-right"=>app()->getLocale()==='ar'])>
                    <h4 class="title">@lang('landing.COMPANY')</h4>
                    <ul>
                        <li><a href="{{ route('about') }}">@lang('landing.ABOUT')</a></li>
                        <li><a href="{{ route('privacy') }}">@lang('landing.PRIVACY')</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div @class(["footer-navigation","text-right"=>app()->getLocale()==='ar'])>
                    <h4 class="title">@lang('landing.LINKS')</h4>
                    <ul>
                        <li><a href="#">@lang('landing.JOINPARTNERS')</a></li>
                        <li><a href="{{ route('conditions') }}">@lang('landing.CONDITIONS')</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div @class(["footer-widget-info","text-right"=>app()->getLocale()==='ar'])>
                    <h4 class="title">@lang('landing.CONTACT')</h4>
                    <ul>
                        <li><a href="#"><i class="fal fa-envelope"></i>info@goldencard.com.jo</a></li>
                        <li><a href="#"><i class="fal fa-phone"></i> +(962) 79 000 0000</a></li>
                        <li><a href="#"><i class="fal fa-map-marker-alt"></i>@lang('landing.ADDRESS')</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-copyright d-flex align-items-center justify-content-between pt-35">
                    <div class="apps-download-btn">
                    <ul>
                        <li><a href="#"><i class="fab fa-apple"></i>@lang('landing.IOSDOWNLOAD')</a></li>
                        <li><a class="item-2" href="#"><i class="fab fa-google-play"></i>@lang('landing.ANDROIDDOWNLOAD')</a></li>
                    </ul>
                    <div class="copyright-text">
                        <p>@lang('landing.RIGHTS')<a href="https://wecan.jo">@lang('landing.WECAN')</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!--====== APPIE FOOTER PART ENDS ======-->


<!--====== APPIE BACK TO TOP PART ENDS ======-->
<div class="back-to-top">
    <a href="#"><i class="fal fa-arrow-up"></i></a>
</div>
<!--====== APPIE BACK TO TOP PART ENDS ======-->








<!--====== jquery js ======-->
<script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/js/vendor/jquery-1.12.4.min.js') }}"></script>

<!--====== Bootstrap js ======-->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>

<!--====== wow js ======-->
<script src="{{ asset('assets/js/wow.js') }}"></script>

<!--====== Slick js ======-->
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>

<!--====== TweenMax js ======-->
<script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>

<!--====== Slick js ======-->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>

<!--====== Magnific Popup js ======-->
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>

<!--====== Main js ======-->
<script src="{{ asset('assets/js/main.js') }}"></script>
@stack('javasc')

</body>


</html>
