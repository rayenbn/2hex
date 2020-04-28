<?php

namespace App\Classes\Invoice\Concerns;

use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

trait DefaultStyles
{
    /**
     * Get default head styles
     *
     * @return array
     */
    protected function getHeadStyles()
    {
        return [
            'font' => [
                'size' => 10,
                'bold' => false,
                'color' => [
                    'argb' => Color::COLOR_WHITE,
                ]
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '52A3F1',
                ],
            ],
        ];
    }
}