<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="header">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="<?php echo home_url(); ?>">
		  	<?php if(file_exists(IMAGES . '/logo.png')): ?>
		  		<img alt="<?php echo get_bloginfo('name'); ?>" src="<?php echo IMAGES; ?>/logo.png">
		  	<?php else:
				echo get_bloginfo('name');
		  	endif; ?>
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-1" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
	      <?php wp_nav_menu(array(
				'theme_location'=>'navigation-menu',
				'depth'             => 2,
				'container'         => 'div',
				'container_class'   => 'collapse navbar-collapse',
				'container_id'      => 'navbar-1',
				'menu_class'        => 'navbar-nav mr-auto',
				'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				'walker'            => new bs4Navwalker()
			)); ?>
		  </div>
		</nav>
	</div>
