<?php
/**
 * Form
 *
 * Used to wrap form components, lol.
 * The only layout component that shouldnt layout.
 * Maybe this could be called a functional component?
 * Maybe 'common/slider.php' is a functional component as well??
 *
 * Many questions...
 *
 * @param string $action
 * @param string $method - defaults to POST
 * @param string $target
 * @param bool   $novalidate
 * @param bool   $autocomplete
 *
 * @param array  $fields
 */

$attributes = attributes($attributes ?? '');
$modifier   = modifier($theme ?? null, $modifier ?? null);

$action       = !empty($action)       ? 'action="' . $action . '"' : '';
$method       = !empty($method)       ? $method                    : 'POST';
$target       = !empty($target)       ? 'target="' . $target . '"' : '';
$novalidate   = !empty($novalidate)   ? 'novalidate'               : '';
$autocomplete = !empty($autocomplete) ? 'autocomplete'             : '';
?>

<div class="form <?php echo $modifier; ?>" <?php echo $attributes; ?>>
    <div class="form-inner">
        <form
            class="form-element"
            method="<?php echo $method; ?>"
            <?php echo $action; ?>
            <?php echo $target; ?>
            <?php echo $novalidate; ?>
            <?php echo $autocomplete; ?>
        >
            <?php layout_items($fields, 'form-field'); ?>
        </form>
    </div>
</div>
