<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\{Order, GripTape, PaidFile};
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

use App\Traits\WheelGenerator;

class GenerateInvoicesXLSX implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels, WheelGenerator;
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
     * List grips
     * Collection $grips
     */
    protected $grips;

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

    protected $offsetRows = 0;
    protected $totalCount = 0;
    protected $ordersCount = 0;
    protected $gripsCount = 0;
    protected $wheelsCount = 0;

    /**
     * If some order contain promocode
     * boolean $hasPromocode
     */
    protected $hasPromocode = false;

    /**
     * Reward for promocode
     * int $rewardPromocode
     */
    protected $rewardPromocode = 0;

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
        // Grip tapes
        'top_print' => [
            'name' => 'Grip Top Print',
            'price' => 30
        ],
        'die_cut' => [
            'name' => 'Griptape Die Cut',
            'price' => 80
        ],
        'carton_print' => [
            'name' => 'Griptape Carton Print',
            'price' => 95
        ],
        'backpaper_print' => [
            'name' => 'Griptape Backpaper Print',
            'price' => 45
        ]
    ];

    protected $specialsTitle = [
        'fulldip'       => 'Fulldip',
        'transparent'   => 'Transp. F.dip',
        'metallic'      => 'Metallic dip',
        'blacktop'      => 'Top Fiberglass',
        'blackmidlayer' => 'Mid Fiberglass',
        'pattern'       => 'Pattern Press',
    ];

    public function __construct($orders, $grips, $wheels)
    {
        $this->orders = $orders;
        $this->grips = $grips;
        $this->wheels = $wheels;
        $this->pathTemplate = storage_path('app/xlsx/invoices.xlsx');
        $this->user = auth()->user();
        $this->spreadsheet = IOFactory::createReader('Xlsx')->load($this->pathTemplate);
        $this->invoiceNumber = invoice_number();
        $this->setPropertiesSheet();
        $this->writer = new Xlsx($this->getSpreadsheet());
        $this->drawing = new Drawing();
        $this->date = time();
        $this->ordersCount = $this->getCountOrders();
        $this->gripsCount = $this->getCountGrips();
        $this->wheelsCount = $this->getCountWheels();
        $this->totalCount = $this->ordersCount + $this->gripsCount + $this->wheelsCount;
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
            ->generateGrips()
            ->generateWheels()
            ->setDeliveryCells()
            ->setDiscountRow()
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

   protected function generateOrders()
    {
        if ($this->ordersCount <= 0) return $this;

        // +1 If exists orders
        $this->offsetRows += 1;

        $activeSheet = $this->getActiveSheet();
        // Insert head Grip Tapes
        $activeSheet->setCellValue('C' . 17, 'Quantity');
        $activeSheet->setCellValue('D' . 17, 'Size');
        $activeSheet->setCellValue('E' . 17, 'Concave');
        $activeSheet->setCellValue('F' . 17, 'Materials');
        $activeSheet->setCellValue('G' . 17, 'Print');
        $activeSheet->setCellValue('H' . 17, 'Top Engravery');
        $activeSheet->setCellValue('I' . 17, 'Veneer Colors');
        $activeSheet->setCellValue('J' . 17, 'Specials');
        $activeSheet->setCellValue('K' . 17, 'Cardboard Wrap');
        $activeSheet->setCellValue('L' . 17, 'Carton Print');
        $activeSheet->setCellValue('M' . 17, 'Price p. deck');
        $activeSheet->setCellValue('N' . 17, 'Total of Row');


        $this->orders->map(function(Order $order, $index) use ($activeSheet) {

            $activeSheet->insertNewRowBefore($this->rangeStart, self::ROWS_ITEM);
            
            foreach ($activeSheet->getRowIterator($this->rangeStart, self::ROWS_ITEM) as $row) {
                $green = false;
                // Column C
                $activeSheet->mergeCells(sprintf('C%s:C%s', $this->rangeStart, $endRange = $this->rangeStart + 3));
                $activeSheet->mergeCells(sprintf('C%s:C%s', $endRange + 1, $endRange + 4));
                $activeSheet->setCellValue(sprintf('C%s', $this->rangeStart), $order->quantity);
                $activeSheet->setCellValue(sprintf('C%s', $endRange + 1), 'Skateboard Decks');
                // Column D
                $activeSheet->mergeCells(sprintf('D%s:D%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('D%s', $this->rangeStart), $order->size);
                // Column E
                $activeSheet->mergeCells(sprintf('E%s:E%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('E%s', $this->rangeStart), $order->concave);
                // Column F
                $activeSheet->mergeCells(sprintf('F%s:F%s', $this->rangeStart, $endRange = $this->rangeStart + 3));
                $activeSheet->mergeCells(sprintf('F%s:F%s', $endRange + 1, $endRange + 4));
                $activeSheet->setCellValue(sprintf('F%s', $this->rangeStart), $order->wood);
                $activeSheet->setCellValue(sprintf('F%s', $endRange + 1), $order->glue);
                // Column G
                $activeSheet->mergeCells(sprintf('G%s:G%s', $this->rangeStart, $endRange = $this->rangeStart + 2));
                $activeSheet->mergeCells(sprintf('G%s:G%s', $endRange + 2, $endRange + 4));
                if(!empty(PaidFile::where('created_by', $order['created_by'])->where('file_name', $order->bottomprint)->first()['date'])){
                    $green = true;
                }
                $activeSheet->setCellValue(
                    sprintf('G%s', $this->rangeStart), $this->setStartTextBold('Bottom: ', $order->bottomprint, $green)
                );
                $green = false;
                $activeSheet->setCellValue(
                    sprintf('G%s', $endRange + 1), 'colors: ' . Order::colorCount($order->bottomprint_color)
                );
                if(!empty(PaidFile::where('created_by', $order['created_by'])->where('file_name', $order->bottomprint)->first()['date'])){
                    $green = true;
                }
                $green = false;
                $activeSheet->setCellValue(
                    sprintf('G%s', $endRange + 2), $this->setStartTextBold('Top: ', $order->topprint,$green)
                );
                $activeSheet->setCellValue(
                    sprintf('G%s', $endRange + 5), 'colors: ' . Order::colorCount($order->topprint_color)
                );
                // Column H
                $activeSheet->mergeCells(sprintf('H%s:H%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('H%s', $this->rangeStart), 'Engravery: ' . $order->engravery);
               
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
                $activeSheet->mergeCells(sprintf('K%s:K%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('K%s', $this->rangeStart), 'Cardboard: ' . $order->cardboard);

                // Column L
                $activeSheet->mergeCells(sprintf('L%s:L%s', $this->rangeStart, $endRange = $this->rangeStart + 6));
                if(!empty(PaidFile::where('created_by', $order['created_by'])->where('file_name', $order->carton)->first()['date'])){
                    $green = true;
                }
                $activeSheet->setCellValue(
                    sprintf('L%s', $this->rangeStart), $this->setStartTextBold('Carton Print: ', $order->carton, $green)
                );
                $activeSheet->setCellValue(
                    sprintf('L%s', $endRange + 1), 'colors: ' . Order::colorCount($order->carton_color)
                );
                // Column M
                $activeSheet->mergeCells(sprintf('M%s:M%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('M%s', $this->rangeStart), $order->perdeck);
                // Column N
                $activeSheet->mergeCells(sprintf('N%s:N%s', $this->rangeStart, $this->rangeStart + 7));
                $activeSheet->setCellValue(sprintf('N%s', $this->rangeStart), $order->total);
            }
        });
        return $this; 
    }

    protected function generateGrips()
    {
        if ($this->gripsCount <= 0) return $this;

        // +1 If exists grips
        $this->offsetRows += 1;

        $activeSheet = $this->getActiveSheet();
        // Insert head Grip Tapes
        $activeSheet->insertNewRowBefore($gripRowStart = ($this->rangeStart + $this->ordersCount * self::ROWS_ITEM));
        $activeSheet->setCellValue('C' . $gripRowStart, 'Quantity');
        $activeSheet->setCellValue('D' . $gripRowStart, 'Size');
        $activeSheet->setCellValue('E' . $gripRowStart, 'Grip Color');
        $activeSheet->setCellValue('F' . $gripRowStart, 'Grit');
        $activeSheet->setCellValue('G' . $gripRowStart, 'Perforation');
        $activeSheet->setCellValue('H' . $gripRowStart, 'Die Cut');
        $activeSheet->setCellValue('I' . $gripRowStart, 'Top Print');
        $activeSheet->setCellValue('J' . $gripRowStart, 'Backpaper');
        $activeSheet->setCellValue('K' . $gripRowStart, 'Backpaper Print');
        $activeSheet->setCellValue('L' . $gripRowStart, 'Carton Print');
        $activeSheet->setCellValue('M' . $gripRowStart, 'Price p. grip');
        $activeSheet->setCellValue('N' . $gripRowStart, 'Total of Row');

        $gripRowStart += 1; // after head row

        $this->grips->map(function(GripTape $grip, $index) use ($gripRowStart, $activeSheet) {

            $activeSheet->insertNewRowBefore($gripRowStart, self::ROWS_ITEM);
            
            foreach ($activeSheet->getRowIterator($gripRowStart, self::ROWS_ITEM) as $row) {
                $green = false;
                // Column C
                $activeSheet->mergeCells(sprintf('C%s:C%s', $gripRowStart, $endRange = $gripRowStart + 3));
                $activeSheet->mergeCells(sprintf('C%s:C%s', $endRange + 1, $endRange + 4));
                $activeSheet->setCellValue(sprintf('C%s', $gripRowStart), $grip->quantity);
                $activeSheet->setCellValue(sprintf('C%s', $endRange + 1), 'Grip Tapes');
                // Column D
                $activeSheet->mergeCells(sprintf('D%s:D%s', $gripRowStart, $gripRowStart + 7));
                $activeSheet->setCellValue(sprintf('D%s', $gripRowStart), $grip->size);
                // Column E
                $activeSheet->mergeCells(sprintf('E%s:E%s', $gripRowStart, $gripRowStart + 7));
                $activeSheet->setCellValue(sprintf('E%s', $gripRowStart), ucwords($grip->color));
                // Column F
                $activeSheet->mergeCells(sprintf('F%s:F%s', $gripRowStart, $gripRowStart + 7));
                $activeSheet->setCellValue(sprintf('F%s', $gripRowStart), $grip->grit);

                // Column G
                $activeSheet->mergeCells(sprintf('G%s:G%s', $gripRowStart, $gripRowStart + 7));
                $activeSheet->setCellValue(sprintf('G%s', $gripRowStart), $grip->perforation ? 'Yes' : 'No');

                // Column H
                if(!empty(PaidFile::where('created_by', $grip['created_by'])->where('file_name', $grip->die_cut)->first()['date'])){
                    $green = true;
                }
                $activeSheet->mergeCells(sprintf('H%s:H%s', $gripRowStart, $gripRowStart + 7));
                $activeSheet->setCellValue(sprintf('H%s', $gripRowStart), $this->setStartTextBold('', $grip->die_cut));
                $green = false;
                // Column I
                $activeSheet->mergeCells(sprintf('I%s:I%s', $gripRowStart, $endRange = $gripRowStart + 6));
                if(!empty(PaidFile::where('created_by', $grip['created_by'])->where('file_name', $grip->top_print)->first()['date'])){
                    $green = true;
                }
                $activeSheet->setCellValue(sprintf('I%s', $gripRowStart), $this->setStartTextBold('', $grip->top_print));
                $activeSheet->setCellValue(sprintf('I%s', $endRange + 1), 'colors: ' . Griptape::colorCount($grip->top_print_color));
                $green = false;
                // Column J
                $activeSheet->mergeCells(sprintf('J%s:J%s', $gripRowStart, $gripRowStart + 7));
                $activeSheet->setCellValue(sprintf('J%s', $gripRowStart), $grip->backpaper);

                // Column K
                if(!empty(PaidFile::where('created_by', $grip['created_by'])->where('file_name', $grip->backpaper_print)->first()['date'])){
                    $green = true;
                }
                $activeSheet->mergeCells(sprintf('K%s:K%s', $gripRowStart, $endRange = $gripRowStart + 6));
                $activeSheet->setCellValue(sprintf('K%s', $gripRowStart), $this->setStartTextBold('', $grip->backpaper_print));
                $activeSheet->setCellValue(sprintf('K%s', $endRange + 1), 'colors: ' . Griptape::colorCount($grip->backpaper_print_color));
                $green = false;
                // Column L
                if(!empty(PaidFile::where('created_by', $grip['created_by'])->where('file_name', $grip->carton_print)->first()['date'])){
                    $green = true;
                }
                $activeSheet->mergeCells(sprintf('L%s:L%s', $gripRowStart, $endRange = $gripRowStart + 6));
                $activeSheet->setCellValue(sprintf('L%s', $gripRowStart), $this->setStartTextBold('', $grip->carton_print));
                $activeSheet->setCellValue(sprintf('L%s', $endRange + 1), 'colors: ' . Griptape::colorCount($grip->carton_print_color));

                // Column M
                $activeSheet->mergeCells(sprintf('M%s:M%s', $gripRowStart, $gripRowStart + 7));
                $activeSheet->setCellValue(sprintf('M%s', $gripRowStart), $grip->price);

                // Column N
                $activeSheet->mergeCells(sprintf('N%s:N%s', $gripRowStart, $gripRowStart + 7));
                $activeSheet->setCellValue(sprintf('N%s', $gripRowStart), $grip->total);
            }
        });

        // ------------- Set styles --------------

        // start + count grips * 8(count rows in single item)
        $range = sprintf(
            'C%s:N%s', 
            $gripRowStart,
            $gripRowStart + ($this->gripsCount * self::ROWS_ITEM) - 1
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
            $gripRowStart,  
            $gripRowStart + ($this->gripsCount * self::ROWS_ITEM)
        );
        // set currency format for cells
        $this->getStylesRange($rangeCurrency)
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

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
            $this->rangeStart + ($this->ordersCount * self::ROWS_ITEM)
        ); 
        $rangeCurrency = sprintf(
            'M%s:N%s', 
            $this->rangeStart,  
            $this->rangeStart + ($this->ordersCount * self::ROWS_ITEM)
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
                $rangeWithOrders = $this->rangeStart + $this->ordersCount * self::ROWS_ITEM, 
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

    public function getCountGrips()
    {
        return $this->grips->count();
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
                    + $this->totalCount 
                    * self::ROWS_ITEM 
                    + $this->offsetRows 
                    + ($this->hasPromocode ? 1 : 0)
                    + $this->countFees + 2
                ), 
                'Final amount in USD:'
            )
            ->setCellValue(
                sprintf('N%s', $startTotal), 
                $this->finalAmount += $this->orders->sum('total') + $this->grips->sum('total') + $this->wheels->sum('total') - $this->rewardPromocode
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
                            + $this->totalCount 
                            * self::ROWS_ITEM 
                            + $this->offsetRows 
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
        // Order weight
        $gripWeight = $this->grips->reduce(function($carry, $item) {
            return $carry + ($item->quantity * GripTape::sizePrice($item->size)['weight']); 
        }, 0);

        // total weight
        $weight = ($this->orders->sum('quantity') * Order::SKATEBOARD_WEIGHT)  + $gripWeight + $this->getWheelsWeight();

        // find not empty order fees
        $orderFees = $this->orders->map(function($order) {
            return array_filter(
                $order->toArray(), function($image) {
                    return isset($image);
                }
            );
        })->filter(function($image) {
            return count($image);
        })
        ->values()
        ->toArray();

        // Fetching all desing by griptapes
        $gripTapes = $this->grips
            ->map(function($grip) {
                return array_filter($grip->attributesToArray());
            })
            ->toArray();

        $fees = [];
        $sum_fees = 0;

        foreach ($orderFees as $index => $order) {
            $index += 1;

            foreach ($order as $key => $value) {
                if (!array_key_exists($key,  $this->feesTypes) || !array_key_exists('quantity',  $order)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $order['quantity'];

                        // if ($key == 'cardboard') {
                        //     $fees[$key][$value]['price'] = Order::getPriceDesign($fees[$key][$value]['quantity']);
                        // }
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $order['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_color', $order)) {
                    switch ($order[$key . '_color']) {
                        case '1 color':
                            $fees[$key][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$key][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$key][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['color'] = 4;
                            break;
                    }
                }

                if ($key === 'bottomprint' || $key === 'topprint') {
                    $fees[$key][$value]['price'] = $fees[$key][$value]['color'] * Order::COLOR_COST;
                } else {
                    $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];
                }
                if(!empty(PaidFile::where('created_by', $order['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['price'] = 0;
                    $fees[$key][$value]['paid'] = 1;
                }

                /*
                 * Cardboard price calculated 
                 * Formula: 500 + (quantity - 625) * 0.8
                 * If (quantity - 625) * 0.8 < 0 then 0
                 */ 
                // if ($key == 'cardboard') {
                //     $fees[$key][$value]['price'] = Order::getPriceDesign($order['quantity']);
                // } else {
                //     $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'];
                // }

            }
        }

        foreach ($gripTapes as $index => $grip) {
            $index += 1;

            foreach ($grip as $key => $value) {

                if (!array_key_exists($key,  $this->feesTypes)) continue;

                // If same design
                if (array_key_exists($key, $fees)) {
                    if (array_key_exists($value, $fees[$key])) {
                        $fees[$key][$value]['batches'] .= ",{$index}";
                        $fees[$key][$value]['quantity'] += $grip['quantity'];
                        continue;
                    }
                } 
                $fees[$key][$value] = [
                    'image'    => $value,
                    'batches'  => (string) $index,
                    'type'     => $this->feesTypes[$key]['name'],
                    'quantity' => $grip['quantity'],
                    'color'    => 1
                ];

                if (array_key_exists($key . '_color', $grip)) {
                    switch ($grip[$key . '_color']) {
                        case '1 color':
                            $fees[$key][$value]['color'] = 1;
                            break;
                        case '2 color':
                            $fees[$key][$value]['color'] = 2;
                            break;
                        case '3 color':
                            $fees[$key][$value]['color'] = 3;
                            break;
                        case 'CMYK':
                            $fees[$key][$value]['color'] = 4;
                            break;
                    }
                }

                $fees[$key][$value]['price'] = $this->feesTypes[$key]['price'] * $fees[$key][$value]['color'];
                if(!empty(PaidFile::where('created_by', $grip['created_by'])->where('file_name', $value)->first()['date'])){
                    $fees[$key][$value]['paid'] = 1;
                    $fees[$key][$value]['price'] = 0;
                }
            }
        }

        $this->calculateWheelFixCost($fees);

        // Set Global delivery
        if ($this->ordersCount || $this->gripsCount || $this->wheelsCount) {
            $fees['global'] = [];
            array_push($fees['global'], [
                'image'   => $this->user ? $weight . ' KG' : '$?.??',
                'batches' => '', 
                'price'   => get_global_delivery($weight), 
                'type'    => $weight <= 110 ? 'Worldwide 10-day airfreight' : 'Ocean freight'
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
                $startDelivery = $this->rangeStart + $this->totalCount * self::ROWS_ITEM + $this->offsetRows, 
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
            if(isset($value['paid']))
                $this->getActiveSheet()->setCellValue(sprintf('J%s', $pos), $this->setStartTextBold('', $value['image'], true));
            else
                $this->getActiveSheet()->setCellValue(sprintf('J%s', $pos), $value['image']);
        }

        return $this;
    }

    protected function setDiscountRow()
    {
        $query = Order::query()
            ->whereIn('orders.id', $this->orders->pluck('id')->toArray())
            ->whereNotNull('promocode');

        if (! $query->count()) return $this;

        // Promocode is exists
        $this->hasPromocode = true;

        // Get promocode
        $promocode = json_decode($query->first()->promocode);

        $activeSheet = $this->getActiveSheet();

        $activeSheet
            ->insertNewRowBefore(
                $start = $this->rangeStart 
                    + $this->totalCount 
                    * self::ROWS_ITEM 
                    + $this->countFees 
                    + $this->offsetRows, 
                1 // + 1 row
            );
        $activeSheet->mergeCells(sprintf('C%s:I%s', $start, $start));
        $activeSheet->mergeCells(sprintf('J%s:M%s', $start, $start));

        $activeSheet->setCellValue(sprintf('C%s', $start), "Discount");
        $activeSheet->setCellValue(sprintf('J%s', $start), $promocode->code);
        $this->rewardPromocode = $promocode->reward;

        $activeSheet->setCellValue(sprintf('N%s', $start), '-' . $this->rewardPromocode);

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
}