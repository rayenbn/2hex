<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoltNut extends Model
{
    protected $table = 'bolt_nut';
    protected $guarded = ['id'];
    
    /**
     * 1 Grip Tape
     */

    public static function boot() 
    {
        parent::boot();

        static::creating(function ($bolt) {
            $bolt->created_by = (string) (auth()->check() ? auth()->id() : csrf_token());
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
        //return $query;
    }

    public static function colorCount($value)
    {
        switch ($value) {
            case '1 color':
                return 1;
            case '2 color':
                return 2;
            case '3 color':
                return 3;
            case 'CMYK':
                return 4;
            default: 
                return '-';
        }
    }
}