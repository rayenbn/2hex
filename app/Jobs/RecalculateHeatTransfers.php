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

        $totalsColors += $transfers->filter(function (HeatTransfer $heatTransfer) {
            return $heatTransfer->transparency;
        })->sum('transparency');

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
            $heatTransfer->colors_count + intval($heatTransfer->transparency),
            $totalsQuantity
        );

        // Multiply heat transfer price
        $transferPrice = intval($heatTransfer->quantity) * ($transferPrice + $heatTransferPrice);

        $transferPrice = $this->heatTransferService->calculateTransferPriceWithSize(
            $transferPrice,
            $sizeMargin
        );

        $screensPrice = $this->heatTransferService->calculateScreensPrice(
            $heatTransfer->colors_count,
            $totalsColors,
            $heatTransfer->transparency,
            $heatTransfer->cmyk
        );

        $screensPrice = $this->heatTransferService->calculateScreensPriceWithSize(
            $screensPrice,
            $sizeMargin
        );

        $totalPrice = round($screensPrice + $transferPrice, 2);

        return $heatTransfer->update([
            'price' => $screensPrice,
            'total' => $totalPrice
        ]);
    }
}