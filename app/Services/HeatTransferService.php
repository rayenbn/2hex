<?php

namespace App\Services;

/**
 * Class HeatTransferService
 * @package App\Services
 */
class HeatTransferService
{
    /**
     * Calculate transfer price
     *
     * @param $colorCount
     * @param $totalQuantity
     * @param $quantity
     *
     * @return float
     */
    public function calculateTransferPrice($colorCount, $totalQuantity, $quantity) : float
    {
        $marginTransfer = 0.1;
        $addedPerColor = 0;

        if ($totalQuantity < 1000) {
            $marginTransfer = 0.2;
        } else if ($totalQuantity >= 1000 && $totalQuantity < 6000) {
            $marginTransfer = 0.15;
        }

        if ($colorCount > 4) {
            $addedPerColor += ($colorCount - 4) * 0.1;
        }


        $transferPrice = $quantity * (0.45 + $marginTransfer + $addedPerColor);

        return round($transferPrice, 2);
    }

    /**
     * Calculate Screens price
     *
     * @param int $colorsQuantity
     * @param int $totalColorsQuantity
     * @param bool $transparent
     * @param bool $CMYK
     *
     * @return float
     */
    public function calculateScreensPrice(int $colorsQuantity, int $totalColorsQuantity, bool $transparent = false, bool $CMYK = false) : float
    {
        $totalPrice = 0;

        if ($CMYK) {
            $totalPrice += $this->CMYKPrice($totalColorsQuantity);
        } else {
            $totalPrice += $this->colorQuantityPrice($totalColorsQuantity) * $colorsQuantity;
        }

        if ($transparent) {
            $totalPrice += $this->calculateTransparentPrice($totalColorsQuantity);
        }

        return round($totalPrice, 2);
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
     * Calculate transparency price
     *
     * @param int $colorsQuantity
     *
     * @return int
     */
    protected function calculateTransparentPrice(int $colorsQuantity) : int
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
     * Calculate CMYK price
     *
     * @param int $colorsQuantity
     *
     * @return int
     */
    protected function CMYKPrice(int $colorsQuantity) : int
    {
        $price = (25 * 4) + 15;

        switch(true) {
            case $colorsQuantity < 10: $price += (20 * 4); break;
            case $colorsQuantity >= 10 && $colorsQuantity < 29: $price += (15 * 4); break;
            case $colorsQuantity >= 30: $price += (10 * 4); break;
        }

        return $price;
    }

    /**
     * Calculate screens price with size profit margin
     *
     * @param float $screensPrice
     * @param int $profitMargin
     *
     * @return float
     */
    public function calculateScreensPriceWithSize(float $screensPrice, int $profitMargin = 100) : float
    {
        $screensPrice = $screensPrice * $profitMargin / 100;

        return round($screensPrice, 2);
    }

    /**
     * Calculate transfers price with size profit margin
     *
     * @param float $transferPrice
     * @param int $profitMargin
     *
     * @return float
     */
    public function calculateTransferPriceWithSize(float $transferPrice, int $profitMargin = 100) : float
    {
        $transferPrice = $transferPrice * $profitMargin / 100;

        return round($transferPrice, 2);
    }
}