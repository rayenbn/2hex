<?php

namespace App\Services;

use App\Models\Auth\User\User;
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
}