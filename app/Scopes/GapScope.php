<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class GapScope extends BaseWhereScope
{
    const LAST_YEAR = 'last_year';
    const LAST_MONTH = 'last_month';

    /**
     * @inheritDoc
     */
    public function apply(Builder $builder, Model $model)
    {
        parse_str($this->request->getQueryString(), $queryParams);

        if (array_key_exists('gap', $queryParams) === false) {
            return;
        }

        $gap = trim($queryParams['gap']);

        if (strlen($gap) === 0) {
            return;
        }

        switch ($gap) {
            case static::LAST_YEAR:
                $builder->whereYear('created_at', date('Y', strtotime('-1 year')));
                break;
            case static::LAST_MONTH:
                $builder->whereMonth('created_at', date('m', strtotime('-1 month')));
                break;
        }
    }
}