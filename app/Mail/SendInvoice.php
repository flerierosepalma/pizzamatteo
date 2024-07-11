<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvoice extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $orderResellerDetails;

    public function __construct($orderResellerDetails)
    {
        $this->orderResellerDetails = $orderResellerDetails;
    }

    public function build()
    {
        return $this->view('mails.reseller_invoice')
                    ->with('orderResellerDetails', $this->orderResellerDetails);
    }
}
