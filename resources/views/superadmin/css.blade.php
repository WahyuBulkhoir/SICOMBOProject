<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link rel="stylesheet" href="{{asset('superadmincss/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('superadmincss/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('superadmincss/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('superadmincss/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('superadmincss/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('superadmincss/vendors/owl-carousel-2/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('superadmincss/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('superadmincss/images/favicon.png')}}" />

<style>
    .marquee-container {
        width: 95%;
        overflow: hidden;
        white-space: nowrap;
        position: relative;
        box-sizing: border-box;
    }
    .marquee {
        width: 100%;
        overflow: hidden;
        white-space: nowrap;
        box-sizing: border-box;
    }
    .marquee a {
        margin-right: 20px;
    }
    .marquee::after {
        content: "";
    }
    .marquee {
        display: inline-block;
        animation: marquee-animation 15s linear infinite;
    }
    @keyframes marquee-animation {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }
    .card-body {
            width: 100%;
            overflow-x: auto;
        }
    @media (max-width: 768px) {
        .table th, .table td {
            font-size: 12px;
        }
        .btn-sm {
            font-size: 10px;
        }
        .card-body {
            padding: 10px;
        }
    }
    @media (max-width: 576px) {
        .container-scroller {
            padding: 0;
        }
        .card-header h3 {
            font-size: 16px;
        }
    }
</style>

    