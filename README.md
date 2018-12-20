# Bolts WP
Bolts WP is your new favourite developer theme (at least for WordPress) - tough enough to power (and easily maintain) websites of any shape and size, yet so simple that you can become a power user within a day. It focuses on removing complexity and streamlining development without creating a whole new workflow. Its not trying to recreate the wheel, just make it rounder.

Bolts WP has a modern workflow and many of the build tools you´ve come to love and expect, out of the box:

- **Webpack** for bundling and task running
- **Babel** for transpiling and polyfilling ES6+
- **Sass** with **Autoprefixer**, **CSSNano** and **MQPacker* for styles
- **BrowserSync** for browser testing and autoreloading CSS, JS and PHP
- **Jest** for testing, 
- **ESLint**, **Stylelint** and **Prettier** for linting and code formatting
- **Husky** (with **Lint Staged**) for git hooks
- **Imagemin** for image optimization
- **Bolts** for doing all mundane styling tasks you hate 

(Ok, you might not have expected that last one, but trust us, [you will after you´ve tried it](http:s//github.com/pocketsize/bolts "you will after you´ve tried it"))

As for the PHP, Bolts WP is component oriented and features helpers to keep your code as DRY as possible. Just use the `component()` function, pass in your data and never write any markup in your page templates again. 

The theme also features a lot of handy functions and cleaning defaults, removing bloat and filling WP's blatant gaps, making the workflow more normalized and easy to use. 


## Table of contents
- [Installation](#installation "Installation")
- [Build scripts](#build-scripts "Build scripts")
  - [For development](#for-development "For development")
  - [For production](#for-production "For production")
- [Configuring](#configuring "Configuring")
  - [Webpack](#webpack "Webpack")
  - [Jest and Enzyme](#jest-and-enzyme "Jest and Enzyme")
 
## Installation
1. `git clone` the repo in your themes directory
2. Run `yarn install`

## Build scripts
### For development
Bolts WP uses Yarn and provides 5 build scripts for dev:
- `yarn dev` bundles a dev-version of the theme
- `yarn watch` bundles a dev-version every time a SCSS, JS or PHP file changes
- `yarn serve` does the same as above but also starts BrowserSync in your preferred browser
- `yarn test` runs the Jest tests
- `yarn test:watch` wathes file changes and runs Jest tests
- `yarn coverage` runs the Jest tests and generates a coverage report
- `bolts-add:react` adds all packages, config and directories needed for working with React
- `bolts-remove:react` removes all React-related packages, config and directories
- `bolts-remove:react:keep-files` removes all React-related packages and config, but keeps the directories

### For production
Only one. `yarn prod` bundles a prod-ready theme. 

## Configuring
### Webpack
If you are one of those people that loves to customize stuff the most common Webpack settings are available to you (and documented) in `config/bundling/editable.config.js` and `config/bundling/module.rules.js`. 

We suspect that the most changed settings will be the `settings` property in `config/bundling/editable.config.js:56`. The defaults are nice and reasonable, but give it a look if you're feeling adventurous.

### Jest and Enzyme
If you are a casual tester all defaults are good to go, but you hardcore testers out there potentially might find our setup a bit too basic. Check out `config/testing` and get it up to your standards.

### PHP Defaults
Bolts WP features a couple of defaults used both during the init, but also by some of our functions. They are all configurable with `define()`, that should be done in `functions.php`.

| Name                             | Type   | Default Value |
|----------------------------------|--------|---------------|
| `BOLTS_WP_DISABLE_ADMIN_BAR`     | Bool   | `false`       |
| `BOLTS_WP_DISABLE_EMOJIS`        | Bool   | `false`       |
| `BOLTS_WP_EXCERPT_WORDS`         | Int    | `55`          |
| `BOLTS_WP_EXCERPT_MORE`          | String | `'[...]'`     |
| `BOLTS_WP_ENQUEUE_JQUERY`        | Bool   | `false`       |
| `BOLTS_WP_DEFAULT_MENU_LOCATION` | Bool   | `false`       |

## Component workflow and theme functions

#### component( $file, $args = false )
Include a template part from the components folder, with optional arguments

<br>
------
<br>

#### get_component($file, $args = false)
Return a component, mostly used for AJAX

<br>
------
<br>

#### layout_items($items, $item_class = false)
Used in layout components. Loop through the layout items and output components from their data, if a class and a class suffix is present wrap the component in a div.

<br>
------
<br>

#### get_menu_array( $location = false )
Return a nested nav menu array by menu location

<br>
------
<br>

#### get_theme_dir()
Return the current theme directory

<br>
------
<br>

#### theme_dir()
Print the current theme directory

<br>
------
<br>

#### get_theme_uri()
Return the current theme directory URI

<br>
------
<br>

#### theme_uri()
Print the current theme directory URI

<br>
------
<br>

#### get_asset( $asset, $fallback = false )
Return the path to a theme asset file

<br>
------
<br>

#### asset( $asset, $fallback = false )
Print the path to a theme asset file

<br>
------
<br>

#### get_svg( $asset, $fallback = false )
Return .svg file parsed for inline use

<br>
------
<br>

#### svg( $asset, $fallback = false )
Echo .svg file parsed for inline use

<br>
------
<br>

#### create_post_type( $slug, $singular, $plural, $icon = null, $custom_args = false ) 
Register a custom post type

<br>
------
<br>

#### create_taxonomy( $slug, $singular, $plural, $post_type = 'post', $custom_args = false )
Register a custom taxonomy

<br>
------
<br>


## Content functions

#### is_post_type( $post_type, $post = false )
Determine if a post has a specific post type

<br>
------
<br>

#### get_title( $post_id = false, $filtered = false )
Return the title of a post

<br>
------
<br>

#### title( $post_id = false )
Print the title of a post

<br>
------
<br>

#### get_content( $post_id = false, $filtered = false )
Return the content of a post

<br>
------
<br>

#### content( $post_id = false )
Print the content of a post

<br>
------
<br>

#### get_excerpt( $post_id = false, $words = false, $more = false )
Return the excerpt for a post (manual or automatically generated)

<br>
------
<br>

#### excerpt( $post_id = false, $words = false, $more = false )
Print the excerpt for a post (manual or automatically generated)

<br>
------
<br>

#### get_author( $post_id = false, $field = 'display_name' )
Return author information from a post (defaults to display name)

<br>
------
<br>

#### author( $post_id = false, $field = false )
Print author information from a post (defaults to display name)

<br>
------
<br>

#### get_featured_image( $post_id = false, $size = 'full', $fallback = false )
Return the URI for the featured image of a post

<br>
------
<br>

#### featured_image( $post_id = false, $size = 'full', $fallback = false )
Print the URI for the featured image of a post

<br>
------
<br>

#### get_media( $attachment_id, $size = 'full', $fallback = false )
Return the path to an attachment in the media library

<br>
------
<br>

#### media( $attachment_id, $size = 'full', $fallback = false )
Print the path to an attachment in the media library

<br>
------
<br>



# TODO : Finish this readme
