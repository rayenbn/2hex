<?php

namespace App\Services;

/**
 * Class HeatTransferService
 * @package App\Services
 */
class HeatTransferService
{
    const GLOSSY = "Glossy Print";
    const MATTE = "Matte Print";
    const GLOSSY_MATTE = "Glossy & Matte";

    /**
     * Calculate transfer price
     *
     * @param int $quantity
     * @param int $colorCount
     * @param int $totalQuantity
     * @param float $heatTransferPrice
     *
     * @return float
     */
    public function calculateTransferPrice(int $quantity, int $colorCount, int $totalQuantity, float $heatTransferPrice) : float {

        $marginTransfer = 0.1;
        $addedPerColor = 0;

        if ($totalQuantity < 1000) {
            $marginTransfer = 0.2;
        } else if ($totalQuantity >= 1000 && $totalQuantity < 6000) {
            $marginTransfer = 0.15;
        }

        if (($colorCount - 4) > 0) {
            $addedPerColor = ($colorCount - 4) * 0.1;
        }

        $transferPrice = $quantity * (0.45 + $marginTransfer + $addedPerColor + $heatTransferPrice);

        return round($transferPrice, 2);
    }

    /**
     * Calculate Screens price
     *
     * @param int $colorsQuantity
     * @param int $totalColorsQuantity
     * @param bool $CMYK
     *
     * @return float
     */
    public function calculateScreensPrice(int $colorsQuantity, int $totalColorsQuantity, bool $CMYK = false) : float
    {
        $totalPrice = $colorsQuantity * $this->colorQuantityPrice($totalColorsQuantity) + ($CMYK ? 15 : 0);

        return round($totalPrice, 2);
    }

    /**
     * Calculate heat transfer price
     *
     * @param string|null $heatTransferName
     * @param int $totalQuantity
     *
     * @return float
     */
    public function calculateHeatTransferPrice(int $totalQuantity, string $heatTransferName = null) : float
    {
        $heatTransferName = $heatTransferName ?? static::GLOSSY;

        // Glossy Print: Standard, no extra cost
        $price = 0;

        if ($heatTransferName === static::MATTE) {
            $price += 0.12;

            switch(true) {
                case $totalQuantity < 1000: $price += 0.32; break;
                case $totalQuantity >= 1000 && $totalQuantity < 6000: $price += 0.22; break;
                case $totalQuantity >= 6000: $price += 0.11; break;
            }

        } else if ($heatTransferName === static::GLOSSY_MATTE) {
            $price += 0.28;

            switch(true) {
                case $totalQuantity < 1000: $price += 0.36; break;
                case $totalQuantity >= 1000 && $totalQuantity < 6000: $price += 0.26; break;
                case $totalQuantity >= 6000: $price += 0.16; break;
            }
        }

        return round($price, 2);
    }
    /**
     * Calculate profit margin from colors
     *
     * @param int $colorsQuantity
     *
     * @return int
     */
    protected function colorQuantityPrice(int $colorsQuantity)
    {
        $price = 25;

        switch(true) {
            case $colorsQuantity < 10: $price += 20; break;
            case $colorsQuantity >= 10 && $colorsQuantity < 29: $price += 15; break;
            case $colorsQuantity >= 30: $price += 10; break;
        }

        return $price;
    }

    /**
     * Calculate price with size profit margin
     *
     * @param float $price
     * @param int $profitMargin
     *
     * @return float
     */
    public function calculateWithProfitSize(float $price, int $profitMargin = 100) : float
    {
        $price = $price * $profitMargin / 100;

        return round($price, 2);
    }
}