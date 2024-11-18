## Unit teszteket tanulunk seems like

tesztek egy része arról szólna, hogy a bejelentkezett felhasználó látja-e, ez most nálam nem lesz mert nincs login
- régi node.js van úgyhogy nem is lenne egyszerű  a login a sulis gépeken
- otthon / videóban jó lenne gyakorolni tho

## meg kell nézni van e-phpunit.xml (lennie kell)
ne legyen kikommentelve az a két sor

## MakerControllerTest
`php artisan make:test MakerControllerTest --unit`
	 - végén ott kell legyen hogy test
	 - unit nélkül csináltuk végül, így a unit helyett a feature mappába megy
	 
- metódusok neve ugy kezdődik hogy test, pl `test_user_can_view_makers_index()`
- ilyesmi kell bele:
  ```php
   public function test_user_can_view_makers_index()
    {
        //create a few maker records in the database
        Maker::factory()->count(3)->create();
        //send get request to the index route
        $response = $this->get(route('makers')); //makers.indexnek megfelelő kell
        $response->assertStatus(200);
        //assert that the response view contains makers data?
        $response->assertViewHas('makers');
	}
```

## MakerFactory
 `php artisan make:factory MakerFactory`
- kamu adatokat generál, `faker` függvény

```php
public function definition(): array
    {
        return [
            'name' => $this->faker->name, //adjust the data as neccessary
        ];
    }
```

ide írjuk hogy hogyan generálja a kamu adatokat ig

## .env.testing kell
nem akarjuk hogy az éles adatbázison fussanak a tesztek, ezért kell. lekopizzuk a .envet. 
- db connection sqlite
- db database = cars_test
	- ez még nem létezik, következő lépésben létrehozzuk

## Létrehozzuk az adatbázist
cmdből `c:\xampp\mysql\bin\mysql -u root `
(ha a path-hez hozzáadnánk lehetne csak mysql)
- create database cars_test



## Nézzük meg működik e
`vendor\bin\phpunit`
1. xamppot el kell indítani már ehhez, meg a szervert
- ott tartunk hogy az eslő assert lefut, a második (hogy megkapja e a makerst) hibát dob.

a jól lefutott teszteket nem írja, csak ahol elakad.
