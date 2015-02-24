	<!DOCTYPE html>
<html>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?> </title>
	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="wp-content/themes/portfolio-theme/js/hamburgermenu.js" type="text/javascript" ></script> -->
	<meta name="viewport" content="width=device-width">
	<?php wp_head(); //HOOK. needed for plugins and admin bar to work ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	

	<!-- HTML5 shiv -->
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/reset.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/genericons/genericons.css">
		<!-- favicon will go here -->

		<!-- fonts -->
		<link href='http://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Domine' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/font-awesome/css/font-awesome.min.css">

</head>

<body <?php body_class('custom'); ?>>


		<header class="ham-menu">
			  <button class="hamburger">&#9776;</button>
			  <button class="cross">&#735;</button>
		</header>

		  <div class="menu">
			<?php wp_nav_menu( array( 
					'theme_location' => 'main_menu', /*registered in functions.php*/
					'container'       => 'nav', 
					'menu_class'      => 'nav', 
					'fallback_cb' 	=> 'false', /*if no menu assigned, do nothing*/
			 ) ); ?>
		</div>




	<header role="banner">
		<?php wp_nav_menu( array( 
				'theme_location' => 'social_media', /*registered in functions.php*/
				'container'       => 'false',
				'menu_class'      => 'social_media',
				'fallback_cb' 	=> 'false', /*if no menu assigned, do nothing*/
				'link_before'    => '<span class="screen-reader-text">',
				'link_after'     => '</span>',

			 ) ); ?>
			 		 <div class="welcome-wrap">
			<h2><?php bloginfo('name'); ?></h2>
			<h3><?php wp_title(''); ?></h4>
		</div>

		
	</header>