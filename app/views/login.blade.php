@extends('layout')

@section('title')
	{{ trans('messages.logIn-Title') }}
@stop

@section('content')
	{{ Form::open(array('route' => 'login')) }}
    	{{ Form::label('email', trans('messages.logIn-Email')) }}
    	<br/>
    	{{ Form::email('email', $value = null, $attributes = array()) }}
    	<br/>
    	{{ Form::label('password', trans('messages.logIn-Password')) }}
    	<br/>
    	{{ Form::password('password') }}
    	<br/>
    	{{ Form::submit(trans('messages.logIn-LogIn')) }}
    {{ Form::close() }}
@stop