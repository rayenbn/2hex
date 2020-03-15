<?php

namespace App\Classes\Batch;

use App\Models\Order;
use App\Models\PaidFile;

class Deck extends BaseBatch
{
    /**
     * Types of fees
     * array $feesTypes
     */
    protected $feesTypes = [
        'engravery' => [
            'name' => 'Top Engravery Set Up',
            'price' => 80
        ],
        'topprint' => [
            'name' => 'Top Print Set Up',
            'price' => 120
        ],
        'bottomprint' => [
            'name' => 'Bottom Print Set Up',
            'price' => 120
        ],
        'carton' => [
            'name' => 'Box print Set Up',
            'price' => 120
        ],
        'cardboard' => [
            'name' => 'Cardboard Set Up',
            'price' => 500
        ]
    ];

    /**
     * @return array
     */
    public function buildUploads()
    {
        // find not empty order fees
        $orderFees = $this->items->map(function($order) {
            return array_filter(
                $order->toArray(), function($image) {
                return isset($image);
            }
            );
        })->filter(function($image) {
            return count($image);
        })
        ->values()
        ->toArray();

        foreach ($orderFees as $index => $order) {
            $index += 1;

            foreach ($order as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $order)) continue;

                // If same design
                if (array_key_exists($key, $this->uploads)) {
                    if (array_key_exists($value, $this->uploads[$key])) {
                        $this->uploads[$key][$value]['batches'] .= ",{$index}";
                        $this->uploads[$key][$value]['quantity'] += (int) $order['quantity'];

                        // if ($key == 'cardboard') {
                        //     $fees[$key][$value]['price'] = Order::getPriceDesign($fees[$key][$value]['quantity']);
                        // }
                        continue;
                    }
                }
                $this->uploads[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => (int) $order['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_color', $order)) {
                    switch ($order[$key . '_color']) {
                        case '1 color':
                            $fees[$key][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$key][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$key][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['color'] = 4;
                            break;
                    }
                }

                if ($key === 'bottomprint' || $key === 'topprint') {
                    $this->uploads[$key][$value]['price'] = $this->uploads[$key][$value]['color'] * Order::COLOR_COST;
                } else {
                    $this->uploads[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $this->uploads[$key][$value]['color'];
                }

                if (!empty(PaidFile::where('created_by', $order['created_by'])->where('file_name', $value)->first()['date'])){
                    $this->uploads[$key][$value]['price'] = 0;
                    $this->uploads[$key][$value]['paid'] = 1;
                }

                /*
                 * Cardboard price calculated
                 * Formula: 500 + (quantity - 625) * 0.8
                 * If (quantity - 625) * 0.8 < 0 then 0
                 */
                // if ($key == 'cardboard') {
                //     $fees[$key][$value]['price'] = Order::getPriceDesign($order['quantity']);
                // } else {
                //     $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'];
                // }

            }
        }

        return $this->uploads;
    }

    /**
     * @return float
     */
    public function getDeliveryWeigh()
    {
        return $this->items->sum('quantity') * Order::SKATEBOARD_WEIGHT;
    }
}