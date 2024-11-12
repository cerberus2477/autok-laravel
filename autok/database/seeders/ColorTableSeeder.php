<?php

namespace Database\Seeders;

// use 
use Illuminate\Database\Seeder;

class ColorTableSeeder extends Seeder
{
    const ITEMS = [
        [
            'name' => '01 - fehér',
            'hexa_code' => '#FFFFFF',
        ],
        [
            'name' => '02 - sárga',
            'hexa_code' => '#FFFF00',
        ],
        [
            'name' => '03 - narancs',
            'hexa_code' => '#FFA500',
        ],
        [
            'name' => '04 - piros',
            'hexa_code' => '#FF0000',
        ],
        [
            'name' => '05 - bíbor / lila',
            'hexa_code' => '#800080',
        ],
        [
            'name' => '06 - kék',
            'hexa_code' => '#0000FF',
        ],
        [
            'name' => '07 - zöld',
            'hexa_code' => '#008000',
        ],
        [
            'name' => '08 - szürke',
            'hexa_code' => '#808080',
        ],
        [
            'name' => '09 - barna',
            'hexa_code' => '#A52A2A',
        ],
        [
            'name' => '10 - fekete',
            'hexa_code' => '#000000',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            $body = new Color();
            $body->name = $item;
            $body->save();
        }
    }
}
