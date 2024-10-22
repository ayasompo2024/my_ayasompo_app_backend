<?php

namespace App\Http\Controllers\api\admin;

use App\Enums\SMSStatusTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ResetPasswordByAdminReqeust;
use App\Models\Customer;
use App\Models\ResetPassword;
use App\Traits\api\ApiResponser;
use Exception;
use Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Str;

class AdminResetPasswordController extends Controller
{
    use ApiResponser;

    public function index($id)
    {
        try {
            $resetPasswords = ResetPassword::where(['customer_id' => $id])
                ->searchQuery()
                ->sortingQuery()
                ->filterQuery()
                ->filterDateQuery()
                ->paginationQuery();

            return $this->successResponse('Customer reset password list is retrived successfully', $resetPasswords);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function customerResetPassword(ResetPasswordByAdminReqeust $request)
    {
        $payload = collect($request->validated());

        DB::beginTransaction();

        try {
            $customer = Customer::findOrFail($payload['customer_id']);

            ResetPassword::where([
                'customer_id' => $payload['customer_id'],
                'sms_status' => SMSStatusTypeEnum::PENDING->value,
            ])
                ->update([
                    'sms_status' => SMSStatusTypeEnum::EXPIRED->value,
                ]);

            $resetPasswordPayload['password'] = Str::random(6);
            $resetPasswordPayload['phone_no'] = $customer->customer_phoneno;
            $resetPasswordPayload['hash_password'] = Hash::make($resetPasswordPayload['password']);
            $resetPasswordPayload['customer_id'] = $customer->id;
            $resetPasswordPayload['customer_type'] = $customer->app_customer_type;
            $resetPasswordPayload['customer_name'] = $customer->user_name;
            $resetPasswordPayload['sms_status'] = SMSStatusTypeEnum::PENDING->value;

            $customer->update([
                'password' => $resetPasswordPayload['hash_password'],
            ]);

            ResetPassword::create($resetPasswordPayload);

            DB::commit();

            return $this->successResponse('Customer password is successfully reset', $resetPasswordPayload);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

    }

    public function sendResetPassword($id)
    {
        DB::beginTransaction();

        try {
            $end_point = config('app.ayasompo_base_url').'sms/sendsms';
            $token = Cache::get('token_for_internal');

            $payload = ResetPassword::findOrFail($id);
            $phoneNumber = $payload['phone_no'];
            $username = $payload['customer_name'];
            $password = $payload['password'];

            $content = "$username,
Welcome to MY AYASOMPO App! We're thrilled to have you on board. Explore our features, enjoy exclusive privileges, and make the most out of your experience. Here are your login details:  
            
Phone no : $phoneNumber. 
Password : $password  
            
If you haven't downloaded the 'My AYASOMPO' App yet, use the links below to get started: 
            
For Android - https://play.google.com/store/apps/details?id=com.ml.ayasompo 
For iOS - https://apps.apple.com/us/app/my-ayasompo/id6475663317";

            $requestBody = [
                'phoneNumber' => '09421038123',
                'message' => $content,
                'username' => $username,
            ];
            $headers = [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ];

            $response = Http::withHeaders($headers)->post($end_point, $requestBody);

            if ($response->successful()) {
                ResetPassword::where(['id' => $id])->update(['sms_status' => SMSStatusTypeEnum::SUCCESS->value]);
                DB::commit();

                return $this->successResponse('Reset password is send successfully', null, 201);
            } else {
                ResetPassword::where(['id' => $id])->update(['sms_status' => SMSStatusTypeEnum::FAIL->value]);
                DB::commit();
            }

        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
