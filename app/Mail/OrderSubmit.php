<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Order;

class OrderSubmit extends Mailable
{
    use Queueable, SerializesModels;

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
<<<<<<< HEAD
            ->bcc('niklas@skateboard-factory.com', 'SBfactory')
=======
            ->cc('niklas@skateboard-factory.com', 'SBfactorygit config')
	    ->bcc('sinyukov.denis2015@yandex.ru', 'Denis Sinyukov')
>>>>>>> 00bd618f49f245c0e3bdbe2fc05336b474d147d6
            ->subject('2HEX Production Order Confirmation')
            ->attach($exporter->getPathInvoice(), [
                'as' => $exporter->getInvoiceNumber() . '.xlsx',
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ])
            ->markdown('emails.orders.submit');
    }
}
