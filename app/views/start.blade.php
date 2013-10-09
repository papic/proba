@extends('layout')

@section('imports')
	@parent
	{{ HTML::script("js/cookie.js") }}
	<script>
		//var msg = "promenljiva iz posebnog taga";
		alert('pocetak');
	</script>
	<script>
		alert("Promenljiva msg (provera iz tag): " + msg);
	</script>
	{{ HTML::script("js/msg3.js") }}
	{{ HTML::script("js/anonymous.js") }}
	{{ HTML::script("js/msg4.js") }}
	{{ HTML::script("js/angular.min.js") }}
	{{ HTML::script("js/test.js") }}
@stop

@section('title')
	{{ 'Proba' }}
@stop

@section('content')
	{{ trans('messages.start-Message') }}
	<br/>
	{{ trans('messages.start-Please') }}
	{{ link_to_route('loginpage', trans('messages.start-LogIn'), $parameters = array(), $attributes = array()) }}
	{{ ' ' }}
	{{ trans('messages.start-Or') }}
	{{ ' ' }}
	{{ link_to_route('signuppage', trans('messages.start-SignUp'), $parameters = array(), $attributes = array()) }}
	<br/>
	{{ isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:"" }}
	{{ (isset($_SERVER['HTTPS']) == 'on' ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] }}
	<?php ProbaUtil::printVar($_SESSION); ?>
	<?php ProbaUtil::printVar($_COOKIE); ?>
	<div ng-app='testApp'>
		<div ng-view></div>
	</div>
@stop