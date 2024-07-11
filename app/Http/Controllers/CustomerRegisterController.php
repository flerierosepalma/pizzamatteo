<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\CustomerInformation;
use App\Models\ResellerInformation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Mail\OTPMail;
use Carbon\Carbon;

class CustomerRegisterController extends Controller
{
    public function register(Request $request)
    {
        Log::info('Register method called.');
        Log::info('Request data: ', $request->all());

        $validated = $request->validate([
            'customerName' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'birthday' => 'required|date',
            'province' => 'required|string|max:255',
            'store' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,user_email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Log::info('Validated data: ', $validated);

        $request->session()->put('user_data', [
            'user_email' => $request->email,
            'user_password' => Hash::make($request->password),
            'user_role' => 'customer',
            'customer_name' => $request->customerName,
            'customer_gender' => $request->gender,
            'customer_birthday' => $request->birthday,
            'customer_province' => $request->province,
            'customer_store' => $request->store,
            'customer_city' => $request->city,
            'customer_barangay' => $request->barangay,
            'customer_street' => $request->street,
            'customer_number' => $request->phone,
        ]);

        $otp = rand(100000, 999999);
        $otpExpiry = Carbon::now()->addMinutes(10);

        $request->session()->put('otp', $otp);
        $request->session()->put('otp_expiry', $otpExpiry);

        $type = 'register';
        Mail::to($request->email)->send(new OTPMail($otp, $type));
        Log::info('OTP sent to email: ' . $request->email);

        return redirect()->route('customer.register.verify', ['email' => $request->email]);
    }

    public function showVerifyOtpForm(Request $request)
    {
        Log::info('Showing verify OTP form for email: ' . $request->email);
        return view('customer_register_verification', ['email' => $request->email]);
    }

    public function verifyOtp(Request $request)
    {
        Log::info('Verify OTP method called.');
        Log::info('Request data: ', $request->all());

        $validated = $request->validate([
            'email' => 'required|string|email|max:255',
            'otp' => 'required|numeric',
        ]);

        Log::info('Validated data: ', $validated);

        $sessionOtp = $request->session()->get('otp');
        $otpExpiry = $request->session()->get('otp_expiry');

        if ($sessionOtp == $request->otp && Carbon::now()->lessThanOrEqualTo($otpExpiry)) {
            Log::info('OTP verified for email: ' . $request->email);

            $userData = $request->session()->get('user_data');

            DB::beginTransaction();
            try {
                Log::info('Starting transaction.');

                $user = new User;
                $user->user_email = $userData['user_email'];
                $user->user_password = $userData['user_password'];
                $user->user_role = $userData['user_role'];
                $user->save();

                $customer = new CustomerInformation;
                $customer->user_id = $user->user_id;
                $customer->customer_name = $userData['customer_name'];
                $customer->customer_gender = $userData['customer_gender'];
                $customer->customer_birthday = $userData['customer_birthday'];
                $customer->customer_province = $userData['customer_province'];
                $customer->customer_store = $userData['customer_store'];
                $customer->customer_city = $userData['customer_city'];
                $customer->customer_barangay = $userData['customer_barangay'];
                $customer->customer_street = $userData['customer_street'];
                $customer->customer_number = $userData['customer_number'];
                $customer->save();

                DB::commit();
                Log::info('Transaction committed');

                $request->session()->forget(['user_data', 'otp', 'otp_expiry']);

                return redirect()->route('customer.register.success')->with('success');
            } catch (\Exception $e) {
                DB::rollBack();
                Log::error('Registration failed: ' . $e->getMessage(), ['exception' => $e]);
                return redirect()->back()->withErrors(['error' => 'Registration failed. Please try again.']);
            }
        } else {
            Log::error('Invalid or expired OTP for email: ' . $request->email);

            return redirect()->back()->withErrors(['error' => 'Invalid. Please try again.']);
        }

    }
    public function resendOtp(Request $request)
    {
        Log::info('Resend OTP method called.');
        Log::info('Request data: ', $request->all());

        $otp = rand(100000, 999999);
        $otpExpiry = Carbon::now()->addMinutes(10);

        $request->session()->put('otp', $otp);
        $request->session()->put('otp_expiry', $otpExpiry);

        $type = 'register';
        Mail::to($request->email)->send(new OTPMail($otp, $type));
        Log::info('OTP resent to email: ' . $request->email);

        return response()->json(['success' => true]);
    }

    public function showRegisterPage()
    {
        $province = ResellerInformation::distinct()->pluck('store_province')->all();
        $store = ResellerInformation::whereIn('store_status', ['online', 'offline'])->get();

        return view('customer_register', compact('store', 'province'));
    }

}

