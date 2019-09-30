<?php

use Illuminate\Database\Seeder;

use App\Models\Wheel\{Shape, ShapeSize};

class CreateShapesSeeder extends Seeder
{
    const HARDNESS_90_94A = 1;
    const HARDNESS_95A = 2;
    const HARDNESS_100A = 3;
    const HARDNESS_102A = 4;
    const HARDNESS_83B = 5;
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $shapes = [
        	[
    			'name' => 'N Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 9
	        	],
        		'sizes' => [
        			[
                        'size' => '50*30mm', 
                        'contact_patch' => '15.0mm-15.5mm', 
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.55
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.58
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.73
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.59
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.29
                            ],
                        ]
                    ],
        			[
                        'size' => '50*36mm', 
                        'contact_patch' => '19.5mm-20.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.73
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.76
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.91
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.87
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.65
                            ],
                        ]
                    ],
        			[
                        'size' => '51*31mm', 
                        'contact_patch' => '16.0mm-16.5mm','prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.61
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.64
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.68
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.47
                            ],
                        ]
                    ],
        			[
                        'size' => '52*30mm', 
                        'contact_patch' => '15.0mm-15.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.64
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.73
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.75
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.5
                            ],
                        ]
                    ],
        			[
                        'size' => '52*31mm', 
                        'contact_patch' => '16.0mm-16.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.67
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.76
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.88
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.78
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.56
                            ],
                        ]
                    ],
        			[
                        'size' => '52*32mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.73
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.79
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.91
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.81
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.6
                            ],
                        ]
                    ],
        			[
                        'size' => '52*36mm', 
                        'contact_patch' => '19.5mm-20.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.88
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.09
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.99
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.87
                            ],
                        ]
                    ],
        			[
                        'size' => '53*31mm', 
                        'contact_patch' => '16.0mm-16.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.76
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.79
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.94
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.81
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.63
                            ],
                        ]
                    ],
        			[
                        'size' => '53*32mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.76
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.79
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.94
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.84
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.67
                            ],
                        ]
                    ],
        			[
                        'size' => '53*36mm', 
                        'contact_patch' => '19.5mm-20.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.97
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.06
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.21
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.14
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.96
                            ],
                        ]
                    ],
        			[
                        'size' => '54*32mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.96
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.84
                            ],
                        ]
                    ],
        			[
                        'size' => '54*34mm', 
                        'contact_patch' => '18.5mm-19.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.91
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.09
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.05
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.9
                            ],
                        ]
                    ],
        			[
                        'size' => '54*36mm', 
                        'contact_patch' => '19.5mm-20.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.97
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.06
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.21
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.17
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.96
                            ],
                        ]
                    ],
        			[
                        'size' => '55*32mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.09
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.24
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.2
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.08
                            ],
                        ]
                    ],
        			[
                        'size' => '56*33mm', 
                        'contact_patch' => '17.5mm-18.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.09
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.24
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.2
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.14
                            ],
                        ]
                    ],
        			[
                        'size' => '56*36mm', 
                        'contact_patch' => '19.5mm-20.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.12
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.18
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.39
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.35
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.3
                            ],
                        ]
                    ],
        			[
                        'size' => '58*34mm', 
                        'contact_patch' => '18.5mm-19.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.15
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.21
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.42
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 4.38
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.6
                            ],
                        ]
                    ],
        			[
                        'size' => '58*40mm', 
                        'contact_patch' => '21.5mm-22.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.45
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.52
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.76
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.81
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.81
                            ],
                        ]
                    ],
        		]
        	],
        	[
    			'name' => 'R Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 10
	        	],
        		'sizes' => [
        			[
                        'size' => '50*30mm', 
                        'contact_patch' => '15.0mm-15.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.61
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.64
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.68
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.47
                            ]
                        ]
                    ],
        			[
                        'size' => '50*31mm', 
                        'contact_patch' => '16.0mm-16.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.61
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.64
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.68
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.47
                            ]
                        ]
                    ],
        			[
                        'size' => '50*32mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.73
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.76
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.91
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.87
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.65
                            ]
                        ]
                    ],
        			[
                        'size' => '51*30mm', 
                        'contact_patch' => '15.0mm-15.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.61
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.64
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.68 
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.47
                            ]
                        ]
                    ],
        			[
                        'size' => '51*31mm', 
                        'contact_patch' => '16.0mm-16.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.64
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.68
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.68
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.47
                            ]
                        ]
                    ],
        			[
                        'size' => '51*32mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.73
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.79
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.91
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.81
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.6
                            ]
                        ]
                    ],
        			[
                        'size' => '52*30mm', 
                        'contact_patch' => '15.0mm-15.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.73
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.79
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.91
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.81
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.6
                            ]
                        ]
                    ],
        			[
                        'size' => '52*31mm', 
                        'contact_patch' => '16.0mm-16.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.73
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.79
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.91
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.81
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.6
                            ]
                        ]
                    ],
        			[
                        'size' => '52*32mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.88
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.09
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.99
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.87
                            ]
                        ]
                    ],
        			[
                        'size' => '52*33mm', 
                        'contact_patch' => '17.5mm-18.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.88
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.09
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.99
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.87
                            ]
                        ]
                    ],
        			[
                        'size' => '53*30mm', 
                        'contact_patch' => '15.0mm-15.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.76
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.79
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 1.94
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.81
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.63
                            ]
                        ]
                    ],
        			[
                        'size' => '53*31mm', 
                        'contact_patch' => '16.0mm-16.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.96
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.84
                            ]
                        ]
                    ],
        			[
                        'size' => '53*32mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.96
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.84
                            ]
                        ]
                    ],
        			[
                        'size' => '53*33mm', 
                        'contact_patch' => '17.5mm-18.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.97
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.06
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.21
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.17
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.96
                            ]
                        ]
                    ],
        			[
                        'size' => '53*34mm', 
                        'contact_patch' => '18.5mm-19.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.97
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.06
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.21
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.17
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.96
                            ]
                        ]
                    ],
        			[
                        'size' => '53*36mm', 
                        'contact_patch' => '19.5mm-20.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.97
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.06
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.21
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.17
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.96
                            ]
                        ]
                    ],
        			[
                        'size' => '54*30mm', 
                        'contact_patch' => '15.0mm-15.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.96
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.84
                            ]
                        ]
                    ],
        			[
                        'size' => '54*31mm', 
                        'contact_patch' => '16.0mm-16.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.96
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.84
                            ]
                        ]
                    ],
        			[
                        'size' => '54*32mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.82
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 1.85
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 2.96
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.84
                            ]
                        ]
                    ],
        			[
                        'size' => '54*33mm', 
                        'contact_patch' => '17.5mm-18.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.97
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.06
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.21
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.17
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.96
                            ]
                        ]
                    ],
        			[
                        'size' => '54*34mm', 
                        'contact_patch' => '18.5mm-19.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.97
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.06
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.21
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.17
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.96
                            ]
                        ]
                    ],
        			[
                        'size' => '54*36mm', 
                        'contact_patch' => '19.5mm-20.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 1.97
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.06
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.21
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.17
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 3.96
                            ]
                        ]
                    ],
        			[
                        'size' => '55*32mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.12
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.18
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.39
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.35
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.3
                            ]
                        ]
                    ],
        			[
                        'size' => '55*33mm', 
                        'contact_patch' => '17.5mm-18.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.12
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.18
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.39
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.35
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.3
                            ]
                        ]
                    ],
        			[
                        'size' => '55*34mm', 
                        'contact_patch' => '18.5mm-19.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.12
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.18
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.39
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.35
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.3
                            ]
                        ]
                    ],
        			[
                        'size' => '56*33mm', 
                        'contact_patch' => '17.5mm-18.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.12
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.18
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.39
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.35
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.3
                            ]
                        ]
                    ],
        			[
                        'size' => '56*34mm', 
                        'contact_patch' => '18.5mm-19.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.12
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.18
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.39
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.35
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.3
                            ]
                        ]
                    ],
        			[
                        'size' => '58*34mm', 
                        'contact_patch' => '18.5mm-19.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.45
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.52
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.76
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.81
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.81
                            ]
                        ]
                    ],
        			[
                        'size' => '58*36mm', 
                        'contact_patch' => '19.5mm-20.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.45
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.52
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.76
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.81
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.81
                            ]
                        ]
                    ],
        			[
                        'size' => '58*38mm', 
                        'contact_patch' => '16.5mm-17.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.45
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.52
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.76
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 3.81
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.81
                            ]
                        ]
                    ],
        			[
                        'size' => '62*36mm', 
                        'contact_patch' => '19.5mm-20.0mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.55
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.67
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.91
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 4.02
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.99
                            ]
                        ]
                    ],
        			[
                        'size' => '62*38mm', 
                        'contact_patch' => '20.0mm-20.5mm',
                        'prices' => [
                            [
                                'hardness_id' => self::HARDNESS_90_94A,
                                'price' => 2.55
                            ],
                            [
                                'hardness_id' => self::HARDNESS_95A,
                                'price' => 2.67
                            ],
                            [
                                'hardness_id' => self::HARDNESS_100A,
                                'price' => 2.91
                            ],
                            [
                                'hardness_id' => self::HARDNESS_102A,
                                'price' => 4.02
                            ],
                            [
                                'hardness_id' => self::HARDNESS_83B,
                                'price' => 4.99
                            ]
                        ]
                    ],
        		]
        	],
        	[
    			'name' => 'V1 Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 0
	        	],
        		'sizes' => [
        			['size' => '50*29mm', 'contact_patch' => '16.0mm-16.5mm'],
					['size' => '51*30mm', 'contact_patch' => '16.0mm-16.5mm'],
					['size' => '52*31mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => '53*31mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => '54*32mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => '55*32mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => '56*33mm', 'contact_patch' => '17.5mm-18.0mm'],
        		]
        	],
        	[
    			'name' => 'V2 Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 1
	        	],
        		'sizes' => [
        			['size' => '50*28mm', 'contact_patch' => '16.0mm-16.5mm'],
					['size' => '51*28mm', 'contact_patch' => '16.0mm-16.5mm'],
					['size' => '52*30mm', 'contact_patch' => '16.0mm-16.5mm'],
					['size' => '53*31mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => '54*32mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => '55*32mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => '56*33mm', 'contact_patch' => '16.5mm-17.0mm'],

        		]
        	],
        	[
    			'name' => 'V3 Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 2
	        	],
        		'sizes' => [
        			['size' => '50*28mm', 'contact_patch' => '16.0mm-16.5mm'],
					['size' => '51*28mm', 'contact_patch' => '16.0mm-16.5mm'],
					['size' => '52*30mm', 'contact_patch' => '16.0mm-16.5mm'],
					['size' => '53*31mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => '54*32mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => '55*32mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => '56*33mm', 'contact_patch' => '16.5mm-17.0mm'],

        		]
        	],
        	[
    			'name' => 'V4 Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 3
	        	],
        		'sizes' => [
        			['size' => '50*28mm', 'contact_patch' => '18.0mm-18.5mm'],
					['size' => '51*28mm', 'contact_patch' => '18.0mm-18.5mm'],
					['size' => '52*30mm', 'contact_patch' => '19.0mm-19.5mm'],
					['size' => '53*31mm', 'contact_patch' => '19.0mm-19.5mm'],
					['size' => '54*32mm', 'contact_patch' => '20.0mm-20.5mm'],
					['size' => '55*32mm', 'contact_patch' => '20.0mm-20.5mm'],
					['size' => '56*33mm', 'contact_patch' => '20.0mm-20.5mm'],

        		]
        	],
        	[
    			'name' => 'V5 Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 4
	        	],
        		'sizes' => [
        			['size' => '50*32mm', 'contact_patch' => '16.5mm-17.0mm'], 
					['size' => '51*32mm', 'contact_patch' => '16.5mm-17.0mm'], 
					['size' => '52*33mm', 'contact_patch' => '16.5mm-17.0mm'], 
					['size' => '53*33mm', 'contact_patch' => '16.5mm-17.0mm'], 
					['size' => '54*34mm', 'contact_patch' => '16.5mm-17.0mm'], 
					['size' => '55*34mm', 'contact_patch' => '16.5mm-17.0mm'], 
					['size' => '56*34mm', 'contact_patch' => '16.5mm-17.0mm'], 
        		]
        	],
        	[
    			'name' => 'V6 Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 5
	        	],
        		'sizes' => [
        			['size' => '52*33mm', 'contact_patch' => '18.0mm-18.5mm'], 
					['size' => '53*33mm', 'contact_patch' => '18.0mm-18.5mm'], 
					['size' => '54*34mm', 'contact_patch' => '19.5mm-20.0mm'], 
					['size' => '55*34mm', 'contact_patch' => '19.5mm-20.0mm'], 
					['size' => '56*34mm', 'contact_patch' => '19.5mm-20.0mm'], 
					['size' => '58*34mm', 'contact_patch' => '19.5mm-20.0mm'], 
        		]

        	],
        	[
    			'name' => 'V7 Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 6
	        	],
        		'sizes' => [
        			['size' => '51*33mm', 'contact_patch' => '18.0mm-18.5mm'],
					['size' => '52*33mm', 'contact_patch' => '18.0mm-18.5mm'],
					['size' => '53*33mm', 'contact_patch' => '18.0mm-18.5mm'],
					['size' => '54*34mm', 'contact_patch' => '18.5mm-19.0mm'],
					['size' => '55*34mm', 'contact_patch' => '18.5mm-19.0mm'],
					['size' => '56*34mm', 'contact_patch' => '18.5mm-19.0mm'],
					['size' => '58*34mm', 'contact_patch' => '18.5mm-19.0mm'],
					['size' => '60*34mm', 'contact_patch' => '18.5mm-19.0mm'],
        		]
        	],
        	[
    			'name' => 'X Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 7
	        	],
        		'sizes' => [
        			['size' => '50*30mm', 'contact_patch' => '18.5mm-19.0mm'], 
					['size' => '51*30mm', 'contact_patch' => '18.5mm-19.0mm'], 
					['size' => '52*30mm', 'contact_patch' => '18.5mm-19.0mm'], 
					['size' => '53*30mm', 'contact_patch' => '18.5mm-19.0mm'], 
					['size' => '54*31mm', 'contact_patch' => '19.5mm-20.0mm'], 
					['size' => '54*34mm', 'contact_patch' => '21.5mm-22.5mm'], 
					['size' => '56*31mm', 'contact_patch' => '19.5mm-20.0mm'], 
        		]
        	],
        	[
    			'name' => 'XB Wheel',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 8
	        	],
        		'sizes' => [
        			['size' =>  ' 50*28mm', 'contact_patch' => '15.5mm-16.0mm'],
					['size' =>  ' 51*28mm', 'contact_patch' => '15.5mm-16.0mm'],
					['size' =>  ' 52*31mm', 'contact_patch' => '15.5mm-16.0mm'],
					['size' =>  ' 53*28mm', 'contact_patch' => '15.5mm-16.0mm'],
					['size' =>  ' 54*28mm', 'contact_patch' => '15.5mm-16.0mm'],
        		]
        	],
        	[
    			'name' => 'Spitfire',
        		'shape' => [
	        		'is_active' => false,
	        		'order' => 12
	        	],
        		'sizes' => [
        			['size' => ' 50*28mm', 'contact_patch' => '16.0mm-16.5mm'],
					['size' => ' 51*28mm', 'contact_patch' => '16.0mm-16.5mm'],
					['size' => ' 52*30mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => ' 53*31mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => ' 54*32mm', 'contact_patch' => '16.5mm-17.0mm'],
					['size' => ' 55*32mm', 'contact_patch' => '18.0mm-18.5mm'],
					['size' => ' 56*33mm', 'contact_patch' => '19.5mm-20.0mm'],
        		]
        	],
        	[
    			'name' => 'Custom shape',
        		'shape' => [
	        		'is_active' => true,
	        		'order' => 11,
                    'is_custom' => true
	        	],
        		'sizes' => [
        			['size' => '50*30mm', 'contact_patch' => 'custom'],
					['size' => '50*31mm', 'contact_patch' => 'custom'],
					['size' => '50*32mm', 'contact_patch' => 'custom'],
					['size' => '51*30mm', 'contact_patch' => 'custom'],
					['size' => '51*31mm', 'contact_patch' => 'custom'],
					['size' => '51*32mm', 'contact_patch' => 'custom'],
					['size' => '51*33mm', 'contact_patch' => 'custom'],
					['size' => '52*30mm', 'contact_patch' => 'custom'],
					['size' => '52*31mm', 'contact_patch' => 'custom'],
					['size' => '52*32mm', 'contact_patch' => 'custom'],
					['size' => '52*33mm', 'contact_patch' => 'custom'],
					['size' => '53*30mm', 'contact_patch' => 'custom'],
					['size' => '53*31mm', 'contact_patch' => 'custom'],
					['size' => '53*32mm', 'contact_patch' => 'custom'],
					['size' => '53*33mm', 'contact_patch' => 'custom'],
					['size' => '53*34mm', 'contact_patch' => 'custom'],
					['size' => '53*36mm', 'contact_patch' => 'custom'],
					['size' => '54*30mm', 'contact_patch' => 'custom'],
					['size' => '54*31mm', 'contact_patch' => 'custom'],
					['size' => '54*32mm', 'contact_patch' => 'custom'],
					['size' => '54*33mm', 'contact_patch' => 'custom'],
					['size' => '54*34mm', 'contact_patch' => 'custom'],
					['size' => '54*36mm', 'contact_patch' => 'custom'],
					['size' => '55*32mm', 'contact_patch' => 'custom'],
					['size' => '55*33mm', 'contact_patch' => 'custom'],
					['size' => '55*34mm', 'contact_patch' => 'custom'],
					['size' => '56*33mm', 'contact_patch' => 'custom'],
					['size' => '56*34mm', 'contact_patch' => 'custom'],
					['size' => '58*34mm', 'contact_patch' => 'custom'],
					['size' => '58*36mm', 'contact_patch' => 'custom'],
					['size' => '58*38mm', 'contact_patch' => 'custom'],
					['size' => '62*36mm', 'contact_patch' => 'custom'],
					['size' => '62*38mm', 'contact_patch' => 'custom'],
        		]
        	],
        ];

        foreach ($shapes as $key => $shape) {
        	
        	$shapeModel = Shape::query()->firstOrCreate(['name' => $shape['name']], $shape['shape']);

        	foreach ($shape['sizes'] as $key => $size) {
	        	$sizeModel = $shapeModel->sizes()->firstOrCreate(array_except($size, ['prices']));

                if (array_key_exists('prices', $size)) {
                    foreach ($size['prices'] as $price) {
                        $sizeModel->prices()->firstOrCreate($price);
                    }
                }
        	}

        }
    }
}
