<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8" />
<meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<title>Usefulfy-Admin</title>
<meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
<meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Canonical SEO -->
<!-- Favicon -->
{{--
<link rel="icon" type="image/x-icon"
    href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" /> --}}

<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{url('admin_assets/img/favicon/favicon.ico')}}" />

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com/">
<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
    rel="stylesheet">

<!-- Icons -->
<link rel="stylesheet" href="{{URL('admin_assets/vendor/fonts/fontawesome.css')}}" />
<link rel="stylesheet" href="{{URL('admin_assets/vendor/fonts/tabler-icons.css')}}" />
<link rel="stylesheet" href="{{URL('admin_assets/vendor/fonts/flag-icons.css')}}" />

<!-- Core CSS -->

<link rel="stylesheet" href="{{URL('admin_assets/vendor/css/rtl/core.css')}}" class="template-customizer-core-css" />
{{--
<link rel="stylesheet" href="{{URL('admin_assets/vendor/css/rtl/theme-semi-dark.css')}}"
    class="template-customizer-theme-css" /> --}}

<link rel="stylesheet" href="{{url('admin_assets/vendor/css/rtl/theme-default.css')}}"
    class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{URL('admin_assets/css/demo.css')}}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{URL('admin_assets/vendor/libs/node-waves/node-waves.css')}}" />
<link rel="stylesheet" href="{{URL('admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{URL('admin_assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{URL('admin_assets/vendor/libs/apex-charts/apex-charts.css')}}" />

<link rel="stylesheet" href="{{URL('admin_assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}">
<link rel="stylesheet" href="{{URL('admin_assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}">
<link rel="stylesheet" href="{{URL('admin_assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.4/jquery-confirm.min.css"
    integrity="sha512-0V10q+b1Iumz67sVDL8LPFZEEavo6H/nBSyghr7mm9JEQkOAm91HNoZQRvQdjennBb/oEuW+8oZHVpIKq+d25g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.2/cropper.css"
    integrity="sha512-087vysR/jM0N5cp13Vlp+ZF9wx6tKbvJLwPO8Iit6J7R+n7uIMMjg37dEgexOshDmDITHYY5useeSmfD1MYiQA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{url('admin_assets/vendor/libs/select2/select2.css')}}" />

<!-- Page CSS -->
<link rel="stylesheet" href="{{ URL('admin_assets/vendor/css/pages/cards-advance.css') }}" />

<link rel="stylesheet" href="{{url('admin_assets/vendor/libs/dropzone/dropzone.css')}}" />
<link rel="stylesheet" href="{{url('admin_assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{url('admin_assets/vendor/libs/quill/typography.css')}}" />
<link rel="stylesheet" href="{{url('admin_assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{url('admin_assets/vendor/libs/bootstrap-select/bootstrap-select.css')}}" />
<link rel="stylesheet" href="{{url('admin_assets/vendor/libs/@form-validation/form-validation.css')}}" />
<link rel="stylesheet" href="{{url('admin_assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{url('admin_assets/vendor/libs/flatpickr/flatpickr.css')}}" />
<link rel="stylesheet" href="{{url('admin_assets/vendor/libs/tagify/tagify.css')}}" />

<!-- Helpers -->
{{-- <script src="{{url('admin_assets/vendor/js/template-customizer.js')}}"></script> --}}
<script src="{{URL('admin_assets/vendor/js/helpers.js')}}"></script>
<script src="{{URL('admin_assets/js/config.js')}}"></script>


{{-- <style>
    .preloader {
        position: fixed;
        left: 0;
        width: 0;
        height: 100%;
        width: 100%;
        text-align: center;
        z-index: 9999999;
        -webkit-transition: .9s;
        transition: .9s;
    }

    .preloader .loader {
        position: absolute;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        display: inline-block;
        left: 0;
        right: 0;
        margin: 0 auto;
        top: 45%;
        -webkit-transform: translateY(-45%);
        transform: translateY(-45%);
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .preloader .loader .loader-outter {
        position: absolute;
        border: 4px solid #ffffff;
        border-left-color: transparent;
        border-bottom: 0;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        -webkit-animation: loader-outter 1s cubic-bezier(0.42, 0.61, 0.58, 0.41) infinite;
        animation: loader-outter 1s cubic-bezier(0.42, 0.61, 0.58, 0.41) infinite;
    }

    .preloader .loader .loader-inner {
        position: absolute;
        border: 4px solid #ffffff;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        left: calc(40% - 21px);
        top: calc(40% - 21px);
        border-right: 0;
        border-top-color: transparent;
        -webkit-animation: loader-inner 1s cubic-bezier(0.42, 0.61, 0.58, 0.41) infinite;
        animation: loader-inner 1s cubic-bezier(0.42, 0.61, 0.58, 0.41) infinite;
    }

    .preloader .loader .indicator {
        position: absolute;
        right: 0;
        left: 0;
        top: 50%;
        -webkit-transform: translateY(-50%) scale(1.5);
        transform: translateY(-50%) scale(1.5);
    }

    .preloader .loader .indicator svg polyline {
        fill: none;
        stroke-width: 2;
        stroke-linecap: round;
        stroke-linejoin: round;
    }

    .preloader .loader .indicator svg polyline#back {
        stroke: #ffffff;
    }

    .preloader .loader .indicator svg polyline#front {
        stroke: #1A76D1;
        stroke-dasharray: 12, 36;
        stroke-dashoffset: 48;
        -webkit-animation: dash 1s linear infinite;
        animation: dash 1s linear infinite;
    }

    .preloader::before,
    .preloader::after {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 60%;
        z-index: -1;
        background: #242745;
        -webkit-transition: .9s;
        transition: .9s;
    }

    .preloader::after {
        left: auto;
        right: 0;
    }

    .preloader.preloader-deactivate {
        visibility: hidden;
    }

    .preloader.preloader-deactivate::after,
    .preloader.preloader-deactivate::before {
        width: 0;
    }

    .preloader.preloader-deactivate .loader {
        opacity: 0;
        visibility: hidden;
    }

    @-webkit-keyframes loader-outter {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes loader-outter {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-webkit-keyframes loader-inner {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
        }
    }

    @keyframes loader-inner {
        0% {
            -webkit-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
        }
    }

    @-webkit-keyframes dash {
        62.5% {
            opacity: 0;
        }

        to {
            stroke-dashoffset: 0;
        }
    }

    @keyframes dash {
        62.5% {
            opacity: 0;
        }

        to {
            stroke-dashoffset: 0;
        }
    }
</style> --}}