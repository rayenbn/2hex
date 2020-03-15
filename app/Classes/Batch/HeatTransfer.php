<?php

namespace App\Classes\Batch;

use App\Models\PaidFile;
use App\Services\TransferService;

/**
 * Class HeatTransfer
 * @package App\Classes\Batch
 */
class HeatTransfer extends BaseBatch
{
    public function buildUploads()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $paidFiles */
        $paidFiles = PaidFile::query()
            ->whereIn('created_by', $this->items->pluck('created_by'))
            ->get();

        $this->items->transform(function($transfer, $key) use ($paidFiles) {

            $transferKey = $transfer['small_preview'];

            // Did it same design?
            if (isset($this->uploads['transfer_small_preview'])
                && array_key_exists($transferKey, $this->uploads['transfer_small_preview'])
            ) {
                $this->uploads['transfer_small_preview'][$transferKey]['batches'] .= "," . ++$key;
                $this->uploads['transfer_small_preview'][$transferKey]['quantity'] += $transfer['quantity'];

                return false;
            }

            $this->uploads['transfer_small_preview'][$transferKey] = [
                'batch'    => 'transfer',
                'image'    => $transfer['small_preview'],
                'batches'  => (string) ++$key,
                'type'     => 'Transfer Paper',
                'quantity' => $transfer['quantity'],
                'designName' => $transfer['design_name'],
                'color' => $transfer['cmyk']
                    ? $transfer['colors_count'] - (int) $transfer['transparency']
                    : $transfer['colors_count'],
                'price' => $transfer['reorder_at'] ? 0 : $transfer['total_screens'],
            ];

            if ($transfer['transparency']) {
                $this->uploads['transfer_small_preview'][$transferKey]['color'] .= ' + Transparency';
            }

            $isPaid = $paidFiles
                ->where('file_name', $transferKey)
                ->where('date', '!=', null)
                ->isNotEmpty();

            if ($isPaid){
                $this->uploads['transfer_small_preview'][$transferKey]['price'] = 0;
                $this->uploads['transfer_small_preview'][$transferKey]['paid'] = 1;
            }

            return $transfer;
        });

        return $this->uploads;
    }

    public function getDeliveryWeigh()
    {
        return TransferService::getGlobalDeliveryWeight($this->items);
    }
}