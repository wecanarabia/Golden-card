<!doctype html>
<html lang="{{ app()->getLocale() == 'ar' ? 'ar' : 'en' }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">


<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>GoldenCard - البطاقة الذهبية</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom-animation.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">

    <!--====== Style css ======-->
    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('assets/css/rtl.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    @if (app()->getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    @endif
    <style id='quomodo-woocommerce-style-inline-css' type='text/css'>
        @font-face {
            font-family: "star";
            src: url("https://quomodosoft.com/wp-content/plugins/woocommerce/assets/fonts/star.eot");
            src: url("https://quomodosoft.com/wp-content/plugins/woocommerce/assets/fonts/star.eot?#iefix") format("embedded-opentype"),
                url("https://quomodosoft.com/wp-content/plugins/woocommerce/assets/fonts/star.woff") format("woff"),
                url("https://quomodosoft.com/wp-content/plugins/woocommerce/assets/fonts/star.ttf") format("truetype"),
                url("https://quomodosoft.com/wp-content/plugins/woocommerce/assets/fonts/star.svg#star") format("svg");
            font-weight: normal;
            font-style: normal;
        }
    </style>
    <style id="quomodo_opt-dynamic-css" title="dynamic-css" class="redux-options-output">
        body {}

        h1 {}

        h2 {}

        h3 {}

        h4 {}

        h5 {}

        h6 {}

        .site-branding {
            padding-top: 0px;
            padding-right: 0px;
            padding-bottom: 0px;
            padding-left: 0px;
        }

        .primary-menu ul.nav>li>a {}

        .primary-menu ul.nav ul li a {}

        .header-area {
            background-image: url('https://quomodosoft.com/wp-content/uploads/2022/12/Rectangle-4343.png');
        }

        .header-area .page-title {
            line-height: 66px;
            color: #ffffff;
            font-size: 56px;
        }

        .header-area .sub-title,
        .header-area .sub-title a {
            line-height: 30px;
            font-weight: 400;
            color: #ffffff;
            font-size: 20px;
        }

        .header-area .sub-title {
            margin-top: 0;
            margin-bottom: 0;
        }

        .post-single .post-meta,
        .post-single .post-meta a {}

        .post-single .post-title {}

        .post-single .post-desc {}

        .post-content .read-more {}

        .main-sidebar .widget-title {}

        .main-sidebar .widget,
        .main-sidebar .widget a {}

        .footer-top {
            padding-top: 100px;
            padding-right: 0px;
            padding-bottom: 100px;
            padding-left: 0px;
        }

        .widget.footer-widget .widget-title span,
        .widget.footer-widget .widget-title span:after,
        .widget.footer-widget .widget-title span:before,
        .footer-widget.widget_nav_menu ul li a:before {
            background: #3d5dff;
        }

        .widget.footer-widget .widget-title {}

        .widget.footer-widget,
        .widget.footer-widget a {}

        .copyright_text {}

        .error-area {
            background-repeat: no-repeat;
            background-attachment: scroll;
            background-position: left center;
            background-size: contain;
        }

        .error-area .big-text {
            color: #3d5dff;
        }

        .error-area .medium-text {
            color: #14212b;
        }

        .error-area .error-button {
            color: #ffffff;
        }

        .error-area .error-button:hover {
            color: #3d5dff;
        }

        .error-area .error-button {
            background-color: #3d5dff;
        }

        .error-area .error-button:hover {
            background-color: transparent;
        }

        .error-area .error-button {
            border-top: 1px solid #3d5dff;
            border-bottom: 1px solid #3d5dff;
            border-left: 1px solid #3d5dff;
            border-right: 1px solid #3d5dff;
        }

        a#scrollUp {
            color: #3D5DFF;
        }

        a#scrollUp:hover {
            color: #ffffff;
        }

        a#scrollUp:hover,
        #scrollUp:before {
            background: #3D5DFF;
        }

        a#scrollUp {
            height: 60px;
            width: 60px;
        }

        a#scrollUp {
            margin-right: 0px;
            margin-bottom: 85px;
        }

        #scrollUp {
            border-top: 1px solid #3d5dff;
            border-bottom: 1px solid #3d5dff;
            border-left: 1px solid #3d5dff;
            border-right: 1px solid #3d5dff;
        }
    </style>
    <style>
        .elementor-widget-image-box .elementor-image-box-content {
            width: 100%
        }

        @media (min-width:768px) {

            .elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper,
            .elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
                display: flex
            }

            .elementor-widget-image-box.elementor-position-right .elementor-image-box-wrapper {
                text-align: right;
                flex-direction: row-reverse
            }

            .elementor-widget-image-box.elementor-position-left .elementor-image-box-wrapper {
                text-align: left;
                flex-direction: row
            }

            .elementor-widget-image-box.elementor-position-top .elementor-image-box-img {
                margin: auto
            }

            .elementor-widget-image-box.elementor-vertical-align-top .elementor-image-box-wrapper {
                align-items: flex-start
            }

            .elementor-widget-image-box.elementor-vertical-align-middle .elementor-image-box-wrapper {
                align-items: center
            }

            .elementor-widget-image-box.elementor-vertical-align-bottom .elementor-image-box-wrapper {
                align-items: flex-end
            }
        }

        @media (max-width:767px) {
            .elementor-widget-image-box .elementor-image-box-img {
                margin-left: auto !important;
                margin-right: auto !important;
                margin-bottom: 15px
            }
        }

        .elementor-widget-image-box .elementor-image-box-img {
            display: inline-block
        }

        .elementor-widget-image-box .elementor-image-box-title a {
            color: inherit
        }

        .elementor-widget-image-box .elementor-image-box-wrapper {
            text-align: center
        }

        .elementor-widget-image-box .elementor-image-box-description {
            margin: 0
        }
    </style>
    <style id='elementor-frontend-inline-css' type='text/css'>
        .elementor-kit-5 {
            --e-global-color-primary: #6EC1E4;
            --e-global-color-secondary: #54595F;
            --e-global-color-text: #7A7A7A;
            --e-global-color-accent: #61CE70;
            --e-global-color-e87420b: #3D5DFF;
            --e-global-color-bd85462: #334968;
            --e-global-color-92aab17: #00C673;
            --e-global-typography-primary-font-family: "Poppins";
            --e-global-typography-primary-font-weight: 600;
            --e-global-typography-secondary-font-family: "Poppins";
            --e-global-typography-secondary-font-weight: 400;
            --e-global-typography-text-font-family: "Poppins";
            --e-global-typography-text-font-weight: 400;
            --e-global-typography-accent-font-family: "Roboto";
            --e-global-typography-accent-font-weight: 500;
            --e-global-typography-465e0ba-font-family: "Poppins";
            --e-global-typography-465e0ba-font-size: 24px;
            --e-global-typography-465e0ba-font-weight: 600;
            font-family: "Poppins", Sans-serif;
            font-size: 16px;
        }

        .elementor-kit-5 a {
            font-family: "Poppins", Sans-serif;
        }

        .elementor-kit-5 h1 {
            font-family: "Poppins", Sans-serif;
            font-size: 50px;
        }

        .elementor-kit-5 h2 {
            font-family: "Poppins", Sans-serif;
            font-size: 30px;
        }

        .elementor-kit-5 h3 {
            font-size: 26px;
        }

        .elementor-kit-5 h4 {
            font-size: 20px;
        }

        .elementor-kit-5 h5 {
            font-size: 18px;
        }

        .elementor-section.elementor-section-boxed>.elementor-container {
            max-width: 1140px;
        }

        .e-con {
            --container-max-width: 1140px;
        }

        .elementor-widget:not(:last-child) {
            margin-bottom: 20px;
        }

        .elementor-element {
            --widgets-spacing: 20px;
        }

            {}

        h1.entry-title {
            display: var(--page-title-display);
        }

        @media(max-width:1024px) {
            .elementor-section.elementor-section-boxed>.elementor-container {
                max-width: 1024px;
            }

            .e-con {
                --container-max-width: 1024px;
            }
        }

        @media(max-width:767px) {
            .elementor-section.elementor-section-boxed>.elementor-container {
                max-width: 767px;
            }

            .e-con {
                --container-max-width: 767px;
            }
        }

        .elementor-widget-heading .elementor-heading-title {
            color: var(--e-global-color-primary);
            font-family: var(--e-global-typography-primary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-primary-font-weight);
        }

        .elementor-widget-image .widget-image-caption {
            color: var(--e-global-color-text);
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-text-editor {
            color: var(--e-global-color-text);
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-text-editor.elementor-drop-cap-view-stacked .elementor-drop-cap {
            background-color: var(--e-global-color-primary);
        }

        .elementor-widget-text-editor.elementor-drop-cap-view-framed .elementor-drop-cap,
        .elementor-widget-text-editor.elementor-drop-cap-view-default .elementor-drop-cap {
            color: var(--e-global-color-primary);
            border-color: var(--e-global-color-primary);
        }

        .elementor-widget-button .elementor-button {
            font-family: var(--e-global-typography-accent-font-family), Sans-serif;
            font-weight: var(--e-global-typography-accent-font-weight);
            background-color: var(--e-global-color-accent);
        }

        .elementor-widget-divider {
            --divider-color: var(--e-global-color-secondary);
        }

        .elementor-widget-divider .elementor-divider__text {
            color: var(--e-global-color-secondary);
            font-family: var(--e-global-typography-secondary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-secondary-font-weight);
        }

        .elementor-widget-divider.elementor-view-stacked .elementor-icon {
            background-color: var(--e-global-color-secondary);
        }

        .elementor-widget-divider.elementor-view-framed .elementor-icon,
        .elementor-widget-divider.elementor-view-default .elementor-icon {
            color: var(--e-global-color-secondary);
            border-color: var(--e-global-color-secondary);
        }

        .elementor-widget-divider.elementor-view-framed .elementor-icon,
        .elementor-widget-divider.elementor-view-default .elementor-icon svg {
            fill: var(--e-global-color-secondary);
        }

        .elementor-widget-image-box .elementor-image-box-title {
            color: var(--e-global-color-primary);
            font-family: var(--e-global-typography-primary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-primary-font-weight);
        }

        .elementor-widget-image-box .elementor-image-box-description {
            color: var(--e-global-color-text);
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-icon.elementor-view-stacked .elementor-icon {
            background-color: var(--e-global-color-primary);
        }

        .elementor-widget-icon.elementor-view-framed .elementor-icon,
        .elementor-widget-icon.elementor-view-default .elementor-icon {
            color: var(--e-global-color-primary);
            border-color: var(--e-global-color-primary);
        }

        .elementor-widget-icon.elementor-view-framed .elementor-icon,
        .elementor-widget-icon.elementor-view-default .elementor-icon svg {
            fill: var(--e-global-color-primary);
        }

        .elementor-widget-icon-box.elementor-view-stacked .elementor-icon {
            background-color: var(--e-global-color-primary);
        }

        .elementor-widget-icon-box.elementor-view-framed .elementor-icon,
        .elementor-widget-icon-box.elementor-view-default .elementor-icon {
            fill: var(--e-global-color-primary);
            color: var(--e-global-color-primary);
            border-color: var(--e-global-color-primary);
        }

        .elementor-widget-icon-box .elementor-icon-box-title {
            color: var(--e-global-color-primary);
        }

        .elementor-widget-icon-box .elementor-icon-box-title,
        .elementor-widget-icon-box .elementor-icon-box-title a {
            font-family: var(--e-global-typography-primary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-primary-font-weight);
        }

        .elementor-widget-icon-box .elementor-icon-box-description {
            color: var(--e-global-color-text);
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-star-rating .elementor-star-rating__title {
            color: var(--e-global-color-text);
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-image-gallery .gallery-item .gallery-caption {
            font-family: var(--e-global-typography-accent-font-family), Sans-serif;
            font-weight: var(--e-global-typography-accent-font-weight);
        }

        .elementor-widget-icon-list .elementor-icon-list-item:not(:last-child):after {
            border-color: var(--e-global-color-text);
        }

        .elementor-widget-icon-list .elementor-icon-list-icon i {
            color: var(--e-global-color-primary);
        }

        .elementor-widget-icon-list .elementor-icon-list-icon svg {
            fill: var(--e-global-color-primary);
        }

        .elementor-widget-icon-list .elementor-icon-list-item>.elementor-icon-list-text,
        .elementor-widget-icon-list .elementor-icon-list-item>a {
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-icon-list .elementor-icon-list-text {
            color: var(--e-global-color-secondary);
        }

        .elementor-widget-progress .elementor-progress-wrapper .elementor-progress-bar {
            background-color: var(--e-global-color-primary);
        }

        .elementor-widget-progress .elementor-title {
            color: var(--e-global-color-primary);
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-testimonial .elementor-testimonial-content {
            color: var(--e-global-color-text);
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-testimonial .elementor-testimonial-name {
            color: var(--e-global-color-primary);
            font-family: var(--e-global-typography-primary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-primary-font-weight);
        }

        .elementor-widget-testimonial .elementor-testimonial-job {
            color: var(--e-global-color-secondary);
            font-family: var(--e-global-typography-secondary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-secondary-font-weight);
        }

        .elementor-widget-tabs .elementor-tab-title,
        .elementor-widget-tabs .elementor-tab-title a {
            color: var(--e-global-color-primary);
        }

        .elementor-widget-tabs .elementor-tab-title.elementor-active,
        .elementor-widget-tabs .elementor-tab-title.elementor-active a {
            color: var(--e-global-color-accent);
        }

        .elementor-widget-tabs .elementor-tab-title {
            font-family: var(--e-global-typography-primary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-primary-font-weight);
        }

        .elementor-widget-tabs .elementor-tab-content {
            color: var(--e-global-color-text);
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-accordion .elementor-accordion-icon,
        .elementor-widget-accordion .elementor-accordion-title {
            color: var(--e-global-color-primary);
        }

        .elementor-widget-accordion .elementor-accordion-icon svg {
            fill: var(--e-global-color-primary);
        }

        .elementor-widget-accordion .elementor-active .elementor-accordion-icon,
        .elementor-widget-accordion .elementor-active .elementor-accordion-title {
            color: var(--e-global-color-accent);
        }

        .elementor-widget-accordion .elementor-active .elementor-accordion-icon svg {
            fill: var(--e-global-color-accent);
        }

        .elementor-widget-accordion .elementor-accordion-title {
            font-family: var(--e-global-typography-primary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-primary-font-weight);
        }

        .elementor-widget-accordion .elementor-tab-content {
            color: var(--e-global-color-text);
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-toggle .elementor-toggle-title,
        .elementor-widget-toggle .elementor-toggle-icon {
            color: var(--e-global-color-primary);
        }

        .elementor-widget-toggle .elementor-toggle-icon svg {
            fill: var(--e-global-color-primary);
        }

        .elementor-widget-toggle .elementor-tab-title.elementor-active a,
        .elementor-widget-toggle .elementor-tab-title.elementor-active .elementor-toggle-icon {
            color: var(--e-global-color-accent);
        }

        .elementor-widget-toggle .elementor-toggle-title {
            font-family: var(--e-global-typography-primary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-primary-font-weight);
        }

        .elementor-widget-toggle .elementor-tab-content {
            color: var(--e-global-color-text);
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-alert .elementor-alert-title {
            font-family: var(--e-global-typography-primary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-primary-font-weight);
        }

        .elementor-widget-alert .elementor-alert-description {
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-widget-breadcrumbs {
            font-family: var(--e-global-typography-secondary-font-family), Sans-serif;
            font-weight: var(--e-global-typography-secondary-font-weight);
        }

        .elementor-widget-Element_Ready_Social_Share_Widget .element-ready-social-style-4 .element-ready-social-icon i::after {
            border-left-color: var(--e-global-color-primary);
        }

        .elementor-widget-Element_Ready_Social_Share_Widget .element__ready__socials__buttons a:before {
            background: var(--e-global-color-primary);
        }

        .elementor-widget-text-path {
            font-family: var(--e-global-typography-text-font-family), Sans-serif;
            font-weight: var(--e-global-typography-text-font-weight);
        }

        .elementor-851 .elementor-element.elementor-element-14ddee6 .element-ready-live-btn-wrp .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-14ddee6 .element-ready-live-btn-wrp:hover .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-14ddee6:not(.elementor-motion-effects-element-type-background),
        .elementor-851 .elementor-element.elementor-element-14ddee6>.elementor-motion-effects-container>.elementor-motion-effects-layer {
            background-color: #F6F8FF;
            background-image: url("https://quomodosoft.com/wp-content/uploads/2021/10/Center-shape-1.png");
            background-position: top right;
            background-repeat: no-repeat;
            background-size: auto;
        }

        .elementor-851 .elementor-element.elementor-element-14ddee6 {
            transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
            padding: 100px 0px 100px 0px;
        }

        .elementor-851 .elementor-element.elementor-element-14ddee6>.elementor-background-overlay {
            transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
        }

        .elementor-851 .elementor-element.elementor-element-17f84fb .element-ready-live-btn-wrp .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-17f84fb .element-ready-live-btn-wrp:hover .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-b0b0082 .elementor-heading-title {
            color: #1D3557;
            font-family: "Poppins", Sans-serif;
            font-size: 48px;
            font-weight: 700;
        }

        .elementor-851 .elementor-element.elementor-element-9ae7cf3 {
            color: #1D3557AD;
            font-family: "Poppins", Sans-serif;
            font-size: 18px;
            font-weight: 400;
        }

        .elementor-851 .elementor-element.elementor-element-9ae7cf3>.elementor-widget-container {
            padding: 4px 0px 0px 0px;
        }

        .elementor-851 .elementor-element.elementor-element-7b6a52c .element-ready-live-btn-wrp .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-7b6a52c .element-ready-live-btn-wrp:hover .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-7b6a52c {
            margin-top: 0px;
            margin-bottom: 30px;
        }

        .elementor-851 .elementor-element.elementor-element-1e68a99 .elementor-heading-title {
            color: #1D3557;
            font-family: "Poppins", Sans-serif;
            font-size: 24px;
            line-height: 1.3em;
        }

        .elementor-851 .elementor-element.elementor-element-b803463 .element-ready-live-btn-wrp .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-b803463 .element-ready-live-btn-wrp:hover .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-b803463 {
            margin-top: 0px;
            margin-bottom: 30px;
        }

        .elementor-851 .elementor-element.elementor-element-b4176c4 .elementor-heading-title {
            color: #1D3557;
            font-family: "Poppins", Sans-serif;
            font-size: 24px;
            line-height: 1.3em;
        }

        .elementor-851 .elementor-element.elementor-element-940b061 .elementor-icon-list-icon i {
            color: #1D6DF8;
            transition: color 0.3s;
        }

        .elementor-851 .elementor-element.elementor-element-940b061 .elementor-icon-list-icon svg {
            fill: #1D6DF8;
            transition: fill 0.3s;
        }

        .elementor-851 .elementor-element.elementor-element-940b061 {
            --e-icon-list-icon-size: 14px;
            --icon-vertical-offset: 0px;
        }

        .elementor-851 .elementor-element.elementor-element-940b061 .elementor-icon-list-text {
            transition: color 0.3s;
        }

        .elementor-851 .elementor-element.elementor-element-b477ca6 .element-ready-live-btn-wrp .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-b477ca6 .element-ready-live-btn-wrp:hover .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-b477ca6 {
            margin-top: 0px;
            margin-bottom: 30px;
        }

        .elementor-851 .elementor-element.elementor-element-5a55463 .elementor-heading-title {
            color: #1D3557;
            font-family: "Poppins", Sans-serif;
            font-size: 24px;
            line-height: 1.3em;
        }

        .elementor-851 .elementor-element.elementor-element-5f8b77e .elementor-icon-list-icon i {
            color: #DE2B36;
            transition: color 0.3s;
        }

        .elementor-851 .elementor-element.elementor-element-5f8b77e .elementor-icon-list-icon svg {
            fill: #DE2B36;
            transition: fill 0.3s;
        }

        .elementor-851 .elementor-element.elementor-element-5f8b77e {
            --e-icon-list-icon-size: 14px;
            --icon-vertical-offset: 0px;
        }

        .elementor-851 .elementor-element.elementor-element-5f8b77e .elementor-icon-list-text {
            transition: color 0.3s;
        }

        .elementor-851 .elementor-element.elementor-element-abe01ea .element-ready-live-btn-wrp .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-abe01ea .element-ready-live-btn-wrp:hover .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-abe01ea {
            margin-top: 0px;
            margin-bottom: 30px;
        }

        .elementor-851 .elementor-element.elementor-element-a2defc0>.elementor-container>.elementor-column>.elementor-widget-wrap {
            align-content: center;
            align-items: center;
        }

        .elementor-851 .elementor-element.elementor-element-a2defc0 .element-ready-live-btn-wrp .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-a2defc0 .element-ready-live-btn-wrp:hover .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-851 .elementor-element.elementor-element-a2defc0:not(.elementor-motion-effects-element-type-background),
        .elementor-851 .elementor-element.elementor-element-a2defc0>.elementor-motion-effects-container>.elementor-motion-effects-layer {
            background-color: #FFFFFF;
        }

        .elementor-851 .elementor-element.elementor-element-a2defc0,
        .elementor-851 .elementor-element.elementor-element-a2defc0>.elementor-background-overlay {
            border-radius: 30px 30px 30px 30px;
        }

        .elementor-851 .elementor-element.elementor-element-a2defc0 {
            transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
            padding: 65px 0px 58px 60px;
        }

        .elementor-851 .elementor-element.elementor-element-a2defc0>.elementor-background-overlay {
            transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
        }

        .elementor-851 .elementor-element.elementor-element-0bfcbff {
            text-align: center;
        }

        .elementor-851 .elementor-element.elementor-element-0bfcbff>.elementor-widget-container {
            margin: 0px -20px 0px -45px;
        }

        .elementor-851 .elementor-element.elementor-element-ad5309e>.elementor-element-populated {
            padding: 0px 0px 0px 50px;
        }

        .elementor-851 .elementor-element.elementor-element-4a6a7dd .area__title {
            font-family: "Roboto", Sans-serif;
            font-size: 60px;
            font-weight: 500;
            margin: 0px 0px 18px 0px;
        }

        .elementor-851 .elementor-element.elementor-element-4a6a7dd .area__title:before {
            position: relative;
            text-align: left;
        }

        .elementor-851 .elementor-element.elementor-element-4a6a7dd .area__title:after {
            position: relative;
            text-align: left;
        }

        .elementor-851 .elementor-element.elementor-element-4a6a7dd .area__subtitle {
            color: #4D77FC;
            font-family: "Roboto", Sans-serif;
            font-size: 18px;
            font-weight: 500;
            display: block;
            margin: 0px 0px 10px 0px;
            padding: 0px 0px 0px 0px;
        }

        .elementor-851 .elementor-element.elementor-element-4a6a7dd .area__subtitle:before {
            position: relative;
            text-align: left;
        }

        .elementor-851 .elementor-element.elementor-element-4a6a7dd .area__subtitle:after {
            position: relative;
            text-align: left;
        }

        .elementor-851 .elementor-element.elementor-element-4a6a7dd .area__content {
            font-size: 18px;
            line-height: 30px;
        }

        .elementor-851 .elementor-element.elementor-element-4a6a7dd {
            text-align: left;
            position: initial;
        }

        .elementor-851 .elementor-element.elementor-element-4a6a7dd>.elementor-widget-container {
            padding: 0px 150px 0px 0px;
        }

        .elementor-851 .elementor-element.elementor-element-d631906 {
            text-align: left;
        }

        .elementor-851 .elementor-element.elementor-element-d631906>.elementor-widget-container {
            margin: 10px 0px 0px 0px;
        }

        @media(max-width:1024px) and (min-width:768px) {
            .elementor-851 .elementor-element.elementor-element-5121358 {
                width: 100%;
            }

            .elementor-851 .elementor-element.elementor-element-ad5309e {
                width: 100%;
            }
        }

        @media(max-width:1200px) {
            .elementor-851 .elementor-element.elementor-element-a2defc0 {
                margin-top: 0px;
                margin-bottom: 0px;
            }

            .elementor-851 .elementor-element.elementor-element-0bfcbff>.elementor-widget-container {
                margin: 0px 0px 0px 0px;
            }

            .elementor-851 .elementor-element.elementor-element-4a6a7dd .area__title {
                font-size: 50px;
            }
        }

        @media(max-width:1024px) {
            .elementor-851 .elementor-element.elementor-element-b0b0082 .elementor-heading-title {
                font-size: 36px;
            }

            .elementor-851 .elementor-element.elementor-element-a2defc0 {
                padding: 80px 30px 80px 30px;
            }

            .elementor-851 .elementor-element.elementor-element-0bfcbff>.elementor-widget-container {
                margin: 0px 0px 0px 0px;
            }

            .elementor-851 .elementor-element.elementor-element-ad5309e>.elementor-element-populated {
                padding: 0px 0px 0px 0px;
            }

            .elementor-851 .elementor-element.elementor-element-4a6a7dd {
                text-align: center;
            }

            .elementor-851 .elementor-element.elementor-element-4a6a7dd>.elementor-widget-container {
                padding: 30px 0px 0px 0px;
            }
        }

        @media(max-width:767px) {
            .elementor-851 .elementor-element.elementor-element-b0b0082 .elementor-heading-title {
                font-size: 30px;
            }

            .elementor-851 .elementor-element.elementor-element-1e68a99 .elementor-heading-title {
                font-size: 24px;
            }

            .elementor-851 .elementor-element.elementor-element-b4176c4 .elementor-heading-title {
                font-size: 24px;
            }

            .elementor-851 .elementor-element.elementor-element-5a55463 .elementor-heading-title {
                font-size: 24px;
            }

            .elementor-851 .elementor-element.elementor-element-a2defc0 {
                padding: 50px 20px 50px 20px;
            }

            .elementor-851 .elementor-element.elementor-element-0bfcbff>.elementor-widget-container {
                margin: 0px 0px 0px 0px;
            }

            .elementor-851 .elementor-element.elementor-element-4a6a7dd .area__title {
                font-size: 34px;
                line-height: 44px;
            }
        }

        @media(min-width:768px) {
            .elementor-851 .elementor-element.elementor-element-5121358 {
                width: 27.202%;
            }

            .elementor-851 .elementor-element.elementor-element-ad5309e {
                width: 72.798%;
            }
        }

        @media(min-width:1367px) {

            .elementor-851 .elementor-element.elementor-element-14ddee6:not(.elementor-motion-effects-element-type-background),
            .elementor-851 .elementor-element.elementor-element-14ddee6>.elementor-motion-effects-container>.elementor-motion-effects-layer {
                background-attachment: scroll;
            }
        }

        /* Start custom CSS for Element_Ready_Area_Title_Widget, class: .elementor-element-4a6a7dd */
        .elementor-851 .elementor-element.elementor-element-4a6a7dd .area__subtitle {
            line-height: 1;
            position: relative !important;
            display: inline-block;
            left: 0;
        }

        /* End custom CSS */
    </style>
    <link rel='stylesheet' id='affwp-forms-css'
        href='https://quomodosoft.com/wp-content/plugins/affiliate-wp/assets/css/forms.min.css?ver=2.7.6'
        type='text/css' media='all' />
    <link rel='stylesheet' id='element-ready-widgets-css'
        href='https://quomodosoft.com/wp-content/plugins/element-ready-lite/assets/css/widgets.min.css?ver=1686351739'
        type='text/css' media='all' />
    <link rel='stylesheet' id='quomodo-fonts-css'
        href='//fonts.googleapis.com/css?family=Poppins%3A500%2C600%2C700%7CRubik%3A400%2C500%7CRoboto%3A300%2C400%2C500%2C700&#038;subset=latin%2Clatin-ext&#038;ver=9645362ea4cce97337b7b107a0f4c810'
        type='text/css' media='all' />
    <link rel='stylesheet' id='font-awesome-5-css'
        href='https://quomodosoft.com/wp-content/themes/quomodo/assets/css/font-awesome.css?ver=3.0.0' type='text/css'
        media='all' />

    <link rel='stylesheet' id='slicknav-css'
        href='https://quomodosoft.com/wp-content/themes/quomodo/assets/css/slicknav.css?ver=1.0.10' type='text/css'
        media='all' />
    <link rel='stylesheet' id='quomodo-theme-css'
        href='https://quomodosoft.com/wp-content/themes/quomodo/assets/css/theme.css?ver=1.0.0' type='text/css'
        media='all' />
    <link rel='stylesheet' id='normalizer-css'
        href='https://quomodosoft.com/wp-content/themes/quomodo/assets/css/normalize.css?ver=1.0.0' type='text/css'
        media='all' />
    <link rel='stylesheet' id='quomodo-style-css'
        href='https://quomodosoft.com/wp-content/themes/quomodo/style.css?ver=9645362ea4cce97337b7b107a0f4c810'
        type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-css'
        href='https://quomodosoft.com/wp-content/plugins/elementor/assets/lib/eicons/css/elementor-icons.min.css?ver=5.20.0'
        type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css'
        href='https://quomodosoft.com/wp-content/uploads/elementor/css/custom-frontend-lite.min.css?ver=1681360712'
        type='text/css' media='all' />
    <link rel="alternate" type="application/rss+xml" title="QuomodoSoft &raquo; Feed"
        href="https://quomodosoft.com/feed/" />
    <link rel="alternate" type="application/rss+xml" title="QuomodoSoft &raquo; Comments Feed"
        href="https://quomodosoft.com/comments/feed/" />
    <link rel="alternate" type="application/rss+xml" title="QuomodoSoft &raquo; Refund Policy Comments Feed"
        href="https://quomodosoft.com/refund_returns/feed/" />

    <style>
        .elementor-section:hover .element-ready-live-btn-wrp {
            opacity: 1;
            right: 0;
        }

        .error-area .error-button {
            background-color: #3d5dff;
            background-color: transparent;
            background-image: linear-gradient(90deg, #5F95FC 0%, #3D5DFF 100%);
            border-radius: 6px 6px 6px 6px;
        }

        .error-area .error-button:hover {
            color: #fff;
            background: #1D3557;
        }

        .elementor-2149 .elementor-element.elementor-element-2dbf93c2 .tab__nav li.active .tab__button {
            background: linear-gradient(90deg, #5F95FC 0%, #3D5DFF 100%);
            color: #fff;
        }
    </style>
    <style id="elementor-post-469">
        .elementor-469 .elementor-element.elementor-element-82ec2f4 {
            overflow: hidden;
            transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
            margin-top: 0px;
            margin-bottom: 0px;
            padding: 60px 0px 20px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-82ec2f4 .element-ready-live-btn-wrp .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-469 .elementor-element.elementor-element-82ec2f4 .element-ready-live-btn-wrp:hover .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-469 .elementor-element.elementor-element-82ec2f4:not(.elementor-motion-effects-element-type-background),
        .elementor-469 .elementor-element.elementor-element-82ec2f4>.elementor-motion-effects-container>.elementor-motion-effects-layer {
            background-color: #FFFFFF;
        }

        .elementor-469 .elementor-element.elementor-element-82ec2f4>.elementor-background-overlay {
            transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
        }

        .elementor-469 .elementor-element.elementor-element-7bbcd6a .element-ready-live-btn-wrp .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-469 .elementor-element.elementor-element-7bbcd6a .element-ready-live-btn-wrp:hover .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-469 .elementor-element.elementor-element-7bbcd6a:not(.elementor-motion-effects-element-type-background),
        .elementor-469 .elementor-element.elementor-element-7bbcd6a>.elementor-motion-effects-container>.elementor-motion-effects-layer {
            background-color: #FFFFFF;
        }

        .elementor-469 .elementor-element.elementor-element-7bbcd6a {
            transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
            margin-top: 0px;
            margin-bottom: 0px;
            padding: 0px 0px 0px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-7bbcd6a>.elementor-background-overlay {
            transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
        }

        .elementor-469 .elementor-element.elementor-element-dd18121>.elementor-element-populated {
            margin: 0px 0px 0px 0px;
            --e-column-margin-right: 0px;
            --e-column-margin-left: 0px;
        }

        .elementor-469 .elementor-element.elementor-element-d49d22e {
            text-align: left;
        }

        .elementor-469 .elementor-element.elementor-element-d49d22e img {
            width: 100%;
        }

        .elementor-469 .elementor-element.elementor-element-d49d22e>.elementor-widget-container {
            margin: 0px 0px 3px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-5f9dcaa {
            color: #334968;
            font-family: "Poppins", Sans-serif;
            font-size: 14px;
            font-weight: 400;
            line-height: 22px;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons .elementor-repeater-item-885a1c5 a {
            color: #1877F2;
            background-color: #FFFFFF;
            border-style: solid;
            border-width: 1px 1px 1px 1px;
            border-color: #1877F2;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons .elementor-repeater-item-885a1c5 a:hover {
            color: #FFFFFF;
            background-color: #1877F2;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons .elementor-repeater-item-00e5634 a {
            color: #1DA1F2;
            background-color: #FFFFFF;
            border-style: solid;
            border-width: 1px 1px 1px 1px;
            border-color: #1DA1F2;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons .elementor-repeater-item-00e5634 a:hover {
            color: #FFFFFF;
            background-color: #1DA1F2;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons .elementor-repeater-item-fd7c3ce a {
            color: #E1306C;
            background-color: #FFFFFF;
            border-style: solid;
            border-width: 1px 1px 1px 1px;
            border-color: #E1306C;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons .elementor-repeater-item-fd7c3ce a:hover {
            color: #FFFFFF;
            background-color: #E1306C;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons ul li i {
            font-size: 15px;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons ul li a i {
            padding: 0px 0px 0px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons ul li {
            display: inline-block;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons ul li a {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin: 0px 5px 0px 0px;
            padding: 4px 0px 0px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons ul li a,
        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons ul li a:before,
        .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons ul li a:after {
            transition: 0.3s;
        }

        .elementor-469 .elementor-element.elementor-element-f92f28e>.elementor-widget-container {
            margin: 20px 0px 0px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-9b15a47 {
            color: #1D3557;
            font-family: "Poppins", Sans-serif;
            font-size: 14px;
            font-weight: 500;
        }

        .elementor-469 .elementor-element.elementor-element-9b15a47>.elementor-widget-container {
            margin: 10px 0px 0px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-fabd814 .elementor-heading-title {
            color: #1D3557;
            font-family: "Poppins", Sans-serif;
            font-size: 18px;
            font-weight: 600;
        }

        .elementor-469 .elementor-element.elementor-element-ba52109 .single__menu__nav ul.element__ready__menu {
            display: block;
            float: none;
            list-style: none;
        }

        .elementor-469 .elementor-element.elementor-element-ba52109 .single__menu__nav ul.element__ready__menu li a {
            color: #566881;
            font-family: "Poppins", Sans-serif;
            display: block;
            position: relative;
            margin: 0px 0px 12px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-ba52109 .single__menu__nav ul.element__ready__menu li {
            display: block;
        }

        .elementor-469 .elementor-element.elementor-element-ba52109 .single__menu__nav ul.element__ready__menu>li:hover>a {
            color: #3D5DFF;
        }

        .elementor-469 .elementor-element.elementor-element-fda3257>.elementor-element-populated {
            padding: 10px 60px 0px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-712f106 .elementor-heading-title {
            color: #1D3557;
            font-family: "Poppins", Sans-serif;
            font-size: 18px;
            font-weight: 600;
        }

        .elementor-469 .elementor-element.elementor-element-d83cd0a .single__menu__nav ul.element__ready__menu {
            display: block;
            float: none;
            list-style: none;
        }

        .elementor-469 .elementor-element.elementor-element-d83cd0a .single__menu__nav ul.element__ready__menu li a {
            color: #566881;
            font-family: "Poppins", Sans-serif;
            display: block;
            position: relative;
            margin: 0px 0px 12px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-d83cd0a .single__menu__nav ul.element__ready__menu li {
            display: block;
        }

        .elementor-469 .elementor-element.elementor-element-d83cd0a .single__menu__nav ul.element__ready__menu>li:hover>a {
            color: #3D5DFF;
        }

        .elementor-469 .elementor-element.elementor-element-152bbdc .elementor-heading-title {
            color: #1D3557;
            font-family: "Poppins", Sans-serif;
            font-size: 18px;
            font-weight: 600;
        }

        .elementor-469 .elementor-element.elementor-element-82c74d7 .single__menu__nav ul.element__ready__menu {
            display: block;
            float: none;
            list-style: none;
        }

        .elementor-469 .elementor-element.elementor-element-82c74d7 .single__menu__nav ul.element__ready__menu li a {
            color: #566881;
            font-family: "Poppins", Sans-serif;
            display: block;
            position: relative;
            margin: 0px 0px 12px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-82c74d7 .single__menu__nav ul.element__ready__menu li {
            display: block;
        }

        .elementor-469 .elementor-element.elementor-element-82c74d7 .single__menu__nav ul.element__ready__menu>li:hover>a {
            color: #3D5DFF;
        }

        .elementor-469 .elementor-element.elementor-element-230c7b0 .element-ready-live-btn-wrp .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-469 .elementor-element.elementor-element-230c7b0 .element-ready-live-btn-wrp:hover .element-ready-btn-link {
            border-radius: 10%;
        }

        .elementor-469 .elementor-element.elementor-element-230c7b0:not(.elementor-motion-effects-element-type-background),
        .elementor-469 .elementor-element.elementor-element-230c7b0>.elementor-motion-effects-container>.elementor-motion-effects-layer {
            background-color: #FFFFFF;
        }

        .elementor-469 .elementor-element.elementor-element-230c7b0 {
            border-style: solid;
            border-width: 1px 0px 0px 0px;
            border-color: #F0F0F0;
            transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s;
            padding: 15px 0px 35px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-230c7b0>.elementor-background-overlay {
            transition: background 0.3s, border-radius 0.3s, opacity 0.3s;
        }

        .elementor-469 .elementor-element.elementor-element-d9382d3 .single__menu__nav ul.element__ready__menu {
            display: flex;
            float: none;
            list-style: none;
        }

        .elementor-469 .elementor-element.elementor-element-d9382d3 .single__menu__nav ul.element__ready__menu li {
            margin: 0px 0px 0px 0px;
            display: block;
        }

        .elementor-469 .elementor-element.elementor-element-d9382d3 .single__menu__nav ul.element__ready__menu li a {
            color: #566881;
            font-family: "Poppins", Sans-serif;
            display: block;
            position: relative;
            margin: 0px 32px 0px 0px;
        }

        .elementor-469 .elementor-element.elementor-element-d9382d3 .single__menu__nav ul.element__ready__menu>li:hover>a {
            color: #3D5DFF;
        }

        .elementor-469 .elementor-element.elementor-element-99bb42d {
            text-align: right;
        }

        .elementor-469 .elementor-element.elementor-element-99bb42d .elementor-heading-title {
            color: #566881;
            font-family: "Poppins", Sans-serif;
            font-size: 16px;
            font-weight: 400;
            line-height: 27px;
        }

        @media(max-width:1024px) {
            .elementor-469 .elementor-element.elementor-element-d9382d3 .single__menu__nav ul.element__ready__menu {
                display: block;
                width: 581px;
                text-align: left;
            }

            .elementor-469 .elementor-element.elementor-element-d9382d3 .single__menu__nav ul.element__ready__menu li {
                display: inline-block;
            }

            .elementor-469 .elementor-element.elementor-element-d9382d3 .single__menu__nav ul.element__ready__menu li a {
                display: inline-block;
                margin: 0px 10px 0px 0px;
            }
        }

        @media(max-width:767px) {
            .elementor-469 .elementor-element.elementor-element-dd18121 {
                width: 100%;
            }

            .elementor-469 .elementor-element.elementor-element-d49d22e {
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-5f9dcaa {
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-f92f28e .element__ready__socials__buttons ul {
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-9b15a47 {
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-0c4bd58 {
                width: 100%;
            }

            .elementor-469 .elementor-element.elementor-element-fabd814 {
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-ba52109 .single__menu__nav ul.element__ready__menu {
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-fda3257 {
                width: 100%;
            }

            .elementor-469 .elementor-element.elementor-element-712f106 {
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-d83cd0a .single__menu__nav ul.element__ready__menu {
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-2bddb50 {
                width: 100%;
            }

            .elementor-469 .elementor-element.elementor-element-152bbdc {
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-82c74d7 .single__menu__nav ul.element__ready__menu {
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-60c4665 {
                width: 100%;
            }

            .elementor-469 .elementor-element.elementor-element-d9382d3 .single__menu__nav ul.element__ready__menu {
                width: 330px;
                text-align: center;
            }

            .elementor-469 .elementor-element.elementor-element-d9382d3 .single__menu__nav ul.element__ready__menu li a {
                margin: 0px 10px 0px 0px;
            }

            .elementor-469 .elementor-element.elementor-element-2f50d92 {
                width: 100%;
            }

            .elementor-469 .elementor-element.elementor-element-99bb42d {
                text-align: center;
            }
        }

        @media(min-width:768px) {
            .elementor-469 .elementor-element.elementor-element-dd18121 {
                width: 28%;
            }

            .elementor-469 .elementor-element.elementor-element-5157b06 {
                width: 11.754%;
            }

            .elementor-469 .elementor-element.elementor-element-0c4bd58 {
                width: 19.666%;
            }

            .elementor-469 .elementor-element.elementor-element-fda3257 {
                width: 24.58%;
            }

            .elementor-469 .elementor-element.elementor-element-2bddb50 {
                width: 16%;
            }

            .elementor-469 .elementor-element.elementor-element-60c4665 {
                width: 58.596%;
            }

            .elementor-469 .elementor-element.elementor-element-2f50d92 {
                width: 41.36%;
            }
        }

        @media(max-width:1024px) and (min-width:768px) {
            .elementor-469 .elementor-element.elementor-element-5157b06 {
                width: 9%;
            }

            .elementor-469 .elementor-element.elementor-element-0c4bd58 {
                width: 20%;
            }

            .elementor-469 .elementor-element.elementor-element-fda3257 {
                width: 23%;
            }

            .elementor-469 .elementor-element.elementor-element-2bddb50 {
                width: 20%;
            }
        }
    </style>
    <div data-elementor-type="wp-post" data-elementor-id="469" class="elementor elementor-469">


</head>
