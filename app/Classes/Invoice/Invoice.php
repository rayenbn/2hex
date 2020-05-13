<?php

namespace App\Classes\Invoice;

interface Invoice
{
    /**
     * Handle batch records
     *
     * @return mixed
     */
    public function handle();
}