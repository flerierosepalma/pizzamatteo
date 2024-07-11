<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCustomerInvoice extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $orderCustomerDetails;

    public function __construct($orderCustomerDetails)
    {
        $this->orderCustomerDetails = $orderCustomerDetails;
    }

    public function build()
    {
        return $this->view('mails.customer_invoice')
                    ->with('orderCustomerDetails', $this->orderCustomerDetails);
    }
}
