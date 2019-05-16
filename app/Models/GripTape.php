<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GripTape extends Model
{
    protected $table = 'grip_tapes';
    protected $guarded = ['id'];
    
    /**
     * 1 Grip Tape
     */
    const GRIPTAPE_WEIGHT = 0.155;

    public static function boot() 
    {
        parent::boot();

        static::creating(function ($grip) {
            $grip->created_by = (string) (auth()->check() ? auth()->id() : csrf_token());
        });
    }

    public function scopeAuth($query, $type = true)
    {
        if(auth()->check()){
            $query->where('created_by', '=', (string) auth()->id());
        } else {
            $query->where('created_by', '=', csrf_token());
        } 

        return $query->where('usenow', '=', $type);
    }
}
