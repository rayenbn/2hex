<?php
namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class WithScope extends BaseWhereScope
{
    /**
     * Columns related model
     */
    private $columns = [];

    /**
     * Fields for selecting
     */
    private $fields  = [];

    public function apply(Builder $builder, Model $model)
    {
        if (empty($model->withFields)) return;
        
        if ($this->request->exists('with')) {
            $with = explode(',', $this->request->get('with'));
            $match = [];
            
            foreach ($with as $relation) {
                /**
                 * Find columns for selecting
                 * id - required field.
                 * Sample: salesman[id|first_name|flast_name|...]
                 */
                preg_match("~([a-zA-Z]*)\\[(.*?)\\]$~i", $relation, $match);
        
                if(count($match)) {
                    if (!in_array($match[1], $model->withFields, true)) {
                        continue;
                    }
                    $builder->with([$match[1] => function($query) use($match) {
                        $this->columns = \Schema::getColumnListing($query->getRelated()->getTable());
                        $this->fields  = explode('|', $match[2]);
                        $this->columns = array_intersect($this->columns, $this->fields);

                        if(count($this->columns)) { $query->select($this->columns); }
                    }]);

                } else {
                    if (in_array($relation, $model->withFields, true)) {
                       $builder->with($relation);
                    }
                }
            }
        }
    }
}