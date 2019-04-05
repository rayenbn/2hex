<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Order;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Symfony\Component\HttpFoundation\Response;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class GenerateInvoicesXLSX implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;
    /**
     * Path to template xlsx
     * String $pathTemplate
     */
    protected $pathTemplate;
    /**
     * List orders
     * Collection $orders
     */
    protected $orders;
    /**
     * Working spreadsheet
     * PhpSpreadsheet $spreadsheet
     */
    protected $spreadsheet;
    /**
     * Xlsx writer
     * For manipulation load file
     * Xlsx $writer
     */
    protected $writer;
    /**
     * Generated invoice number
     * String $invoiceNumber
     */
    protected $invoiceNumber;
    /**
     * Worksheet $activeSheet
     */
    protected $activeSheet;
    /**
     * Starting row generate
     * int $rangeStart
     */
    protected $rangeStart = 18;
    /**
     * Count cows inner single item
     * int ROWS_ITEM
     */
    const ROWS_ITEM = 8;
    /**
     * Auth user
     * User $user
     */
    protected $user;
    /**
     * Count fees
     * int $countFees
     */
    protected $countFees = 0;

    /**
     * Drawing object
     * Drawing $drawing
     */
    protected $drawing;

    protected $costWithoutGlobal = 0;

     /**
     * Types of fees
     * array $feesTypes
     */
    protected $feesTypes = [
        'engravery' => [
            'name' => 'Top Engravery Set Up',
            'price' => 80
        ],
        'topprint' => [
            'name' => 'Top Print Set Up',
            'price' => 120
        ],
        'bottomprint' => [
            'name' => 'Bottom Print Set Up',
            'price' => 120
        ],
        'carton' => [
            'name' => 'Box print Set Up',
            'price' => 120
        ],
        'cardboard' => [
            'name' => 'Cardboard Set Up',
            'price' => 500
        ],
    ];


    public function __construct($orders)
    {
        $this->orders = $orders;
        $this->pathTemplate = storage_path('app/xlsx/invoices.xlsx');
        $this->user = auth()->user();
        $this->spreadsheet = IOFactory::createReader('Xlsx')->load($this->pathTemplate);
        $this->invoiceNumber = invoice_number();
        $this->setPropertiesSheet();
        $this->writer = new Xlsx($this->getSpreadsheet());
        $this->drawing = new Drawing();
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this
            ->generateOrders()
            ->setDeliveryCells()
            ->setDafaultStyles()
            ->setSeparateCell()
            ->write();
    }
    private function setPropertiesSheet()
    {
        $this->getActiveSheet()->setTitle($this->invoiceNumber, false);
        $this->spreadsheet->getProperties()->setCreator(env('APP_NAME', '2HEX.com'));
    }
    protected function getActiveSheet()
    {
        return $this->spreadsheet->getActiveSheet();
    }
    public function getSpreadsheet()
    {
        return $this->spreadsheet;
    }
    public function getWriter()
    {
        return $this->writer;
    }
    public function setStartTextBold($textBold, $text)
    {
        $richText = new RichText();
        $richText
            ->createTextRun($textBold)
            ->getFont()
            ->setBold(true);
        $richText->createText($text);
        return $richText;
    }
    protected function generateOrders()
    {
        $activeSheet = null;
        $this->orders->map(function(Order $order, $index) use ($activeSheet) {
            $activeSheet = $this->getActiveSheet();
            $activeSheet->insertNewRowBefore($this->rangeStart, self::ROWS_ITEM);
            
            foreach ($activeSheet->getRowIterator($this->rangeStart, self::ROWS_ITEM) as $row) {
                // Column C
                $activeSheet->mergeCells(sprintf('C%s:C%s', $this->rangeStart, $endRange = $this->rangeStart + 3));
                $activeSheet->mergeCells(sprintf('C%s:C%s', $endRange + 1, $endRange + 4));
                $activeSheet->setCellValue(sprintf('C%s', $this->rangeStart), $order->quantity);
                $activeSheet->setCellValue(sprintf('C%s', $endRange + 1), 'Skateboard Decks');
                // Colimn D
                $activeSheet->mergeCells(sprintf('D%s:D%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('D%s', $this->rangeStart), $order->size);
                // Colimn E
                $activeSheet->mergeCells(sprintf('E%s:E%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('E%s', $this->rangeStart), $order->concave);
                // Column F
                $activeSheet->mergeCells(sprintf('F%s:F%s', $this->rangeStart, $endRange = $this->rangeStart + 3));
                $activeSheet->mergeCells(sprintf('F%s:F%s', $endRange + 1, $endRange + 4));
                $activeSheet->setCellValue(sprintf('F%s', $this->rangeStart), $order->wood);
                $activeSheet->setCellValue(sprintf('F%s', $endRange + 1), $order->glue);
                // Column G
                $activeSheet->mergeCells(sprintf('G%s:G%s', $this->rangeStart, $endRange = $this->rangeStart + 3));
                $activeSheet->mergeCells(sprintf('G%s:G%s', $endRange + 1, $endRange + 4));
                $activeSheet->setCellValue(
                    sprintf('G%s', $this->rangeStart), $this->setStartTextBold('Bottom: ', $order->bottomprint)
                );
                $activeSheet->setCellValue(
                    sprintf('G%s', $endRange + 1), $this->setStartTextBold('Top: ', $order->topprint)
                );
                // Column H
                $activeSheet->mergeCells(sprintf('H%s:H%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('H%s', $this->rangeStart), $order->engravery);
               
                // Column I
                foreach (json_decode($order->veneer) as $key => $value) {
                    $activeSheet->setCellValue(sprintf('I%s', $this->rangeStart + $key), $value);
                }
                // Column J
                $extras = json_decode($order->extra);
                $activeSheet->setCellValue(sprintf(
                    'J%s', $this->rangeStart), 
                    $this->setStartTextBold('Top Fiberglas: ', $extras->blacktop->state ? 'Yes' : 'No')
                );
                $activeSheet->setCellValue(sprintf(
                    'J%s', $this->rangeStart + 1),
                    $this->setStartTextBold('Mid Fiberglas: ', $extras->metallic->state ? $extras->metallic->color : 'None')
                );
                $activeSheet->setCellValue(sprintf(
                    'J%s', $this->rangeStart + 2), 
                    $this->setStartTextBold('Fulldip: ', $extras->fulldip->state ? $extras->fulldip->color : 'None')
                );
                $activeSheet->setCellValue(sprintf(
                    'J%s', $this->rangeStart + 3), 
                    $this->setStartTextBold('Transp. Fulldip: ', $extras->transparent->state ? $extras->transparent->color : 'None')
                );
                $activeSheet->setCellValue(sprintf(
                    'J%s', $this->rangeStart + 4), 
                    $this->setStartTextBold('Pattern Press: ', $extras->pattern->state ? 'Yes' : 'No')
                );
                $activeSheet->setCellValue(sprintf(
                    'J%s', $this->rangeStart + 5), 
                    $this->setStartTextBold('Shrink Wrap: ', $extras->blackmidlayer->state ? 'Yes' : 'No')
                );
                // Column K
                $activeSheet->mergeCells(sprintf('K%s:K%s', $this->rangeStart, $endRange = $this->rangeStart + 3));
                $activeSheet->mergeCells(sprintf('K%s:K%s', $endRange + 1, $endRange + 4));
                $activeSheet->setCellValue(
                    sprintf('K%s', $this->rangeStart), $this->setStartTextBold('Bottom: ', $order->bottomprint)
                );
                $activeSheet->setCellValue(
                    sprintf('K%s', $endRange + 1), $this->setStartTextBold('Top: ', $order->topprint)
                );
                // Column L
                $activeSheet->mergeCells(sprintf('L%s:L%s', $this->rangeStart, $endRange = $this->rangeStart + 3));
                $activeSheet->mergeCells(sprintf('L%s:L%s', $endRange + 1, $endRange + 4));
                $activeSheet->setCellValue(
                    sprintf('L%s', $this->rangeStart), $this->setStartTextBold('Cardboard: ', $order->cardboard)
                );
                $activeSheet->setCellValue(
                    sprintf('L%s', $endRange + 1), $this->setStartTextBold('Carton Print: ', $order->carton)
                );
                // Colimn M
                $activeSheet->mergeCells(sprintf('M%s:M%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('M%s', $this->rangeStart), $order->perdeck);
                // Colimn N
                $activeSheet->mergeCells(sprintf('N%s:N%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('N%s', $this->rangeStart), $order->total);
            }
        });
        return $this; 
    }
    private function setStartRange(int $range)
    {
        $this->rangeStart = $range;
        return $this;
    }
    
    private function setDafaultStyles()
    {
        // start + count orders * 8(count rows in single item)
        $range = sprintf(
            'C%s:N%s', 
            $this->rangeStart,  
            $this->rangeStart + ($this->orders->count() * self::ROWS_ITEM)
        ); 
        $rangeCurrency = sprintf(
            'M%s:N%s', 
            $this->rangeStart,  
            $this->rangeStart + ($this->orders->count() * self::ROWS_ITEM)
        );
        // set currency format for cells
        $this->getStylesRange($rangeCurrency)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);
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
        $bottomStyles = $this->getStylesRange(
            sprintf(
                'C%s:N%s', 
                $rangeWithOrders = $this->rangeStart + $this->getCountOrders() * self::ROWS_ITEM, 
                $rangeWithOrders
            )
        );
        // Delivery           
        $bottomStyles
            ->getFont()
            ->getColor()
            ->setARGB(Color::COLOR_WHITE);
        $bottomStyles
            ->getFill()
            ->setFillType(Fill::FILL_PATTERN_LIGHTHORIZONTAL);

        $this->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $this->getActiveSheet()->getColumnDimension('N')->setWidth(15.0);


        // Set logo 
        $this->drawing->setName('2HEX.com');
        $this->drawing->setDescription('2HEX.com');
        $this->drawing->setPath(public_path('/img/2hex.png'));
        $this->drawing->setOffsetY(50);
        $this->drawing->setOffsetX(1255);
        $this->drawing->setWidth(261);
        $this->drawing->setHeight(75);
        $this->drawing->setWorksheet($this->getActiveSheet());

        return $this;
    }

    protected function getStylesRange(string $range)
    {
        return $this->getActiveSheet()->getStyle($range);
    }
    public function getCountOrders()
    {
        return $this->orders->count();
    }
    protected function setSeparateCell()
    { 
        $this
            ->getActiveSheet()
            ->setCellValue('G7', 'First and Lastname: ' . $this->user->name)
            ->setCellValue('G8', 'Email Address: ' . $this->user->email)
            ->setCellValue('G9', 'Cellphone Number:' . $this->user->phone_num)
            ->setCellValue('G10', 'Company Name:' . $this->user->company_name)
            ->setCellValue('G12', 'European Vat ID (only for EU companies):')
            ->setCellValue('E7', $this->invoiceNumber)
            ->setCellValue('E8', Date::PHPToExcel(now()->timestamp))
            ->getRowDimension(4)
            ->setRowHeight(40);
        $shipinfo = \App\Models\ShipInfo::query()
            ->selectRaw(
                "*, CONCAT_WS(', ', shipping_address, shipping_city, shipping_state, shipping_postcode) as fulladdress"
            )
            ->where('created_by','=', auth()->check() ? auth()->id() : csrf_token())
            ->first();
        // Set total cells
        $this
            ->getActiveSheet()
            ->setCellValue(
                sprintf('L%s', 
                    $startTotal = $this->rangeStart 
                    + $this->getCountOrders() * self::ROWS_ITEM + 1 
                    + $this->countFees + 2
                ), 
                'Final amount in USD:'
            )
            ->setCellValue(
                sprintf('N%s', 
                    $startTotal
                ), 
                $this->orders->sum('total') 
                    + $this->getGlobalDelivery($this->orders->sum('quantity'))
                    + $this->costWithoutGlobal
            );

        // Total styles
        $this->getStylesRange(sprintf('L%1$s:N%1$s', $startTotal))
            ->getFont()
            ->setSize(16)
            ->setBold(true);
        if ($shipinfo) {
            $this
                ->getActiveSheet()
                ->setCellValue('G11', 'Invoice Address: ' . $shipinfo->invoice_country)
                ->setCellValue(
                    sprintf('C%s', 
                        $shipsStart = $this->rangeStart 
                            + $this->getCountOrders() * self::ROWS_ITEM + 1 
                            + $this->countFees + 5
                    ), 
                    'Company Name: ' . $shipinfo->shipping_company
                )
                ->setCellValue(
                    sprintf('C%s', 
                        $shipsStart + 1
                    ), 
                    'First + Lastname: ' . $this->user->name
                )
                ->setCellValue(
                    sprintf('C%s', 
                        $shipsStart + 2
                    ), 
                    'Shipping Address: ' . $shipinfo->fulladdress
                )
                ->setCellValue(
                    sprintf('C%s', 
                        $shipsStart + 3
                    ), 
                    'Cellphone Number: ' . $shipinfo->shipping_phone
                );
        }   
        $this
            ->getStylesRange('E8')
            ->getNumberFormat()
            ->setFormatCode('dd/mm/yyyy');
        return $this;
    }
    protected function setDeliveryCells()
    {
        // find not empty order fees
        $orderFees = $this->orders->map(function($order) {
            return array_filter(
                $order->only(['bottomprint', 'topprint', 'engravery', 'carton', 'cardboard']), function($image) {
                    return isset($image);
                }
            );
        })->filter(function($image) {
            return count($image);
        })->values();

        // Insert rows = count fees
        $this
            ->getActiveSheet()
            ->insertNewRowBefore(
                $startDelivery = $this->rangeStart + $this->getCountOrders() * self::ROWS_ITEM + 1, 
                $this->countFees = $this->calculateFees($orderFees) + 1
            ); 

        // start + count orders * 8(count rows in single item)
        $rangeFees = sprintf(
            'C%s:N%s', 
            $startDelivery,  
            $startDelivery + $this->countFees
        );
        $styles = $this->getStylesRange($rangeFees);
        // set fill bg
        $styles
            ->getFill()
            ->setFillType(Fill::FILL_NONE);
        // set color inner cell
        $styles
            ->getFont()
            ->setSize(10)
            ->getColor()
            ->setARGB(Color::COLOR_BLACK);

        // set currency format cell
        $styles
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

        $index = 0;

        array_walk_recursive($orderFees, function($value, $key) use($startDelivery, &$index) {
            $this->getActiveSheet()->mergeCells(sprintf('C%s:I%s', $pos = $startDelivery + $index, $pos));
            $this->getActiveSheet()->mergeCells(sprintf('J%s:M%s', $pos, $pos));

            if (array_key_exists($key,  $this->feesTypes)) {
                $this->getActiveSheet()->setCellValue(sprintf('C%s', $pos), $this->feesTypes[$key]['name']);
                $this->getActiveSheet()->setCellValue(sprintf('N%s', $pos), $this->feesTypes[$key]['price']);
                // plus total fees
                $this->costWithoutGlobal += $this->feesTypes[$key]['price'];
            } else {
                $this->getActiveSheet()->setCellValue(sprintf('C%s', $pos), $key);
                $this->getActiveSheet()->setCellValue(sprintf('N%s', $pos), 0);
            }
            $this->getActiveSheet()->setCellValue(sprintf('J%s', $pos), $value);

            $index++;
        });

        // Global Delivery
        $this->getActiveSheet()->mergeCells(
            sprintf('C%s:I%s', $startGlobal = $startDelivery + $this->countFees - 1, $startDelivery + $this->countFees - 1)
        );
        $this->getActiveSheet()->mergeCells(
            sprintf('J%s:M%s', $startGlobal, $startGlobal)
        );
         $this->getActiveSheet()->setCellValue(sprintf('C%s', $startGlobal), 'Global delivery');
         $this->getActiveSheet()->setCellValue(sprintf('J%s', $startGlobal), 'Global delivery');

         $this->getActiveSheet()->setCellValue(
            sprintf('N%s', $startGlobal), 
            $this->getGlobalDelivery($this->orders->sum('quantity'))
        );


        return $this;
    }
    public function getPathInvoice()
    {
        return storage_path("app/xlsx/invoices" . str_slug($this->invoiceNumber, '-') . ".xlsx");
    }
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }
    public function write()
    {
        $this->writer->save($this->getPathInvoice());
        return $this;
    }

    /**
     * Calculate deep count fees 
     * @param array|Collection $items
     * @return int
     */
    private function calculateFees($items) 
    {
        $total = 0;
        array_walk_recursive($items, function($x) use(&$total) {
            $total++;
        });

        return $total;
    }


    /* Calculate global delivery related amount decks */
    
    private function getGlobalDelivery($amount)
    {
        if ($amount < 20) {
            return 38;
        } else if ($amount >= 20 && $amount < 30) {
            return 52;
        } else if ($amount >= 30 && $amount < 50) {
            return 90;
        } else if ($amount >= 50 && $amount < 100) {
            return 450;
        } else if ($amount >= 100 && $amount < 200) {
            return 650;
        } else if ($amount >= 200 && $amount < 300) {
            return 800;
        } else if ($amount >= 300 && $amount < 500) {
            return 900;
        } else if ($amount >= 500 && $amount < 1000) {
            return 1100;
        } else if ($amount >= 1000 && $amount < 2000) {
            return 1300;
        } else if ($amount >= 2000) {
            return 1700;
        }
    }
}