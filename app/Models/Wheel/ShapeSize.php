<?php

namespace App\Models\Wheel;

use Illuminate\Database\Eloquent\Model;

class ShapeSize extends Model
{
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'size_id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['size_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wheel_shape_sizes';

    /** 
     * Prices of the size 
     *
     * @return HasMany
     */
    public function prices()
    {
        return $this->hasMany(HardnessPrice::class, 'size_id', 'size_id');
    }
}
