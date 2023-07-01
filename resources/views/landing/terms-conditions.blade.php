<x-layouts.app>
    <div data-elementor-type="wp-page" data-elementor-id="851" class="elementor elementor-851">
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
                                        'text-right' => app()->getLocale() === 'ar',
                                    ])>@lang('landing.CONDITIONS')</h2>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-9ae7cf3 elementor-widget elementor-widget-text-editor"
                                data-id="9ae7cf3" data-element_type="widget" data-widget_type="text-editor.default">
                                <div @class([
                                    'elementor-widget-container',
                                    'text-right' => app()->getLocale() === 'ar',
                                ])>
                                    {!! $conditions !!}
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
