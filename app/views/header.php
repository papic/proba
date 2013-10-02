<nav class="navbar navbar-default" role="navigation">
	
	<div class="navbar-header">
		<a class="navbar-brand" href=<?php echo route('welcome', array()); ?>>Proba</a>
	</div>
	
	<div class="collapse navbar-collapse navbar-ex1-collapse">
    	<ul class="nav navbar-nav">
    		<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo (Auth::user()->first_name)." ".(Auth::user()->last_name); ?> <b class="caret"></b></a>
       			<ul class="dropdown-menu">
          			<li><a href=<?php echo route('logout', array()); ?>><?php echo trans('messages.welcome-LogOut'); ?></a></li>
        		</ul>
      		</li>
    	</ul>
  	</div>
  	<div class="collapse navbar-collapse navbar-ex1-collapse">
    	<ul class="nav navbar-nav">
    		<li class="dropdown">
        		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo trans('messages.welcome-Language') ?> <b class="caret"></b></a>
       			<ul class="dropdown-menu">
          			<li><a href=<?php echo route('language', array('route' => Route::currentRouteName(), 'lang' => 'en')); ?>><?php echo trans('messages.welcome-English'); ?></a></li>
          			<li><a href=<?php echo route('language', array('route' => Route::currentRouteName(), 'lang' => 'sr')); ?>><?php echo trans('messages.welcome-Serbian'); ?></a></li>
        		</ul>
      		</li>
    	</ul>
  	</div>
	
</nav>