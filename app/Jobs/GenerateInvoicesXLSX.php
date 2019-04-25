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

    protected $finalAmount = 0;

    protected $date;

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

    protected $specialsTitle = [
        'fulldip'       => 'Fulldip',
        'transparent'   => 'Transp. F.dip',
        'metallic'      => 'Metallic dip',
        'blacktop'      => 'Top Fiberglass',
        'blackmidlayer' => 'Mid Fiberglass',
        'pattern'       => 'Pattern Press',
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
        $this->date = time();
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
            ->setSize(10)
            ->setBold(true);

        $richText->createTextRun($text)
            ->getFont()
            ->setSize(10);

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
                $extras = (array) json_decode($order->extra);
                // Filter only state equals TRUE
                $extras = array_filter($extras, function($item) {
                    return $item->state;
                });
                // Print specials for order 
                foreach (array_keys($extras) as $index => $value) {
                   $activeSheet->setCellValue(sprintf(
                        'J%s', $this->rangeStart + $index), 
                        $this->setStartTextBold("{$this->specialsTitle[$value]}: ", (property_exists($extras[$value], 'color')
                            ? preg_replace( '/[^0-9a-zA-Z]/', '', $extras[$value]->color)
                            : 'Yes')
                        )
                    );
                }
                $activeSheet->setCellValue(sprintf(
                    'J%s', $this->rangeStart + count($extras)), 
                    $this->setStartTextBold("Shrink Wrap: ", 'Yes')
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
            ->setCellValue('G7', 'First and Lastname: ' . (isset($this->user) ? $this->user->name : ''))
            ->setCellValue('G8', 'Email Address: ' . (isset($this->user) ? $this->user->email : ''))
            ->setCellValue('G9', 'Cellphone Number:' . (isset($this->user) ? $this->user->phone_num : ''))
            ->setCellValue('G10', 'Company Name:' . (isset($this->user) ? $this->user->company_name : ''))
            ->setCellValue('G12', 'European Vat ID (only for EU companies):')
            ->setCellValue('E7', $this->invoiceNumber)
            ->setCellValue('E8', Date::PHPToExcel($this->date))
            ->getRowDimension(4)
            ->setRowHeight(40);

        $shipinfo = \App\Models\ShipInfo::query()
            ->selectRaw(
                "*, CONCAT_WS(', ', shipping_address, shipping_city, shipping_state, shipping_postcode) as fulladdress"
            )
            ->where('created_by', (string) (auth()->check() ? auth()->id() : csrf_token()))
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
                $this->finalAmount += $this->orders->sum('total')
            );

        // Total styles
        $this->getStylesRange(sprintf('L%1$s:N%1$s', $startTotal))
            ->getFont()
            ->setSize(16)
            ->setBold(true);

        $this->getStylesRange(sprintf('N%1$s:N%2$s', $startTotal, $startTotal + 5))
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

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

    private function prepareFees()
    {
        // find not empty order fees
        $orderFees = $this->orders->map(function($order) {
            return array_filter(
                $order->only([
                    'quantity', 'bottomprint', 'topprint', 'engravery', 'carton', 'cardboard'
                ]), function($image) {
                    return isset($image);
                }
            );
        })->filter(function($image) {
            return count($image);
        })
        ->values()
        ->toArray();

        $fees = [];
        $sum_fees = 0;

        foreach ($orderFees as $index => $order) {
            $index += 1;

            foreach ($order as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $order['quantity'];

                        if ($key == 'cardboard') {
                            $fees[$key][$value]['price'] = Order::getPriceDesign($fees[$key][$value]['quantity']);
                        }
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $order['quantity'],
                ];

                /*
                 * Cardboard price calculated 
                 * Formula: 500 + (quantity - 625) * 0.8
                 * If (quantity - 625) * 0.8 < 0 then 0
                 */ 
                if ($key == 'cardboard') {
                    $fees[$key][$value]['price'] = Order::getPriceDesign($order['quantity']);
                } else {
                    $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'];
                }

            }
        }

        // Set Global delivery
        if ($this->orders->count()) {
            $fees['global'] = [];
            array_push($fees['global'], [
                'image'   => 'Global delivery', 
                'batches' => '', 
                'price'   => $this->getGlobalDelivery($this->orders->sum('quantity')), 
                'type'    => 'Global delivery'
            ]);
        }

        // Calculate total price
        foreach ($fees as $key => $value) {
            array_walk($value, function($f, $k) use(&$sum_fees){
                $sum_fees += $f['price'];
            });
        }

        return [$fees, $sum_fees];
    }

    protected function setDeliveryCells()
    {
        // Prepare orders design
        $prepared = $this->prepareFees();

        // Set prepared design
        $orderFees = $prepared[0];

        // Plus total delivery price, with global delivery
        $this->finalAmount += $prepared[1];

        // Insert rows = count fees
        $this
            ->getActiveSheet()
            ->insertNewRowBefore(
                $startDelivery = $this->rangeStart + $this->getCountOrders() * self::ROWS_ITEM + 1, 
                $this->countFees = $this->calculateFees($orderFees)
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

        $allFess = [];
        array_walk($orderFees, function($fees) use (&$allFess){
            array_push($allFess, ...array_values($fees));
        });

        foreach ($allFess as $index => $value) {
            $this->getActiveSheet()->mergeCells(sprintf('C%s:I%s', $pos = $startDelivery + $index, $pos));
            $this->getActiveSheet()->mergeCells(sprintf('J%s:M%s', $pos, $pos));

            $this->getActiveSheet()->setCellValue(sprintf('C%s', $pos), $value['type']);
            $this->getActiveSheet()->setCellValue(sprintf('N%s', $pos), $value['price']);
            $this->getActiveSheet()->setCellValue(sprintf('J%s', $pos), $value['image']);
        }

        return $this;
    }
    
    public function getPathInvoice()
    {
        return storage_path("app/xlsx/invoices_" . str_slug($this->invoiceNumber, '-') . ".xlsx");
    }

    public function getInvoiceNumber()
    {
        return str_slug($this->invoiceNumber, '-');
    }

    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = str_slug($invoiceNumber, '-');

        return $this;
    }

    public function setDate($date)
    {
        $this->date = $date;

        return $this;
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

        array_walk($items, function($fees) use (&$total){
            $total += count($fees);
        });

        return $total;
    }


    /* Calculate global delivery related amount decks */
    
    private function getGlobalDelivery($amount)
    {
        if ($amount == 0) {
            return 0;
        } else if ($amount < 20) {
            return 38;
        } else if ($amount >= 20 && $amount < 30) {
            return 52;
        } else if ($amount >= 30 && $amount < 40) {
            return 90;
        } else if ($amount >= 40 && $amount < 50) {
            return 120;
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
        } else if ($amount >= 2000 && $amount < 5000) {
            return 1700;
        } else if ($amount >= 5000) {
            return 2300;
        }
    }
}