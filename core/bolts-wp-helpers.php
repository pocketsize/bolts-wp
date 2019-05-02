<?php

/**
 * modifier
 * Normalize component theme and modifier classes
 *
 * @param string|null $theme
 * @param string|null $modifier
 * @return string
 */

function modifier($theme = null, $modifier = null)
{
    $modifier  = !empty($modifier) ? $modifier : '';
    $theme     = !empty($theme)    ? $theme    : 'default';
    $modifier .= ' is-theme-' . $theme;
    
    return $modifier;
}

/**
 * attributes
 * Allow custom attributes to be set either as a string or an array of key value pairs
 *
 * @param string|array $attributes
 * @return string
 */

function attributes($attributes)
{
    if (is_array($attributes)) {
        $attribute_string = '';

        foreach ($attributes as $attribute => $value) {
            if ($value === false) {
                continue;
            }

            $attribute_string .= ' ' . $attribute;

            if ($value !== true) {
                $attribute_string .= '="' . $value . '"';
            }
        }

        return trim($attribute_string);
    }

    return $attributes;
}