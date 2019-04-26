<?php
/**
 * Slider
 *
 * @param array  $slides
 * @param string $slides.component
 * @param string $slides.data
 *
 * @param string $type
 * @param bool   $has_controls
 * @param bool   $has_pagination
 *
 * @param string $theme
 * @param string $modifier
 */

$type       = !empty($type) ? $type : 'default';
$attributes = attributes($attributes ?? '');
$modifier   = modifier($theme ?? null, $modifier ?? null);
?>

<?php if (!empty($slides)) : ?>
    <section class="slider <?php echo $modifier; ?>" <?php echo $attributes; ?>>
        <div class="slider-inner" data-bolts-slider="<?php echo $type; ?>">
            <?php foreach ($slides as $slide) : ?>
                <div class="slider-slide" data-bolts-slide>
                    <?php layout_items($slide); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($has_controls)) : ?>
            <?php component('common/button', [
                'title'      => 'Previous',
                'modifier'   => 'is-slider-control is-previous',
                'attributes' => [
                    'data-bolts-slider-control' => true,
                    'data-bolts-slide-to'       => 'previous'
                ]
            ]); ?>

            <?php component('common/button', [
                'title'      => 'Next',
                'modifier'   => 'is-slider-control is-next',
                'attributes' => [
                    'data-bolts-slider-control' => true,
                    'data-bolts-slide-to'       => 'next'
                ]
            ]); ?>
        <?php endif; ?>

        <?php if (!empty($has_pagination) && count($slides) > 1) : ?>
            <nav class="slider-pagination">
                <?php foreach ($slides as $i => $slide) : ?>
                     <?php component('common/button', [
                        'title'      => $i + 1,
                        'theme'      => 'slider-dot',
                        'attributes' => [
                            'data-bolts-slider-dot'   => true,
                            'data-bolts-slide-to'     => $i,
                            'data-bolts-state-active' => $i == 0
                        ]
                    ]); ?>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>
    </section>
<?php endif; ?>