<head>
    <meta charset="utf-8">
    <title>Dashboard - E-commerce</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/frontend/img/favicon.ico')}}">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/glightbox.min.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Plugin css -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    {{--@stack('scripts')--}}
    @stack('css')
    <style>
        .subMenu{
            padding: 2px;
        }
        .menu ul li{
            position: relative;
            display: inline-block;
        }

        #topBar>ul>li {
            float: left;
        }

        #topBar a {
            display: inline-block;
            /*padding: 1.2rem 1.8rem;*/
            line-height: 1.2rem;
            /*color: #FFF;*/
            transition: .2s ease-out;
        }
        ul.subMenu {
            box-sizing: border-box;
            position: absolute;
            top: 100%;
            left: 0;
            /*width: 170%;*/
        }
        ul.subMenu li {
            width: 100%;
            /*background: #3d3d3b;*/
        }
        #topBar ul.subMenu li a {
            width: 100%;
            padding: 1rem 1rem;
        }
        #topBar ul.subMenu li a:hover, #topBar ul.subMenu li.active>a {
            /*background: #2f2f2d;*/
            padding-left: 1.1rem;
        }
        ul.subMenu ul.subMenu{
            position: absolute;
            top: 0;
            left: 100%;
            width: 100%;
        }
        /* Mobile Devices */
        @media (max-width: 480px) {
            .header__sub--menu{
                top:150%;
                left:-245%;
            }
            .headerMenu{
                margin-right: 7px;
            }
            .headerMenu2{
                margin-right: 7px!important;
                margin-top: -1px!important;
            }
            .product{
                padding-bottom: 0!important;
            }
            .features{
                padding-top: 0!important;
            }
        }

        /* Low resolution Tablets and iPads */
        @media (min-width: 481px) and (max-width: 767px) {
            .headerMenu2{
                margin-right: 7px!important;
                margin-top: -1px!important;
            }
        }

        /* Tablets iPads (Portrait) */
        @media (min-width: 768px) and (max-width: 1024px){
            .headerMenu2{
                margin-right: 7px!important;
                margin-top: -1px!important;
            }
            .hearderSubMenu{
                top:128%;
                left:-335%;
            }
            .headerMenu {
                margin-right: 2rem;
                position: relative;
            }
        }

        /* Laptops and Desktops */
        @media (min-width: 1025px) and (max-width: 1280px){
            .header__sub--menu{
                top:128%;
                left:-8%;
            }
            .headerMenu{
                margin-right: 2.5rem;
            }
        }

        /* Big boi Monitors */
        @media (min-width: 1281px) {
            .header__sub--menu{
                top:128%;
                left:-8%;
            }
            .headerMenu{
                margin-right: 2.5rem;
            }
        }
    </style>
</head>
