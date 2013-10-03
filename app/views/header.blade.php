<nav class="navbar navbar-default" role="navigation">
	
	<div class="navbar-header">
		<a class="navbar-brand" href={{ route('welcome', array()) }}>Proba</a>
	</div>
	<div class="collapse navbar-collapse navbar-ex1-collapse">
    	<ul class="nav navbar-nav">
    		<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ trans('messages.welcome-Language') }}<b class="caret"></b></a>
       			<ul class="dropdown-menu">
          			<li><a href={{ route('language', array('route' => Route::currentRouteName(), 'lang' => 'en')) }}>{{ trans('messages.welcome-English') }}</a></li>
          			<li><a href={{ route('language', array('route' => Route::currentRouteName(), 'lang' => 'sr')) }}>{{ trans('messages.welcome-Serbian') }}</a></li>
        		</ul>
      		</li>
    	</ul>
  	</div>
	
	@yield('header','')
	
</nav>