<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class fillMakersFromCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysql:fillmakersFromCsv';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill makers table from existing csv file containing the table data';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {




        // Read the CSV file and skip the header
        $file = fopen("cars.csv", "r");
        $makers = [];

        // soronként végigmegyünk
        while (($data = fgetcsv($file)) !== FALSE) {
            $makerName = $data[1]; //második oszlopban van a gyártó neve

            // ha még nincs arrayben lementjük (így csak unique lesz)
            if (!in_array($makerName, $makers)) {
                $makers[] = $makerName;
            }
        }
        fclose($file);


        $bar = $this->output->createProgressBar(count($makers));

        $bar->start();

        // beszúrjuk a gyártóneveket a táblába
        foreach ($makers as $maker) {
            DB::table('makers')->updateOrInsert(
                ['name' => $maker], // Check for unique name
                ['name' => $maker]  // Insert if not exists
            );

            $bar->advance();

        }
        $bar->finish();

        $this->info("Unique maker names have been inserted into the makers table.");
    }




}