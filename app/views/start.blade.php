@extends('layout')

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
@stop