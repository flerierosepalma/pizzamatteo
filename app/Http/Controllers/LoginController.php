<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Mail\OTPMail;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $credentials = [
            'user_email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            $otp = rand(100000, 999999);
            $otpExpiry = Carbon::now()->addMinutes(10);

            $request->session()->put('otp', $otp);
            $request->session()->put('otp_expiry', $otpExpiry);

            $type = 'login';
            Mail::to($request->email)->send(new OTPMail($otp, $type));

            return redirect()->route('login.verification', ['email' => $user->user_email]);
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    public function showOtpForm(Request $request)
    {
        return view('login_verification', ['email' => $request->email]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'otp' => 'required|numeric',
        ]);

        $sessionOtp = $request->session()->get('otp');
        $otpExpiry = $request->session()->get('otp_expiry');

        if ($sessionOtp == $request->otp && Carbon::now()->lessThanOrEqualTo($otpExpiry)) {
            $request->session()->forget(['otp', 'otp_expiry']);

            $user = Auth::user();
            switch ($user->user_role) {
                case 'customer':
                    return redirect()->route('customer.home');
                case 'reseller':
                    return redirect()->route('reseller.home');
                case 'owner':
                    return redirect()->route('owner.home');
                default:
                    return redirect()->route('home');
            }
        } else {
            return redirect()->back()->withErrors(['error' => 'Invalid or expired OTP. Please try again.']);
        }
    }

    public function resendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
        ]);

        $user = User::where('user_email', $request->email)->first();

        if ($user) {
            $otp = rand(100000, 999999);
            $otpExpiry = Carbon::now()->addMinutes(10);

            $request->session()->put('otp', $otp);
            $request->session()->put('otp_expiry', $otpExpiry);

            $type = 'login';
            Mail::to($request->email)->send(new OTPMail($otp, $type));

            return redirect()->route('login.verification', ['email' => $user->user_email])->with('success', 'OTP has been resent.');
        } else {
            return redirect()->back()->withErrors(['error' => 'Email not found. Please try again.']);
        }
    }
}

