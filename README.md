# Bolts WP
Bolts WP is your new favourite starter theme (at least for WordPress) - tough enough to power (and easily maintain) websites of any shape and size, yet so simple that you can become a power user a day. It focuses on removing complexity and streamlining development without creating a whole new workflow. Its not trying to recreate the wheel, just make it rounder.

Bolts WP has a modern workflow and many of the build tools you´ve come to love and expect, out of the box:

- **Webpack** for bundling and task running
- **Babel** for transpiling and polyfilling ES6+
- **Sass** with **Autoprefixer** for styles
- **BrowserSync** for browser testing and autoreloading CSS, JS and PHP
- **Mocha** and **Chai** for unit testing
- **Istanbul** and **Nyc** for coverage reports
- **ESLint** and **Stylelint** for linting
- **Imagemin** for image optimization
- **Bolts** for doing all mundane styling tasks you hate 

(Ok, you might not have expected that last one, but trust us, [you will after you´ve tried it](http:s//github.com/pocketsize/bolts "you will after you´ve tried it"))


## Table of contents
- [Installation](#installation "Installation")
- [Build scripts](#build-scripts "Build scripts")
  - [For development](#for-development "For development")
  - [For production](#for-production "For production")
- [Configuring Webpack](#configuring-webpack "Configuring Webpack")

## Installation
1. `git clone` the repo in your themes directory
2. Run `yarn install`

## Build scripts
### For development
Bolts WP uses Yarn and provides 5 build scripts for dev:
- `yarn dev` bundles a dev-version of the theme
- `yarn watch` bundles a dev-version every time a SCSS, JS or PHP file changes
- `yarn watch-serve` does the same as above but also starts BrowserSync in your preferred browser
- `yarn test` runs the Mocha tests
- `yarn coverage` runs the Mocha tests and generates a Nyc report

### For production
Only one. `yarn prod` bundles a prod-ready theme. 

## Configuring Webpack
If you are one of those people that loves to customize stuff the most common Webpack settings are available to you (and documented) in `build/editable.config.js`. 

We suspect that the most changed setting will be BrowserSyncs `proxy`. This allows you to pipe your dev server through BrowserSync. If you run `my-local-site.local` in MAMP it might look like this:

```javascript
browserSync: {
    host: 'localhost',
    port: 3000,
    proxy: 'http://my-local-site.local:8888'
}
```

Easy peasy, lemon squeazy


# TODO : Finish this readme
