<!-- TODO: set extensions app for prod -->

# About Prompt

Prompt is a proof of concept php-based desktop command palette application built with [Laravel](https://laravel.com/) [Livewire](https://livewire.laravel.com/) and [NativePHP]([https://nativephp.com/). It is designed to be easily extensible, allowing developers to seamlessly integrate functionalities. The API is inspired by Raycast.

![](docs/presentation.gif)

## Extensions

Extension examples are located in separate repository [prompt-extensions](https://github.com/MartinPL/prompt-extensions).
Install them by copying folders to
(production): `/homer/user/.prompt/extensions`
(development) `/storage/extensions`

## Development

```
composer install
php artisan native:serve
```
