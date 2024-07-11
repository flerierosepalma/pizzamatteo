<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\OTPMail;

class PasswordResetController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot_password');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('user_email', $request->email)->first();
        
        if (!$user) {
            return back()->withErrors(['email' => 'No user found with this email address.']);
        }

        $otp = rand(100000, 999999); 


        Session::put('otp', $otp);
        Session::put('otp_email', $request->email);
        Session::put('otp_expiry', Carbon::now()->addMinutes(10));

        $type = 'forgot_password';
        Mail::to($request->email)->send(new OTPMail($otp, $type));

        return redirect()->route('forgot.password.verify.otp')->with('status', 'OTP sent successfully to your email address.');
    }

    public function resendOtp(Request $request)
    {
        return $this->sendOtp($request);
    }

    public function showOtpVerificationForm()
    {
        return view('forgot_password_verification');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6'
        ]);

        $otp = Session::get('otp');
        $otp_email = Session::get('otp_email');
        $otp_expiry = Session::get('otp_expiry');

        if ($otp == $request->otp && $otp_email == $request->email && Carbon::now()->lessThanOrEqualTo($otp_expiry)) {
            return redirect()->route('password.reset', ['email' => $request->email]);
        } else {
            return back()->withErrors(['otp' => 'Invalid or expired OTP.']);
        }
    }

    public function showResetPasswordForm($email)
    {
        return view('reset_password', ['email' => $email]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('user_email', $request->email)->first();
        
        if ($user) {
            $user->user_password = Hash::make($request->password);
            $user->save();
            return redirect()->route('password.success')->with('status', 'Password reset successfully.');
        } else {
            return back()->withErrors(['email' => 'No user found with this email address.']);
        }
    }
}
