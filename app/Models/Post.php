<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User\User;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
	use Sluggable;

    protected $guarded = ['id'];

    public function author()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

     /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = remove_specials_symbols($value);
    }
}
