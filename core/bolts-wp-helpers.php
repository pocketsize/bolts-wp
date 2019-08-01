<?php

/**
 * Bolts WP v1.0.0
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

/**
 * modifiers
 *
 * Normalize component theme and modifier classes
 *
 * @param string|null $theme
 * @param string|null $modifier
 * @return string
 */

function get_modifiers($modifiers = null, $theme = null)
{
    // make sure modifiers is an array
    $modifiers = !empty($modifiers) ? $modifiers : [];

    // make modifiers into array if is string
    if (is_string($modifiers)) {
        $modifiers = explode(' ', $modifiers);
    }

    // get existing theme modifiers if any
    $theme_modifiers = preg_grep('/^' . preg_quote('is-theme-', '/') . '/', $modifiers);

    // remove any theme modifiers
    if (!empty($theme_modifier)) {
        $modifiers = array_diff($modifiers, $theme_modifiers);
    }

    if ($theme !== false) {
        if ($theme !== null) {
            // if theme is specified, set theme
            $theme_modifier = 'is-theme-' . $theme;
        } elseif (!empty($theme_modifiers)) {
            // set theme to first theme modifier, if any
            $theme_modifier = $theme_modifiers[0];
        } else {
            // set theme to default (as long as theme not false)
            $theme_modifier = 'is-theme-default';
        }

        // add theme to beginning of modifiers array
        array_unshift($modifiers, $theme_modifier);
    }

    return $modifiers;
}

function modifiers($modifiers = null, $theme = null)
{
    // get modifiers
    $modifiers = get_modifiers($modifiers, $theme);

    // return modifiers string
    return implode($modifiers, ' ');
}

/**
 * attributes_to_array
 * Takes an attributes string and returns an attributes array
 *
 * @param string $attributes
 * @return array
 */

function attributes_to_array($attributes)
{
    if (is_array($attributes)) {
        return $attributes;
    }

    $doc = new DOMDocument();
    $doc->loadHTML("<input $attributes />");
    $element = $doc->getElementsByTagName('input')->item(0);

    $attributes_array = [];

    foreach ($element->attributes as $attribute) {
        $key   = $attribute->name;
        $value = !empty($attribute->value) ? $attribute->value : true;

        $attributes_array[$key] = $value;
    }
    
    return $attributes_array;
}

/**
 * attributes_to_string
 * Takes an attributes string and returns an attributes array
 *
 * @param array $attributes
 * @return string
 */

function attributes_to_string($attributes)
{
    $attributes_string = '';

    foreach ($attributes as $attribute => $value) {
        if ($value === false) {
            continue;
        }

        $attributes_string .= ' ' . $attribute;

        if ($value !== true) {
            $attributes_string .= '="' . $value . '"';
        }
    }

    return trim($attributes_string);
}

/**
 * get_attributes
 * Allow custom attributes to be set either as a string or an array of key value pairs
 *
 * @param string|array $attributes
 * @param string|array $defaults
 * @return string
 */

function get_attributes($attributes, $defaults = [])
{
    $attributes = attributes_to_array($attributes);
    $defaults   = attributes_to_array($defaults);

    $attributes = array_merge($defaults, $attributes);

    return $attributes;
}

/**
 * attributes
 * Allow custom attributes to be set either as a string or an array of key value pairs
 *
 * @param string|array $attributes
 * @param string|array $defaults
 * @return string
 */

function attributes($attributes, $defaults = [])
{
    return attributes_to_string(get_attributes($attributes, $defaults));
}
