<?php

namespace App\Jobs;

use Itlead\Promocodes\Models\Promocode;
use Itlead\Promocodes\Pivots\PromocodeUser;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class RecalculateOrders
{
    use SerializesModels;


    protected $orders;

    protected $totalQuantity;

    public function __construct($orders)
    {
        $this->orders = $orders;
        $this->totalQuantity = $this->orders->sum('quantity');
    }

    /**
     * Update order perdeck and total fields
     *
     * @return void
     */
    public function handle()
    {
        $deckPrice = 0;

        $this->orders->map(function($order) use ($deckPrice){
            $deckPrice = $this->calculatePerdeck($order);

            $order->update([
                'perdeck' => $deckPrice,
                'total' => (float) ($deckPrice * $order->quantity)
            ]);
        });

        $this->updatePromocode();
    }

    private function calculatePerdeck($order)
    {
        $perdeck = 0;

        // Step 3
        if ($order->wood == 'American Maple Wood') {
            $perdeck += 1;
        }
        // Step 4
        if ($order->glue == 'Epoxy Glue') {
            $perdeck += 0.9;
        }
        // Step 5
        if (isset($order->bottomprint)) {
            $perdeck += 0.75;
        }
        // Step 6
        if (isset($order->topprint)) {
            $perdeck += 0.75;
        }
        // Step 7
        if (isset($order->engravery)) {
            $perdeck += 0.75;
        }
        // Step 8 
        $perdeck += $this->calculateColorPrice($order->veneer);

        // Step 9
        $perdeck += $this->calculateExtra($order->extra);

        // Step 11
        if (isset($order->carton)) {
            $perdeck += 0.15;
        }
        $perdeck += $this->calculateAdditionalPrice();

        return $this->calculateSizePrice($order->size) + $perdeck;
    }

    private function calculateColorPrice($colors)
    {
        $price = 0;
        $colors = json_decode($colors);

        $selectedColors = array_filter($colors, function($color) {
            return $color != 'natural' && $color != 'random';
        });
        $countColors = count($selectedColors);

        if ($countColors >= 1 && $countColors < 4) {
            return $price = 0.4;
        } else if ($countColors >= 4 && $countColors < 5) {
            return $price = 0.8;
        } else if ($countColors >= 5) {
            return $price = 1.2;
        }

        return 0;
    }

    private function calculateExtra($extra)
    {
        $extra = json_decode($extra);

        $extraFiltered = array_filter((array) $extra, function($ex) {
            return $ex->state;
        });
            
        $sumExtra = 0;

        array_walk($extraFiltered, function($ex, $key) use(&$sumExtra){
            switch ($key) {
                case 'fulldip':
                    $sumExtra += 1.5;
                    break;
                case 'transparent':
                    $sumExtra += 1.5;
                    break;
                case 'metallic':
                    $sumExtra += 3.5;
                    break;
                case 'blacktop':
                    $sumExtra += 1.9;
                    break;
                case 'blackmidlayer':
                    $sumExtra += 1.9;
                    break;
                case 'pattern':
                    $sumExtra += 1.3;
                    break;
                default:
                    $sumExtra += 0;
                    break;
            }
        });

        return $sumExtra;
    }

    private function calculateAdditionalPrice()
    {
        if($this->totalQuantity < 20) {
            return 50;
        } else if ($this->totalQuantity >= 20 && $this->totalQuantity < 30) {
            return 40;
        } else if ($this->totalQuantity >= 30 && $this->totalQuantity < 40) {
            return 30;
        } else if ($this->totalQuantity >= 40 && $this->totalQuantity < 50) {
            return 10;
        } else if ($this->totalQuantity >= 50 && $this->totalQuantity < 100) {
            return 6;
        } else if ($this->totalQuantity >= 100 && $this->totalQuantity < 200) {
            return 4;
        } else if ($this->totalQuantity >= 200 && $this->totalQuantity < 300) {
            return 3;
        } else if ($this->totalQuantity >= 300 && $this->totalQuantity < 500) {
            return 2.5;
        } else if ($this->totalQuantity >= 500 && $this->totalQuantity < 1000) {
            return 1.5;
        } else if ($this->totalQuantity >= 1000 && $this->totalQuantity < 2000) {
            return 1;
        } else if ($this->totalQuantity >= 2000 && $this->totalQuantity < 5000) {
            return 0.5;
        } else if ($this->totalQuantity >= 5000) {
            return 0;
        }
    }

    private function calculateSizePrice($size)
    {
        preg_match('~[0-9.]{3}~', $size, $match);

        if (!count($match)) return 0;

        $size = (float) $match[0];

        if($size < 7.0) {
            return 0;
        }else if($size >= 7.0 && $size < 8.0) {
            return 8.5;
        } else if($size >= 8.0 && $size < 8.5) {
            return 9.5;
        } else if($size >= 8.5)
            return 10.0;
    }

    private function updatePromocode()
    {

        $promocode = $this->orders->count() ? $this->orders->first()->promocode : false;

        if (!$promocode) return;


        $orederIds = $this->orders->pluck('id')->toArray();

        $query = Order::query()->whereIn('id', $orederIds);

        if ($query->whereNotNull('promocode_id')->count()) {
            $order = (clone $query)->whereNotNull('promocode_id')->select('promocode_id')->first();
            Order::query()
                ->whereIn('id', $orederIds)
                ->update(['promocode_id' => $order->promocode_id]);
        }

        $total = $this->orders->sum('total');

        if (($promocode->is_supplement && $total < 300) 
            || (!$promocode->is_supplement && $total < 500)
        ) {
            Order::query()
                ->whereIn('id', $orederIds)
                ->update(['promocode_id' => null]);

            PromocodeUser::query()
                ->where('user_id', auth()->id())
                ->where('promocode_id', $promocode->id)
                ->delete();
        }
    }
}
