<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\ResellerInformation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Mail\OTPMail;
use Carbon\Carbon;

class ResellerRegisterController extends Controller
{
    public function register(Request $request)
    {
        Log::info('Register method called.');
        Log::info('Request data: ', $request->all());

        $validated = $request->validate([
            'resellerName' => 'required|string|max:255',
            'gender' => 'required|string',
            'birthday' => 'required|date',
            'province' => 'required|string',
            'storeName' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,user_email',
            'password' => 'required|string|min:8|confirmed',
            'gcashName' => 'required|string|max:255',
            'gcashNumber' => 'required|string|max:20',
            'map' => 'required|string',
            'scheduleDate' => 'required|string',
            'deliverDate' => 'required|string'
        ]);

        Log::info('Validated data: ', $validated);


        $request->session()->put('user_data', [
            'user_email' => $request->email,
            'user_password' => Hash::make($request->password),
            'user_role' => 'reseller',
            'reseller_name' => $request->resellerName,
            'reseller_gender' => $request->gender,
            'reseller_birthday' => $request->birthday,
            'reseller_number' => $request->phone,
            'store_province' => $request->province,
            'store_city' => $request->city,
            'store_barangay' => $request->barangay,
            'store_street' => $request->street,
            'store_gcash_name' => $request->gcashName,
            'store_gcash_number' => $request->gcashNumber,
            'store_name' => $request->storeName,
            'map' => $request->map,
            'schedule_date' => $request->scheduleDate,
            'deliver_date' => $request->deliverDate
        ]);

        $otp = rand(100000, 999999);
        $otpExpiry = Carbon::now()->addMinutes(10);

        $request->session()->put('otp', $otp);
        $request->session()->put('otp_expiry', $otpExpiry);

        $type = 'register';
        Mail::to($request->email)->send(new OTPMail($otp, $type));
        Log::info('OTP sent to email: ' . $request->email);

        return redirect()->route('reseller.register.verify', ['email' => $request->email]);
    }


    public function showVerifyOtpForm(Request $request)
    {
        Log::info('Showing verify OTP form for email: ' . $request->email);
        return view('reseller_register_verification', ['email' => $request->email]);
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

                $reseller = new ResellerInformation;
                $reseller->user_id = $user->user_id;
                $reseller->reseller_name = $userData['reseller_name'];
                $reseller->reseller_gender = $userData['reseller_gender'];
                $reseller->reseller_birthday = $userData['reseller_birthday'];
                $reseller->reseller_number = $userData['reseller_number'];
                $reseller->store_province = $userData['store_province'];
                $reseller->store_city = $userData['store_city'];
                $reseller->store_barangay = $userData['store_barangay'];
                $reseller->store_street = $userData['store_street'];
                $reseller->store_gcash_name = $userData['store_gcash_name'];
                $reseller->store_gcash_number = $userData['store_gcash_number'];
                $reseller->store_name = $userData['store_name'];
                $reseller->store_map = $userData['map'];
                $reseller->store_request_schedule = $userData['schedule_date'];
                $reseller->store_stock_deliver = $userData['deliver_date'];
                $reseller->store_status = 'active'; 
                $reseller->save();

                DB::commit();
                Log::info('Transaction committed');

                $request->session()->forget(['user_data', 'otp', 'otp_expiry']);

                return redirect()->route('reseller.register.success')->with('success');
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


}

