<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>@yield('title','Js Treasure')</title>
<link rel="shortcut icon" type="image/x-icon" href="front_end/front_end/images/favicon.ico">
<!-- Bootstrap -->

<link href="{{ asset('front_end/css/bootstrap.min.css') }}"  rel="stylesheet">
<link href="{{ asset('front_end/css/owl.carousel.css') }}" rel="stylesheet">
<link href="{{ asset('front_end/css/owl.theme.default.css') }}" rel="stylesheet">
<link href="{{ asset('front_end/css/style.css') }}" rel="stylesheet">


 <!-- only custom css section start -->
  @yield('css')


 <!-- only custom css section end -->



 <script>
  window.Laravel = <?php echo json_encode([
	'csrfToken' => csrf_token(),
	'cart' => session('cart', [])
]); ?>
 </script>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body data-ng-app="jstreasure">
<div class="hameid-loader-overlay"></div>

<!-- mini_cart start here -->
  @include('sites.mini_cart')
<!-- mini_cart end here -->

<div class="page-overlay"></div>

<!-- header start here -->
  @include('sites.header')
<!-- header end here -->

<!-- menu start here -->
  @include('sites.menu-bar')
<!-- menu end here -->

<!-- main content section start -->
  @yield('content','No Content Found')
<!-- main content section start -->

<!-- footer start here -->
  @include('sites.footer')
<!-- footer end here -->

<!-- modal start here -->
  @include('sites.modal')
<!-- modal end here -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('front_end/js/jquery.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="{{ asset('front_end/js/controllers.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('front_end/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front_end/js/owl.carousel.js') }}"></script>
<script src="{{ asset('front_end/js/scripts.js') }}"></script>

<script>
  jQuery(window).load(function(){
      jQuery(".hameid-loader-overlay").fadeOut(500);
  });
</script>
{{-- <noscript>
    <style>.hameid-loader-overlay { display: none; } </style>
</noscript> --}}

<!-- custom js include here if needed -->
  @yield('script')
<!-- custom js include here if needed -->

</body>
</html>





