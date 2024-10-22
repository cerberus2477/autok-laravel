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



home.blade.php is van (lehet ez a példa?)



minden modelhez kéne  3 view

- list, edit, create





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

***\routes\web.php***

```php
Route::get('makers',  [MakerController::class, 'index']) ->name('makers');
Route::post('makers',  [MakerController::class, 'save']) ->name('maker');
Route::get('maker/create',  [MakerController::class, 'create']) ->name('createMakers');

public function index()
{
    return view('makers/list', ['entities' => Makers::where('is_active', true)->order])
}
```

```php
Route::get('fuels',  [FuelController::class, 'index']) ->name('fuels');
Route::post('fuel',  [FuelController::class, 'save']) ->name('saveFuel');
Route::get('fuel/create',  [FuelController::class, 'create']) ->name('createFuel');
Route::post('fuel/{id}}',  [FuelController::class, 'edit']) ->name('editFuel');
Route::patch('fuel/create',  [FuelController::class, 'update']) ->name('updateFuel');
Route::delete('fuel/{id}',  [FuelController::class, 'delete']) ->name('deleteFuel');
Route::post('fuels/search',  [FuelController::class, 'search']) ->name('searchFuel');
```



create-új form, amibe be lehet írni az új rekordot

save - menti a változásokat



## Elvesztek a todok + seeder magyarázat, but whatever

- kéne új mező a makers táblábe, ami a logó
- seederek kellenének, az az egész kimaradt előző keddről



## márkák megjelenítése:

- egyszerre pl csak 25t jelenítsünk meg az oldalon
- vagy betűnként kirakunk egy egy gombot ami szűri és csak pl az a betűs márkákat teszi ki + * ami mindet kiteszi
  



## 10.21

- létrehoztam a fuelcontrollert és carModelcontrollert paranccsal, belemásoltam lényegében a mekrcontroller tartalmát

(mi az a controller?)

- csináltam menüt (app.blade.php), menü elemekre kattinta megfelelő get request (web route alapján)
- web.phpba beírtam a routeokat amik kellettek

- css-t csináltam a public mappába, linkeltem az app.blade.php fáj headjében



- 2. lépés (list view) létrehozása carModels táblára
     - kéne a fuelsre is
- database.seederbe beletettem ezt, így automatikusan fut majd a két seeder ilyen sorrendben
- ```php artisan db:seed```

```php

        $this->call([
            FuelTableSeeder::class,
                // CassissesTableSeeder::class,
            CarModelTableSeeder::class,
        ]);
```

- ```php artisan db:seed --class=UserSeeder```

## 10.22 kedd







## TODO

- később kellene gomb a sorokba
  - törlés, módosítás, 
  - alul gondolom új gomb

​	

- a makersnél beolvas még két sort az aljén ami nem kéne



xdebug felgyorsítása:

xdebug chrome kiegészítő

xdebug.start.with.request = triegger (yes helyett)

















### minden megnyitásnál kell

- xampp elindítás
- ```php artisan serve```
- localhost:8000/makers pl a cím
- localhost/phpmyadmin létezik ofc (vagy parancssoros mysql)





### git pullnál kell pl

```composer update``` kell, az létrehozza a vendort.

```php artisan migrate```

```php artisan mysql:createdb cars```

stb stb andrás tudja





### Menübe később (app.blade.php)

```php
            <!-- <li><a href="{{route('cassies')}}">Karosszériák</a></li> -->
            <!-- <li><a href="{{route('clients')}}">Ügyfelek</a></li> -->
                            <!-- <li><a href="{{route('types')}}">Típusok</a></li> -->
            <!-- <li><a href="{{route('vehicles')}}">Járművek</a></li> -->
```

