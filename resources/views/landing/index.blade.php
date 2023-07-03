<x-layouts.app>
  <!--====== PART START ======-->

  <header class="appie-header-area appie-header-area-rtl appie-sticky">
    <div class="container">
      <div class="header-nav-box">
        <div class="row align-items-center">
          <div class="col-lg-2 col-md-4 col-sm-5 col-6 order-1 order-sm-1">
            <div class="appie-logo-box text-right">
              <a href="#">
                <img src="{{ asset('assets/images/logo.png')}}" alt="">
              </a>
            </div>
          </div>
          <div class="col-lg-6 col-md-1 col-sm-1 order-3 order-sm-2">
            <div class="appie-header-main-menu">
              <ul>
                <li>
                  <a href="#">@lang('landing.HOME')</a>
                </li>
                <li>
                  <a href="#service">@lang('landing.SERVICES')</a>
                </li>
                <li>
                  <a href="#features">@lang('landing.FEATURES')</a>
                </li>

                <li><a href="#pricing">@lang('landing.PRICES')</a></li>
                @if (app()->getLocale()==='ar')
                    <li><a rel="alternate" hreflang="en" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                        {{ LaravelLocalization::getSupportedLocales()['en']['native'] }}</a>
                    </li>
                @else
                    <li><a rel="alternate" hreflang="ar" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                        {{ LaravelLocalization::getSupportedLocales()['ar']['native'] }}</a>
                    </li>
                @endif

              </ul>
            </div>
          </div>
          <div class="col-lg-4  col-md-7 col-sm-6 col-6 order-2 order-sm-3">
            <div class="appie-btn-box text-left">
              <a class="main-btn mr-30" style="background-color: #D5A559" href="{{ route('dash.login-page') }}">@lang('landing.JOINPARTNERS')</a>
              <div class="toggle-btn ml-30 canvas_open d-lg-none d-block">
                <i class="fa fa-bars"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!--====== PART ENDS ======-->

  <!--====== APPIE HERO PART START ======-->

  <section class="appie-hero-area">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div @class(["appie-hero-conten","text-right"=>app()->getLocale()==='ar'])>
            <span>@lang('landing.HELLO')</span>
            <h1 class="appie-title">@lang('landing.GCAPP')</h1>
            <p>@lang('landing.AWESOMEDISCOUNTS')</p>
            <ul>
              <li><a href="#"><i class="fab fa-apple"></i>@lang('landing.IOSDOWNLOAD')</a></li>
              <li><a class="item-2" href="https://play.google.com/store/apps/details?id=com.goldencard.wecan"><i class="fab fa-google-play"></i>@lang('landing.ANDROIDDOWNLOAD')</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="appie-hero-thumb">
            <div class="thumb wow animated fadeInUp" data-wow-duration="2000ms" data-wow-delay="200ms">
              <img src="{{ asset('assets/images/hero-thumb-1.png')}}" alt="">
            </div>
            <div class="thumb-2 wow animated fadeInRight" data-wow-duration="2000ms" data-wow-delay="600ms">
              <img src="{{ asset('assets/images/hero-thumb-2.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="hero-shape-1">
      <img src="{{ asset('assets/images/shape/shape-2.png')}}" alt="">
    </div>
    <div class="hero-shape-2">
      <img src="{{ asset('assets/images/shape/shape-3.png')}}" alt="">
    </div>
    <div class="hero-shape-3">
      <img src="{{ asset('assets/images/shape/shape-4.png')}}" alt="">
    </div>
  </section>

  <!--====== APPIE HERO PART ENDS ======-->

  <!--====== APPIE SERVICES PART START ======-->

  <section class="appie-service-area pt-90 pb-100" id="service">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="appie-section-title text-center">
            <h3 class="appie-title">@lang('landing.WHATSUBSCRIPTION')<br>@lang('landing.GCAPP')</h3>
            <p>@lang('landing.AWESOMEDISCOUNTSSHOP')</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="appie-single-service text-center mt-30 wow animated fadeInUp" data-wow-duration="2000ms"
            data-wow-delay="200ms">
            <div class="icon">
              <img src="{{ asset('assets/images/icon/1.png')}}" alt="">
              <span>{{ $data['restaurant_count'] }}</span>
            </div>
            <h4 class="appie-title">@lang('landing.RESTAURANTS')</h4>
            <p>@lang('landing.RESTAURANTSDESC')</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="appie-single-service text-center mt-30 item-2 wow animated fadeInUp" data-wow-duration="2000ms"
            data-wow-delay="400ms">
            <div class="icon">
              <img src="{{ asset('assets/images/icon/2.png')}}" alt="">
              <span>{{ $data['salon_count'] }}</span>
            </div>
            <h4 class="appie-title">@lang('landing.SALONS')</h4>
            <p>@lang('landing.SALONSDESC')</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="appie-single-service text-center mt-30 item-3 wow animated fadeInUp" data-wow-duration="2000ms"
            data-wow-delay="600ms">
            <div class="icon">
              <img src="{{ asset('assets/images/icon/3.png')}}" alt="">
              <span>{{ $data['hotel_count'] }}</span>
            </div>
            <h4 class="appie-title">@lang('landing.HOTELS')</h4>
            <p>@lang('landing.HOTELSDESC')</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="appie-single-service text-center mt-30 item-4 wow animated fadeInUp" data-wow-duration="2000ms"
            data-wow-delay="800ms">
            <div class="icon">
              <img src="{{ asset('assets/images/icon/4.png')}}" alt="">
              <span>{{ $data['shop_count'] }}</span>
            </div>
            <h4 class="appie-title">@lang('landing.STORES')</h4>
            <p>@lang('landing.STORESDESC')</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!--====== APPIE SERVICES PART ENDS ======-->

  <!--====== APPIE FEATURES PART START ======-->

  <section class="appie-features-area pt-100" id="features">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3">
          <div class="appie-features-tabs-btn">
            <div @class(["nav","flex-column nav-pills","text-right"=>app()->getLocale()==='ar']) id="v-pills-tab" role="tablist"
              aria-orientation="vertical">
              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                aria-controls="v-pills-home" aria-selected="true"><i class="fas fa-cog"></i>@lang('landing.POWERCOPON')</a>
              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                aria-controls="v-pills-profile" aria-selected="false"><i class="fas fa-exclamation-triangle"></i>@lang('landing.REALDISCOUNT')</a>
              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                aria-controls="v-pills-messages" aria-selected="false"><i class="fas fa-bell"></i>@lang('landing.SAVINGCAL')</a>
              <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                aria-controls="v-pills-settings" aria-selected="false"><i class="fas fa-lock"></i>@lang('landing.FAVORITES')</a>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="appie-features-thumb text-center wow animated fadeInUp" data-wow-duration="2000ms"
                    data-wow-delay="200ms">
                    <img src="{{ asset('assets/images/features-thumb-1.png')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div @class(["appie-features-content","wow", "animated","fadeInRight","text-right"=>app()->getLocale()==='ar']) data-wow-duration="2000ms"
                    data-wow-delay="600ms">
                    <span>@lang('landing.WHATAPART')</span>
                    <h3 class="title">@lang('landing.POWERCOPONL1') <br> @lang('landing.POWERCOPONL2')</h3>
                    <p>@lang('landing.POWERCOPONL3')</p>
                    <a class="main-btn" href="#">@lang('landing.SUBSCRIPENOW')</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="appie-features-thumb text-center animated fadeInUp" data-wow-duration="2000ms"
                    data-wow-delay="200ms">
                    <img src="{{ asset('assets/images/features-thumb-1.png')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="appie-features-content animated fadeInRight" data-wow-duration="2000ms"
                    data-wow-delay="600ms">
                    <span>@lang('landing.WHATAPART')</span>
                    <h3 class="title">@lang('landing.REALDISCOUNT')<br> @lang('landing.REALDISCOUNT1') </h3>
                    <p>@lang('landing.REALDISCOUNT2')</p>
                    <a class="main-btn" href="#">@lang('landing.SUBSCRIPENOW')</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="appie-features-thumb text-center animated fadeInUp" data-wow-duration="2000ms"
                    data-wow-delay="200ms">
                    <img src="{{ asset('assets/images/features-thumb-1.png')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="appie-features-content animated fadeInRight" data-wow-duration="2000ms"
                    data-wow-delay="600ms">
                    <span>@lang('landing.WHATAPART')</span>
                    <h3 class="title">@lang('landing.SAVINGCAL1')<br> @lang('landing.SAVINGCAL2')</h3>
                    <p>@lang('landing.SAVINGCAL3')</p>
                    <a class="main-btn" href="#">@lang('landing.SUBSCRIPENOW')</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="appie-features-thumb text-center animated fadeInUp" data-wow-duration="2000ms"
                    data-wow-delay="200ms">
                    <img src="{{ asset('assets/images/features-thumb-1.png')}}" alt="">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="appie-features-content animated fadeInRight" data-wow-duration="2000ms"
                    data-wow-delay="600ms">
                    <span>@lang('landing.WHATAPART')</span>
                    <h3 class="title">@lang('landing.FAVORITES1')<br> @lang('landing.FAVORITES2')</h3>
                    <p>@lang('landing.FAVORITES3')</p>
                    <a class="main-btn" href="#">@lang('landing.SUBSCRIPENOW')</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="features-shape-1">
      <img src="{{ asset('assets/images/shape/shape-6.png')}}" alt="">
    </div>
    <div class="features-shape-2">
      <img src="{{ asset('assets/images/shape/shape-7.png')}}" alt="">
    </div>
    <div class="features-shape-3">
      <img src="{{ asset('assets/images/shape/shape-8.png')}}" alt="">
    </div>
  </section>

  <!--====== APPIE FEATURES PART ENDS ======-->

  <!--====== APPIE PRICING PART START ======-->

  <section class="appie-pricing-area pt-90 pb-90" id="pricing">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="appie-section-title text-center">
            <h3 class="appie-title">@lang('landing.PRICING1')</h3>
            <p>@lang('landing.PRICING2')</p>
          </div>

        </div>
      </div>
      <div class="tabed-content">
        <div id="month">
          <div class="row justify-content-center">
            @foreach ($data['plansubs'] as $plan)

            <div class="col-lg-4 col-md-6 wow animated">
              <div @class(["pricing-one__single","cente","text-right"=>app()->getLocale()==='ar'])>
                <div class="pricig-heading">
                  <h6>{{ $plan->name }}</h6>
                  <div class="price-range"><sup>$</sup> <span>{{ $plan->price }}</span>
                    <p>{{ $plan->period }} Days</p>
                  </div>
                </div>
                <div class="pricig-body">
                    {!! $plan->details !!}


                </div>
                @if ($plan->sub_count===$data['max_sub_count'])
                    <div class="pricing-rebon">
                        <span>@lang('landing.PRICING3')</span>
                    </div>
                @endif
              </div>
            </div>
            @endforeach

          </div>
        </div><!-- /#month -->

      </div>
    </div>
  </section>

  <!--====== APPIE PRICING PART ENDS ======-->

  <!--====== APPIE FAQ PART START ======-->

  <section @class(['appie-faq-area','pb-95','appie-faq-area-rtl'=>app()->getLocale()==='ar'])>
    <div class="container">
      <div class="row">
        <div class="col-lg-12"></div>
          <div class="appie-section-title text-center">
            <br>
            <h3 class="appie-title">@lang('landing.FAQS1')</h3>
            <p>@lang('landing.FAQS2')</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="faq-accordion wow fadeInRight mt-30" data-wow-duration="1500ms">
            <div class="accrodion-grp wow fadeIn" data-wow-duration="1500ms" data-grp-name="faq-accrodion">
              @foreach ($data['faqs'] as $key => $faq)

              <div @class(["accrodion", "active"=>$key==0])>
                <div @class(["accrodion-inner","text-right"=>app()->getLocale()==='ar'])>
                  <div class="accrodion-title">
                    <h4>{{ $faq->question }}</h4>
                  </div>
                  <div class="accrodion-content">
                    <div class="inner">
                      {!! $faq->answer !!}
                    </div><!-- /.inner -->
                  </div>
                </div><!-- /.accrodion-inner -->
              </div>
              @endforeach

            </div>
          </div>
        </div>


      </div>
    </div>
  </section>

  <!--====== APPIE FAQ PART ENDS ======-->
  @push('javasc')
  <script>

  $('.pricig-body ul li').each(function() {
    $(this).prepend('<i class="fal fa-check"></i>');
  });
  </script>
  @endpush
</x-layouts.app>
