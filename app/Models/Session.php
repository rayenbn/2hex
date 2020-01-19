<?php

namespace App\Models;

use App\Models\Session\Enum\Type;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        // what's that for?
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
            $model->updated_at = $model->freshTimestamp();
        });
    }

    /**
     * Set the action of session
     *
     * @param string $value
     *
     * @throws \ReflectionException
     *
     * @return void
     */
    public function setActionAttribute($value)
    {
        Type::assertExists($value);

        $this->attributes['action'] = strtolower($value);
    }
}
