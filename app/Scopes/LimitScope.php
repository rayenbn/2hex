<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class LimitScope extends BaseWhereScope
{
    public function apply(Builder $builder, Model $model)
    {
        if ($this->request->exists('count')) {
            /**
             * Take count rows
             */
            $builder->take((int) $this->request->get('count'), -1);
        }
    }
}