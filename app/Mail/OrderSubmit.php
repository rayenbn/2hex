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

    public $order;
    public $data;

    public function __construct(Order $order, array $data = [])
    {
        $this->order = $order;
        $this->data  = $data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $orders = Order::auth()->get();
        dispatch($exporter = new \App\Jobs\GenerateInvoicesXLSX($orders));
        
        return $this
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->to(auth()->user())
            ->subject('2HEX Production Order Confirmation')
            ->bcc(config('mail.from.address'), config('mail.from.name'))
            ->attach($exporter->getPathInvoice(), [
                'as' => $exporter->getInvoiceNumber() . '.xlsx',
                'mime' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ])
            ->markdown('emails.orders.submit');
    }
}