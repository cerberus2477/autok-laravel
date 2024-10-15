# Autók frontend

A Laravelnél a frontendhez *Blade* fájlokat használunk.

***blade sajátossága:***

- html fájl, href-ben meg lehet adni dolgokat
- van @foreach ésatöbbi

#### artisan parancs kell a blade fájlok létrehozásához

```php artisan make:view nev```



## 1. lépés

```php artisan make:view layouts.app```

- létrehozza a layouts mappát, beleteszi az app.blade.php fájlt

***app.blade.php:***

```html
<head>
    <!-- hmtl lang = app()->getlocalebol -->
    <meta name="csrf-token" content={{ csrf_token() }}">
    <!-- kötelező, így nem annyira hekkelhető -->
</head>

<body>
    <main>
        @yield('content')
    </main>

    <footer>
        <p>Készítette: Tábor Tünde</p>
        <p>Ez egy lábléc</p>
        <p>{{ config('app.name', 'Autok') }} v{{ config('app.version') }} (PHP v{{ PHP_VERSION }})</p>
    </footer>
</body>
```

```html
@foreach($entities as $entity)
	<tr></tr> stb
@endforearch

kell bele sokminden
```

## 2. lépés

```php artisan make:view carMakers.list``` 

- létrehozza a layouts\carMakes mappát, beleteszi a list.blade.php fájlt

```html
@extends('layouts.app')

@section('content')

<table>
    
    <thead>
        <tr>
            <th>#</th>
            <th>Gyártó</th>
            <!-- <th>Model</th>    -->
        </tr>
    </thead>

    <tbody>
    @foreach($entities as $entity)
	    <tr>
            <td id="{{ $entity->id }}">{{ $entity->id }}</td>
            <td>{{ $entity->name }}</td>
	    </tr>
    </tbody>
    @endforearch
</table>

```

a fájl teteje még nincs meg!!!



home.blade.php is van (lehet ez a példa?)



minden modelhez kéna 3 view

- list, edit, create





***layout***

- kell bele header

```html

                                                   
```





***resources\views\home.blade.php***

​			***\404.php***



***\config\app.php***

- 10.sor app neve

- scriptek



***\views\layouts\app.blade.php***

- nincsen még de kell









laravel dokuban a blade-t át kéne nézni - fent van teamsen



## 3. lépés

```php artisan make:controller MakerController --resource```

- létrehozza és belerak egy csomó mindent

***\routes\web***

```php
Route::get('makers',  [MakerController::class, 'index']) ->name('makers');
Route::post('makers',  [MakerController::class, 'save']) ->name('maker');
Route::get('maker/create',  [MakerController::class, 'create']) ->name('createMakers');

public function index()
{
    return view('makers/list', ['entities' => Makers::where('is_active', true)->order])
}
```

és nagyon nagyon sok ilyen

ezek a requestek

