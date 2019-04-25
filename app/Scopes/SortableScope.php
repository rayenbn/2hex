<?php

namespace App\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class SortableScope extends BaseWhereScope
{
	/**
	 * Columns table model
	 */
	private $columns = [];
	
    public function apply(Builder $builder, Model $model)
    {
    	if ($this->request->has('sort')) {

    		$this->columns = \Schema::getColumnListing($model->getTable());
    		$sortFields = $this->request->get('sort');

    		if (is_string($sortFields)) {
    			$this->sortString($builder);
    		}
    		if(is_array($sortFields)) {
    			$this->sortArray($builder);
    		}
    	}
    }

    private function sortString(&$query)
    {
		$match = explode('|', $this->request->get('sort'));
		if (count($match) != 2) return;

		if (in_array($match[0], $this->columns)) {
			$query->orderBy($match[0], $match[1]);
		}
    }

    private function sortArray(&$query)
    {
    	$match = [];
    	$request = $this->request->get('sort');

        foreach ($request as $key => $column) {
			$match = explode('|', $column);

			if (count($match) != 2) continue;

			if (in_array($match[0], $this->columns)) {
				$query->orderBy($match[0], $match[1]);
    		}
        }
    }
}