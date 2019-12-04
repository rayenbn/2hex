<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeatTransfer extends Model
{
    public static function boot()
    {
        parent::boot();

        static::creating(function ($tranfer) {
            $tranfer->created_by = (string) (auth()->check() ? auth()->id() : csrf_token());
        });
    }

    public function scopeAuth($query, $type = true)
    {
        if(auth()->check()){
            return $query->where('created_by', '=', (string) auth()->id());
        } else {
            return $query->where('created_by', '=', csrf_token());
        } 

        
    }
}
