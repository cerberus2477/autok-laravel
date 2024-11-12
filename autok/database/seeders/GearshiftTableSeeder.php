<?php

namespace Database\Seeders;

use App\Models\Gearshift;
use Illuminate\Database\Seeder;

class GearshiftTableSeeder extends Seeder
{
    const ITEMS = [
        '0 - mechanikus',
        '1 - félautomata',
        '2 - automata',
        '3 - szekvenciális',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::ITEMS as $item) {
            $body = new Gearshift();
            $body->name = $item;
            $body->save();
        }
    }
}
