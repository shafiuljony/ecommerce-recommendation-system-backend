<!DOCTYPE html>
<html class="no-js" lang="en-US">

<head>
    <meta charset="UTF-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Anon | Ecommerce Home</title>
    <!-- Standard Favicon -->
    <link href="{{ url('front/images/main-logo/favicon.ico') }}" rel="shortcut icon">
    <!-- Base Google Font for Web-app -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <!-- Google Fonts for Banners only -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,800" rel="stylesheet">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ url('front/css/bootstrap.min.css') }}">
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{ url('front/css/fontawesome.min.css') }}">
    <!-- Ion-Icons 4 -->
    <link rel="stylesheet" href="{{ url('front/css/ionicons.min.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ url('front/css/animate.min.css') }}">
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="{{ url('front/css/owl.carousel.min.css') }}">
    <!-- Jquery-Ui-Range-Slider -->
    <link rel="stylesheet" href="{{ url('front/css/jquery-ui-range-slider.min.css') }}">
    <!-- Utility -->
    <link rel="stylesheet" href="{{ url('front/css/utility.css') }}">
    <!-- Main -->
    <link rel="stylesheet" href="{{ url('front/css/bundle.css') }}">
    <!-- Zoom  -->
    <link rel="stylesheet" href="{{ url('front/css/easyzoom.css') }}">
    <!-- Custom  -->
    <link rel="stylesheet" href="{{ url('front/css/custom.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>

    <div class="loader">
        <img src="{{ asset('front/images/loaders/loader.gif') }}" alt="loading..." />
    </div>


    <!-- app -->
    <div id="app">
        @include('front.layout.header')

        @yield('content')

        @include('front.layout.footer')
        {{--    @include('front.layout.modals') --}}

    </div>
    <!-- app /- -->
    <!--[if lte IE 9]>
<div class="app-issue">
    <div class="vertical-center">
        <div class="text-center">
            <h1>You are using an outdated browser.</h1>
            <span>This web app is not compatible with following browser. Please upgrade your browser to improve your security and experience.</span>
        </div>
    </div>
</div>
<style> #app {
    display: none;
} </style>
<![endif]-->
    <!-- NoScript -->
    <noscript>
        <div class="app-issue">
            <div class="vertical-center">
                <div class="text-center">
                    <h1>JavaScript is disabled in your browser.</h1>
                    <span>Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                </div>
            </div>
        </div>
        <style>
            #app {
                display: none;
            }
        </style>
    </noscript>
    {{-- // ssl --}}
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Modernizr-JS -->
    <script type="text/javascript" src="{{ url('front/js/vendor/modernizr-custom.min.js') }}"></script>
    <!-- NProgress -->
    <script type="text/javascript" src="{{ url('front/js/nprogress.min.js') }}"></script>
    <!-- jQuery -->
    <script type="text/javascript" src="{{ url('front/js/jquery.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{ url('front/js/bootstrap.min.js') }}"></script>
    <!-- Popper -->
    <script type="text/javascript" src="{{ url('front/js/popper.min.js') }}"></script>
    <!-- ScrollUp -->
    <script type="text/javascript" src="{{ url('front/js/jquery.scrollUp.min.js') }}"></script>
    <!-- Elevate Zoom -->
    <script type="text/javascript" src="{{ url('front/js/jquery.elevatezoom.min.js') }}"></script>
    <!-- jquery-ui-range-slider -->
    <script type="text/javascript" src="{{ url('front/js/jquery-ui.range-slider.min.js') }}"></script>
    <!-- jQuery Slim-Scroll -->
    <script type="text/javascript" src="{{ url('front/js/jquery.slimscroll.min.js') }}"></script>
    <!-- jQuery Resize-Select -->
    <script type="text/javascript" src="js/jquery.resize-select.min.js') }}"></script>
    <!-- jQuery Custom Mega Menu -->
    <script type="text/javascript" src="{{ url('front/js/jquery.custom-megamenu.min.js') }}"></script>
    <!-- jQuery Countdown -->
    <script type="text/javascript" src="{{ url('front/js/jquery.custom-countdown.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script type="text/javascript" src="{{ url('front/js/owl.carousel.min.js') }}"></script>
    <!-- Main -->
    <script type="text/javascript" src="{{ url('front/js/app.js') }}"></script>
    <!-- Custom  -->
    <script type="text/javascript" src="{{ url('front/js/custom.js') }}"></script>
    <!-- Zoom  -->
    <script type="text/javascript" src="{{ url('front/js/easyzoom.js') }}"></script>
    <script>
        // Instantiate EasyZoom instances
        var $easyzoom = $('.easyzoom').easyZoom();

        // Setup thumbnails example
        var api1 = $easyzoom.filter('.easyzoom--with-thumbnails').data('easyZoom');

        $('.thumbnails').on('click', 'a', function(e) {
            var $this = $(this);

            e.preventDefault();

            // Use EasyZoom's `swap` method
            api1.swap($this.data('standard'), $this.attr('href'));
        });

        // Setup toggles example
        var api2 = $easyzoom.filter('.easyzoom--with-toggle').data('easyZoom');

        $('.toggle').on('click', function() {
            var $this = $(this);

            if ($this.data("active") === true) {
                $this.text("Switch on").data("active", false);
                api2.teardown();
            } else {
                $this.text("Switch off").data("active", true);
                api2._init();
            }
        });
    </script>

    @include('front.layout.scripts')




</body>

</html>
