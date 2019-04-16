<?php

namespace App\Jobs;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;

class RecalculateOrders
{
    use Dispatchable, SerializesModels;


    public $orders;

    public function __construct($orders)
    {
        $this->orders = $orders;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
