<?php

namespace App\Scopes;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

/**
 * Class BaseWhereScope
 * @package App\Scopes
 */
abstract class BaseWhereScope implements Scope
{
    /** @var Request $request */
    protected $request;

    /**
     * BaseWhereScope constructor.
     *
     * @param Request|null $request
     */
    public function __construct(Request $request = null)
    {
        $this->request = $request ?? request();
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    abstract public function apply(Builder $builder, Model $model);
}
