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


# TODO : Finish this readme
