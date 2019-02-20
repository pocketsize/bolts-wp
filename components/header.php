<?php 
/**
 * Header
 * 
 * The main header of the website
 * 
 * @param array $menu
 */
?>

<header class="header">
	<div class="header-inner">
		<a href="<?php echo home_url(); ?>" class="header-logo"><?php bloginfo('name'); ?></a>

		<button class="header-menu-toggle" data-menu-toggle>Menu</button>

		<div class="header-menu" role="navigation">
			<nav class="main-menu">
				<?php component('common/menu', [
					'menu' => $menu,
					'block_name' => 'main-menu'
				]); ?>
			</nav>
		</div>
	</div>
</header>