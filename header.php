<!DOCTYPE html>
<html lang="<?php echo get_bloginfo( 'language' ); ?>">
<head>

	<meta http-equiv="content-type" content="text/html;charset=<?php echo get_option( 'blog_charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<link rel="icon" type="image/png" href="data:image/png;base64,iVBORw0KGgo=">
	
	<?php wp_head(); ?>

</head>
<body <?php body_class('bolts-page'); ?>>

<div class="bolts-wrapper">

	<header class="header">
		<div class="header-inner">
			<a href="<?php echo home_url(); ?>" class="header-logo"><?php bloginfo('name'); ?></a>

			<button class="header-menu-toggle" data-menu-toggle>Menu</button>

			<div class="header-menu" role="navigation">
				<nav class="main-menu">
					<?php component('common/menu', [
						'menu' => get_menu_array('main'),
						'block_name' => 'main-menu'
					]); ?>
				</nav>
			</div>
		</div>
	</header>

	<main class="main">