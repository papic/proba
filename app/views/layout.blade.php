<!doctype html>
<html>
	<head>
    	<meta charset="UTF-8">
    	@section('imports')
    		{{ HTML::style('css/bootstrap.css') }}
    		{{ HTML::style('css/bootstrap-responsive.css') }}
    		{{ HTML::script("js/jquery-2.0.3.min.js") }}
    		{{ HTML::script('js/bootstrap.min.js') }}
    	@show
    	<title>
    		@yield('title')
    	</title>
    </head>
    <body>
    	<header>
    		@include('header')
    	</header>
    	@if ($errors->any())
    		{{ $errors->first() }}
    		<br/>
    	@endif
    	@if (Session::has('message'))
    		{{ Session::get('message') }}
    		<br/>
    	@endif
    	<div>
    		@yield('content')
    	</div>
    </body>	
</html>