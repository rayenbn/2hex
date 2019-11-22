<?php

namespace App\Models\Wheel;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Cviebrock\EloquentSluggable\Sluggable;

class Shape extends Model
{
    use Sluggable;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'shape_id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['shape_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wheel_shapes';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**	
     * Sizes of the shape 
     *
     * @return HasMany
     */
    public function sizes() : HasMany
    {
    	return $this->hasMany(ShapeSize::class, 'shape_id', 'shape_id');
    }
}
