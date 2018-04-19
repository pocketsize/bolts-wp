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
<body <?php body_class('bolts-page'); ?>>

<div class="bolts-wrapper">

	<header class="header">
		<div class="header-container">
			<a href="<?php echo home_url(); ?>" class="header-logo"><?php bloginfo('name'); ?></a>

			<button class="header-menu-toggle">Menu</button>

			<nav class="header-menu" role="navigation">
				<?php nav_menu(); ?>
			</nav>
		</div>
	</header>

	<main class="main">