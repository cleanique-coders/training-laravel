<!DOCTYPE html>
<html>
<head>
	<title>Laravel Training @ ejoeSolutions</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="{!! URL::asset('assets/css/app.css'); !!}">
</head>
<body>

	@include('partials.navbar')

	{{-- content --}}
    <div class="container">
        @yield('content')
    </div>

    {{-- Start footer scripts --}} 
    @yield('before_footer_scripts')
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.1/jquery.min.js"></script>
    
    <script type="text/javascript" src="{!! URL::asset('assets/js/app.js'); !!}"></script>

    {{-- End footer scripts --}}
    @yield('footer_scripts')
    
</body>
</html>