<?php

namespace App\Classes\Invoice;

use App\Models\PaidFile;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class Wheel
 * @package App\Classes\Invoice
 */
class Wheel extends Batch
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

        $this->worksheet->setCellValue('C' . $this->startRow, 'Quantity');
        $this->worksheet->setCellValue('D' . $this->startRow, 'Style');
        $this->worksheet->setCellValue('E' . $this->startRow, 'Shape');
        $this->worksheet->setCellValue('F' . $this->startRow, 'Size');
        $this->worksheet->setCellValue('G' . $this->startRow, 'Material & Hardness');
        $this->worksheet->setCellValue('H' . $this->startRow, 'Print on Front');
        $this->worksheet->setCellValue('I' . $this->startRow, 'Print on Back');
        $this->worksheet->setCellValue('J' . $this->startRow, 'Wheels Placement');
        $this->worksheet->setCellValue('K' . $this->startRow, 'Cardboard Wrap');
        $this->worksheet->setCellValue('L' . $this->startRow, 'Carton Print');
        $this->worksheet->setCellValue('M' . $this->startRow, 'Price p. wheel');
        $this->worksheet->setCellValue('N' . $this->startRow, 'Total of Row');

        $this->startRow += 1; // after head row

        /** @var \App\Models\Wheel\Wheel $item */
        foreach ($this->items as $item) {

            $this->worksheet->insertNewRowBefore($this->startRow, 8);

            foreach ($this->worksheet->getRowIterator($this->startRow, 8) as $row) {

                $green = false;

                // Column C
                $this->worksheet->mergeCells(sprintf('C%s:C%s', $this->startRow, $endRange = $this->startRow + 3));
                $this->worksheet->mergeCells(sprintf('C%s:C%s', $endRange + 1, $endRange + 4));
                $this->worksheet->setCellValue(sprintf('C%s', $this->startRow), $item->quantity);
                $this->worksheet->setCellValue(sprintf('C%s', $endRange + 1), 'Skateboard Wheels');
                // Column D
                $this->worksheet->mergeCells(sprintf('D%s:D%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('D%s', $this->startRow), $item->type);
                // Column E
                $this->worksheet->mergeCells(sprintf('E%s:E%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('E%s', $this->startRow), $item->shape);
                // Column F
                $this->worksheet->mergeCells(sprintf('F%s:F%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('F%s', $this->startRow), $item->size);

                // Column G
                $this->worksheet->mergeCells(sprintf('G%s:G%s', $this->startRow, $endRange = $this->startRow + 6));
                $this->worksheet->setCellValue(sprintf('G%s', $this->startRow), $item->is_shr ? 'SHR' : '-');
                $this->worksheet->setCellValue(sprintf('G%s', $endRange + 1), $item->hardness);

                // Column H
                if (!empty(PaidFile::query()->where('created_by', $item['created_by'])->where('file_name',
                    $item->top_print)->first()['date'])) {
                    $green = true;
                }
                $this->worksheet->mergeCells(sprintf('H%s:H%s', $this->startRow, $endRange = $this->startRow + 6));
                $this->worksheet->setCellValue(sprintf('H%s', $this->startRow),
                $this->setStartTextBold('', $item->top_print, $green));
                $this->worksheet->setCellValue(sprintf('H%s', $endRange + 1), 'colors: ' . $this->colorsToString($item->top_colors));
                $green = false;

                // Column I
                if (!empty(PaidFile::query()->where('created_by', $item['created_by'])->where('file_name',
                    $item->back_print)->first()['date'])) {
                    $green = true;
                }

                $this->worksheet->mergeCells(sprintf('I%s:I%s', $this->startRow, $endRange = $this->startRow + 6));
                $this->worksheet->setCellValue(sprintf('I%s', $this->startRow),
                $this->setStartTextBold('', $item->back_print, $green));
                $this->worksheet->setCellValue(sprintf('I%s', $endRange + 1), 'colors: ' . $this->colorsToString($item->back_colors));
                $green = false;
                // Column J
                $this->worksheet->mergeCells(sprintf('J%s:J%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('J%s', $this->startRow), $item->placement ?? '-');

                // Column K
                if (!empty(PaidFile::query()->where('created_by', $item['created_by'])->where('file_name', $item->cardboard_print)->first()['date'])) {
                    $green = true;
                }
                $this->worksheet->mergeCells(sprintf('K%s:K%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('K%s', $this->startRow),
                $this->setStartTextBold('', $item->cardboard_print, $green));
                $green = false;
                // Column L
                if (!empty(PaidFile::query()->where('created_by', $item['created_by'])->where('file_name', $item->carton_print)->first()['date'])) {
                    $green = true;
                }
                $this->worksheet->mergeCells(sprintf('L%s:L%s', $this->startRow, $endRange = $this->startRow + 6));
                $this->worksheet->setCellValue(sprintf('L%s', $this->startRow),
                    $this->setStartTextBold('', $item->carton_print, $green));
                $this->worksheet->setCellValue(sprintf('L%s', $endRange + 1), 'colors: ' . $this->colorsToString($item->carton_colors));
                $green = false;

                // Column M
                $this->worksheet->mergeCells(sprintf('M%s:M%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('M%s', $this->startRow), $item->price);

                // Column N
                $this->worksheet->mergeCells(sprintf('N%s:N%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('N%s', $this->startRow), $item->total);
            }
        }

        // ------------- Set styles --------------

        $offset = $this->startRow + ($this->items->count() * 8);

        // start + count wheels * 8(count rows in single item)
        $range = sprintf(
            'C%s:N%s',
            $this->startRow,
            $offset - 1
        );

        $styles = $this->worksheet->getStyle($range);
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
            $offset - 1
        );
        // set currency format for cells
        $this->worksheet->getStyle($rangeCurrency)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

        $this->worksheet
            ->getRowDimension($this->startRow - 1)
            ->setRowHeight(25);
    }
}