<?php

namespace App\Classes\Invoice;

use App\Models\Order;
use App\Models\PaidFile;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class Deck
 * @package App\Classes\Invoice
 */
class Deck extends Batch
{
    /**
     * @var array
     */
    protected $specialsTitle = [
        'fulldip'       => 'Fulldip',
        'transparent'   => 'Transp. F.dip',
        'metallic'      => 'Metallic dip',
        'blacktop'      => 'Top Fiberglass',
        'blackmidlayer' => 'Mid Fiberglass',
        'pattern'       => 'Pattern Press',
    ];

    /**
     * @inheritDoc
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     *
     * @return void
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
        $this->worksheet->setCellValue('D' . $this->startRow, 'Size');
        $this->worksheet->setCellValue('E' . $this->startRow, 'Concave');
        $this->worksheet->setCellValue('F' . $this->startRow, 'Materials');
        $this->worksheet->setCellValue('G' . $this->startRow, 'Print');
        $this->worksheet->setCellValue('H' . $this->startRow, 'Top Engravery');
        $this->worksheet->setCellValue('I' . $this->startRow, 'Veneer Colors');
        $this->worksheet->setCellValue('J' . $this->startRow, 'Specials');
        $this->worksheet->setCellValue('K' . $this->startRow, 'Cardboard Wrap');
        $this->worksheet->setCellValue('L' . $this->startRow, 'Carton Print');
        $this->worksheet->setCellValue('M' . $this->startRow, 'Price p. deck');
        $this->worksheet->setCellValue('N' . $this->startRow, 'Total of Row');

        $startRow = $this->startRow + 1;

        /** @var Order $item */
        foreach ($this->items as $item) {

            $this->worksheet->insertNewRowBefore($startRow, 8);

            foreach ($this->worksheet->getRowIterator($startRow, 8) as $row) {
                $green = false;
                // Column C
                $this->worksheet->mergeCells(sprintf('C%s:C%s', $startRow, $endRange = $startRow + 3));
                $this->worksheet->mergeCells(sprintf('C%s:C%s', $endRange + 1, $endRange + 4));
                $this->worksheet->setCellValue(sprintf('C%s', $startRow), $item->quantity);
                $this->worksheet->setCellValue(sprintf('C%s', $endRange + 1), 'Skateboard Decks');
                // Column D
                $this->worksheet->mergeCells(sprintf('D%s:D%s', $startRow, $startRow + 7));
                $this->worksheet->setCellValue(sprintf('D%s', $startRow), $item->size);
                // Column E
                $this->worksheet->mergeCells(sprintf('E%s:E%s', $startRow, $startRow + 7));
                $this->worksheet->setCellValue(sprintf('E%s', $startRow), $item->concave);
                // Column F
                $this->worksheet->mergeCells(sprintf('F%s:F%s', $startRow, $endRange = $startRow + 3));
                $this->worksheet->mergeCells(sprintf('F%s:F%s', $endRange + 1, $endRange + 4));
                $this->worksheet->setCellValue(sprintf('F%s', $startRow), $item->wood);
                $this->worksheet->setCellValue(sprintf('F%s', $endRange + 1), $item->glue);
                // Column G
                $this->worksheet->mergeCells(sprintf('G%s:G%s', $startRow, $endRange = $startRow + 2));
                $this->worksheet->mergeCells(sprintf('G%s:G%s', $endRange + 2, $endRange + 4));

                if (!empty(PaidFile::query()->where('created_by', $item['created_by'])->where('file_name', $item->bottomprint)->first()['date'])){
                    $green = true;
                }

                $this->worksheet->setCellValue(
                    sprintf('G%s', $startRow), $this->setStartTextBold('Bottom: ', $item->bottomprint, $green)
                );
                $green = false;
                $this->worksheet->setCellValue(
                    sprintf('G%s', $endRange + 1), 'colors: ' . $this->colorsToString($item->bottomprint_color)
                );
                if(!empty(PaidFile::query()->where('created_by', $item['created_by'])->where('file_name', $item->bottomprint)->first()['date'])){
                    $green = true;
                }
                $green = false;
                $this->worksheet->setCellValue(
                    sprintf('G%s', $endRange + 2), $this->setStartTextBold('Top: ', $item->topprint,$green)
                );
                $this->worksheet->setCellValue(
                    sprintf('G%s', $endRange + 5), 'colors: ' . $this->colorsToString($item->topprint_color)
                );
                // Column H
                $this->worksheet->mergeCells(sprintf('H%s:H%s', $startRow, $startRow + 7));
                $this->worksheet->setCellValue(sprintf('H%s', $startRow), 'Engravery: ' . $item->engravery);

                // Column I
                foreach (json_decode($item->veneer) as $key => $value) {
                    $this->worksheet->setCellValue(sprintf('I%s', $startRow + $key), $value);
                }

                // Column J
                $extras = (array) json_decode($item->extra);
                // Filter only state equals TRUE
                $extras = array_filter($extras, function($item) {
                    return $item->state;
                });
                // Print specials for order
                foreach (array_keys($extras) as $index => $value) {
                    $this->worksheet->setCellValue(sprintf(
                        'J%s', $startRow + $index),
                        $this->setStartTextBold("{$this->specialsTitle[$value]}: ", (property_exists($extras[$value], 'color')
                            ? preg_replace( '/[^0-9a-zA-Z]/', '', $extras[$value]->color)
                            : 'Yes')
                        )
                    );
                }
                $this->worksheet->setCellValue(sprintf(
                    'J%s', $startRow + count($extras)),
                    $this->setStartTextBold("Shrink Wrap: ", 'Yes')
                );

                // Column K
                $this->worksheet->mergeCells(sprintf('K%s:K%s', $startRow, $startRow + 7));
                $this->worksheet->setCellValue(sprintf('K%s', $startRow), 'Cardboard: ' . $item->cardboard);

                // Column L
                $this->worksheet->mergeCells(sprintf('L%s:L%s', $startRow, $endRange = $startRow + 6));
                if (!empty(PaidFile::query()->where('created_by', $item['created_by'])->where('file_name', $item->carton)->first()['date'])) {
                    $green = true;
                }
                $this->worksheet->setCellValue(
                    sprintf('L%s', $startRow), $this->setStartTextBold('Carton Print: ', $item->carton, $green)
                );
                $this->worksheet->setCellValue(
                    sprintf('L%s', $endRange + 1), 'colors: ' . $this->colorsToString($item->carton_color)
                );
                // Column M
                $this->worksheet->mergeCells(sprintf('M%s:M%s', $startRow, $startRow + 7));
                $this->worksheet->setCellValue(sprintf('M%s', $startRow), $item->perdeck);
                // Column N
                $this->worksheet->mergeCells(sprintf('N%s:N%s', $startRow, $startRow + 7));
                $this->worksheet->setCellValue(sprintf('N%s', $startRow), $item->total);
            }
        }

        // start + count orders * 8(count rows in single item)
        $range = sprintf(
            'C%s:N%s',
            $startRow,
            $startRow + ($this->items->count() * 8)
        );
        $rangeCurrency = sprintf(
            'M%s:N%s',
            $startRow,
            $startRow + ($this->items->count() * 8)
        );
        // set currency format for cells
        $this->worksheet->getStyle($rangeCurrency)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);
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
        // set aligment inner cell
        $styles
            ->getAlignment()
            ->setVertical(Alignment::VERTICAL_CENTER)
            ->setHorizontal(Alignment::HORIZONTAL_LEFT)
            ->setWrapText(true);
    }
}