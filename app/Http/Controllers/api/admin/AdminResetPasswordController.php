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
use Illuminate\Support\Facades\DB;
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
            $resetPasswordPayload['hash_password'] = Hash::make($resetPasswordPayload['password']);
            $resetPasswordPayload['customer_id'] = $customer->id;
            $resetPasswordPayload['customer_type'] = $customer->app_customer_type;
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
}
