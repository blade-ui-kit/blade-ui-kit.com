# blade-ui-kit.com

<a href="https://github.com/blade-ui-kit/blade-ui-kit.com/actions?query=workflow%3ATests">
    <img src="https://github.com/blade-ui-kit/blade-ui-kit.com/workflows/Tests/badge.svg" alt="Tests">
</a>

The source code for [blade-ui-kit.com](https://blade-ui-kit.com)

## Requirements

The following tools are required in order to start the installation.

- PHP 8.2
- [Composer](https://getcomposer.org/download/)
- [NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)

## Installation

1. Clone this repository locally with `git clone git@github.com:blade-ui-kit/blade-ui-kit.com.git blade-ui-kit.com`
2. Copy the `.env.example` file to `.env`
3. Install the PHP dependencies with `composer install` 
4. Generate a new app key with `php artisan key:generate`
5. Install and compile the front-end dependencies with `npm install && npm run dev`
6. Import all icon sets using `php artisan icons:import`
7. [Set up Meilisearch (optionally)](#meilisearch)
8. Serve the website locally by running `php artisan serve`

You can now visit the app in your browser by visiting [http://127.0.0.1:8000](http://127.0.0.1:8000).

### Meilisearch

To get up and running with Meilisearch for the website locally, first make sure you [download and launch Meilisearch](https://docs.meilisearch.com/learn/getting_started/installation.html#download-and-launch).

After that, create an `icons` index using:

```zsh
php artisan scout:index icons
```

After creating the index, you'll need to configure a filterable attribute for the icon sets:

```zsh
curl \
  -X PUT 'http://localhost:7700/indexes/icons/settings/filterable-attributes' \
  -H 'Content-Type: application/json' \
  -H 'Authorization: Bearer masterKey' \
  --data-binary '[
    "icon_set_id"
  ]'
```

Then, import all icons into the search using:

```zsh
php artisan scout:import "App\\Models\\Icon"
```

Now all icons from all icon sets are indexed and searchable at [http://127.0.0.1:8000/blade-icons](http://127.0.0.1:8000/blade-icons).

You can clear all icons again by running:

```zsh
php artisan scout:flush "App\\Models\\Icon"
```

## Commands

Command | Description
--- | ---
**`php artisan test`** | Run the tests
`php artisan migrate:fresh --seed` | Reset the database
`php artisan icons:import` | Import all icon sets into Sqlite
`npm run watch` | Watch for changes in CSS and JS files
