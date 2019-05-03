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
$modifier   = modifier($theme ?? null, $modifier ?? null);
?>

<header class="header <?php echo $modifier; ?>" <?php echo $attributes; ?>>
    <div class="header-inner">
        <a href="<?php echo $home_url; ?>" class="header-logo"><?php echo $site_name; ?></a>

        <button class="header-menu-toggle" data-menu-toggle>Menu</button>

        <div class="header-menu" role="navigation">
            <nav class="main-menu">
                <?php component('common/menu', [
                    'menu'       => $menu,
                    'block_name' => 'main-menu'
                ]); ?>
            </nav>
        </div>
    </div>
</header>