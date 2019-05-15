<?php
namespace App\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

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
        dispatch($exporter = new \App\Jobs\GenerateInvoicesXLSX($queryOrders->get()));

        $queryOrders->update(['invoice_number' => $exporter->getInvoiceNumber()]);

        return $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->bcc('niklas@skateboard-factory.com', 'SBfactory')
	        ->bcc('sinyukov.denis2015@yandex.ru', 'Denis Sinyukov')
            ->subject('2HEX Production Order Confirmation')
            ->attach($exporter->getPathInvoice(), [
                'as' => $exporter->getInvoiceNumber() . '.xlsx',
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ])
            ->markdown('emails.orders.submit');
    }
}
