<?php

use Illuminate\Database\Seeder;
use App\Models\Wheel\Type;

class CreateColorTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colorTypes = [
        	[
        		'name' => 'Basic White',
	        	'color_type' => [
	        		'is_active' => true,
	        		'count_colors' => 0,
	        		'price' => 0,
	        		'order' => 0,
	        	]
	        ],
	        [
        		'name' => 'Urethane Color Code',
	        	'color_type' => [
	        		'is_active' => true,
	        		'count_colors' => 1,
	        		'price' => 0.25,
	        		'order' => 1,
	        	]
	        ],
	        [
        		'name' => 'Dual Durometer',
	        	'color_type' => [
	        		'is_active' => true,
	        		'count_colors' => 2,
	        		'price' => 1.25,
	        		'order' => 2,
	        	]
	        ],
	        [
        		'name' => 'Sandwich',
	        	'color_type' => [
	        		'is_active' => true,
	        		'count_colors' => 3,
	        		'price' => 1.35,
	        		'order' => 3,
	        	]
	        ],
	        [
        		'name' => 'Glow in the Dark',
	        	'color_type' => [
	        		'is_active' => true,
	        		'count_colors' => 1,
	        		'price' => 1.04,
	        		'order' => 4,
	        	]
	        ],
	        [
        		'name' => 'Dual Mixed Colors',
	        	'color_type' => [
	        		'is_active' => true,
	        		'count_colors' => 2,
	        		'price' => 0.95,
	        		'order' => 5,
	        	]
	        ],
	        [
        		'name' => 'Dual Fully Mixed Colors',
	        	'color_type' => [
	        		'is_active' => true,
	        		'count_colors' => 2,
	        		'price' => 0.93,
	        		'order' => 6,
	        	]
	        ],
	        [
        		'name' => 'Core',
	        	'color_type' => [
	        		'is_active' => true,
	        		'count_colors' => 2,
	        		'price' => 1.25,
	        		'order' => 7,
	        	]
	        ],
	        [
        		'name' => 'Transparent',
	        	'color_type' => [
	        		'is_active' => true,
	        		'count_colors' => 2,
	        		'price' => 0.23,
	        		'order' => 8,
	        	]
	        ]
        ];

        foreach ($colorTypes as $key => $colorType) {
        	Type::query()->firstOrCreate(['name' => $colorType['name']], $colorType['color_type']);
        }
    }
}
