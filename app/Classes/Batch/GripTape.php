<?php

namespace App\Classes\Batch;

use App\Models\PaidFile;

class GripTape extends BaseBatch
{
    /**
     * Types of fees
     * array $feesTypes
     */
    protected $feesTypes = [
        'top_print' => [
            'name' => 'Grip Top Print',
            'price' => 30
        ],
        'die_cut' => [
            'name' => 'Griptape Die Cut',
            'price' => 80
        ],
        'carton_print' => [
            'name' => 'Griptape Carton Print',
            'price' => 95
        ],
        'backpaper_print' => [
            'name' => 'Griptape Backpaper Print',
            'price' => 45
        ]
    ];

    /**
     * @return array
     */
    public function buildUploads()
    {
        // Fetching all desing by griptapes
        $gripTapes = $this->items
            ->map(function($grip) {
                return array_filter($grip->attributesToArray());
            })
            ->toArray();

        foreach ($gripTapes as $index => $grip) {
            $index += 1;

            foreach ($grip as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes)) continue;

                // If same design
                if (array_key_exists($key, $this->uploads)) {
                    if (array_key_exists($value, $this->uploads[$key])) {
                        $this->uploads[$key][$value]['batches'] .= ",{$index}";
                        $this->uploads[$key][$value]['quantity'] += (int) $grip['quantity'];
                        continue;
                    }
                }
                $this->uploads[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => (int) $grip['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_color', $grip)) {
                    switch ($grip[$key . '_color']) {
                        case '1 color':
                            $this->uploads[$key][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $this->uploads[$key][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $this->uploads[$key][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $this->uploads[$key][$value]['color'] = 4;
                            break;
                    }
                }

                $this->uploads[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $this->uploads[$key][$value]['color'];

                if(!empty(PaidFile::query()->where('created_by', $grip['created_by'])->where('file_name', $value)->first()['date'])){
                    $this->uploads[$key][$value]['paid'] = 1;
                    $this->uploads[$key][$value]['price'] = 0;
                }
            }
        }

        return $this->uploads;
    }

    /**
     * @return float
     */
    public function getDeliveryWeigh()
    {
        return $this->items->reduce(function($carry, $item) {
            return $carry + ($item->quantity * \App\Models\GripTape::sizePrice($item->size)['weight']);
        }, 0);
    }
}