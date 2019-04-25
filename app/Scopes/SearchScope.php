<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SearchScope extends BaseWhereScope
{
    protected $builders = [
        WhereScope::class,
        WithScope::class,	
        WhereInScope::class,
        LimitScope::class,
        SortableScope::class
    ];

    public function apply(Builder $builder, Model $model)
    {
        foreach ($this->builders as $class) {
            (new $class($this->request))->apply($builder, $model);
        }
    }
}
