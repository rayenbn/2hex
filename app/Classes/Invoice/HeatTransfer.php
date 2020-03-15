<?php

namespace App\Classes\Invoice;

use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class HeatTransfer
 * @package App\Classes\Invoice
 */
class HeatTransfer extends Batch
{
    /**
     * @inheritDoc
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function handle()
    {
        if ($this->items->count() === 0) {
            return;
        }

        $this->worksheet->insertNewRowBefore($this->startRow);

        // Set head styles
        $this->worksheet
            ->getStyle(sprintf('C%1$s:N%1$s', $this->startRow))
            ->applyFromArray($this->getHeadStyles());
        $this->worksheet->getRowDimension($this->startRow, false)->setRowHeight(25);

        $this->worksheet->setCellValue('C' . $this->startRow, 'Transfers Batch');
        $this->worksheet->setCellValue('D' . $this->startRow, 'Name');

        $this->worksheet->mergeCells(sprintf('E%1$d:G%1$d', $this->startRow));
        $this->worksheet->setCellValue('E' . $this->startRow, 'Preview');

        $this->worksheet->setCellValue('H' . $this->startRow, 'Colors');
        $this->worksheet->setCellValue('I' . $this->startRow, 'artwork File');
        $this->worksheet->setCellValue('J' . $this->startRow, 'Color Codes');
        $this->worksheet->setCellValue('K' . $this->startRow, 'Colors');
        $this->worksheet->setCellValue('L' . $this->startRow, 'Films Made');
        $this->worksheet->setCellValue('M' . $this->startRow, 'Transfer Price');
        $this->worksheet->setCellValue('N' . $this->startRow, 'Batch Total');

        $this->startRow += 1;

        /** @var \App\Models\HeatTransfer\HeatTransfer $item */
        foreach ($this->items as $key => $item) {
            $this->worksheet->insertNewRowBefore($this->startRow, 8);

            foreach ($this->worksheet->getRowIterator($this->startRow, 8) as $row) {
                // Column C
                $this->worksheet->mergeCells(sprintf('C%s:C%s', $this->startRow, $endRange = $this->startRow + 3));
                $this->worksheet->mergeCells(sprintf('C%s:C%s', $endRange + 1, $endRange + 4));
                $this->worksheet->setCellValue(sprintf('C%s', $this->startRow), $item->quantity . ' Sheets');
                $this->worksheet->setCellValue(sprintf('C%s', $endRange + 1), 'Heat Transfers');

                // Column D
                $this->worksheet->mergeCells(sprintf('D%s:D%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('D%s', $this->startRow), $item->design_name);

                // Columns E, F, G
                $this->worksheet->mergeCells(sprintf('E%s:G%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('E%s', $this->startRow), $item->small_preview);

                // Column H
                $this->worksheet->mergeCells(sprintf('H%s:H%s', $this->startRow, $endRange = $this->startRow + 3));
                $this->worksheet->mergeCells(sprintf('H%s:H%s', $endRange + 1, $endRange + 4));
                $this->worksheet->setCellValue(sprintf('H%s', $this->startRow), 'Transparency: '. ($item->transparency ? 'Yes' : 'No'));
                $this->worksheet->setCellValue(sprintf('H%s', $endRange + 1), $item->colors_count . ' ' . Str::plural('Color', $item->colors_count));

                // Column I
                $this->worksheet->mergeCells(sprintf('I%s:I%s', $this->startRow, $endRange = $this->startRow + 3));
                $this->worksheet->mergeCells(sprintf('I%s:I%s', $endRange + 1, $endRange + 4));
                $this->worksheet->setCellValue(sprintf('I%s', $this->startRow), $item->small_preview);
                $this->worksheet->setCellValue(sprintf('I%s', $endRange + 1), $item->large_preview);

                // Column K
                $this->worksheet->mergeCells(sprintf('K%s:K%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('K%s', $this->startRow), str_replace(';', "\n", $item->colors));


//                $colors = explode(';', $item->colors);
//
//                foreach ($colors as $colorKey => $color) {
//                    $this->worksheet->setCellValue('K' . intval($startRow + $colorKey), (string) $color);
//                }

                // Column L
                $this->worksheet->mergeCells(sprintf('L%s:L%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('L%s', $this->startRow), $item->reorder_at);

                // Column M
                $this->worksheet->mergeCells(sprintf('M%s:M%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('M%s', $this->startRow), $item->cost_per_transfer);

                // Column N
                $this->worksheet->mergeCells(sprintf('N%s:N%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('N%s', $this->startRow), $item->total);
            }
        }

        $rangeStyles = sprintf(
            'C%s:N%s',
            $this->startRow,
            $this->startRow + ($this->items->count() * 8)
        );

        /** @var \PhpOffice\PhpSpreadsheet\Style\Style $styles */
        $styles = $this->worksheet->getStyle($rangeStyles);

        // set fill bg
        $styles
            ->getFill()
            ->setFillType(Fill::FILL_NONE);

        // set color and size inner cell
        $styles
            ->getFont()
            ->setSize(10)
            ->getColor()
            ->setARGB(Color::COLOR_BLACK);

        // set alignment inner cell
        $styles
            ->getAlignment()
            ->setVertical(Alignment::VERTICAL_CENTER)
            ->setHorizontal(Alignment::HORIZONTAL_LEFT)
            ->setWrapText(true);

        $rangeCurrency = sprintf(
            'M%s:N%s',
            $this->startRow,
            $this->startRow + ($this->items->count() * 8)
        );

        // set currency format for cells
        $this->worksheet->getStyle($rangeCurrency)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);
    }
}