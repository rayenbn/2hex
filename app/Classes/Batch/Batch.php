<?php

namespace App\Classes\Batch;

interface Batch
{
    public function buildUploads();
    public function getDeliveryWeigh();
}