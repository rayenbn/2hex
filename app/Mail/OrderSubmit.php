<?php
namespace App\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{HeatTransfer\HeatTransfer, Order, GripTape, Wheel\Wheel};

class OrderSubmit extends Mailable
{
    use SerializesModels;

    public $data;
    protected $invoiceNumber;

    public function __construct(array $data = [])
    {
        $this->data  = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $queryOrders = Order::auth();
        $gripQuery = GripTape::auth();
        $wheelQuery = Wheel::auth();
        $transfersQuery = HeatTransfer::auth();

        dispatch($exporter = new \App\Jobs\GenerateInvoicesXLSX(
            $queryOrders->get(), $gripQuery->get(), $wheelQuery->get(), $transfersQuery->get()
        ));

        $this->invoiceNumber = $exporter->getInvoiceNumber();

        $queryOrders->update(['invoice_number' => $this->invoiceNumber]);
        $gripQuery->update(['invoice_number'   => $this->invoiceNumber]);
        $wheelQuery->update(['invoice_number'  => $this->invoiceNumber]);
        $transfersQuery->update(['invoice_number'  => $this->invoiceNumber]);

        return $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->bcc('niklas@skateboard-factory.com', 'SBfactory')
            ->subject('2HEX Production Order Confirmation')
            ->attach($exporter->getPathInvoice(), [
                'as' => $this->invoiceNumber . '.xlsx',
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ])
            ->markdown('emails.orders.submit');
    }

    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }
}
