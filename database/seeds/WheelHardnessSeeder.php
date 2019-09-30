<?php

use Illuminate\Database\Seeder;
use App\Models\Wheel\Hardness;

class WheelHardnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hardness = [
        	[
        		'name' => '90-94A',
        		'type' => 'HR',
        	],
        	[
        		'name' => '95A',
        		'type' => 'HR',
        	],
        	[
        		'name' => '100A',
        		'type' => 'HR',
        	],
        	[
        		'name' => '102A',
        		'type' => 'SHR',
        	],
        	[
        		'name' => '83B',
        		'type' => 'SHR',
        	]
        ];

        foreach ($hardness as $h) {
        	Hardness::query()->firstOrCreate($h);
        }
    }
}
