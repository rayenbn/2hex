<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductionDate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'production_dates';

    public $timestamps = true;
}
