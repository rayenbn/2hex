<?php

namespace App\Jobs;

use App\Models\HeatTransfer\HeatTransfer;
use App\Services\HeatTransferService;
use Illuminate\Database\Eloquent\Collection;

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
     * @var \Illuminate\Database\Eloquent\Collection
     */
    private $transfers;

    /**
     * RecalculateHeatTransfers constructor.
     *
     * @param \Illuminate\Database\Eloquent\Collection|null $transfers
     */
    public function __construct(Collection $transfers = null)
    {
        $this->heatTransferService = new HeatTransferService();
        $this->initItems($transfers);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection|null $transfers
     *
     * @return \App\Jobs\RecalculateHeatTransfers
     */
    private function initItems(Collection $transfers = null)
    {
        $this->transfers = $transfers ?? HeatTransfer::auth()->get();

        return $this;
    }

    /**
     * Recalculate heat transfers batches
     */
    public function handle()
    {
        $totalsQuantity = $this->transfers->sum('quantity');
        $totalsColors = $this->transfers->sum('colors_count');

        $this->transfers->transform(function(HeatTransfer $heatTransfer) use ($totalsQuantity, $totalsColors) {
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

        $colorsCount = $heatTransfer->colors_count > 0 ? $heatTransfer->colors_count : 1;
        $costPerScreen = round($screensPrice / $colorsCount, 2);

        return $heatTransfer->update([
            'total_screens' => $screensPrice,
            'total' => $transferPrice,
            'cost_per_transfer' => $costPerTransfer,
            'cost_per_screen' => $costPerScreen,
        ]);
    }
}