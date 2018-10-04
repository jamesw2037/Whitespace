<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bxslider/4.2.15/jquery.bxslider.min.css" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri() ?>/assets/css/mobile.css" />
	<link rel="shortcut icon" href="<?= get_stylesheet_directory_uri(); ?>/assets/img/favicon.ico" />
	<!--[if lt IE 9]>
	  <script type="text/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="header" id="header" role="banner">
		<nav id="menu" role="navigation">
			<?php wp_nav_menu(array('theme_location' => 'main-menu' )); ?>
		</nav>
	</header>

	<?php if(has_post_thumbnail()){ ?>
		<div class="hero-banner" style="background-image:url('<?= wp_get_attachment_url( get_post_thumbnail_id($post->ID)) ?>');">
		</div>
	<?php } ?>