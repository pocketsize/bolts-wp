<?php

/**
 * Bolts v1.0 | MIT License
 *
 * Developed by Pocketsize
 * http://www.pocketsize.se/
 */

/**
 * Determine if a post has a specific post type
 * @return bool
 */

function is_post_type( $post_type, $post = false ) {
	if ( !$post ) {
		global $post;
	} else if ( is_int( $post ) ) {
		$post = get_post( $post );
	}
	return $post->post_type == $post_type;
}


/**
 * Return the title of a post
 * @param int $post_id
 * @return string
 */

function get_title( $post_id = false, $filtered = false ) {
    if ( !!$post_id ) {
        $post = get_post( $post_id );
    } else {
        global $post;
    }

    if ( $filtered ) return apply_filters( 'the_title', $post->post_title );

    return $post->post_title;
}


/**
 * Print the title of a post
 * @param int $post_id
 */

function title( $post_id = false ) {
    echo get_title( $post_id, true );
}


/**
 * Return the content of a post
 * @param int $post_id
 * @return string
 */

function get_content( $post_id = false, $filtered = false ) {
    if ( !!$post_id ) {
        $post = get_post( $post_id );
    } else {
        global $post;
    }

    if ( $filtered ) return apply_filters( 'the_content', $post->post_content );

    return $post->post_content;
}

/**
 * Print the content of a post
 * @param int $post_id
 */

function content( $post_id = false ) {
    echo get_content( $post_id, true );
}


/**
 * Return the excerpt for a post (manual or automatically generated)
 * @return string
 */

// TODO: Test this function, check how the content is filtered

function get_excerpt( $post_id = false, $words = false, $more = false ) {
	if ( !$words ) $words = BOLTS_WP_EXCERPT_WORDS;
	if ( !$more )  $more  = BOLTS_WP_EXCERPT_MORE;

	if ( !!$post_id ) {
		$post = get_post( $post_id );
	} else {
		global $post;
	}

	if ( !empty($post->post_excerpt) ) return $post->post_excerpt;

	$filtered = apply_filters( 'the_content', $post->post_content );
	return wp_trim_words( strip_tags($filtered), $words, $more );
}


/**
 * Print the excerpt for a post (manual or automatically generated)
 */

function excerpt( $post_id = false, $words = false, $more = false ) {
	echo get_excerpt( $post_id, $words, $more );
}




/**
 * Return author information from a post (defaults to display name)
 * @param int $post_id
 * @param string $field
 * @return string
 */

function get_author( $post_id = false, $field = 'display_name' ) {
	if ( !!$post_id ) {
		$post = get_post( $post_id );
	} else {
		global $post;
	}

	return get_author_meta( $field, $post->post_author );
}


/**
 * Print author information from a post (defaults to display name)
 * @param int $post_id
 * @param string $field
 */

function author( $post_id = false, $field = false ) {
	echo get_author( $post_id, $field );
}


/**
 * Return the URI for the featured image of a post
 * @return string
 */

function get_featured_image( $post_id = false, $size = 'full', $fallback = false ) {
	if ( !$post_id ) {
		global $post;
		if ( !$post ) return $fallback;
		$post_id = $post->ID;
	}
	
	if ( has_post_thumbnail( $post_id ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
		if ( !empty($image[0]) ) return $image[0];
	}

	return $fallback;
}


/**
 * Print the URI for the featured image of a post
 */

function featured_image( $post_id = false, $size = 'full', $fallback = false ) {
	echo get_featured_image( $post_id, $size, $fallback );
}


/**
 * Return the path to an attachment in the media library
 * @return string
 */

function get_media( $attachment_id, $size = 'full', $fallback = false ) {
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	if ( !!$image ) return $image[0];
	return $fallback;
}


/**
 * Print the path to an attachment in the media library
 */

function media( $attachment_id, $size = 'full', $fallback = false ) {
	echo get_media( $attachment_id, $size, $fallback );
}