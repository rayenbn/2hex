<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Auth\User\SocialAccount
 *
 * @property int $id
 * @property int $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string $token
 * @property string $avatar
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\Auth\User\User $user
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\SocialAccount whereAvatar($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\SocialAccount whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\SocialAccount whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\SocialAccount whereProvider($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\SocialAccount whereProviderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\SocialAccount whereToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\SocialAccount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Auth\User\SocialAccount whereUserId($value)
 * @mixin \Eloquent
 */
class Order extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['quantity','size','concave','wood','glue','bottomprint','topprint','engravery','veneer','extra','cardboard','carton','perdeck','total','created_by','created_at','saved_date','updated_at', 'submit'];

    public function scopeAuth($query, $type = true)
    {
        if(auth()->check()){
            $query->where('created_by', '=', auth()->id());
        } else {
            $query->where('created_by', '=', csrf_token());
        } 

        return $query->where('usenow', '=', $type);
    }

    public static function getGlobalDelivery()
    {
        $amount = static::auth()->sum('quantity');

        if ($amount == 0) {
            return 0;
        } else if ($amount < 20) {
            return 38;
        } else if ($amount >= 20 && $amount < 30) {
            return 52;
        } else if ($amount >= 30 && $amount < 40) {
            return 90;
        } else if ($amount >= 40 && $amount < 50) {
            return 120;
        } else if ($amount >= 50 && $amount < 100) {
            return 450;
        } else if ($amount >= 100 && $amount < 200) {
            return 650;
        } else if ($amount >= 200 && $amount < 300) {
            return 800;
        } else if ($amount >= 300 && $amount < 500) {
            return 900;
        } else if ($amount >= 500 && $amount < 1000) {
            return 1100;
        } else if ($amount >= 1000 && $amount < 2000) {
            return 1300;
        } else if ($amount >= 2000 && $amount < 5000) {
            return 1700;
        } else if ($amount >= 5000) {
            return 2300;
        }
    }

    public static function getPriceDesign($quantity)
    {
        $total = 0;

        if (($quantity - 625) * 0.8 > 0) {
            $total = ($quantity - 625) * 0.8;
        }

        return 500 + $total;
    }

    public static function additionalCostBatches()
    {
        $total = static::auth()->sum('quantity');

        if($total < 20) {
            return 50;
        } else if ($total >= 20 && $total < 30) {
            return 40;
        } else if ($total >= 30 && $total < 40) {
            return 30;
        } else if ($total >= 40 && $total < 50) {
            return 10;
        } else if ($total >= 50 && $total < 100) {
            return 6;
        } else if ($total >= 100 && $total < 200) {
            return 4;
        } else if ($total >= 200 && $total < 300) {
            return 3;
        } else if ($total >= 300 && $total < 500) {
            return 2.5;
        } else if ($total >= 500 && $total < 1000) {
            return 1.5;
        } else if ($total >= 1000 && $total < 2000) {
            return 1;
        } else if ($total >= 2000 && $total < 5000) {
            return 0.5;
        } else if ($total >= 5000) {
            return 0;
        }

    }

}
