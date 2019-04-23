<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WhereInScope extends BaseWhereScope
{
    public function apply(Builder $builder, Model $model)
    {
        if (empty($model->whereInFields)) return;

        $fields = $this->request->only($model->whereInFields);

        foreach ($fields as $column => $value) {
            if (is_null($value)) continue;

            if (is_array($value)) {
                $builder->whereIn($column, $value);

            } else if (is_numeric($value)) {
                $builder->where($column, $value);
            }
        }
    }
}