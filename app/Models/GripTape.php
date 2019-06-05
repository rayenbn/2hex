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

    /**
     * Supplying sizing and price
     * @param string $size - Grip Tape size
     * @return array - pricing for size
     */
    public static function sizePrice($size)
    {
        switch($size) {
            case '9" x 33"': return [
                'grit'            =>  1.2,
                'perforation'     =>  0.2,
                'topPrint'        =>  0.6,
                'dieCut'          =>  0.3,
                'coloredGriptape' =>  0.9,
                'backpaper'       =>  0,
                'backpaperPrint'  =>  0.35,
                'cartonPrint'     =>  0.02,
                'weight'          =>  0.155
            ]; break;
            case '9" x 720"': return [
                'grit'            =>  26.18,
                'perforation'     =>  4.36,
                'topPrint'        =>  13.09,
                'dieCut'          =>  6.55,
                'coloredGriptape' =>  19.64,
                'backpaper'       =>  0,
                'backpaperPrint'  =>  7.64,
                'cartonPrint'     =>  0.02,
                'weight'          =>  3.382
            ]; break;
            case '10" x 45"': return [
                'grit'            =>  1.82,
                'perforation'     =>  0.3,
                'topPrint'        =>  0.91,
                'dieCut'          =>  0.45,
                'coloredGriptape' =>  1.36,
                'backpaper'       =>  0,
                'backpaperPrint'  =>  0.53,
                'cartonPrint'     =>  0.02,
                'weight'          =>  0.235
            ]; break;
            case '11" x 720"': return [
                'grit'            =>  32,
                'perforation'     =>  5.33,
                'topPrint'        =>  16,
                'dieCut'          =>  8,
                'coloredGriptape' =>  24,
                'backpaper'       =>  0,
                'backpaperPrint'  =>  9.33,
                'cartonPrint'     =>  0.02,
                'weight'          =>  4.133
            ]; break;
            default: return [
                'grit'            =>  1.2,
                'perforation'     =>  0.2,
                'topPrint'        =>  0.6,
                'dieCut'          =>  0.3,
                'coloredGriptape' =>  0.9,
                'backpaper'       =>  0,
                'backpaperPrint'  =>  0.35,
                'cartonPrint'     =>  0.02,
                'weight'          =>  0.155
            ];
        }
    }
}
