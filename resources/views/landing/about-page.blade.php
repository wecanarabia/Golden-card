<x-layouts.app>
     <!--====== APPIE HEADER PART ENDS ======-->

     <div class="appie-about-top-title-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div @class(["appie-about-top-title","text-right"=>app()->getLocale()==='ar'])>
                        <h2 class="title">@lang('landing.COMPANY')</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== APPIE HEADER PART ENDS ======-->


    <!--====== APPIE HEADER PART ENDS ======-->

    <section class="appie-about-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div @class(["appie-about-page-content"])>
                       <div @class(["text-right"=>app()->getLocale()==='ar'])>
                        {{-- <h3 class="title">Join our team to create the best digital solutions.</h3> --}}
                        {!! $about !!}
                        <a href="{{ route('landing') }}"> @lang('landing.HOME')
                            @if (app()->getLocale()==='ar')
                                <i class="fal fa-arrow-left"></i>
                            @else
                                <i class="fal fa-arrow-right"></i>
                            @endif
                        </a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== APPIE HEADER PART ENDS ======-->
</x-layouts.app>
