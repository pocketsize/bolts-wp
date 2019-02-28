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

$type      = !empty($type) ? $type : 'default';
$type_attr = 'data-slider="' . $type . '"';

$theme       = !empty($theme) ? $theme : 'default';
$theme_class = 'is-theme-' . $theme;
$modifier    = !empty($modifier) ? $modifier : '';
?>

<?php if (!empty($slides)) : ?>
    <section class="slider <?php echo $theme_class; ?> <?php echo $modifier; ?>">
        <div class="slider-inner" <?php echo $type_attr; ?>>
            <?php foreach ($slides as $slide) : ?>
                <div class="slider-slide" data-slide>
                    <?php component($slide['component'], $slide['data']); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if (!empty($has_controls)) : ?>
            <button class="slider-control is-previous" data-control="previous">
                Prev
            </button>
            <button class="slider-control is-next" data-control="next">
                Next
            </button>
        <?php endif; ?>

        <?php if (!empty($has_pagination)) : ?>
            <nav class="slider-pagination">
                <?php foreach ($slides as $i => $slide) : ?>
                    <?php $active_class = $i == 0 ? 'is-active' : ''; ?>
                    <button class="slider-dot <?php echo $active_class; ?>" data-dot></button>
                <?php endforeach; ?>
            </nav>
        <?php endif; ?>
    </section>
<?php endif; ?>