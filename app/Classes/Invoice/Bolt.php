<?php

namespace App\Classes\Invoice;

use App\Models\PaidFile;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Border;

/**
 * Class Bolt
 * @package App\Classes\Invoice
 */
class Bolt extends Batch
{
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
        $this->worksheet
            ->getStyle(sprintf('C%1$s:N%1$s', $this->startRow))
            ->applyFromArray($this->getHeadStyles());
        $this->worksheet->setCellValue('C' . $this->startRow, 'Quantity');
        $this->worksheet->setCellValue('D' . $this->startRow, 'Style');
        $this->worksheet->setCellValue('E' . $this->startRow, 'Colors');
        $this->worksheet->setCellValue('F' . $this->startRow, 'Bolts color allocation');
        $this->worksheet->setCellValue('G' . $this->startRow, 'Nuts color allocation');
        $this->worksheet->setCellValue('H' . $this->startRow, 'Material');
        $this->worksheet->setCellValue('I' . $this->startRow, 'Size');
        $this->worksheet->setCellValue('J' . $this->startRow, 'Phillips Or Allen');
        $this->worksheet->setCellValue('K' . $this->startRow, 'Packing');
        $this->worksheet->mergeCells(sprintf('K%s:L%s', $this->startRow, $this->startRow));
        $this->worksheet->setCellValue('M' . $this->startRow, 'Price p. bolt & nut');
        $this->worksheet->setCellValue('N' . $this->startRow, 'Total of Row');
        
        $this->startRow += 1; // after head row
        // $this->worksheet->setCellValue('D' . $this->startRow, 'Abec');
        // $this->worksheet->setCellValue('E' . $this->startRow, 'Race Print');
        // $this->worksheet->setCellValue('H' . $this->startRow, 'Shield Print');
        // $this->worksheet->setCellValue('I' . $this->startRow, 'Spacers Color');
        
        $this->items = $this->items->reverse();


        foreach ($this->items as $index => $item) {
            
            $this->worksheet->insertNewRowBefore($this->startRow, 10);
            if($index != (count($this->items) - 1)){
                $styleArray = [
                    'borders' => [
                        'bottom' => [
                            'borderStyle' => Border::BORDER_DOUBLE,
                            'color' => ['argb' => '0000000'],
                        ],
                    ],
                ];
                $this->worksheet->getStyle(sprintf('C%s:N%s', $this->startRow + 9, $this->startRow + 9))
                ->applyFromArray($styleArray);
            }

            foreach ($this->worksheet->getRowIterator($this->startRow, 10) as $row) {
                $green = false;
                // Column C
                $this->worksheet->mergeCells(sprintf('C%s:C%s', $this->startRow, $endRange = $this->startRow + 4));
                $this->worksheet->mergeCells(sprintf('C%s:C%s', $endRange + 1 , $endRange + 5));
                $this->worksheet->setCellValue(sprintf('C%s', $this->startRow), $item->quantity);
                $this->worksheet->setCellValue(sprintf('C%s', $endRange + 1), 'Nuts and Bolts');


                // Column D
                $this->worksheet->mergeCells(sprintf('D%s:D%s', $this->startRow, $this->startRow + 9));
                $this->worksheet->setCellValue(sprintf('D%s', $this->startRow), $item->costset);



                // Column E
                $this->worksheet->mergeCells(sprintf('E%s:E%s', $this->startRow, $this->startRow + 1));
                $this->worksheet->mergeCells(sprintf('E%s:E%s', $this->startRow + 2, $this->startRow + 3));
                $this->worksheet->mergeCells(sprintf('E%s:E%s', $this->startRow + 4, $this->startRow + 5));
                $this->worksheet->mergeCells(sprintf('E%s:E%s', $this->startRow + 6, $this->startRow + 7));
                $this->worksheet->mergeCells(sprintf('E%s:E%s', $this->startRow + 8, $this->startRow + 9));

                $colors = json_decode($item->color, true);
                $text = '';
                $this->worksheet->setCellValue(sprintf('E%s', $this->startRow), $colors['title']);
                if(isset($colors['colors']))
                    foreach($colors['colors'] as $i => $color){
                        $this->worksheet->setCellValue(sprintf('E%s', $this->startRow + 2 * ($i + 1)), $color == "Custom Color" ? "Custom Color: ".$colors['customcolors'][$i] : $color);
                        $text = $text.', Color'.($i+1).': '.$color;
                    }
                

                // Column F
                foreach(array_slice(explode(',',$item->allocation), 0, 10) as $i => $allocation)
                    $this->worksheet->setCellValue(sprintf('F%s', $this->startRow + $i), $allocation);
                
                // Column G

                foreach(array_slice(explode(',',$item->allocation), 10, 10) as $i => $allocation)
                    $this->worksheet->setCellValue(sprintf('G%s', $this->startRow + $i), $allocation);
                
                // Column H

                $this->worksheet->mergeCells(sprintf('H%s:H%s', $this->startRow, $this->startRow + 9));
                $this->worksheet->setCellValue(sprintf('H%s', $this->startRow), $item->material);


                // Column I
                $this->worksheet->mergeCells(sprintf('I%s:I%s', $this->startRow, $this->startRow + 9));
                $this->worksheet->setCellValue(sprintf('I%s', $this->startRow), $item->size);

                // Column J
                $this->worksheet->mergeCells(sprintf('J%s:J%s', $this->startRow, $endRange = $this->startRow + 4));
                $this->worksheet->mergeCells(sprintf('J%s:J%s', $endRange + 1 , $endRange + 5));
                $this->worksheet->setCellValue(sprintf('J%s', $this->startRow), $item->phil_allen);
                $this->worksheet->setCellValue(sprintf('J%s', $endRange + 1), $item->allen_type);

                // Column K

                $this->worksheet->mergeCells(sprintf('K%s:K%s', $this->startRow, $this->startRow + 9));
                $this->worksheet->setCellValue(sprintf('K%s', $this->startRow), $item->pack);

                
                

                // Column L
                
                $this->worksheet->mergeCells(sprintf('L%s:L%s', $this->startRow, $this->startRow + 1));
                $this->worksheet->mergeCells(sprintf('L%s:L%s', $this->startRow + 2, $this->startRow + 3));
                $this->worksheet->setCellValue(sprintf('L%s', $this->startRow), $item->designname);
                $this->worksheet->setCellValue(sprintf('L%s', $this->startRow + 2), $item->pack_print);

                $packcolors = json_decode($item->pack_color, true);
                $text = '';
                if(isset($packcolors['colors']))
                    foreach($packcolors['colors'] as $i => $packcolor){
                        $this->worksheet->setCellValue(sprintf('L%s', $this->startRow + 3 + $i + 1), 'Color'.($i+1).': '.$packcolor);
                    }

                // Column M
                $this->worksheet->mergeCells(sprintf('M%s:M%s', $this->startRow, $this->startRow + 9));
                $this->worksheet->setCellValue(sprintf('M%s', $this->startRow), $item->price);

                // Column N
                $this->worksheet->mergeCells(sprintf('N%s:N%s', $this->startRow, $this->startRow + 9));
                $this->worksheet->setCellValue(sprintf('N%s', $this->startRow), $item->total);
            
            
            }
        }
        // ------------- Set styles --------------

        $offset = $this->startRow + ($this->items->count() * 10);


        // start + count bearings * 8(count rows in single item)
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
        // set aligment inner cell
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

        $this->worksheet->getStyle(sprintf('C%s:N%s', $this->startRow - 1, $this->startRow - 1))
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('52A3F1');

        $this->worksheet->getStyle(sprintf('C%s:N%s', $this->startRow - 1, $this->startRow - 1))
                ->getFont()
                ->setSize(10)
                ->getColor()
                ->setARGB(Color::COLOR_WHITE);
        $this->worksheet
            ->getRowDimension($this->startRow - 1)
            ->setRowHeight(40);

        return $this;
    }
}