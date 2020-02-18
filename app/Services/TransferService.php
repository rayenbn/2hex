<?php

namespace App\Services;

use App\Models\Auth\User\User;
use App\Models\HeatTransfer\HeatTransfer;
use App\Models\PaidFile;
use Illuminate\Support\Collection;

/**
 * Class HeatTransferService
 * @package App\Services
 */
class TransferService
{
    /**
     * Get all recent files by user
     *
     * @param \App\Models\Auth\User\User|null $user
     *
     * @return array
     */
    public function getRecentFiles(User $user = null)
    {
        $filenames = [
            'transfers-small-preview' => [],
            'transfers-full-preview' => [],
        ];

        if (empty($user)) {
            return $filenames;
        }

        /** @var \Illuminate\Database\Eloquent\Collection|PaidFile[] $fileActions */
        $fileActions = PaidFile::query()
            ->where('created_by', $user->id)
            ->get();

        foreach (array_keys($filenames) as $value) {
            $count = 0;

            $path = public_path('uploads/' .  $user->name . '/' . $value);

            if (\File::exists($path) == false) {
                continue;
            }

            $filesInFolder = \File::files($path);

            /**
             * @var $filepath \SplFileInfo
             */
            foreach($filesInFolder as $filepath) {
                $filenames[$value][$count] = [];
                $filenames[$value][$count]['name'] = $filepath->getFilename();
                $filenames[$value][$count]['is_disable'] = false;
                $filenames[$value][$count]['color_qty'] = '';
                $filenames[$value][$count]['paid'] = false;
                /** @var PaidFile|null $fileAction */
                $fileAction = $fileActions
                    ->where('file_name', $filepath->getFilename())
                    ->first();

                if (empty($fileAction)) {
                    $count++;
                    continue;
                }

                $filenames[$value][$count]['paid'] = $fileAction->date != null;
                $filenames[$value][$count]['color_qty'] = empty($fileAction['color_qty'])
                    ? ''
                    : ($fileAction['color_qty'] == 4
                        ? 'CMYK'
                        : $fileAction['color_qty'] . ' color');
                $count++;
            }
        }

        return $filenames;
    }

    /**
     * Get total attributes
     *
     * @param \Illuminate\Support\Collection $transfers
     *
     * @return array
     */
    public function getTotalAttributes(Collection $transfers)
    {
        $totalQuantity = $transfers->sum('quantity');
        $totalColors = $transfers->sum('colors_count');

        return compact('totalQuantity', 'totalColors');
    }

    /**
     * Calculate Global Delivery cost based on total KG
     *
     * @param \Illuminate\Support\Collection $transfers
     *
     * @return int|mixed
     */
    public static function getGlobalDeliveryWeight(Collection $transfers)
    {
        // add once per transfer paper order: 1 KG Packaging Material for all transfers
        if ($transfers->isEmpty()) {
            return 0;
        }

        $sizeWeight = [
            "9\" x 33\" Transfer-paper on Skateboard Deck" => 0.0175,
            "8\" x 23\" Transfer-paper on Mini Cruiser Deck" => 0.0175,
            "12\" x 42\" Transfer-paper on Longboard 1 Deck" => 0.0385,
            "14\" x 48\" Transfer-paper on Longboard 2 Deck" => 0.0490,
            //1 Heat-transfer23” x 56”  Skimboard	0.0788 KG
            "23\" x 45\" Transfer-paper on Skimboard Deck" => 0.0788,
        ];

        return $transfers->reduce(function($carry, HeatTransfer $heatTransfer) use ($sizeWeight) {
            return $carry + $sizeWeight[$heatTransfer->size];
        }, 1);

    }
}