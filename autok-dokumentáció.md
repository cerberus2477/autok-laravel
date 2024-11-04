### [The Routes Directory](https://laravel.com/docs/11.x/structure#the-routes-directory)
Optionally, you may install additional route files for API routes (`api.php`) and broadcasting channels (`channels.php`), via the `install:api` and `install:broadcasting` Artisan commands.

The `api.php` file contains routes that are intended to be stateless, so requests entering the application through these routes are intended to be authenticated [via tokens](https://laravel.com/docs/11.x/sanctum) and will not have access to session state.

### [The Storage Directory](https://laravel.com/docs/11.x/structure#the-storage-directory)
The `storage/app/public` directory may be used to store user-generated files, such as profile avatars, that should be publicly accessible. You should create a symbolic link at `public/storage` which points to this directory. You may create the link using the `php artisan storage:link` Artisan command.

### [The Http Directory](https://laravel.com/docs/11.x/structure#the-http-directory)

The `Http` directory contains your controllers, middleware, and form requests. Almost all of the logic to handle requests entering your application will be placed in this directory.

### [The Models Directory](https://laravel.com/docs/11.x/structure#the-models-directory)

The `Models` directory contains all of your [Eloquent model classes](https://laravel.com/docs/11.x/eloquent). The Eloquent ORM included with Laravel provides a beautiful, simple ActiveRecord implementation for working with your database. Each database table has a corresponding "Model" which is used to interact with that table. Models allow you to query for data in your tables, as well as insert new records into the table.

# Frontend

### [PHP and Blade](https://laravel.com/docs/11.x/frontend#php-and-blade)

In the past, most PHP applications rendered HTML to the browser using simple HTML templates interspersed with PHP `echo` statements which render data that was retrieved from a database during the request:

```
<div>    <?php foreach ($users as $user): ?>        Hello, <?php echo $user->name; ?> <br />    <?php endforeach; ?></div>
```

In Laravel, this approach to rendering HTML can still be achieved using [views](https://laravel.com/docs/11.x/views) and [Blade](https://laravel.com/docs/11.x/blade). Blade is an extremely light-weight templating language that provides convenient, short syntax for displaying data, iterating over data, and more:

```
<div>    @foreach ($users as $user)        Hello, {{ $user->name }} <br />    @endforeach</div>
```

When building applications in this fashion, form submissions and other page interactions typically receive an entirely new HTML document from the server and the entire page is re-rendered by the browser. Even today, many applications may be perfectly suited to having their frontends constructed in this way using simple Blade templates.

Within the Laravel ecosystem, the need to create modern, dynamic frontends by primarily using PHP has led to the creation of [Laravel Livewire](https://livewire.laravel.com/) and [Alpine.js](https://alpinejs.dev/).


### [First Steps](https://laravel.com/docs/11.x/lifecycle#first-steps)

The entry point for all requests to a Laravel application is the `public/index.php` file.All requests are directed to this file by your web server (Apache / Nginx) configuration

retrieves an instance of the Laravel application from `bootstrap/app.php`.Laravel itself is to create an instance of the application / [service container](https://laravel.com/docs/11.x/container).


