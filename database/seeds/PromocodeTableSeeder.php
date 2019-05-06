<?php

use Illuminate\Database\Seeder;

class PromocodeTableSeeder extends Seeder
{

    public function run()
    {
    	$this->command->info('Import data to 2HEX!');

        $path = 'database/seeds/promocodes.sql';

        DB::unprepared(file_get_contents($path));
    }
}
