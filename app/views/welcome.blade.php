@extends('layout')

@section('title')
	{{ trans('messages.welcome-Title') }}
@stop

@section('header')
	<div class="collapse navbar-collapse navbar-ex1-collapse">
    	<ul class="nav navbar-nav">
    		<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ (Auth::user()->first_name)." ".(Auth::user()->last_name) }}<b class="caret"></b></a>
       			<ul class="dropdown-menu">
          			<li><a href={{ route('logout', array()) }}>{{ trans('messages.welcome-LogOut') }}</a></li>
        		</ul>
      		</li>
    	</ul>
  	</div>
@stop

@section('content')
	<div>
    	{{ trans('messages.welcome-Welcome') }}
    </div>
@stop