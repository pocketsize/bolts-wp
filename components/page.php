<?php
/**
 * Page
 *
 * @param array $sections
 */
?>
<!DOCTYPE html>
<html class="page" lang="<?php echo get_bloginfo('language'); ?>">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=<?php echo get_option('blog_charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <link rel="icon" type="image/png" href="data:image/png;base64,iVBORw0KGgo=">
        
        <?php wp_head(); ?>
    </head>

    <body <?php body_class('page-body'); ?>>
        <div class="page-wrapper">
            <div class="page-header">
                <?php component('header', [
                    'menu'      => [
                        'modifiers' => 'is-level-0',
                        'items' => get_nav_menu_array('main', true)
                    ],
                    'home_url'  => home_url(),
                    'site_name' => get_bloginfo('name')
                ]); ?>
            </div>

            <main class="page-sections">
                <?php layout_items($sections, 'page-section'); ?>
            </main>
        </div>

        <div class="page-footer">
            <?php component('footer', get_footer_content()); ?>
        </div>

        <?php wp_footer(); ?>
    </body>
</html>