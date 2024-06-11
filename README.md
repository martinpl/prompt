# About Prompt

Prompt is a proof of concept php-based desktop command palette application built with [Laravel](https://laravel.com/) [Livewire](https://livewire.laravel.com/) and [NativePHP](https://nativephp.com/). It is designed to be easily extensible, allowing developers to seamlessly integrate functionalities. The API is inspired by Raycast.

![](docs/presentation.gif)

## Extensions

Extension examples are located in separate repository [prompt-extensions](https://github.com/MartinPL/prompt-extensions).
Install them by copying folders to
(production): `/homer/user/.prompt/extensions`
(development) `/extensions`

## Development

Requires: php, php-sqlite (pdo_sqlite), node, npm

```
npm install
npm run build
composer install
composer run-script post-root-package-install
composer run-script post-create-project-cmd
php artisan native:install
php artisan native:migrate
php artisan native:serve
```
