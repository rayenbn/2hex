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
        $table = $this->getTable();

        if (isset($auth)) {
            $query->where($table . '.created_by', '=', (string) $auth);
        } else {
            $query->where($table . '.created_by', '=', csrf_token());
        } 

        return $query->where($table . '.usenow', '=', $type);
    }
}