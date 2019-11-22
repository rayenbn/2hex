<?php
namespace App\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\{Order, GripTape, Wheel\Wheel};

class OrderSubmit extends Mailable
{
    use SerializesModels;

    public $data;

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

        dispatch($exporter = new \App\Jobs\GenerateInvoicesXLSX(
            $queryOrders->get(), $gripQuery->get(), $wheelQuery->get()
        ));

        $invoiceNumber = $exporter->getInvoiceNumber();

        $queryOrders->update(['invoice_number' => $invoiceNumber]);
        $gripQuery->update(['invoice_number'   => $invoiceNumber]);

        return $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->bcc('niklas@skateboard-factory.com', 'SBfactory')
            ->subject('2HEX Production Order Confirmation')
            ->attach($exporter->getPathInvoice(), [
                'as' => $invoiceNumber . '.xlsx',
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ])
            ->markdown('emails.orders.submit');
    }
}
