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
    protected $fillable = ['quantity','size','concave','wood','glue','bottomprint','topprint','engravery','veneer','extra','cardboard','carton','perdeck','total','created_by','created_at','saved_date','updated_at'];

}
