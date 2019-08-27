<?php

/**
 * build_url
 * 
 * Equivalent of parse_url
 *
 * @param array $parts
 * @return string
 */

function build_url($parts) {
    $scheme = isset( $parts['scheme'] ) ? $parts['scheme'] : $_SERVER['REQUEST_SCHEME'];

    if ( !$scheme ) {
		$scheme = 'http';
	}

    $host = isset( $parts['host'] ) ? $parts['host'] : $_SERVER['HTTP_HOST'];
    $port = isset( $parts['port'] ) ? ':' . $port : '';
    $user = isset( $parts['user'] ) ? $parts['user'] : false;
    $pass = isset( $parts['pass'] ) ? $parts['pass'] : false;

    if ( !!$user ) {
        $auth = $user;
        if ( !!$pass ) $auth .= ':' . $pass;
        $auth .= '@';
    } else {
        $auth = '';
    }

    $path  = isset( $parts['path'] )  ? '/' . ltrim($parts['path'], '/')  : '/';
    $query = isset( $parts['query'] ) ? $parts['query'] : '';

    if ( !empty( $query ) ) {
		$query = '?' . $query;
	}

    return $scheme . '://' . $auth . $host . $port . $path . $query;
}

/**
 * http_parse_query
 * 
 * Equivalent of http_build_query
 *
 * @param string $url
 * @return array
 */

function http_parse_query($url) {
	parse_str($url, $parts);
	return $parts;
}

/**
 * add_oembed_params
 * 
 * Add/replace query params in an oembed blob
 *
 * @param string $oembed
 * @param null|array params
 * @return array
 */

function add_oembed_params($oembed, $params = null) {
	preg_match('/src="(.*?)"/', $oembed, $matches);
	$url = $matches[1];

	$url_structure = parse_url($url);
	$url_params    = [];

	if (!empty($url_structure['query'])) {
		$url_params = http_parse_query($url_structure['query']);
	}

	if ($params) {
		$url_params = array_replace($url_params, $params);
	}

	$url_structure['query'] = http_build_query($url_params);
	$url = build_url($url_structure);

	return preg_replace('/src="(.*?)"/', 'src="' . $url . '"', $oembed);
}

function get_oembed_width($oembed) {
	preg_match('/width="(.*?)"/', $oembed, $matches);

	if (empty($matches[1])) return '';

	return $matches[1];
}

function get_oembed_height($oembed) {
	preg_match('/height="(.*?)"/', $oembed, $matches);

	if (empty($matches[1])) return '';

	return $matches[1];
}