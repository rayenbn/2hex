<?php

namespace App\Classes\Batch;

use Illuminate\Support\Collection;

/**
 * Class BaseBatch
 */
abstract class BaseBatch implements Batch
{
    /**
     * @var array Batch uploads
     */
    protected $uploads = [];

    /**
     * @var Collection
     */
    protected $items;

    /**
     * BaseBatch constructor.
     *
     * @param Collection $items
     */
    public function __construct(Collection $items = null)
    {
        $this->items = $items ?? collect();
    }
}