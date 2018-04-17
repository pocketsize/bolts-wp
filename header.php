<!DOCTYPE html>
<html lang="<?php echo get_bloginfo( 'language' ); ?>">
<head>

	<meta http-equiv="content-type" content="text/html;charset=<?php echo get_option( 'blog_charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	
	<?php wp_head(); ?>

</head>
<body <?php body_class('page'); ?>>

<div class="page-wrapper">

	<header class="header">
		<div class="header-container">
			<div class="header-logo">
				<a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
			</div>

			<button class="header-menu-toggle">
				<span class="header-menu-text">Menu</span>
			</button>

			<nav class="header-menu" role="navigation">
				<?php bolts_nav_menu(); ?>
			</nav>
		</div>
	</header>

	<main class="main">