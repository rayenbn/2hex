<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionComment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'production_comments';

    public $timestamps = true;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = $model->freshTimestamp();
        });
    }
}
