<x-layouts.app>
    <header class="appie-header-area appie-header-area-rtl appie-sticky">
        <div class="container">
          <div class="header-nav-box">
            <div class="row align-items-center">
              <div class="col-lg-2 col-md-4 col-sm-5 col-6 order-1 order-sm-1">
                <div class="appie-logo-box text-right">
                  <a href="#">
                    <img src="{{ asset('assets/images/logo_dark.png')}}" alt="">
                  </a>
                </div>
              </div>
              <div class="col-lg-6 col-md-1 col-sm-1 order-3 order-sm-2">
                <div class="appie-header-main-menu">
                  <ul>
                    <li>
                      <a href="{{ route('landing') }}">@lang('landing.HOME')</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">@lang('landing.ABOUT')</a>
                      </li>
                        <li>
                        <a href="{{ route('conditions') }}">@lang('landing.CONDITIONS')</a>
                      </li>

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
                  <a class="main-btn mr-30" href="{{ route('dash.login-page') }}">@lang('landing.JOINPARTNERS')</a>
                  <div class="toggle-btn ml-30 canvas_open d-lg-none d-block">
                    <i class="fa fa-bars"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    <div data-elementor-type="wp-page" data-elementor-id="851" class="elementor elementor-851 mt-5">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-82ec2f4 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
            data-id="82ec2f4" data-element_type="section" data-settings="{background_background:classic}">

            <section
                class="elementor-section elementor-inner-section elementor-element elementor-element-17f84fb elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                data-id="17f84fb" data-element_type="section">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-b20d9f9"
                        data-id="b20d9f9" data-element_type="column">
                        <div class="elementor-widget-wrap elementor-element-populated">
                            <div class="elementor-element elementor-element-b0b0082 elementor-widget elementor-widget-heading"
                                data-id="b0b0082" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 @class([
                                        'elementor-heading-title',
                                        'elementor-size-default',
                                        'mt-4',
                                        'text-right' => app()->getLocale() === 'ar',
                                    ])>@lang('landing.PRIVACY')</h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-9ae7cf3 elementor-widget elementor-widget-text-editor"
                                data-id="9ae7cf3" data-element_type="widget" data-widget_type="text-editor.default">
                                <div @class([
                                    'elementor-widget-container',
                                    'text-right' => app()->getLocale() === 'ar',
                                ])>
                                    {!! $privacy !!}
                                </div>
                            </div>
                            <a class="main-btn" href="{{ route('landing') }}">@lang('landing.HOME')
                            @if (app()->getLocale()==='ar')
                                <i class="fal fa-arrow-left"></i>
                            @else
                                <i class="fal fa-arrow-right"></i>
                            @endif</a>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </div>
</x-layouts.app>
