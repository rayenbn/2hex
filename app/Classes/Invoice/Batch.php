<?php

namespace App\Classes\Invoice;

use App\Classes\Invoice\Concerns\DefaultStyles;
use Illuminate\Database\Eloquent\Collection;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

abstract class Batch implements Invoice
{
    use DefaultStyles;

    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    protected $items;

    /**
     * @var \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet
     */
    protected $worksheet;

    /**
     * @var int
     */
    protected $startRow = 18;


    public function __construct(Worksheet $worksheet, Collection $items)
    {
        $this->items = $items;
        $this->worksheet = $worksheet;
    }

    /**
     * @param int $startRow
     *
     * @return \App\Classes\Invoice\Batch
     */
    public function setStartRow(int $startRow)
    {
        $this->startRow = $startRow;

        return $this;
    }

    /**
     * @param $textBold
     * @param $text
     * @param bool $green
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     *
     * @return \PhpOffice\PhpSpreadsheet\RichText\RichText
     */
    protected function setStartTextBold($textBold, $text, $green = false)
    {
        /** @var RichText $richText */
        $richText = new RichText();

        if ($green == true) {
            if ($textBold != '') {
                $richText
                    ->createTextRun($textBold)
                    ->getFont()
                    ->setSize(10)
                    ->setColor(new Color(Color::COLOR_DARKGREEN))
                    ->setBold(true);
            }
            $richText
                ->createTextRun($text)
                ->getFont()
                ->setColor(new Color(Color::COLOR_DARKGREEN))
                ->setSize(10);
        } else {
            if ($textBold != '') {
                $richText
                    ->createTextRun($textBold)
                    ->getFont()
                    ->setSize(10)
                    ->setBold(true);
            }

            $richText
                ->createTextRun($text)
                ->getFont()
                ->setSize(10);
        }

        return $richText;
    }

    /**
     * @param $value
     *
     * @return int|string
     */
    protected function colorsToString($value)
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