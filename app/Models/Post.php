<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User\User;

class Post extends Model
{
    protected $guarded = ['id'];

    public function author()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    /**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
	    return 'slug';
	}
}
