# Bolts WP workflow and conventions

### Table of content
- Introduction
- Components
  - Basic component
  - Layout component
- Fetching data
- JS and SCSS


## Introduction
The main thought behind Bolts WP is to abstract away and normalize WordPress as much as possible without building a whole new framework on top of a framework.

The basic premise is as follows, read it for now and dont ask any questions, it will all make sense soon:

- Everything is **components**
- All data is fetched with **functions**
- Templates are for **components** and the occasional variable **ONLY**

What this (hopefully) creates is simply nice, clean and maintanable code that is easy to reason about.

We also have a plethora of sweet, sweet helper functions to make life easier. Check out the `./lib`-folder while we write the documentation.

Now, lets go on to explaining the main workflow.

## Components
We live in modern times - lets not rewrite markup like cave people. Inspired by marvels of thechnology like `Laravel Blade` and `React` we created the Bolts Component. If you know your way around WP it's a little similar to `get_template_part()` with the added benefit of being able to pass variables to it without polluting the global scope. Oh, and it looks for the filenames in the `./components`-folder, so no need to write complicated pathnames. Using it in the most basic way looks a little like this:

```php
component('button', [
	'title' => 'Click me',
	'url'   => 'http://www.rickastley.com'
]);
```
> This assumes that you have the file `./components/button.php`, mind you.

We have been working with components for generations, and through the times we and our ancestors have found two types of commonly used components:

- Basic components
- Layout components

### Basic components
The most commonly used one. Takes data, outputs data. A basic component can have other basic components as children, but the child components are _locked_: the data can change, but the component called upon is always the same. Dynamic component slots are for _Layout components_. More about those below.

Never fetch data in a component. Always pass data to it from a template.

> Check out `./components/image.php` for an example of a basic component

### Layout components
The ~ c o o l ~ one. As the name implies, this is a component with _dynamic component slots_ meaning that you pass both the data _AND_ the component name to it. Layout components can also take other layout-specific data. Here's a basic example with a fictional data structure written out:

```php
component('layouts/content-with-sidebar', [
	'content_theme' => 'posts',
	'content' => [
		[
			'component' => 'thumb',
			'data' => [
				'media_id' => 266,
				'title'    => 'Who likes to rock the party?',
			]
		],
		[
			'component' => 'thumb',
			'data' => [
				'media_id' => 34,
				'title'    => 'We like to rock the party!',
			]
		],
		[
			'component' => 'thumb',
			'data' => [
				'media_id' => 897,
				'title'    => 'New Zealand likes to rock the party',
			]
		]
	],
	'sidebar' => [
		'component' => 'editor',
		'data' => [
			'name' => 'Brett McKenzie',
			'email' => 'brett@yahoo.nz'
		]
	]
]);
```
"Wow... Thats quite a handful...", you might say. Yes it it. Thats why all data fetching should be done with functions.

> Check out `./components/layouts/full.php` or `./components/layouts/split.php` for a real-life example.

## Fetching data
Clean templates makes a clean mind. Thats why we dont weant to pollute our files with data fetching everywhere (been there, done that, got the headeache). All fetching should be done with functions and these functions should be placed in `./data-fetching.php`. When done properly, fetching functions should output correctly formatted data making the above example look super nice and neat like so:

```php
component('layouts/content-with-sidebar', [
	'content_theme' => 'posts',
	'content' => prepare_blog_posts_data(),
	'sidebar' => prepare_blog_sidebar_data()
]);
```

"Wow! Thats __MUCH__ cleaner!". Yes we know. Now check out how it could look for basic components:

```php
component('post-preview', prepare_preview_data());
```

...or even with a nicely structured ACF field:

```php
component('social-icons', get_field('social_icons'));
```

A little more on structuring ACF later.

## JS and SCSS
Structure the folders as you structure the components folder. 1 file per component!