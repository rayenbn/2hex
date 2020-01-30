<?php

namespace App\Models\HeatTransfer;

use Illuminate\Database\Eloquent\Model;

class HeatTransfer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'heat_transfers';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
}
