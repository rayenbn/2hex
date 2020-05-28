<?php
namespace App\Jobs;

use App\Classes\Enum\Delivery;
use App\Models\Auth\User\User;
use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Order;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class GenerateInvoicesXLSX implements ShouldQueue
{
    use Dispatchable, SerializesModels;

    /**
     * Path to template xlsx
     * @var string $pathTemplate
     */
    protected $pathTemplate;

    /**
     * List orders
     * @var Collection $orders
     */
    private $orders;

    /**
     * List grips
     * @var Collection $grips
     */
    private $grips;

    /**
     * List of wheels
     *
     * @var Collection $wheels
     */
    private $wheels;

    /**
     * @var Collection|null
     */
    private $transfers;


    /**
     * List bearings
     * Collection $bearings
     */
    protected $bearings;


    /**
     * List bolts
     * Collection $bolts;
     */
    protected $bolts;


    /**
     * Working spreadsheet
     * @var \PhpOffice\PhpSpreadsheet\Spreadsheet $spreadsheet
     */
    protected $spreadsheet;

    /**
     * @var Xlsx writer
     */
    protected $writer;

    /**
     * Generated invoice number
     * @var string $invoiceNumber
     */
    protected $invoiceNumber;

    /**
     * Auth user
     * @var User $user
     */
    protected $user;

    /**
     * Count fees
     * @var int $countFees
     */
    protected $countFees = 0;

    /**
     * Drawing object
     * @var Drawing $drawing
     */
    protected $drawing;

    protected $finalAmount = 0;

    protected $date;

    /**
     * If some order contain promocode
     * boolean $hasPromocode
     */
    protected $hasPromocode = false;

    /**
     * Reward for promocode
     *
     * @var int $rewardPromocode
     */
    protected $rewardPromocode = 0;

    /**
     * @var int
     */
    private $startBatch = 15;

    /**
     * @var int
     */
    private $startDelivery = 15;

    /**
     * @var int
     */
    protected $totalQuantity = 0;

    public function __construct($orders, $grips, $wheels, $bearings = null, $transfers =  null, $bolts = null)
    {
        $this->orders = $orders;
        $this->grips = $grips;
        $this->wheels = $wheels;
        $this->bearings = $bearings;
        $this->transfers = $transfers ?? collect();
        $this->bolts = $bolts;
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
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     *
     * @return void
     */
    public function handle()
    {
        $this->drawing->setName('2HEX.com');
        $this->drawing->setDescription('2HEX.com');
        $this->drawing->setPath(public_path('/img/2hex.png'));
        $this->drawing->setCoordinates('N4');
        $this->drawing->setOffsetY(0);
        $this->drawing->setOffsetX(0);
        $this->drawing->setWidth(261);
        $this->drawing->setHeight(75);
        $this->drawing->setWorksheet($this->getActiveSheet());

        $batches = [
            \App\Classes\Invoice\Deck::class => $this->orders,
            \App\Classes\Invoice\GripTape::class => $this->grips,
            \App\Classes\Invoice\Wheel::class => $this->wheels,
            \App\Classes\Invoice\HeatTransfer::class => $this->transfers,
            \App\Classes\Invoice\Bearing::class => $this->bearings,
            \App\Classes\Invoice\Bolt::class => $this->bolts,
        ];

        // Filter filled batches
        $batches = array_filter($batches, function (Collection $batch) {
           return $batch->count() > 0;
        });

        foreach ($batches as $batch => $items) {
            $this->finalAmount += $items->sum('total');
            $this->totalQuantity += $items->sum('quantity');

            /** @var \App\Classes\Invoice\Batch $batchEntry */
            $batchEntry = new $batch($this->getActiveSheet(), $items);
            $batchEntry->setStartRow($this->startBatch)->handle();

            $offset = ($items->count() * 8) + 1;
            if($batch == 'App\\Classes\\Invoice\\Bolt')
                $offset += count($this->bolts)*2;

            $this->startBatch += $offset;
            $this->startDelivery += $offset;
        }

        $this->setDeliveryCells()
            ->setDiscountRow()
            ->setSeparateCell()
            ->write();
    }
    private function setPropertiesSheet()
    {
        $this->getActiveSheet()->setTitle($this->invoiceNumber, false);
        $this->spreadsheet->getProperties()->setCreator(env('APP_NAME', '2HEX.com'));
    }

    /**
     * Get active worksheet
     *
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     *
     * @return \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet
     */
    protected function getActiveSheet()
    {
        return $this->spreadsheet->getActiveSheet();
    }

    public function getSpreadsheet()
    {
        return $this->spreadsheet;
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

    protected function getStylesRange(string $range)
    {
        return $this->getActiveSheet()->getStyle($range);
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @return $this
     */
    protected function setSeparateCell()
    {
        // Set total cells
        $startTotal = $this->startDelivery + $this->countFees + ($this->hasPromocode ? 1 : 0);
        
        $this->getActiveSheet()->insertNewRowBefore($startTotal);

        $this->getActiveSheet()->getStyle(sprintf('C%s:N%s', $startTotal, $startTotal + 1))->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'ffffff'
                ],
            ],
        ]);

        $startTotal += 1;

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
        if(gettype($this->date) == 'integer')
            $this->getStylesRange('E8')->getNumberFormat()->setFormatCode('dd/mm/yyyy');
        

        $shipinfo = \App\Models\ShipInfo::query()
            ->selectRaw(
                "*, CONCAT_WS(', ', shipping_address, shipping_city, shipping_state, shipping_postcode) as fulladdress"
            )
            ->where('created_by', (string) (auth()->check() ? auth()->id() : csrf_token()))
            ->first();

        $this->getActiveSheet()->getRowDimension($startTotal)->setRowHeight(25);
        $this
            ->getActiveSheet()
            ->mergeCells(sprintf('K%1$s:M%1$s', $startTotal))
            ->setCellValue('K' . $startTotal, 'Final amount in USD:')
            ->setCellValue('N' . $startTotal, $this->finalAmount -= $this->rewardPromocode);

        // Total styles
        $this->getActiveSheet()->getStyle(sprintf('K%1$s:N%1$s', $startTotal))
            ->getFont()
            ->setSize(16)
            ->setBold(true);

        $this->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);

        $this->getStylesRange(sprintf('N%1$s:N%2$s', $startTotal, $startTotal + 5))
            ->getNumberFormat()
            ->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

        if ($shipinfo) {
            $this
                ->getActiveSheet()
                ->setCellValue('G11', 'Invoice Address: ' . $shipinfo->invoice_country)
                ->setCellValue('C' . $shipsStart = $startTotal + 3, 'Company Name: ' . $shipinfo->shipping_company)
                ->setCellValue('C' . ($shipsStart + 1), 'First + Lastname: ' . $this->user->name)
                ->setCellValue('C' . ($shipsStart + 2), 'Shipping Address: ' . $shipinfo->fulladdress)
                ->setCellValue('C' . ($shipsStart + 3), 'Cellphone Number: ' . $shipinfo->shipping_phone);
        }

        return $this;
    }

    /**
     * @return array
     */
    private function prepareFees()
    {
        $fees = [];
        $sum_fees = 0;
        $weight = 0;

        $batches = [
            \App\Classes\Batch\Deck::class => $this->orders,
            \App\Classes\Batch\GripTape::class => $this->grips,
            \App\Classes\Batch\Wheel::class => $this->wheels,
            \App\Classes\Batch\Bearing::class => $this->bearings,
            \App\Classes\Batch\HeatTransfer::class => $this->transfers,
        ];

        foreach ($batches as $class => $batch) {
            if (empty($batch)) { continue; }

            /** @var \App\Classes\Batch\Batch $batchEntry */
            $batchEntry = new $class($batch);

            $fees = array_merge($fees, $batchEntry->buildUploads());
            $weight += $batchEntry->getDeliveryWeigh();
        }

        $weight = round( $weight, 2);

        // Set Global delivery
        if ($this->totalQuantity > 0) {
            $fees['global'] = [];
            array_push($fees['global'], [
                'image'   => $this->user ? $weight . ' KG' : '$?.??',
                'batches' => '', 
                'price'   => get_global_delivery($weight), 
                'type'    => $weight <= 110 ? Delivery::AIRFREIGHT : Delivery::OCEAN_FREIGHT
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

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @return $this
     */
    protected function setDeliveryCells()
    {
        // Prepare orders design
        list($orderFees, $feesTotal) = $this->prepareFees();

        //$this->countFees = $this->calculateFees($orderFees);

        // Plus total delivery price, with global delivery
        $this->finalAmount += $feesTotal;

        $this->getActiveSheet()->mergeCells(sprintf('C%1$s:I%1$s', $this->startDelivery));
        $this->getActiveSheet()->mergeCells(sprintf('J%1$s:M%1$s', $this->startDelivery));
        $this->getActiveSheet()->setCellValue('C' . $this->startDelivery, 'One Time Fees');
        $this->getActiveSheet()->setCellValue('J' . $this->startDelivery, 'Filename');
        $this->getActiveSheet()->setCellValue('N' . $this->startDelivery, 'Total of row');

        // Delivery head styles
        $this->getActiveSheet()
            ->getStyle(sprintf('C%1$s:N%1$s', $this->startDelivery))
            ->applyFromArray([
                'font' => [
                    'size' => 10,
                    'bold' => false,
                    'color' => [
                        'argb' => Color::COLOR_WHITE,
                    ]
                ],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => [
                        'rgb' => '52A3F1',
                    ],
                ],
            ]);

        // Skip head uploads
        $this->startDelivery += 1;
        $fileUploads = [];
        array_walk($orderFees, function($fees) use (&$fileUploads){
            array_push($fileUploads, ...array_values($fees));
        });
        $array_index = 0;
        foreach ($fileUploads as $index => $value) {
            if($value['price'] > 0)
                $array_index ++;
        }
        // Insert rows = count uploads
        $this
            ->getActiveSheet()
            ->insertNewRowBefore(
                $this->startDelivery,
                $array_index - 1
            );

        // start + count orders * 8(count rows in single item)
        $rangeFees = sprintf(
            'C%s:N%s',
            $this->startDelivery,
            $this->startDelivery + $array_index - 1
        );

        $styles = $this->getActiveSheet()->getStyle($rangeFees);

        // set fill bg
        $styles->getFill()->setFillType(Fill::FILL_NONE);
        // set color inner cell
        $styles->getFont()->setSize(10)->getColor()->setARGB(Color::COLOR_BLACK);
        // set currency format cell
        $styles->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

        
        $array_index = 0;
        foreach ($fileUploads as $index => $value) {
            if($value['price'] > 0){
                $this->getActiveSheet()->mergeCells(sprintf('C%s:I%s', $pos = $this->startDelivery + $array_index, $pos));
                $this->getActiveSheet()->mergeCells(sprintf('J%s:M%s', $pos, $pos));

                $this->getActiveSheet()->setCellValue('C' . $pos, $value['type']);
                $this->getActiveSheet()->setCellValue('N' . $pos, $value['price']);

                if(isset($value['paid'])) {
                    $this->getActiveSheet()->setCellValue('J' . $pos, $this->setStartTextBold('', $value['image'], true));
                } else {
                    $this->getActiveSheet()->setCellValue('J'. $pos, $value['image']);
                }
                $array_index ++;
            }
        }
        $this->countFees = $array_index;
        return $this;
    }

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @return $this
     */
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

        /** @var \PhpOffice\PhpSpreadsheet\Worksheet\Worksheet $activeSheet */
        $activeSheet = $this->getActiveSheet();

        //  Delivery + Delivery head
        $activeSheet->insertNewRowBefore($this->startDelivery);
        $activeSheet
            ->getStyle(sprintf('C%1$s:N%1$s', $this->startDelivery))
            ->applyFromArray([
                'font' => [
                    'size' => 10,
                    'bold' => false,
                    'color' => [
                        'argb' => Color::COLOR_BLACK,
                    ]
                ],
                'fill' => [
                    'fillType' => Fill::FILL_NONE,
                ],
            ]);

        $activeSheet->mergeCells(sprintf('C%1$s:I%1$s', $this->startDelivery));
        $activeSheet->mergeCells(sprintf('J%1$s:M%1$s', $this->startDelivery));

        $activeSheet->setCellValue('C' . $this->startDelivery, "Discount");
        $activeSheet->setCellValue('J' . $this->startDelivery, $promocode->code);
        $this->rewardPromocode = $promocode->reward;

        $activeSheet->setCellValue('N'. $this->startDelivery, '-' . $this->rewardPromocode);

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

    /**
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     * @return $this
     */
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