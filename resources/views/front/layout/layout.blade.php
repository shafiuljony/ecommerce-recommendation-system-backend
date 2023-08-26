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
</head>
<body>
<!-- loading-container -->
<div id="loadingContainer" class="loading-container">
    <div class="loading-video">
        <video id="loadingVideo" autoplay loop muted>
            <source src="{{ url('front/videos/animated_medium20201002-25684-d3rxxj.mp4') }}" type="video/mp4">
        </video>
    </div>
</div>

<!-- app -->
<div id="app">
    @include('front.layout.header')

    @yield('content')

    @include('front.layout.footer')
{{--    @include('front.layout.modals')--}}

</div>
<script>
  function showLoader() {
      const loader = document.getElementById("loadingContainer");
      loader.classList.remove("hidden");
  }
  function hideLoader() {
      const loader = document.getElementById("loadingContainer");
      loader.classList.add("hidden");
  }
  setTimeout(() => {
      hideLoader(); // Call this function when your content is loaded
  }, 1500);
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
<script type="text/javascript" src="{{url('front/js/vendor/modernizr-custom.min.js') }}"></script>
<!-- NProgress -->
<script type="text/javascript" src="{{url('front/js/nprogress.min.js') }}"></script>
<!-- jQuery -->
<script type="text/javascript" src="{{url('front/js/jquery.min.js') }}"></script>
<!-- Bootstrap JS -->
<script type="text/javascript" src="{{url('front/js/bootstrap.min.js') }}"></script>
<!-- Popper -->
<script type="text/javascript" src="{{url('front/js/popper.min.js') }}"></script>
<!-- ScrollUp -->
<script type="text/javascript" src="{{url('front/js/jquery.scrollUp.min.js') }}"></script>
<!-- Elevate Zoom -->
<script type="text/javascript" src="{{url('front/js/jquery.elevatezoom.min.js') }}"></script>
<!-- jquery-ui-range-slider -->
<script type="text/javascript" src="{{url('front/js/jquery-ui.range-slider.min.js') }}"></script>
<!-- jQuery Slim-Scroll -->
<script type="text/javascript" src="{{url('front/js/jquery.slimscroll.min.js') }}"></script>
<!-- jQuery Resize-Select -->
<script type="text/javascript" src="js/jquery.resize-select.min.js') }}"></script>
<!-- jQuery Custom Mega Menu -->
<script type="text/javascript" src="{{url('front/js/jquery.custom-megamenu.min.js') }}"></script>
<!-- jQuery Countdown -->
<script type="text/javascript" src="{{url('front/js/jquery.custom-countdown.min.js') }}"></script>
<!-- Owl Carousel -->
<script type="text/javascript" src="{{url('front/js/owl.carousel.min.js') }}"></script>
<!-- Main -->
<script type="text/javascript" src="{{url('front/js/app.js') }}"></script>
<!-- Custom  -->
<script type="text/javascript" src="{{url('front/js/custom.js') }}"></script>
<!-- Zoom  -->
<script type="text/javascript" src="{{url('front/js/easyzoom.js') }}"></script>
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
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
   tinymce.init({
     selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
     plugins: 'powerpaste advcode table lists checklist',
     toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table'
   });
</script>

                @include('front.layout.scripts')

</body>
</html>
