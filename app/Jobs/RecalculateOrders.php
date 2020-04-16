<?php

namespace App\Jobs;

use Itlead\Promocodes\Models\Promocode;
use Itlead\Promocodes\Pivots\PromocodeUser;
use Illuminate\Queue\SerializesModels;
use App\Models\{Order, GripTape};

class RecalculateOrders
{
    use SerializesModels;


    protected $orders;
    protected $griptapes;
    protected $wheels;

    protected $totalQuantity;

    protected $gripSizes = [
        '9" x 33"'   => 1.45,
        '9" x 720"'  => 29,
        '10" x 45"'  => 2.45,
        '11" x 720"' => 39,
    ];

    public function __construct($orders, $griptapes, $wheels, $bearings)
    {
        $this->orders = $orders;
        $this->griptapes = $griptapes;
        $this->wheels = $wheels;
        $this->bearings = $bearings;
        $this->totalQuantity = $this->orders->sum('quantity');
    }

    /** 
     * Calculate total sum and total quantity for seesion
     *
     * @return array
     */
    protected function calculateTotals()
    {
        $auth = auth()->id();

        if (empty($auth)) {
            $auth = csrf_token();
        } 

        $auth = (string) $auth;

        $bindings = array_fill(0, 3, $auth);

        $result = (array) \DB::select(\DB::raw('
            SELECT IFNULL(SUM(sumTable.total), 0) AS total, IFNULL(SUM(sumTable.quantity), 0) AS quantity
            FROM (
                SELECT total, quantity FROM orders WHERE created_by = ? AND usenow = 1 AND submit = 0
                UNION ALL
                SELECT total, quantity FROM grip_tapes WHERE created_by = ? AND usenow = 1 AND submit = 0
                UNION ALL
                SELECT total, quantity FROM wheels WHERE created_by = ? AND usenow = 1 AND submit = 0
                UNION ALL
                SELECT total, quantity FROM bearings WHERE created_by = ? AND usenow = 1 AND submit = 0
            ) sumTable 
        '), $bindings)[0];

        return (array) $result;
    }

    /**
     * Update order perdeck and total fields
     *
     * @return void
     */
    public function handle()
    {
        $totals = $this->calculateTotals();

        $deckPrice = 0;

        $this->orders->map(function($order) use ($deckPrice){
            $deckPrice = $this->calculatePerdeck($order);

            $order->update([
                'perdeck' => $deckPrice,
                'total' => (float) ($deckPrice * $order->quantity)
            ]);
        });

        $this->griptapes->map(function($griptape){
            $price = $this->calculateGripPrice($griptape);

            $griptape->update([
                'price' => $price,
                'total' => (float) ($price * $griptape->quantity)
            ]);
        });

        $wheels = new RecalculateWheels($this->wheels);
        $wheels->setTotalSum($totals['total']);
        $wheels->setTotalQuantity($totals['quantity']);
        $wheels->recalculate();


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

    private function calculateGripPrice($griptape)
    {
        $orderTotal = $this->calculateGripOrderTotal($griptape);
        $additionalCost = $this->calculateGripAdditionalPrice($orderTotal);

        $prices = GripTape::sizePrice($griptape->size);

        return $this->gripSizes[$griptape->size] 
            + $additionalCost
            + ($griptape->grit === 'HS780' ? $prices['grit'] : 0)
            + ($griptape->perforation ? $prices['perforation'] : 0)
            + (isset($griptape->top_print) ||  isset($griptape->top_print_color) ? $prices['topPrint'] : 0)
            + (isset($griptape->die_cut) ? $prices['dieCut'] : 0)
            + (isset($griptape->color) && $griptape->color !== 'black' ? $prices['coloredGriptape'] : 0)
            + (isset($griptape->backpaper_print) ||  isset($griptape->backpaper_print_color) ? $prices['backpaperPrint'] : 0);
            + (isset($griptape->carton_print) ||  isset($griptape->carton_print_color) ? $prices['cartonPrint'] : 0);
    }

    private function calculateGripAdditionalPrice($total)
    {
        switch(true) {
            case ($total >= 1170 && $total < 3000): return 1;
            case ($total >= 3000 && $total < 6000): return 0.8;
            case ($total >= 6000 && $total < 8000): return 0.5;
            case ($total >= 8000 && $total < 12000): return 0.4;
            case ($total >= 12000 && $total < 20000): return 0.3;
            case ($total >= 20000 && $total < 50000): return 0.25;
            case ($total >= 50000): return 0.2;
            default: return 1;
        }
    }

    private function calculateGripDeliveryWeight()
    {
        // Order weight
        $gripWeight = $this->griptapes->reduce(function($carry, $item) {
            return $carry + ($item->quantity * GripTape::sizePrice($item->size)['weight']); 
        }, 0);

        return ($this->totalQuantity * Order::SKATEBOARD_WEIGHT) + $gripWeight;
    }

    private function calculateGripDeliveryPrice($weight) 
    {
        switch(true) {
            case ($weight <= 13): return 38;
            case ($weight > 13 && $weight <= 26): return 52;
            case ($weight > 26 && $weight <= 39): return 90;
            case ($weight > 39 && $weight <= 65): return 450;
            case ($weight > 65 && $weight <= 130): return 650;
            case ($weight > 130 && $weight <= 260): return 800;
            case ($weight > 260 && $weight <= 390): return 900;
            case ($weight > 390 && $weight <= 650): return 1100;
            case ($weight > 650 && $weight <= 975): return 1200;
            case ($weight > 975 && $weight <= 1300): return 1300;
            case ($weight > 1300 && $weight <= 1950): return 1500;
            case ($weight > 1950 && $weight <= 2600): return 1700;
            case ($weight > 2600 && $weight <= 3900): return 1980;
            case ($weight > 3900 && $weight <= 6500): return 2250;
            case ($weight > 6500 && $weight <= 9100): return 2720;
            case ($weight > 9100 && $weight <= 11700): return 3200;
            case ($weight > 11700): return 3600;
            default: return 0;
        }
    }

    private function calculateGripOrderTotal($griptape) 
    {
        $weight = $this->calculateGripDeliveryWeight();

        return $this->getSumTotalOrders() 
            + ($griptape->quantity * $this->gripSizes[$griptape->size]) 
            + $this->calculateGripDeliveryPrice($weight);
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

        if ($query->whereNotNull('promocode')->count()) {
            $order = (clone $query)->whereNotNull('promocode')->select('promocode')->first();
            Order::query()
                ->whereIn('id', $orederIds)
                ->update(['promocode' => $order->promocode]);
        }

        $total = $this->orders->sum('total');

        $promocode = json_decode($promocode);

        if (($promocode->is_supplement && $total < 300) 
            || (!$promocode->is_supplement && $total < 500)
        ) {
            Order::query()
                ->whereIn('id', $orederIds)
                ->update(['promocode' => null]);
            PromocodeUser::query()
                ->where('user_id', auth()->id())
                ->where('promocode', $promocode->code)
                ->delete();
        }
    }

    public function getSumTotalOrders()
    {
        return $this->orders->sum('total');
    }
}
