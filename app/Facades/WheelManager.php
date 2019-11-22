<?php

namespace App\Facades;

use App\Models\Wheel\{Type, Shape};
use App\Models\Option;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class WheelManager
{
    /**    
     * Get all shapes
     *
     * @param boolean $isAcive
     *
     * @return Collection
     */
    public function types(bool $isAcive = true) : Collection
    {
        return Type::query()
        	->whereIsActive($isAcive)
        	->orderBy('order', 'ASC')
        	->orderBy('type_id', 'ASC')
        	->get();
    }

    /**    
     * Get all shapes
     *
     * @param boolean $isAcive
     *
     * @return Collection
     */
    public function shapes(bool $isAcive = true) : Collection
    {
        return Shape::query()
            ->whereIsActive($isAcive)
            ->orderBy('order', 'ASC')
            ->orderBy('shape_id', 'ASC')
            ->with(['sizes' => function($relation) use ($isAcive) {
                $relation->whereIsActive($isAcive);
            }])
            ->get();
    }

    /**    
     * Base Price per set
     *
     * @return float
     */
    public function basePrice() : float
    {
        $basePrice = Option::query()->where('option_name', 'wheel_base_price')->first();
        
        return (float) ($basePrice ? $basePrice->option_value : 1.55);
    }

    /**    
     * Wheel options
     *
     * @return EloquentCollection
     */
    public function options() : EloquentCollection
    {
        return Option::query()->where('option_name', 'like', 'wheel%')->get();
    }
}
    


