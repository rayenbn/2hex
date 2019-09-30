<?php

namespace App\Models\Wheel;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Authable;

class Wheel extends Model
{
    use Authable;
    
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'wheel_id';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['wheel_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'wheels';

    public static function boot() 
    {
        parent::boot();

        static::creating(function ($wheel) {
            $wheel->created_by = (string) (auth()->check() ? auth()->id() : csrf_token());
        });
    }
}
