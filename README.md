# Bolts WP
*1.0.1*

Bolts WP is your new favourite developer theme (at least for WordPress) - tough enough to power (and easily maintain) websites of any shape and size, yet so simple that you can become a power user within a day. It focuses on removing complexity and streamlining development without creating a whole new workflow. Its not trying to recreate the wheel, just make it rounder.

Bolts WP has a modern workflow and many of the build tools you´ve come to love and expect, out of the box:

- **Webpack** for bundling and task running
- **Babel** for transpiling and polyfilling ES6+
- **Sass** with **Autoprefixer**, **CSSNano** and **MQPacker** for styles
- **ESLint**, **Stylelint** and **Prettier** for linting and code formatting
- **Bolts** front-end library

As for the PHP, Bolts WP is component oriented and features helpers to keep your code as DRY as possible. Just use the `component()` function, pass in your data and never write any markup in your page templates again.

The theme also features a lot of handy functions and cleaning defaults, removing bloat and filling WP's blatant gaps, making the workflow more normalized and easy to use.

## Table of contents
- [Installation](#installation "Installation")
- [Build scripts](#build-scripts "Build scripts")
  - [For development](#for-development "For development")
  - [For production](#for-production "For production")

## Installation
1. Run `git clone` in your themes directory to install the theme
2. Run `npm install` to install all npm packages

## Build scripts
### For development
- `npm run dev` bundles a unminified development version of the theme
- `npm run watch` bundles a development version every time a SCSS or JS file changes

### For production
- `npm run build` bundles a production ready theme.

### PHP Defaults
Bolts WP features a couple of defaults used both during the init, but also by some of our functions. They are all configurable with `define()`, that should be done in `functions.php`.

| Name                             | Type   | Default Value |
|----------------------------------|--------|---------------|
| `BOLTS_WP_DEFAULT_MENU_LOCATION` | Bool   | `false`       |

## Content functions

#### get_page_ids_by_template( $template )
Return an array of page ids that match the specified template


------------

<br>


#### get_page_id_by_template( $template )
Return the first page id that matches a template


------------

<br>


#### is_template( $template, $post_id = false )
Return whether the current (or specified) post matches a template


------------

<br>

#### is_post_type( $post_type, $post = false )
Determine if a post has a specific post type


------------

<br>

#### get_title( $post_id = false, $filtered = false )
Return the title of a post


------------

<br>

#### get_content( $post_id = false, $filtered = false )
Return the content of a post


------------

<br>

#### get_excerpt( $post_id = false, $words = false, $more = false )
Return the excerpt for a post (manual or automatically generated)


------------

<br>

#### get_author( $post_id = false, $field = 'display_name' )
Return author information from a post (defaults to display name)


------------

<br>

#### get_date( $post_id = false, $format = false )
Return formatted date from a post


------------

<br>

#### get_featured_image( $post_id = false, $size = 'full', $fallback = false )
Return the URI for the featured image of a post


------------

<br>

#### get_media( $attachment_id, $size = 'full', $fallback = false )
Return the path to an attachment in the media library


------------

## Theme functions

#### component( $file, $args = false )
Include a template part from the components folder, with optional arguments


------------

<br>

#### get_theme_dir()
Return the current theme directory


------------

<br>

#### get_theme_uri()
Return the current theme directory URI


------------

<br>

#### get_asset( $asset, $fallback = false )
Return the path to a theme asset file


------------

<br>

#### get_svg( $asset, $fallback = false )
Return .svg file parsed for inline use


------------

<br>

#### create_post_type( $slug, $singular, $plural, $icon = null, $custom_args = false )
Register a custom post type


------------

<br>

#### create_taxonomy( $slug, $singular, $plural, $post_type = 'post', $custom_args = false )
Register a custom taxonomy


------------


<br>

#### layout_items($items, $item_class = false)
Used in layout components. Loop through the layout items and output components from their data, if a class and a class suffix is present wrap the component in a div.


------------

<br>

#### get_menu_object($location = false)
Return an object with the full menu structure for a menu location


------------
