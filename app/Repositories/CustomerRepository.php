<?php
namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{

    static function getWithPaginate($per_page)
    {
        return Customer::query()->with('core')->orderByDesc('id')->paginate($per_page);
    }

    static function getOnlyIndividual($per_page)
    {
        return Customer::individual()->with('core')->orderByDesc('id')->paginate($per_page);
    }
    static function getOnlyGroup($per_page)
    {
        return Customer::group()->with('core')->orderByDesc('id')->paginate($per_page);
    }
    static function getOnlyEmployee($per_page)
    {
        return Customer::emloyee()->with('core')->orderByDesc('id')->paginate($per_page);
    }
    static function getOnlyAgent($per_page)
    {
        return Customer::agent()->with('core')->orderByDesc('id')->paginate($per_page);
    }
    
    static function toggleDisabledById($id)
    {
        $customer = Customer::where('id', $id)->first();
        if (!$customer)
            return false;
        return $customer->update(['is_disabled' => !$customer->is_disabled]);
    }

    static function destroy($id)
    {
        return Customer::destroy($id);
    }
    static function store(array $input)
    {
        return Customer::create($input);
    }
    static function disabledProfile($user_id)
    {
        return Customer::find($user_id)->update(
            ['is_disabled' => 1]
        );
    }
    static function getById(int $id)
    {
        return Customer::with('core')->find($id);
    }
    static function getByPhone($phone)
    {
        return Customer::query()->with('core')->whereCustomer_phoneno($phone)->first();
    }
    static function getAllByPhone($phone)
    {
        return Customer::query()->select('id', 'customer_code', 'customer_phoneno', 'user_name', 'app_customer_type')->whereCustomer_phoneno($phone)->get();
    }
    static function getAllCustomerByPhone($phone)
    {
        return Customer::query()->where("customer_phoneno", $phone)->paginate(30);
    }
    static function searchCustomerByPhone($phone)
    {
        return Customer::query()
            ->where('customer_phoneno', 'like', '%' . $phone . '%')
            ->paginate(30);
    }
    static function update($customer_id, $input)
    {
        return Customer::find($customer_id)->update($input);
    }

    static function getAllByProvidedPhone($phone)
    {
        return Customer::where('customer_phoneno', $phone)->get();
    }

    static function getByPhoneWhereINDIVIDUAL($phone)
    {
        return Customer::query()->where("app_customer_type", "INDIVIDUAL")->whereCustomer_phoneno($phone)->first();
    }

    static function isExistCustomerAsEmplyeeProfile($phone)
    {
        $isExist = Customer::where('customer_phoneno', $phone)->where('app_customer_type', 'EMPLOYEE')->first();

        if ($isExist)
            return true;
        else
            return false;

    }

}

