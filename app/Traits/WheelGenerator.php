<?php

namespace App\Traits;

use App\Models\Wheel\Wheel;
use App\Models\PaidFile;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\RichText\RichText;

trait WheelGenerator
{
    /**
     * List of wheels
     *
     * @var Collection $wheels
     */
    protected $wheels;

    protected function generateWheels()
    {
        $offset = 1;

        if ($this->wheelsCount <= 0) return $this;

        // +1 If exists wheels
        if ($this->ordersCount == 0 && $this->gripsCount == 0) {
            $this->offsetRows += 2;
            $offset = 0;
        } else {
            $this->offsetRows += 1;
        }
        
        $activeSheet = $this->getActiveSheet();

        // Insert head Grip Tapes
        $activeSheet->insertNewRowBefore(
            $wheelRowStart = (
                $this->rangeStart 
                + ($this->ordersCount + $this->gripsCount) 
                * self::ROWS_ITEM
                + $offset
            )
        );

        $activeSheet->setCellValue('C' . $wheelRowStart, 'Quantity');
        $activeSheet->setCellValue('D' . $wheelRowStart, 'Style');
        $activeSheet->setCellValue('E' . $wheelRowStart, 'Shape');
        $activeSheet->setCellValue('F' . $wheelRowStart, 'Size');
        $activeSheet->setCellValue('G' . $wheelRowStart, 'Material & Hardness');
        $activeSheet->setCellValue('H' . $wheelRowStart, 'Print on Front');
        $activeSheet->setCellValue('I' . $wheelRowStart, 'Print on Back');
        $activeSheet->setCellValue('J' . $wheelRowStart, 'Wheels Placement');
        $activeSheet->setCellValue('K' . $wheelRowStart, 'Cardboard Wrap');
        $activeSheet->setCellValue('L' . $wheelRowStart, 'Carton Print');
        $activeSheet->setCellValue('M' . $wheelRowStart, 'Price p. wheel');
        $activeSheet->setCellValue('N' . $wheelRowStart, 'Total of Row');

        $wheelRowStart += 1; // after head row
        
        $this->wheels = $this->wheels->reverse();
        $this->wheels->map(function(Wheel $wheel, $index) use ($wheelRowStart, $activeSheet) {

            $activeSheet->insertNewRowBefore($wheelRowStart, self::ROWS_ITEM);
            
            foreach ($activeSheet->getRowIterator($wheelRowStart, self::ROWS_ITEM) as $row) {

                $green = false;

                // Column C
                $activeSheet->mergeCells(sprintf('C%s:C%s', $wheelRowStart, $endRange = $wheelRowStart + 3));
                $activeSheet->mergeCells(sprintf('C%s:C%s', $endRange + 1, $endRange + 4));
                $activeSheet->setCellValue(sprintf('C%s', $wheelRowStart), $wheel->quantity);
                $activeSheet->setCellValue(sprintf('C%s', $endRange + 1), 'Skateboard Wheels');
                // Column D
                $activeSheet->mergeCells(sprintf('D%s:D%s', $wheelRowStart, $wheelRowStart + 7));
                $activeSheet->setCellValue(sprintf('D%s', $wheelRowStart), $wheel->type);
                // Column E
                $activeSheet->mergeCells(sprintf('E%s:E%s', $wheelRowStart, $wheelRowStart + 7));
                $activeSheet->setCellValue(sprintf('E%s', $wheelRowStart), $wheel->shape);
                // Column F
                $activeSheet->mergeCells(sprintf('F%s:F%s', $wheelRowStart, $wheelRowStart + 7));
                $activeSheet->setCellValue(sprintf('F%s', $wheelRowStart), $wheel->size);

                // Column G
                $activeSheet->mergeCells(sprintf('G%s:G%s', $wheelRowStart, $endRange = $wheelRowStart + 6));
                $activeSheet->setCellValue(sprintf('G%s', $wheelRowStart), $wheel->is_shr ? 'SHR' : '-');
                $activeSheet->setCellValue(sprintf('G%s', $endRange + 1), $wheel->hardness);

                // Column H
                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $wheel->top_print)->first()['date'])){
                    $green = true;
                }
                $activeSheet->mergeCells(sprintf('H%s:H%s', $wheelRowStart, $endRange = $wheelRowStart + 6));
                $activeSheet->setCellValue(sprintf('H%s', $wheelRowStart), $this->setStartTextBold('', $wheel->top_print, $green));
                $activeSheet->setCellValue(sprintf('H%s', $endRange + 1), 'colors: ' . $this->colorCount($wheel->top_colors));
                $green = false;
                // Column I
                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $wheel->back_print)->first()['date'])){
                    $green = true;
                }
                $activeSheet->mergeCells(sprintf('I%s:I%s', $wheelRowStart, $endRange = $wheelRowStart + 6));
                $activeSheet->setCellValue(sprintf('I%s', $wheelRowStart), $this->setStartTextBold('', $wheel->back_print, $green));
                $activeSheet->setCellValue(sprintf('I%s', $endRange + 1), 'colors: ' . $this->colorCount($wheel->back_colors));
                $green = false;
                // Column J
                $activeSheet->mergeCells(sprintf('J%s:J%s', $wheelRowStart, $wheelRowStart + 7));
                $activeSheet->setCellValue(sprintf('J%s', $wheelRowStart), $wheel->placement ?? '-');

                // Column K
                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $wheel->cardboard_print)->first()['date'])){
                    $green = true;
                }
                $activeSheet->mergeCells(sprintf('K%s:K%s', $wheelRowStart, $wheelRowStart + 7));
                $activeSheet->setCellValue(sprintf('K%s', $wheelRowStart), $this->setStartTextBold('', $wheel->cardboard_print, $green));
                $green = false;
                // Column L
                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $wheel->carton_print)->first()['date'])){
                    $green = true;
                }
                $activeSheet->mergeCells(sprintf('L%s:L%s', $wheelRowStart, $endRange = $wheelRowStart + 6));
                $activeSheet->setCellValue(sprintf('L%s', $wheelRowStart), $this->setStartTextBold('', $wheel->carton_print, $green));
                $activeSheet->setCellValue(sprintf('L%s', $endRange + 1), 'colors: ' . $this->colorCount($wheel->carton_colors));
                $green = false;
                // Column M
                $activeSheet->mergeCells(sprintf('M%s:M%s', $wheelRowStart, $wheelRowStart + 7));
                $activeSheet->setCellValue(sprintf('M%s', $wheelRowStart), $wheel->price);

                // Column N
                $activeSheet->mergeCells(sprintf('N%s:N%s', $wheelRowStart, $wheelRowStart + 7));
                $activeSheet->setCellValue(sprintf('N%s', $wheelRowStart), $wheel->total);
            }
        });

        // ------------- Set styles --------------

        $offset = $wheelRowStart + ($this->wheelsCount * self::ROWS_ITEM);

        // dd($offset);

        // start + count wheels * 8(count rows in single item)
        $range = sprintf(
            'C%s:N%s', 
            $wheelRowStart,
            $offset - 1
        ); 

        $styles = $this->getStylesRange($range);
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
            $wheelRowStart,  
            $offset - 1
        );
        // set currency format for cells
        $this->getStylesRange($rangeCurrency)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

        $activeSheet->getStyle(sprintf('C%s:N%s', $wheelRowStart - 1, $wheelRowStart - 1))
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setARGB('52A3F1');

        $activeSheet->getStyle(sprintf('C%s:N%s', $wheelRowStart - 1, $wheelRowStart - 1))
                ->getFont()
                ->setSize(10)
                ->getColor()
                ->setARGB(Color::COLOR_WHITE);

        $activeSheet
            ->getRowDimension($wheelRowStart - 1)
            ->setRowHeight(40);

        return $this;
    }

    public function setStartTextBold($textBold, $text, $green = false)
    {
        $richText = new RichText();
        if($green == true){
            if($textBold != ''){
                $richText
                ->createTextRun($textBold)
                ->getFont()
                ->setSize(10)
                ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKGREEN ))
                ->setBold(true);
            }
            $richText->createTextRun($text)
                ->getFont()
                ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color( \PhpOffice\PhpSpreadsheet\Style\Color::COLOR_DARKGREEN ))
                ->setSize(10);
        }
        else{
            if($textBold != ''){
                $richText
                ->createTextRun($textBold)
                ->getFont()
                ->setSize(10)
                ->setBold(true);
            }

            $richText->createTextRun($text)
                ->getFont()
                ->setSize(10);
        }
        

        return $richText;
    }

    /**
     * Wheels count
     */
    public function getCountWheels()
    {
        return $this->wheels->count();
    }

    /**
     * Weight of wheels
     */
    public function getWheelsWeight()
    {
        return $this->wheels->sum('quantity') * Wheel::WHEEL_WEIGHT;
    }

    /**
     * Calculate fix cost for active wheels
     *
     * @param array $fees
     *
     * @return void
     */
    protected function calculateWheelFixCost(array &$fees)
    {
        // Fetching all desing by orders
        $wheels = $this->wheels
            ->map(function($wheel) {
                return array_filter($wheel->attributesToArray());
            })
            ->toArray();

        $feesTypes = [
            'top_print' => [
                'name' => 'SB Wheel Top Print',
            ],
            'back_print' => [
                'name' => 'SB Wheel Back Print',
            ],
            'cardboard_print' => [
                'name' => ' SB Wheel Cardboard Print',
            ],
            'carton_print' => [
                'name' => 'SB Wheel Carton Print',
            ],
            'shape_print' => [
                'name' => 'SB Wheel Сustom Shape',
            ],
        ];

        foreach ($wheels as $index => $wheel) {
            $index += 1;
            foreach ($wheel as $key => $value) {
                if (!array_key_exists($key,  $feesTypes) || !array_key_exists('quantity',  $wheel)) continue;

                $wheelKey = 'wheel_' . $key;

                // If same design
                if (array_key_exists($wheelKey, $fees)) {
                    if (array_key_exists($value, $fees[$wheelKey])) {
                        $fees[$wheelKey][$value]['batches'] .= ",{$index}";
                        $fees[$wheelKey][$value]['quantity'] += $wheel['quantity'];
                        continue;
                    }
                } 

                $fees[$wheelKey][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $feesTypes[$key]['name'],
                    'quantity' => $wheel['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists(str_replace('_print','',$key) . '_colors', $wheel)) {
                    switch ($wheel[str_replace('_print','',$key) . '_colors']) {
                        case '1 color':
                            $fees[$wheelKey][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$wheelKey][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$wheelKey][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$wheelKey][$value]['color'] = 4;
                            break;
                    }
                }

                if ($key === 'top_print') {
                    $fees[$wheelKey][$value]['price'] = $fees[$wheelKey][$value]['color'] * 20 * 1.5;
                } else if ($key === 'back_print') {
                    // Set a free cost if exist same top print
                    if (isset($fees['wheel_top_print']) && array_key_exists($value, $fees['wheel_top_print'])) {
                        $fees[$wheelKey][$value]['price'] = 0;
                    } else {
                        $fees[$wheelKey][$value]['price'] = $fees[$wheelKey][$value]['color'] * 20 * 1.5;
                    }

                } else if ($key === 'cardboard_print') {
                    if ($wheel['quantity'] < 1500) {
                        $fees[$wheelKey][$value]['price'] = 525 - (0.35 * $wheel['quantity']);
                    } else {
                        $fees[$wheelKey][$value]['price'] = 0;
                    }
                } else if ($key === 'carton_print'){
                    $fees[$wheelKey][$value]['price'] = 80 * $fees[$wheelKey][$value]['color'];
                } else if ($key === 'shape_print'){
                    $fees[$wheelKey][$value]['price'] = 2000;
                } else {
                    $fees[$wheelKey][$value]['price'] = 0;
                }

                if(!empty(PaidFile::where('created_by', $wheel['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$wheelKey][$value]['paid'] = 1;
                    $fees[$wheelKey][$value]['price'] = 0;
                }
            }
        }
    }

    public function colorCount($value)
    {
        switch ($value) {
            case '1 color':
                return 1;
            case '2 color':
                return 2;
            case '3 color':
                return 3;
            case 'CMYK':
                return 4;
            default: 
                return '-';
        }
    }
}