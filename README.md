# blade-ui-kit.com

<a href="https://github.com/blade-ui-kit/blade-ui-kit.com/actions?query=workflow%3ATests">
    <img src="https://github.com/blade-ui-kit/blade-ui-kit.com/workflows/Tests/badge.svg" alt="Tests">
</a>
<a href="https://github.styleci.io/repos/279074209">
    <img src="https://github.styleci.io/repos/279074209/shield?style=flat" alt="Code Style">
</a>

The source code for [blade-ui-kit.com](https://blade-ui-kit.com)

## Requirements

The following tools are required in order to start the installation.

- PHP >=7.4
- [Composer](https://getcomposer.org/download/)
- [NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)

## Installation

1. Clone this repository locally with `git clone git@github.com:blade-ui-kit/blade-ui-kit.com.git blade-ui-kit.com`
2. Copy the `.env.example` file to `.env`
3. Install the PHP dependencies with `composer install` 
4. Generate a new app key with `php artisan key:generate`
5. Install and compile the front-end dependencies with `npm install && npm run dev`
6. Serve the website locally by running `php artisan serve`

You can now visit the app in your browser by visiting [http://127.0.0.1:8000](http://127.0.0.1:8000).

## Commands

Command | Description
--- | ---
**`php artisan test`** | Run the tests
`npm run watch` | Watch for changes in CSS and JS files
