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
class ShipInfo extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ship_infos';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['invoice_company','invoice_name','invoice_country','invoice_taxid','shipping_company','shipping_address','shipping_city','shipping_state','shipping_postcode','shipping_contactperson','shipping_phone','shipping_country','created_by', 'updated_at'];

    public function scopeAuth($query)
    {
        if(auth()->check()){
            $query->where('created_by', '=', auth()->id());
        } else {
            $query->where('created_by', '=', csrf_token());
        }  
        
        return $query;
    }
}
