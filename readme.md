# Laravel Example application for custom Exception reporting and rendering

> This was done using Laravel 5.4 but is easily portable to newer versions.

In a default Laravel install you have access to the [`App\Exceptions\Handler`](app/Exceptions/Handler.php) class.

This class provides two methods `report()` and `render()` that will allow you to add any custom reporting and rendering logic easily without the need for 3rd party packages.

This is an exercise to scratch an itch and to respond to a [Laracasts thread](https://laracasts.com/discuss/channels/laravel/saving-errors-to-db-custom-error-messages), feel free to use it as a jumping point for something magical!!!

> See for more information: https://laravel.com/docs/5.4/errors#the-exception-handler

## Lets be explicit!

Maybe recording every exception might be excessive, or you only want to record exceptions specific actions, the idea is to only record exceptions that we explicitly throw.

We create a custom exception class [`App\Exceptions\RecordableException`](app/Exceptions/RecordableException.php) that we throw when we want to record an error.

Then within the [`App\Exceptions\Handler`](app/Exceptions/Handler.php) class, we conditionally check for our custom exception and perform our recording and rending of our custom view.

All other exceptions will still go through to Laravel to deal with.

You can wrap areas of your application execution when you are unsure of what type of exception is being thrown in a `try/catch` and then throw a new instance of your custom exception class accordingly.

## Catch all approach

If you want to catch all the exceptions that Laravel throws according to the [`App\Exceptions\Handler`](app/Exceptions/Handler.php), then remove the conditional statements checking for your custom exception class.

## Further ideas

If you were to take this approach, it might be a good idea to maybe create a job that would create the errors, that way you could offload it to a queue and not potentially slow down the user experience and consume resources if your app all of a sudden fires of a bucket load of exceptions.

You could also use [Laravel Scout](https://laravel.com/docs/5.4/scout) to index your exceptions so you could get some kickass reporting/filtering without heavy lifting.

## Installation

Simple as cloning the repository and running composer install.

The [`composer.json`](compser.json) file has been changed to:
 - Ceate your `.env` file
 - Generate your `APP_KEY`
 - Create the sqlite database at `database/database.sqlite` (The [`.env.example`](.env.example) file is adjusted to default to `sqlite` for its connection)


Then you can run `php artisan migrate` and `php artisan serve` and your good to go.

The homepage has links to throw exceptions and view the recorded errors.

## Classes that make this happen

Class | Purpose
:-   | :-  
[`App\Error`](app/Error.php) | The Eloquent model for storing exceptions.
[`App\Exceptions\RecordableException`](app/Exceptions/RecordableException.php) | Our custom exception for filtering which exceptions to record.
[`App\Exceptions\Handle`](app/Exceptions/Handler.php) | This file is where the magic happens!
