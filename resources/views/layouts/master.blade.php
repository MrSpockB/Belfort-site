<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/buttons.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('fonts/mfn-icons.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/grid.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/layout.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/variables.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/style-simple.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/responsive-1240.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/inline.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('js/animations/animations.min.css') }}">
	<link rel="stylesheet" id="ls-google-fonts-css" href="http://fonts.googleapis.com/css?family=Lato:100,300,regular,700,900%7COpen+Sans:300%7CIndie+Flower:regular%7COswald:300,regular,700&amp;subset=latin%2Clatin-ext" type="text/css" media="all">
	<script src="{{ URL::asset('js/jquery.js') }}"></script>
</head>
<body class="layout-full-width header-classic header-fw sticky-header sticky-white menu-line-below menuo-no-borders">
	<div id="Wrapper">
		<div id="Header_wrapper">
			<header id="Header">
				@include('layouts.menu')
				@include('layouts.homeSlider')
			</header>
		</div>
		<div id="Content"></div>
		<div id="Footer" class="clearfix"></div>
	</div>
	<script src="{{ URL::asset('js/ui/jquery.ui.core.js') }}"></script>
	<script src="{{ URL::asset('js/ui/jquery.ui.widget.js') }}"></script>
	<script src="{{ URL::asset('js/ui/jquery.ui.tabs.js') }}"></script>
	<script src="{{ URL::asset('js/ui/jquery.ui.accordion.js') }}"></script>
	<script src="{{ URL::asset('js/animations/animations.min.js') }}"></script>
	<script src="{{ URL::asset('js/mfn.menu.js') }}"></script>
	<script src="{{ URL::asset('js/scripts.js') }}"></script>
</body>
</html>