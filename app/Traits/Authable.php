<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Authable
{
    /**
     * Filter by session user
     *
     * @param $query
     * @param boolean $type
     *
     * @return mixed
     */
    public function scopeAuth(Builder $query, $type = true)
    {
        $auth = auth()->id();

        if (isset($auth)) {
            $query->where('created_by', '=', (string) $auth);
        } else {
            $query->where('created_by', '=', csrf_token());
        } 

        return $query->where('usenow', '=', $type);
    }
}