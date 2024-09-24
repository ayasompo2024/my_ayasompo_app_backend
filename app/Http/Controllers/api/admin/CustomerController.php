<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CustomerUpdateRequest;
use App\Models\Customer;
use App\Traits\api\ApiResponser;
use App\Traits\FileUpload;
use Exception;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    use ApiResponser, FileUpload;

    public function count($type)
    {
        try {
            $customers = Customer::all();

            $counts = [
                'total_onboarding_count' => count($customers->toArray()),
                'total_app_customer_type' => count(collect($customers)->filter(function ($customer) use ($type) {
                    if ($customer['app_customer_type'] === $type) {
                        return $customer;
                    }
                })),

                'total_active' => count(collect($customers)->filter(function ($customer) {
                    if ($customer['is_disabled'] === 0) {
                        return $customer;
                    }
                })),

                'total_pending' => count(collect($customers)->filter(function ($customer) {
                    if ($customer['last_logined_at'] === null || $customer['last_logined_at'] === '') {
                        return $customer;
                    }
                })),
            ];

            return $this->successResponse('Customer static counts are retrived successfully', $counts);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function index($customerType)
    {
        DB::beginTransaction();

        try {
            $customerTypeFilter = [
                'app_customer_type' => $customerType,
            ];

            if ($customerType === 'GROUP') {
                $customerTypeFilter = [
                    'app_customer_type' => $customerType,
                    'user_id' => auth()->user()->id,
                ];
            }

            $customers = Customer::where($customerTypeFilter)
                ->searchQuery()
                ->sortingQuery()
                ->filterQuery()
                ->filterDateQuery()
                ->paginationQuery();

            DB::commit();

            return $this->successResponse('Customer list is retrived successfully', $customers);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function show($id)
    {
        DB::beginTransaction();

        try {
            $customer = Customer::with([
                'core',
                'employeeInfo',
                'agentInfo',
                'accountCodes',
            ])
                ->findOrFail($id);

            DB::commit();

            return $this->successResponse('Customer detail is retrived successfully', $customer);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update(CustomerUpdateRequest $request, $id)
    {
        $payload = collect($request->validated());
        DB::beginTransaction();

        try {
            $customer = Customer::findOrFail($id);

            if (isset($payload['profile_photo'])) {
                $fileName = $this->uploadFile($payload['profile_photo'], '/uploads/profile/', 'aya_sompo_');
                $payload['profile_photo'] = $fileName;
            }

            $customer->update($payload->toArray());
            DB::commit();

            return $this->successResponse('Customer record is updated successfully', $customer);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $customer = Customer::findOrFail($id);
            $customer->delete();

            DB::commit();

            return $this->successResponse('Customer record is deleted successfully', $customer);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
