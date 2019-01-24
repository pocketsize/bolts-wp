<?php 
	/**
	 * Menu 
	 * 
	 * Builds a menu tree recursively from an array.
	 * For easy WP integration, use get_menu_object() 
	 * defined in data-fetching.php to get $menu data. 
	 * 
	 * @param string $block_name          - defaults to "menu". becomes block class, (e.g. ".menu-link-outer" when default)
	 * @param bool   $has_submenu_toggles - will output the div "<$block_name>-submenu-toggle" inside each "<$block_name>-link-outer"
	 * 
	 * @param object $menu                - easily gotten with get_menu_object()
	 * @param string $menu.title
	 * @param string $menu.url
	 * @param string $menu.target
	 * 
	 * @param object $menu.children       - same as $menu
	 */

	$block               = !empty($block_name) ? $block_name : 'menu';
	$ul_class            = $block . '-items';
	$li_class            = $block . '-item';
	$a_outer_class       = $block . '-link-outer';
	$a_class             = $block . '-link';
	$label_class         = $block . '-label';
	$submenu_outer_class = $block . '-submenu-outer';
	$toggle_class       = $block . '-submenu-toggle';
?>

<?php if(isset($menu) && is_array($menu)): ?>
	<ul class="<?php echo $ul_class; ?>">
		<?php foreach($menu as $item): ?>
			<?php 
				$has_children_class = !empty($item->children) ? 'has-children' : ''; 
				$is_current_class   = $item->current_menu_item == 1 ? 'is-current' : '';
				$target             = !empty($item->target) ? 'target="' . $target . '"' : '';
				$rel                = $target == '_blank' ? 'rel="noopener noreferrer"' : '';
			?>

			<li class="<?php echo $li_class; ?> <?php echo $is_current_class; ?> <?php echo $has_children_class; ?>">
				<div class="<?php echo $a_outer_class; ?>">
					<a class="<?php echo $a_class; ?>" href="<?php echo $item->url; ?>" <?php echo $target; ?> <?php echo $rel; ?>>
						<span class="<?php echo $label_class; ?>"><?php echo $item->title; ?></span>
					</a>

					<?php if(!empty($has_submenu_toggles)): ?>
						<button class="<?php echo $toggle_class; ?>" data-submenu-toggle></button>
					<?php endif; ?>
				</div>

				<?php if(!empty($item->children)): ?>
					<?php if(!empty($has_submenu_toggles)): ?>
						<div class="<?php echo $submenu_outer_class; ?>" data-auto-height>
							<?php component('common/menu', [ 'menu' => $item->children ]); ?>
						</div>
					<?php else: ?>
						<?php component('common/menu', [ 'menu' => $item->children ]); ?>
					<?php endif; ?>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>