<?php
/**
 * Page
 *
 * @param array $modifiers
 * @param array $attributes
 *
 * @param array $head
 * @param array $header
 * @param array $sections
 * @param array $footer
 * @param array $foot
 */

$modifiers  = modifiers($modifiers ?? null, $theme ?? null);
$attributes = attributes($attributes ?? '');
?>
<!DOCTYPE html>
<html class="page <?php echo $modifiers; ?>" <?php echo $attributes; ?>>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=<?php echo $charset; ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

        <link rel="icon" type="image/png" href="data:image/png;base64,iVBORw0KGgo=">

        <?php echo !empty($wp_head) ? $wp_head : ''; ?>
    </head>

    <body <?php body_class('page-body'); ?>>
        <div class="page-wrapper">
            <?php if (!empty($header)) : ?>
                <div class="page-header">
                    <?php component('header', $header); ?>
                </div>
            <?php endif; ?>

            <?php if (!empty($sections)) : ?>
                <main class="page-sections">
                    <?php layout_items($sections, 'page-section'); ?>
                </main>
            <?php endif; ?>
        </div>

        <?php if (!empty($footer)) : ?>
            <div class="page-footer">
                <?php component('footer', $footer); ?>
            </div>
        <?php endif; ?>

        <?php echo !empty($wp_footer) ? $wp_footer : ''; ?>
    </body>
</html>