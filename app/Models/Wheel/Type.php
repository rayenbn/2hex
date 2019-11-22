<?php

namespace App\Models\Wheel;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * @property int     $type_id
 * @property string  $name
 * @property string  $slug
 * @property boolean $is_active
 * @property int     $count_colors
 * @property double  $price
 * @property int     $order
 * @property string  $created_at
 * @property string  $updated_at
 */
class Type extends Model
{
    use Sluggable;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'type_id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['type_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wheel_types';

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
