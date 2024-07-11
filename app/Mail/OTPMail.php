<?php

// app/Mail/OTPMail.php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OTPMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $template;

    public function __construct($otp, $template)
    {
        $this->otp = $otp;
        $this->template = $template;
    }

    public function build()
    {
        $subject = '[Pizza Matteo] OTP Code';
        $view = 'mails.otp';

        switch ($this->template) {
            case 'register':
                $subject = '[Pizza Matteo] Register Verification Code';
                $view = 'mails.register_otp';
                break;
            case 'login':
                $subject = '[Pizza Matteo] Login Verification Code';
                $view = 'mails.login_otp';
                break;
            case 'forgot_password':
                $subject = '[Pizza Matteo] Forgot Password Verification Code';
                $view = 'mails.forgot_password_otp';
                break;
            default:
        }

        return $this->view($view)
                    ->subject($subject)
                    ->with(['otp' => $this->otp]);
    }
}


