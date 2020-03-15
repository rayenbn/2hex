<?php

namespace App\Classes\Batch;

use App\Models\PaidFile;

/**
 * Class Wheel
 * @package App\Classes\Batch
 */
class Wheel extends BaseBatch
{
    protected $feesTypes = [
        'top_print' => [
            'name' => 'SB Wheel Top Print',
        ],
        'back_print' => [
            'name' => 'SB Wheel Back Print',
        ],
        'cardboard_print' => [
            'name' => ' SB Wheel Cardboard Print',
        ],
        'carton_print' => [
            'name' => 'SB Wheel Carton Print',
        ],
        'shape_print' => [
            'name' => 'SB Wheel Сustom Shape',
        ],
    ];

    public function buildUploads()
    {
        // Fetching all desing by orders
        $wheels = $this->items
            ->map(function($wheel) {
                return array_filter($wheel->attributesToArray());
            })
            ->toArray();



        foreach ($wheels as $index => $wheel) {
            $index += 1;
            foreach ($wheel as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $wheel)) continue;

                $wheelKey = 'wheel_' . $key;

                // If same design
                if (array_key_exists($wheelKey, $this->uploads)) {
                    if (array_key_exists($value, $this->uploads[$wheelKey])) {
                        $this->uploads[$wheelKey][$value]['batches'] .= ",{$index}";
                        $this->uploads[$wheelKey][$value]['quantity'] += (int) $wheel['quantity'];
                        continue;
                    }
                }

                $fees[$wheelKey][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => (int) $wheel['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists(str_replace('_print','',$key) . '_colors', $wheel)) {
                    switch ($wheel[str_replace('_print','',$key) . '_colors']) {
                        case '1 color':
                            $fees[$wheelKey][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$wheelKey][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$wheelKey][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$wheelKey][$value]['color'] = 4;
                            break;
                    }
                }

                if ($key === 'top_print') {
                    $this->uploads[$wheelKey][$value]['price'] = $this->uploads[$wheelKey][$value]['color'] * 20 * 1.5;
                } else if ($key === 'back_print') {
                    // Set a free cost if exist same top print
                    if (isset($this->uploads['wheel_top_print']) && array_key_exists($value, $this->uploads['wheel_top_print'])) {
                        $this->uploads[$wheelKey][$value]['price'] = 0;
                    } else {
                        $this->uploads[$wheelKey][$value]['price'] = $this->uploads[$wheelKey][$value]['color'] * 20 * 1.5;
                    }

                } else if ($key === 'cardboard_print') {
                    if ($wheel['quantity'] < 1500) {
                        $this->uploads[$wheelKey][$value]['price'] = 525 - (0.35 * $wheel['quantity']);
                    } else {
                        $this->uploads[$wheelKey][$value]['price'] = 0;
                    }
                } else if ($key === 'carton_print'){
                    $this->uploads[$wheelKey][$value]['price'] = 80 * $this->uploads[$wheelKey][$value]['color'];
                } else if ($key === 'shape_print'){
                    $this->uploads[$wheelKey][$value]['price'] = 2000;
                } else {
                    $this->uploads[$wheelKey][$value]['price'] = 0;
                }

                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $value)->first()['date'])){
                    $this->uploads[$wheelKey][$value]['paid'] = 1;
                    $this->uploads[$wheelKey][$value]['price'] = 0;
                }
            }
        }
        return $this->uploads;
    }

    public function getDeliveryWeigh()
    {
        return $this->items->sum('quantity') * \App\Models\Wheel\Wheel::WHEEL_WEIGHT;
    }
}