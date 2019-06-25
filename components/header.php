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
        <div class="header-link">
            <?php component('common/link', [
                'url' => $home_url,
                'content' => $site_name
            ]); ?>
        </div>

        <div class="header-button">
            <?php component('forms/button', [
                'theme' => 'menu-toggle',
                'attributes' => [
                    'data-menu-toggle' => true
                ],
                'content' => 'Menu',
            ]); ?>
        </div>

        <div class="header-menu" role="navigation">
            <?php component('common/menu', $menu); ?>
        </div>
    </div>
</header>
