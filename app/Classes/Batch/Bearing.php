<?php

namespace App\Classes\Batch;

use App\Models\PaidFile;

class Bearing extends BaseBatch
{
    /**
     * Types of fees
     * array $feesTypes
     */
    protected $feesTypes = [
        'race_print' => [
            'name' => 'Race Print',
            'price' => 0,
            'folder' => 'race'
        ],
        'shield_brand_print' => [
            'name' => 'Shield Brand Print',
            'price' => 0,
            'folder' => 'shield'
        ],
        'pantone_print' => [
            'name' => 'Packing Print',
            'price' => 0,
            'folder' => 'pantone'
        ],
        'cardbox_print' => [
            'name' => 'Packing First Print',
            'price' => 0,
            'folder' => 'packfirst'
        ],
        'cardboxtwo_print' => [
            'name' => 'Packing Second Print',
            'price' => 0,
            'folder' => 'packsecond'
        ],
        'sticker_print' => [
            'name' => 'Sheid Brand First Print',
            'price' => 0,
            'folder' => 'brandfirst'
        ],
    ];

    /**
     * @return array
     */
    public function buildUploads()
    {
        // Fetching all desing by griptapes
        $bearings = $this->items
            ->map(function($bearing) {
                return array_filter($bearing->attributesToArray());
            })
            ->toArray();

        foreach ($bearings as $index => $bearing) {
            $index += 1;

            foreach ($bearing as $key => $value) {

                if (array_key_exists($key, $this->uploads)) {
                    if (array_key_exists($value, $this->uploads[$key])) {
                        $this->uploads[$key][$value]['batches'] .= ",{$index}";
                        if($key == "material" && $value == "Chrome Balls"){
                            $this->uploads[$key][$value]['price'] += 2.51;
                        }
                        if($key == "abec" && $value == "Abec7"){
                            $this->uploads[$key][$value]['price'] += 2.51;
                        }
                        if($key == "abec" && $value == "Abec9"){
                            $this->uploads[$key][$value]['price'] += 2.59;
                        }
                        if($key == "shield_brand" && $value == "Emboss"){
                            $this->uploads[$key][$value]['price'] += 149.9;
                        }
                        if(isset($this->uploads[$key][$value]['quantity']))
                            $this->uploads[$key][$value]['quantity'] += $bearing['quantity'];
                        if($key == 'pantone_color'){

                        }
                        if($key == 'pantone_color'){
                            $panthone = json_decode($bearing['pantone_color'], true);
                            switch($panthone['title']){
                                case '1 Color on outer cartons':
                                    $this->uploads[$key][$value]['price'] += 90;
                                    break;
                                case '2 Color on outer cartons':
                                    $this->uploads[$key][$value]['price'] += 180;
                                    break;
                                case '3 Color on outer cartons':
                                    $this->uploads[$key][$value]['price'] += 270;
                                    break;
                                case '4 Color on outer cartons':
                                    $this->uploads[$key][$value]['price'] += 360;
                                    break;
                                case 'CMYK photo print on outer carton':
                                    $this->uploads[$key][$value]['price'] += 360;
                                    break;
                                default:
                                    $this->uploads[$key][$value]['price'] += 0;
                                    break;
                            }
                        }
                        continue;
                    }
                } 

                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $bearing)) {
                    if($key == "material" && $value == "Chrome Balls")
                    {
                        $this->uploads[$key][$value] = [
                            'image'    => $value,
                            'type'     => "Material",
                            'batches'  => (string) $index,
                            'price'    => 2.51
                        ];
                    }
                    if($key == "abec" && $value == "Abec7"){
                        $this->uploads[$key][$value] = [
                            'image'    => $value,
                            'batches'  => (string) $index,
                            'type'     => "Abec",
                            'price'    => 2.51
                        ];
                    }
                    if($key == "abec" && $value == "Abec9"){
                        $this->uploads[$key][$value] = [
                            'image'    => $value,
                            'type'     => "Abec",
                            'batches'  => (string) $index,
                            'price'    => 2.59
                        ];
                    }
                    if($key == "shield_brand" && $value == "Emboss"){
                        $this->uploads[$key][$value] = [
                            'image'    => $value,
                            'type'     => "Shield Brand",
                            'batches'  => (string) $index,
                            'price'    => 149.9
                        ];
                    }
                    if($key == 'pantone_color'){
                        $panthone = json_decode($bearing['pantone_color'], true);
                        switch($panthone['title']){
                            case '1 Color on outer cartons':
                                $this->uploads[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "1 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 90
                                ];
                                break;
                            case '2 Color on outer cartons':
                                $this->uploads[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "2 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 180
                                ];
                                break;
                            case '3 Color on outer cartons':
                                $this->uploads[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "3 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 270
                                ];
                                break;
                            case '4 Color on outer cartons':
                                $this->uploads[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "4 Color",
                                    'batches'  => (string) $index,
                                    'price'    => 360
                                ];
                                break;
                            case 'CMYK photo print on outer carton':
                                $this->uploads[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "CMYK",
                                    'batches'  => (string) $index,
                                    'price'    => 360
                                ];
                                break;
                            default:
                                $this->uploads[$key][$value] = [
                                    'image'    => $panthone['title'],
                                    'type'     => "No Color",
                                    'batches'  => (string) $index,
                                    'price'    => 0
                                ];
                                break;
                        }
                    }
                    
                    continue;
                }

                // If same design
                
                $this->uploads[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $bearing['quantity'],
                    'color'    => 1
                ];

                $this->uploads[$key][$value]['price'] = 0;


                if(!empty(PaidFile::where('created_by', $bearing['created_by'])->where('file_name', $value)->first()['date'])){
                    $this->uploads[$key][$value]['price'] = 0;
                    $this->uploads[$key][$value]['paid'] = 1;
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