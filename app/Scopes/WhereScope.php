<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WhereScope extends BaseWhereScope
{
    public function apply(Builder $builder, Model $model)
    {
        if (empty($model->whereFields)) return;

        foreach ($this->request->only($model->whereFields) as $key => $value) {
            if (!is_null($value)) {
                $builder->where($key, $value);
            }
        }
    }
}
