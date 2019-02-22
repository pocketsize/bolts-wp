# Bolts WP workflow and conventions
This theme is still very much in beta, but the ideas behind the implementation are pretty solid. We have tried to keep the filebase as documented as possible, so check it out after you've read this document for some more examples.

### Table of content
- Introduction
- Components
  - Basic component
  - Layout component
- Fetching data
- JS and SCSS
- Naming conventions
  - HTML
  - SASS
  - Indentation


## Introduction
The main thought behind Bolts WP is to abstract away and normalize WordPress as much as possible without building a whole new framework on top of a framework.

The basic premise is as follows, read it for now and don't ask any questions, it will all make sense soon:

- Everything is **components**
- All data is fetched with **functions**
- Templates are for **components** and the occasional variable **ONLY**

What this (hopefully) creates is simply nice, clean and maintanable code that is easy to reason about.

We also have a plethora of sweet, sweet helper functions to make life easier. Check out the `./lib`-folder (while waiting for us to write the documentation).

Now, lets go on to explaining the main workflow.

## Components
We live in modern times - lets not rewrite markup like cave people. Inspired by marvels of thechnology like `Laravel Blade` and `React` we created the Bolts WP Component. If you know your way around WP it's a little similar to `get_template_part()` with the added benefit of being able to pass variables to it without polluting the global scope. Oh, and it looks for the filenames in the `./components`-folder, so no need to write complicated pathnames. Using it in the most basic way looks a little like this:

```php
component('button', [
    'title' => 'Click me',
    'url'   => 'http://www.rickastley.com'
]);
```
> This assumes that you have the file `./components/button.php`, mind you.

We have been working with components for generations, and through the times we and our ancestors have found two types of commonly used components:

- Common components
- Layout components

### Basic components
The most commonly used one. Takes data, outputs data. A basic component can have other basic components as children, but the child components are _locked_: the data can change, but the component called upon is always the same. Dynamic component slots are for _Layout components_. More about those below.

Never fetch data in a component. Always pass data to it from a template using a function.

Style-wise, Basic components should be as fluid as possible, leaving the sizing to the _Layout components_, but this is not a rule, just a guideline to make life easier.

> Check out `./components/common/image.php` for an example of a basic component

### Layout components
The ~ c o o l ~ one. As the name implies, this is a component with _dynamic component slots_ meaning that you pass both the data _AND_ the component name to it. Layout components can also take other layout-specific data. Here's a basic example with a fictional data structure written out:

```php
component('layouts/content-with-sidebar', [
    'theme' => 'posts',
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

In most cases Layout components should be as unstyled as possible, only setting widths, margins, paddings etc, but just like with the _Basic components_ this is not a rule, but a guideline.

> Check out `./components/layouts/full.php` or `./components/layouts/split.php` for a real-life example.

## Fetching data
Clean templates makes a clean mind. Thats why we dont want to pollute our files with data fetching everywhere (been there, done that, got the headeache). All fetching should be done with functions and these functions should be placed in `./functions/data.php`. When done properly, fetching functions should output correctly formatted data making the above example look super nice and neat like so:

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

> Check out `./functions/data.php` for a data function example.

## JS and SCSS
The structure in `./src/js/components` and `./src/sass/components` should match the `./components` folder as closely as possible. 1 component per file, nice and clean. Other files (such as helpers etc.) are placed in `./src/js` and `./src/sass`.

## Naming conventions
This is a pretty controversial topic, and should not be considered as Bolts WP canon if you dont work at Pocketsize. We include it here so you get the thoughts behind our included boilerplate components.

The class names follow a modified version of BEM. The base rule is as follows: `{block}-{element} [is/has/was/had]-{modifier}`

- The block part of the class should describe the scope.
- The element part of the class should describe what the element is.
- Only the modifier class can describe what the element looks like.

When you need to add another element in your mark-up for styling purposes that serves no purpose without the element it's wrapping or contained within it should be named as follows:
- `{block}-{element}-outer` for outer elements
- `{block}-{element}-inner` for inner elements

The block should always be the root-element of the component. We strongly advise against `.button-outer .button`-selectors.
Multiple {elements} in your class name are discouraged, we believe every element in a block should be able to stand on it's own. This does not mean {block} or {element} names can not contain hyphens, just dont do this: `.post-preview .post-preview-links .post-preview-links-link`, do this: `.post-preview .post-preview-links .post-preview-link`


### HTML

Implementing the conventions above we get something like this:

```html
<section class="event is-expired">
    <div class="event-inner">
        <h2 class="event-title">The Title</h2>

        <div class="event-content">
            <!-- begin classless content (usually from cms or other data source) -->
            <p>Here's the content. This is a paragraph and below is a list.</p>

            <ul>
                <li>List item 1</li>
                <li>List item 2</li>
                <li>List item 3</li>
            </ul>
            <!-- end classless content -->
        </div>

        <ul class="event-links">
            <li class="event-link-outer">
                <a href="#" class="event-link">A link</a>
            </li>
        </ul>

        <!-- in reality the social icons should probably be broken out to its own component but we put it here for demo purposes -->
        <ul class="event-social-icons">
            <li class="event-social-icon-outer">
                <a class="event-social-icon is-facebook" href="https://www.facebook.com"></a>
            </li>
            <li class="event-social-icon-outer">
                <a class="event-social-icon is-instagram" href="https://www.instagram.com"></a>
            </li>
        </ul>
    </div>
</section>
```

### SCSS

#### Mixins and placeholder classes
Apart from the Bolts reset, we do not write global styles. For common styles we create placeholder classes that we extend on the relevant elements in each block scope. Mixins are only used in very rare ocasions.

#### Variables
We use 2 types of SCSS variables: `global` and `local`. "How do you do that?" - you might ask - "I thought all SCSS variables where global?". Yes you are completely correct. 10 points to your Hogwarts house of choice. So what do we mean with this? It all comes down to naming and philosophy.

- Global variables are used for more general values that used by more than one component. They reside in './src/sass/helpers/_variables.scss` and are never to be defined or overwritten *anywhere else*. They are always defined as such: `${scope}--{variable name}`. Examples include: `$color--primary` or `$gutter--base`.
- Local variables are used for specific values in one component, and are helpful to quickly change complicated calculations or advanced color theming. They reside at the top of the SCSS-file of the component it should be used in. They are named without a double-dashed scope name and are probably rewritten a couple of times in a project (whenever they are re-defined in a new component). Examples include: `$primary-color` or `$gutter`.

It is important to honor this naming convention to make sure no important variables are overwritten, and headache is saved.

#### Code style
Nesting is not advised. Instead we use the `&`-reference to visually scope things together.


```scss
%font-weight--bold: 700;

%title--primary {
    font-weight: $font-weight--bold;

    @media (width-to(mediul)) {
        font-size: 2em;
    }

    @media (width-from(medium)) {
        font-size: 4em;
    }
}

%title--secondary {
    font-weight: $font-weight--bold;

    @media (width-to(mediul)) {
        font-size: 1.5em;
    }

    @media (width-from(medium)) {
        font-size: 3.5em;
    }
}

p,
ul {
    %wysiwyg & + & {
        margin-top: 1em;
    }
}

%wysiwyg {
    p,
    li {
        line-height: 1.6;
    }
}

.event {
    &-inner {
        @include container;
    }

    &-title {
        @extend %title--primary;

        .event.is-expired & {
            color: $color--red;
        }
    }

    &-content {
        @extend %wysiwyg;
    }

    &-links-title {
        @extend %title--secondary;
    }

    &-links {
        @include inline-layout(20px);
    }

    &-link-outer {
        @media ( width-to(medium) ) {
            width: 50%;
        }
        @media ( width-from(medium) ) {
            width: 25%;
        }
    }

    &-link {
        display: inline-block;

        &:hover {
            text-decoration: underline;
        }
    }

    &-social-icons-title {
        @extend %title--secondary;
    }

    &-social-icons {
        @include inline-layout(10px);
    }

    &-social-icon {
        display: block;
        width: 20px;
        height: 20px;

        &.is-facebook  {
            @include background('../images/facebook.png');
        }
        &.is-instagram {
            @include background('../images/instagram.png');
        }
    }
}
```

### Indentation

Entering flamewar zone, but we use spaces. 4 spaces per level to be exact. That makes it render nicely across all platforms, contexts, editors, whatevers etc. If you're smart you'll set your editor/IDE to map one tab to 4 spaces.