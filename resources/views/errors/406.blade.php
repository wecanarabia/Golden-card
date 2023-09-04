<x-layouts.app>
    <div class="error-area">
        <div class="container">
            <div class="row flex-box">
                <div class="col-xs-12 col-md-6">
                    <div @class(["error-content","text-right"=>app()->getLocale()==='ar'])>
                        <h1 class="big-text">
                            @lang('landing.ERROR')                    </h1>
                        <h3 class="medium-text">
                            @lang('landing.OOPS')                     </h3>
                        <a href="{{ route('landing') }}" class="error-button">
                            @lang('landing.HOME') </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="error-image">
                        <img src="https://quomodosoft.com/wp-content/themes/quomodo/assets/images/404.png" alt="Error illustrations">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
