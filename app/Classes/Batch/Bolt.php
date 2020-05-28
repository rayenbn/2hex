<?php

namespace App\Classes\Batch;

use App\Models\PaidFile;

class Bolt extends BaseBatch
{
    /**
     * Types of fees
     * array $feesTypes
     */
    protected $feesTypes = [
        'pack_print' => [
            'name' => 'Bolts and Nuts packing print',
            'price' => 0
        ],
    ];

    /**
     * @return array
     */
    public function buildUploads()
    {
        // Fetching all desing by bolts and nuts
        $bolts = $this->items
            ->map(function($bolt) {
                return array_filter($bolt->attributesToArray());
            })
            ->toArray();

        foreach ($bolts as $index => $bolt) {
            $index += 1;

            foreach ($bolt as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes)) continue;

                // If same design
                if (array_key_exists($key, $this->uploads)) {
                    if (array_key_exists($value, $this->uploads[$key])) {
                        $this->uploads[$key][$value]['batches'] .= ",{$index}";
                        $this->uploads[$key][$value]['quantity'] += (int) $bolt['quantity'];
                        continue;
                    }
                }
                $this->uploads[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => (int) $bolt['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_color', $bolt)) {
                    switch ($bolt[$key . '_color']) {
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

                if(!empty(PaidFile::query()->where('created_by', $bolt['created_by'])->where('file_name', $value)->first()['date'])){
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
        return $this->items->sum('quantity')*0.12;
    }
}