<?php

use Illuminate\Database\Seeder;
use App\Models\Option;

class InitSiteOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Option::query()->firstOrCreate([
        	'option_name' => 'wheel_base_price',
        	'option_value' => 1.55,
        ]);

        Option::query()->firstOrCreate([
            'option_name' => 'wheel_profit_margin',
            'option_value' => 1.2,
        ]);

        Option::query()->firstOrCreate([
            'option_name' => 'wheel_color_price',
            'option_value' => 0.15,
        ]);

        Option::query()->firstOrCreate([
            'option_name' => 'wheel_color_profit_margin',
            'option_value' => 1.5,
        ]);

        Option::query()->firstOrCreate([
            'option_name' => 'wheel_cardboard_price',
            'option_value' => 0.35,
        ]);

        Option::query()->firstOrCreate([
            'option_name' => 'wheel_cardboard_price',
            'option_value' => 0.35,
        ]);

        Option::query()->firstOrCreate([
            'option_name' => 'wheel_cardboard_fix_cost',
            'option_value' => 525,
        ]);

        Option::query()->firstOrCreate([
            'option_name' => 'wheel_carton_price',
            'option_value' => 0.02,
        ]);

        Option::query()->firstOrCreate([
            'option_name' => 'wheel_carton_fix_cost',
            'option_value' => 80,
        ]);

        Option::query()->firstOrCreate([
            'option_name' => 'wheel_shape_fix_cost',
            'option_value' => 2000,
        ]);
    }
}
