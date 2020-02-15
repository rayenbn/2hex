<?php

namespace App\Jobs;

use App\Models\HeatTransfer\HeatTransfer;
use App\Services\HeatTransferService;

/**
 * Class RecalculateHeatTransfers
 * @package App\Jobs
 */
class RecalculateHeatTransfers
{
    /**
     * @var \App\Services\HeatTransferService
     */
    private $heatTransferService;

    /**
     * RecalculateHeatTransfers constructor.
     */
    public function __construct()
    {
        $this->heatTransferService = new HeatTransferService();
    }

    /**
     * Recalculate heat transfers batches
     */
    public function handle()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $transfers */
        $transfers = HeatTransfer::auth()->get();

        $totalsQuantity = $transfers->sum('quantity');
        $totalsColors = $transfers->sum('colors_count');

        $transfers->transform(function(HeatTransfer $heatTransfer) use ($totalsQuantity, $totalsColors) {
            return $this->updatePrice($heatTransfer, $totalsQuantity, $totalsColors);
        });
    }

    /**
     * Update price of the heat transfer batch
     *
     * @param \App\Models\HeatTransfer\HeatTransfer $heatTransfer
     * @param int $totalsQuantity
     * @param int $totalsColors
     *
     * @return bool
     */
    protected function updatePrice(HeatTransfer $heatTransfer, int $totalsQuantity, int $totalsColors) : bool
    {
        $sizeMargin = (float) $heatTransfer->size_margin;

        $heatTransferPrice = $this->heatTransferService->calculateHeatTransferPrice(
            $totalsQuantity,
            $heatTransfer->heat_transfer
        );

        $transferPrice = $this->heatTransferService->calculateTransferPrice(
            $heatTransfer->quantity,
            $heatTransfer->colors_count,
            $totalsQuantity,
            $heatTransferPrice
        );

        $transferPrice = $this->heatTransferService->calculateWithProfitSize(
            $transferPrice,
            $sizeMargin
        );

        $screensPrice = $this->heatTransferService->calculateScreensPrice(
            $heatTransfer->colors_count,
            $totalsColors,
            $heatTransfer->cmyk
        );

        $screensPrice = $this->heatTransferService->calculateWithProfitSize(
            $screensPrice,
            $sizeMargin
        );

        $costPerTransfer = round($transferPrice / $heatTransfer->quantity, 2);
        $costPerScreen = round($screensPrice / $heatTransfer->colors_count, 2);
        $totalPrice = round($heatTransfer->quantity * $costPerTransfer, 2);

        return $heatTransfer->update([
//            'price' => $screensPrice,
            'total' => $totalPrice,
            'cost_per_transfer' => $costPerTransfer,
            'cost_per_screen' => $costPerScreen,
        ]);
    }
}