@extends('layout')

@section('imports')
	@parent
	@if (Config::get('app.locale')=='sr')
		{{ HTML::script('js/lang/validation-sr.js') }}
	@else
		{{ HTML::script('js/lang/validation-en.js') }}
	@endif
    {{ HTML::script('js/validation.js') }}
@stop

@section('title')
	{{ trans('messages.signUp-Title') }}
@stop

@section('content')
	{{ Form::open(array('route' => 'signup')) }}
    	{{ Form::label('email', trans('messages.signUp-Email')) }}
    	<br/>
    	{{ Form::email('email', $value = null, $attributes = array()) }}
    	<br/>
    	{{ Form::label('first_name', trans('messages.signUp-FirstName')) }}
    	<br/>
    	{{ Form::text('first_name') }}
    	<br/>
    	{{ Form::label('last_name', trans('messages.signUp-LastName')) }}
    	<br/>
    	{{ Form::text('last_name') }}
    	<br/>
    	{{ Form::label('password', trans('messages.signUp-Password')) }}
    	<br/>
    	{{ Form::password('password') }}
    	<br/>
    	{{ Form::label('password_confirmation', trans('messages.signUp-ConfirmPassword')) }}
    	<br/>
    	{{ Form::password('password_confirmation') }}
    	<br/>
    	{{ Form::submit(trans('messages.signUp-SignUp')) }}
    {{ Form::close() }}
@stop