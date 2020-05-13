<?php

namespace App\Classes\Invoice;

use App\Models\PaidFile;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Border;

/**
 * Class Bearing
 * @package App\Classes\Invoice
 */
class Bearing extends Batch
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
        $this->worksheet->setCellValue('D' . $this->startRow, 'Material');
        $this->worksheet->setCellValue('E' . $this->startRow, 'Race');
        $this->worksheet->setCellValue('F' . $this->startRow, 'Retainer');
        $this->worksheet->setCellValue('G' . $this->startRow, 'Shield Material');
        $this->worksheet->setCellValue('H' . $this->startRow, 'Shield Branding');
        $this->worksheet->setCellValue('I' . $this->startRow, 'Spacers Material');
        $this->worksheet->setCellValue('J' . $this->startRow, 'Bearing Packing');
        $this->worksheet->mergeCells(sprintf('J%s:K%s', $this->startRow, $this->startRow));
        $this->worksheet->setCellValue('L' . $this->startRow, 'Outer Packing');
        $this->worksheet->setCellValue('M' . $this->startRow, 'Price p. bearing');
        $this->worksheet->setCellValue('N' . $this->startRow, 'Total of Row');
        
        $this->startRow += 1; // after head row
        // $this->worksheet->setCellValue('D' . $this->startRow, 'Abec');
        // $this->worksheet->setCellValue('E' . $this->startRow, 'Race Print');
        // $this->worksheet->setCellValue('H' . $this->startRow, 'Shield Print');
        // $this->worksheet->setCellValue('I' . $this->startRow, 'Spacers Color');
        
        $this->items = $this->items->reverse();
        foreach ($this->items as $item) {
            
            $this->worksheet->insertNewRowBefore($this->startRow, 8);
            
            $styleArray = [
                'borders' => [
                    'bottom' => [
                        'borderStyle' => Border::BORDER_DOUBLE,
                        'color' => ['argb' => '0000000'],
                    ],
                ],
            ];
            $this->worksheet->getStyle(sprintf('C%s:N%s', $this->startRow + 7, $this->startRow + 7))
            ->applyFromArray($styleArray);

            
            foreach ($this->worksheet->getRowIterator($this->startRow, 8) as $row) {
                $green = false;
                // Column C
                $this->worksheet->mergeCells(sprintf('C%s:C%s', $this->startRow, $endRange = $this->startRow + 3));
                $this->worksheet->mergeCells(sprintf('C%s:C%s', $endRange + 1 , $endRange + 4));
                $this->worksheet->setCellValue(sprintf('C%s', $this->startRow), $item->quantity);
                $this->worksheet->setCellValue(sprintf('C%s', $endRange + 1), 'Bearings');


                // Column D
                $this->worksheet->mergeCells(sprintf('D%s:D%s', $this->startRow, $this->startRow + 3));
                $this->worksheet->mergeCells(sprintf('D%s:D%s', $this->startRow + 4, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('D%s', $this->startRow), $item->material);
                $this->worksheet->setCellValue(sprintf('D%s', $this->startRow + 4), $item->abec);


                // Column E
                $this->worksheet->mergeCells(sprintf('E%s:E%s', $this->startRow, $this->startRow + 2));
                $this->worksheet->mergeCells(sprintf('E%s:E%s', $this->startRow + 3, $this->startRow + 4));
                $this->worksheet->mergeCells(sprintf('E%s:E%s', $this->startRow + 5, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('E%s', $this->startRow), $item->race);
                $this->worksheet->setCellValue(sprintf('E%s', $this->startRow + 3), $item->raceprintvalue);
                $this->worksheet->setCellValue(sprintf('E%s', $this->startRow + 5), $item->race_print);

                // Column F
                $this->worksheet->mergeCells(sprintf('F%s:F%s', $this->startRow, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('F%s', $this->startRow), $item->retainer);
                
                // Column G

                if(isset($item->shieldcolor)){
                    $this->worksheet->mergeCells(sprintf('G%s:G%s', $this->startRow, $endRange = $this->startRow + 3));
                    $this->worksheet->mergeCells(sprintf('G%s:G%s', $endRange + 1, $endRange + 4));
                    $this->worksheet->setCellValue(sprintf('G%s', $this->startRow), $item->shield);
                    $this->worksheet->setCellValue(sprintf('G%s', $endRange + 1), 'Color:'.$item->shieldcolor);
                } else{
                    $this->worksheet->mergeCells(sprintf('G%s:G%s', $this->startRow, $this->startRow + 7));
                    $this->worksheet->setCellValue(sprintf('G%s', $this->startRow), $item->shield);
                }
                
                // Column H

                if(isset($item->firstbrandcolor)){
                    $this->worksheet->mergeCells(sprintf('H%s:H%s', $this->startRow, $endRange = $this->startRow + 2));
                    $this->worksheet->mergeCells(sprintf('H%s:H%s', $endRange + 1, $endRange + 2));
                    $this->worksheet->mergeCells(sprintf('H%s:H%s', $endRange + 3, $endRange + 5));
                    $this->worksheet->setCellValue(sprintf('H%s', $this->startRow), $item->shield_brand);
                    $text = 'Color1: ';
                    $text .= $item->firstbrandcolor;
                    if(isset($item->secondbrandcolor)){
                        $text .= ', Color2: ';
                        $text .= $item->firstbrandcolor;
                    }
                    $this->worksheet->setCellValue(sprintf('H%s', $endRange + 1), $text);
                    $this->worksheet->setCellValue(sprintf('H%s', $endRange + 3), $item->shield_brand_print);
                } else{
                    $this->worksheet->mergeCells(sprintf('H%s:H%s', $this->startRow, $this->startRow + 3));
                    $this->worksheet->mergeCells(sprintf('H%s:H%s', $this->startRow + 4, $this->startRow + 7));
                    $this->worksheet->setCellValue(sprintf('H%s', $this->startRow), $item->shield_brand);
                    $this->worksheet->setCellValue(sprintf('H%s', $this->startRow + 4), $item->shield_brand_print);
                }


                // Column I
                $this->worksheet->mergeCells(sprintf('I%s:I%s', $this->startRow, $this->startRow + 3));
                $this->worksheet->mergeCells(sprintf('I%s:I%s', $this->startRow + 4, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('I%s', $this->startRow), $item->spamaterial);
                $this->worksheet->setCellValue(sprintf('I%s', $this->startRow + 4), $item->spacolor);

                // Column J
                $this->worksheet->mergeCells(sprintf('J%s:J%s', $this->startRow, $this->startRow + 1));
                $this->worksheet->mergeCells(sprintf('J%s:J%s', $this->startRow+2, $this->startRow + 3));
                $this->worksheet->mergeCells(sprintf('J%s:J%s', $this->startRow+4, $this->startRow + 5));
                $this->worksheet->mergeCells(sprintf('J%s:J%s', $this->startRow + 6, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('J%s', $this->startRow), $item->packfirst);
                $this->worksheet->setCellValue(sprintf('J%s', $this->startRow + 2), $item->cardbox_print);
                $this->worksheet->setCellValue(sprintf('J%s', $this->startRow + 4), $item->brandfirst);
                $this->worksheet->setCellValue(sprintf('J%s', $this->startRow + 6), $item->sticker_print);

                // Column K

                $this->worksheet->mergeCells(sprintf('K%s:K%s', $this->startRow, $this->startRow + 2));
                $this->worksheet->mergeCells(sprintf('K%s:K%s', $this->startRow + 3, $this->startRow + 4));
                $this->worksheet->mergeCells(sprintf('K%s:K%s', $this->startRow + 5, $this->startRow + 7));
                $this->worksheet->setCellValue(sprintf('K%s', $this->startRow), $item->packsecond);
                $this->worksheet->setCellValue(sprintf('K%s', $this->startRow + 3), $item->cardboxtwo_print);
                $this->worksheet->setCellValue(sprintf('K%s', $this->startRow + 5), $item->brandsecond);

                
                

                // Column L
                
                $this->worksheet->mergeCells(sprintf('L%s:L%s', $this->startRow, $this->startRow + 2));
                $this->worksheet->mergeCells(sprintf('L%s:L%s', $this->startRow + 3, $this->startRow + 4));
                $this->worksheet->mergeCells(sprintf('L%s:L%s', $this->startRow + 5, $this->startRow + 7));
                $pantonecolors = json_decode($item->pantone_color, true);
                $text = '';
                if(isset($pantonecolors['colors']))
                    foreach($pantonecolors['colors'] as $i => $pantonecolor){
                        if($i == 0)
                            $text = 'Color'.($i+1).': '.$pantonecolor;
                        else
                            $text = $text.', Color'.($i+1).': '.$pantonecolor;
                    }
                
                $this->worksheet->setCellValue(sprintf('L%s', $this->startRow), $item->designname);
                $this->worksheet->setCellValue(sprintf('L%s', $this->startRow + 3), $item->pantone_print);
                $this->worksheet->setCellValue(sprintf('L%s', $this->startRow + 5), $text);


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
            'U%s:V%s', 
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