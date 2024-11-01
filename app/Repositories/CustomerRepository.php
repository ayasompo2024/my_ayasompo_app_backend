<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public static function filterByType($type, $per_page)
    {
        return Customer::where('app_customer_type', $type)->orderByDesc('id')->paginate($per_page);
    }

    public static function getWithPaginate($per_page)
    {
        return Customer::select('created_at', 'policy_number', 'id', 'customer_code', 'customer_phoneno', 'user_name', 'app_customer_type', 'is_disabled', 'profile_photo')->with('employeeInfo:id,customer_id,code,designation,department')->with('core:id,app_customer_id,customer_code')->orderByDesc('id')->paginate($per_page);
    }

    public static function getOnlyIndividual($per_page)
    {
        return Customer::individual()->with('core')->orderByDesc('id')->paginate($per_page);
    }

    public static function getOnlyGroup($per_page)
    {
        return Customer::group()->with('core')->orderByDesc('id')->paginate($per_page);
    }

    public static function getOnlyEmployee($per_page)
    {
        return Customer::emloyee()->with('core')->orderByDesc('id')->paginate($per_page);
    }

    public static function getOnlyAgent($per_page)
    {
        return Customer::agent()->with('core')->orderByDesc('id')->paginate($per_page);
    }

    public static function toggleDisabledById($id)
    {
        $customer = Customer::where('id', $id)->first();
        if (! $customer) {
            return false;
        }

        return $customer->update(['is_disabled' => ! $customer->is_disabled]);
    }

    public static function destroy($id)
    {
        return Customer::destroy($id);
    }

    public static function store(array $input)
    {
        return Customer::create($input);
    }

    public static function disabledProfile($user_id)
    {
        return Customer::find($user_id)->update(
            ['is_disabled' => 1]
        );
    }

    public static function getById(int $id)
    {
        return Customer::with('core')->find($id);
    }

    public static function getByPhone($phone)
    {
        return Customer::query()->with('core')->whereCustomer_phoneno($phone)->first();
    }

    public static function getAllByPhone($phone)
    {
        return Customer::query()->select('id', 'customer_code', 'customer_phoneno', 'user_name', 'app_customer_type')->whereCustomer_phoneno($phone)->get();
    }

    public static function getAllCustomerByPhone($phone)
    {
        return Customer::query()->where('customer_phoneno', $phone)->paginate(30);
    }

    public static function searchCustomerByPhone($phone)
    {
        return Customer::query()
            ->where('customer_phoneno', 'like', '%'.$phone.'%')
            ->paginate(30);
    }

    public static function update($customer_id, $input)
    {
        return Customer::find($customer_id)->update($input);
    }

    public static function getAllByProvidedPhone($phone)
    {
        return Customer::with('employeeInfo')->where('customer_phoneno', $phone)->get();
    }

    public static function getByPhoneWhereINDIVIDUAL($phone)
    {
        return Customer::query()->where('app_customer_type', 'INDIVIDUAL')->whereCustomer_phoneno($phone)->first();
    }

    public static function isExistCustomerAsEmplyeeProfile($phone)
    {
        $isExist = Customer::where('customer_phoneno', $phone)->where('app_customer_type', 'EMPLOYEE')->first();

        if ($isExist) {
            return true;
        } else {
            return false;
        }

    }

    public static function isExistCustomerAsRiskProfile($phone)
    {
        $isExist = Customer::where('customer_phoneno', $phone)->where('app_customer_type', 'GROUP')->first();

        if ($isExist) {
            return true;
        } else {
            return false;
        }

    }

    public static function isExistCustomerAsAgentProfile($phone)
    {
        $isExist = Customer::where('customer_phoneno', $phone)->where('app_customer_type', 'AGENT')->first();

        if ($isExist) {
            return true;
        } else {
            return false;
        }

    }

    public static function getFirstProfile($phone)
    {
        return Customer::where('customer_phoneno', $phone)->first();
    }
}
