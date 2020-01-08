<?php

namespace App\Models\Wheel;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Authable;

class Wheel extends Model
{
    use Authable;

    /**
     * Type of placements
     */
    const PLACEMENT_SQUARE = 'square';
    const PLACEMENT_ROLL = 'roll';
    const PLACEMENT_LINE = 'line';

    // 0.25 KG per wheel
    const WHEEL_WEIGHT = 0.25; 
    
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
    public function scopeAuth($query, $type = true)
    {
        if(auth()->check()){
            $query->where('created_by', '=', (string) auth()->id());
        } else {
            $query->where('created_by', '=', csrf_token());
        } 

        //return $query->where('usenow', '=', $type);
        return $query;
    }
}
