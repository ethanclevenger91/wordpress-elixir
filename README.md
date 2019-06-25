Wordpress Mix
====================

A base WordPress theme prepped for Laravel Mix and npm. If you design and develop custom WordPress themes and hate the cruft logic included in most "base" themes, this is the theme for you. Take it, use it, love it, fork it, make pull requests in the spirit of the theme.

## Quick Start
- Drop the theme into `wp-content/themes`
- Run `npm install`
- Run `npm run production`

## About
This theme is designed to wrap all the goodness of [Laravel's Mix](https://laravel-mix.com/docs/4.0/installation), which is a an abstraction of Webpack, into a WordPress theme. This allows us to cut down on requests and automate optimization.

## What this isn't
This theme has no opinions on design (though comes with Bootstrap and Font Awesome for example's/convenience's sake). Its opinions lie in an efficient and performant development pattern. For that reason, it's intended to be directly forked as a new theme. This theme works great _as_ a child theme, but you will not be able to use Mix if you make a child from it.

## Requirements
- Node/npm
- PHP 5.4 - while WordPress core is comfortable supporting unsupported, potentially insecure, end-of-life versions of PHP, this theme is not, and the syntax used reflects that.

## Comes With
- Bootstrap
- Font Awesome

Either of these can be replaced or removed entirely. See your `package.json` and edit `main.scss` accordingly.

## Setup
- Drop the theme into `wp-content/themes`
- Run `npm install`

### Installation with Composer
This theme makes use of [`composer/installers`](https://github.com/composer/installers) and its defined WordPress spec. The theme can therefore be installed using `composer require webspec-design/wordpress-elixir` and it will make its way to `wp-content/themes`. However, the theme should be forked following this, or a `composer update` will overwrite your changes. Either remove it from your `composer.json` and `composer.lock` or rename the theme's directory to avoid this.

## Mix

### A note

This theme simply sets up Laravel Mix as recommended for non-Laravel projects. You can make any changes to `webpack.mix.js` you would make to any other project using Mix. This theme includes some sensible defaults so you can hit the ground running.

### Usage
Use `npm run dev` or `npm run production` to build files once, or `npm run watch` to run relevant tasks when changes are detected.

### CSS (Sass compilation)
The mix file is designed to compile your sass and any dependencies into one file at `build/css/main.css`, which is already enqueued and cache-busted in the functions file. The theme comes with Bootstrap and a navigation bar to go with it, but you can just as easily swap that out for Foundation or your favorite CSS framework.

#### Importing other sass libraries
- Install: `npm install juice --save`
  - You could just as easily grab a library using `bower`, or even copy and paste one into a directory
- Import in `main.scss`: `@import 'node_modules/juice/sass/style.scss'`

#### Using or importing less
To write less or use a library built on less, simply update the webpack mix file as needed. Refer to the [Mix documentation](https://laravel-mix.com/docs/4.0/css-preprocessors) for information on syntax and various preprocessors.

See the [Mix documentation](https://laravel-mix.com/docs/4.0/basic-example) for more information on Mix's capabilities.

#### Using vanilla CSS
To import a vanilla CSS library, you could simply write `@import node_modules/animate.css/animate.css`. However, this is directly translated to a CSS import rather than appended to your styles, so if you haven't successfully run `npm install` server-side, the import will result in a 404. Consider [copying such files](https://laravel-mix.com/docs/4.0/copying-files) into something like `sass/libs` as an scss file, and then import it like you would any other scss file.

### Javascript
WordPress Mix compiles your own Javascript and npm modules into one file using Webpack. Scripts are compiled to `build/js/main.js`, which is already enqueued in the functions file.

#### Install and use a new JS module
- Install: `npm install scrollmagic --save`
- Use in `main.js`: `var ScrollMagic = require('scrollmagic')`

#### Modularize your own JavaScript
If you like to break your own Javascript into multiple files, you can include them all into your main one by using relative paths:

`require('./maps.js')`

#### A note about jQuery libraries/extensions
To ensure maximum compatibility between this theme and other WordPress tools, enqueue WordPress's bundled jQuery if you need it. This theme configures Webpack to play nicely with the global jQuery.

### BrowserSync
[See Mix's documentation](https://laravel-mix.com/docs/4.0/browsersync).

### Config
If you want to configure some of Mix's default behavior, [see its documentation](https://laravel-mix.com/docs/4.0/browsersync).

## The `functions.php` file
The functions file has its own namespace to avoid polluting the global one. It does not use a singleton class, as has been popularized in some circles. [More reading on this here](https://stevegrunwell.com/blog/php-namespaces-wordpress/).

For example's/convenience's sake, the functions file:
  - Defines a navigation menu
  - Defines an image size
  - Declares theme support for title tags and post thumbnails
  - Requires a [custom, Bootstrap-style Walker_Nav_Menu](https://github.com/twittem/wp-bootstrap-navwalker). This is used in `header.php`, so if you remove it here, remove it there
  - Defines a couple convenient constants. They are used elsewhere in the functions file and in `header.php`. If you choose to remove or alter them, do so across the entire theme.
  - Defines a helper function for images. Use this and other static functions you define in this class across your theme like so: `WordPressElixirTheme::image($id, $size='', $icon='', $attr=[]);`.
  - Enqueues jQuery and the scripts and styles generated by Mix

And _that's it_. Feel free to remove any of it, as this theme is _designed to be forked_ at the outset of development.
