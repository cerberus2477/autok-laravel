<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Maker;
use DB;
use App\Models\carModel;

class CarModelTableSeeder extends Seeder
{
    //KOLA
    // public function run()
    // {
    //     $makers = Maker::all();
    //     $this->command->getOutput()->progressStart(count($makers));
    //     foreach ($makers as $maker) {
    //         $models = DB::select('SELECT DISTINCT model from autok WHERE make = "' . $maker->name . '";');
    //         //a fenti sor nekünk nem működik, tanárúrnak nem egy csv-ben van minden hanem így szépen. nekünk ki kell bogarászni
    //         foreach ($models as $model) {
    //             $item = new carModel([
    //                 'makerId => $maker->id',
    //                 'name' => $model->model
    //             ]);
    //             $item->save();
    //         }
    //         $this->command->getOutput()->progressAdvance();
    //     }
    //     $this->command->getOutput()->progressFinish();
    // }


    //Péktől
    public function run(): void
    {
        $f = fopen("cars.csv", "r");
        fgetcsv($f);

        $carModels = [];
        while (($line = fgetcsv($f)) !== false) {
            if (!in_array([$line[1], $line[2]], $carModels))
                $carModels[] = [$line[1], $line[2]];
        }

        $bar = $this->command->getOutput()->createProgressBar(count($carModels));
        $bar->setFormat("[%bar%]");
        $bar->setBarCharacter('*');

        foreach ($carModels as $m) {
            $entity = new carModel();
            $entity->name = $m[1];
            $entity->maker()->associate(Maker::where("name", $m[0])->first());
            $entity->save();
            $bar->advance();
            //DB::statement("insert into car_model (name,manufacturer_id) values (?,(select id from manufacturers where name=?));",[$m[1],$m[0]]);
        }
        $bar->finish();

        fclose($f);
    }
}
