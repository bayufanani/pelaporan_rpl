<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ isset($title) ? $title : 'Admin Pelaporan' }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
	<script src="{{URL::asset('js/jquery.min.js')}}"></script>
	<style>
	.fade-scale {
	transform: scale(0);
		opacity: 0;
		-webkit-transition: all .4s ease;
		-o-transition: all .4s ease;
		transition: all .4s ease;
	}

	.fade-scale.in {
		opacity: 1;
		transform: scale(1);
	}
	</style>
</head>
<body>
	<div class="container-fluid">
	@yield('content')
	</div>
	<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
	<script src="{{URL::asset('js/moment.js')}}"></script>
	<script src="{{URL::asset('js/moment-with-locales.js')}}"></script>
</body>
</html>