<?php

namespace App\Models\Wheel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Hardness extends Model
{
    use Sluggable;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'hardness_id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['hardness_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wheel_hardness';

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
}
