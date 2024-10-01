<?php

namespace App\Repositories;

use App\Enums\NotiFor;
use App\Models\Messaging;
use Carbon\Carbon;

class MessagingRepository
{
    public static function getWithPaginate($perpage)
    {
        return Messaging::query()->with('customer')->orderByDesc('id')->paginate($perpage);
    }

    public static function store($input)
    {
        return Messaging::create($input);
    }

    public static function getPromotionAndSystemNoti()
    {
        $threeMonthsAgo = Carbon::now()->subMonths(3);

        return Messaging::where('noti_for', '!=', NotiFor::TRANSACTION->value)
            ->whereBetween('created_at', [$threeMonthsAgo, now()])
            ->get();
    }

    public static function getByCustomerID($per_page, $c_id)
    {
        return Messaging::where('customer_id', $c_id)->orderByDesc('id')->paginate($per_page);
    }
}
