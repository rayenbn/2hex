<?php

namespace App\Traits;

trait Authable
{
	/**
	 * Filter by session user
	 *
	 * @param $query
	 * @param boolean $type
	 */
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