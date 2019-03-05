<?php

/**
 * modifier
 * Normalize component theme and modifier classes
 * @param string|null $theme
 * @param string|null $modifier
 * @return string
 */

function modifier($theme = false, $modifier = false) {
    $modifier  = !empty($modifier) ? $modifier : '';
    $theme     = !empty($theme)    ? $theme    : 'default';
    $modifier .= ' is-theme-' . $theme;
    
    return $modifier;
}