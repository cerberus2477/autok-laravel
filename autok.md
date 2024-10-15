# miafaszvan - laravel autók api?

1. ####  htdocs mappában

   - ``` composer create-project laravel/laravel autok ```


      - ``` cd autok```

2. #### .env fájlban adatbázis beállításainak módosítása

   - 22. sortól kb ne legyen kikommentelve, dbnamet adjuk meg és sqlite helyett mysql
	 - ``` php
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cars
DB_USERNAME=root
DB_PASSWORD= 


3. #### Létrehozunk egy adatbázis schemát

   stackoverflowt követjük: https://stackoverflow.com/questions/32191135/how-to-create-database-schema-table-in-laravel
   
   - ``` php artisan make:command mysql ```
   
   
      - fill the content of App\Console\Commands\createdb.php, dropdb ugyanígy
   

``` php
use Illuminate\Support\Facades\DB;


    protected $signature = 'mysql:createdb {name?}';
    protected $description = 'Create a new mysql database schema based on the database config file';
    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        $schemaName = $this->argument('name') ?: config("database.connections.mysql.database");
        $charset = config("database.connections.mysql.charset",'utf8mb4');
        $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');

        config(["database.connections.mysql.database" => null]);

        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";

        DB::statement($query);

        config(["database.connections.mysql.database" => $schemaName]);
    }
}
```


4. #### ``` php artisan mysql:createdb autok ```

   - ezzel hozzuk létre ezeket a parancsokat a developereknek kb

     


### Makers



1. ####  migrációt létrehozni amiben a gyártók vannak, id legyen és név

   - ``` php artisan make:migration create_makers_table ```

   - ``` $table->string('name'); ``` database˛\migrations\ az új fájlba kb 15. sor

     

2. #### Maker model létrehozása

   - ``` artisan make:model Maker```
   - ```timestamp = false``` kell

   ``` php
   class Maker extends Model
   {
   
     use HasFactory;
   
     public $timestamps = false;
   
   }
   ```
   
   
   
3. #### feltölteni a maker migrációt adatokkal

- írunk egy artisan parancsot amivel feldolgozzuk a csv fájlt -> *fillMakersFromCsv*
  - megniytjuk, fgetcsv, soronként, csak a különbözőt beolvassuk
  
    - nem így csináltam, de ez is lehetne a fillMakersFromCsv handlerjében:
  
      ``` php
      foreach ($makers as $maker) {
      	$entity = new Maker(); //be kell useolni
      	$entity->nev = $maker;
          $entity->save();
         // $entity->find(['name' => 'maker neve ide'])
       }
      ```
  
  - progressbart adunk a dokuból
  
    ```php
    $bar = $this->output->createProgressBar(count($makers));
    
    $bar->start();
    
    foreach (...){
    $bar->advance();
    }
    
    $bar->finish();
    ```
  



### carModels 

1. #### migráció létrehozása

- ```php artisan make:migration create_carModels_table```
- új migrations fájlban az up átírása hogy benne legyenek a tulajdonságok + foreign key

	``` php
  public function up(): void
  {
  
    Schema::create('car_models', function (Blueprint $table) {
  
      $table->id();
  
      $table->integer('makerId');
  
      $table->string('name');
  
      $table->foreign("makerId")->references('id')->on('makers');
  
    });
  
  } ```



#### 2. carModel model létrehozása

-  ```php artisan make:model carModel```

- ```timestamp = false``` kell

  ``` php
  class Maker extends Model
  {
  
    use HasFactory;
  
    public $timestamps = false;
  
  }
  ```

#### 3. feltölteni a carModel migrációt adatokkal - nekem ez már nincs meg

​	- id, makerId, name lesz, tehát kell nézni hozzá a makers táblát is

#### 4. Adatok betöltése seederrel

(ez a rész nem fix, leírtam mindnet amit hallottam, nem tudom mi az a seeder)

készítsünk egy seedert

- kell egy models tábla, ebben egy id maker

- új tábla migration paranccsal, timestamp nem kell



kapcsolatok létrehozása, előbb ezt a táblát aztán azt hozza létre, foreign keyek miatt nem mindehy

``` 
php artisan migrate:fresh --seed
php artisan migrate:fresh --seed
```

```php
public function run(){
    $this->call([
        UserSeeder::class,
        PostSeeder::class,
        CommentSeeder::class,
    ]);
}
```











## adatbázis model

cars.csv



makers tabla:

id
name (2. oszlop)



carModels tábla:

id

makerId

name (3. oszlop)



*naming convention: model neve egyesszamban, tabla tobbesszamban*











## plusz dolgok

- php.iniben
  ```xdebug.start_with_request = trigger``` -> nem lesz timeout

- csvből kitörölni az utolsó üres sort

- ```c:\xampp\mysql\bin\mysql -u root cars```