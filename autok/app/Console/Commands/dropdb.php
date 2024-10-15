<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dropdb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysql:dropdb {name?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop an existing mysql database schema based on the database config file';

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
        $schemaName = $this->argument('name') ?: config("database.connections.mysql.database");

        config(["database.connections.mysql.database" => null]);

        $query = "DROP DATABASE IF EXISTS $schemaName;";

        DB::statement($query);

        config(["database.connections.mysql.database" => $schemaName]);

    }

}