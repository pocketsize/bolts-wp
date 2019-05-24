<?php
/**
 * Header
 *
 * The main header of the website
 *
 * @param string $theme
 * @param string $modifier
 * @param string $attributes
 * 
 * @param array $menu
 * @param string $home_url
 * @param string $site_name
 */

$attributes = attributes($attributes ?? '');
$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
?>

<header class="header <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <div class="header-inner">
        <a href="<?php echo $home_url; ?>" class="header-logo"><?php echo $site_name; ?></a>

        <button class="header-menu-toggle" data-menu-toggle>Menu</button>

        <div class="header-menu" role="navigation">
            <?php /* TODO: weird scoping, this menu root element should be a part of the menu component */ ?>
            <nav class="menu is-main">
                <?php component('common/menu', [
                    'menu'       => $menu,
                    'block_name' => 'menu'
                ]); ?>
            </nav>
        </div>
    </div>
</header>
