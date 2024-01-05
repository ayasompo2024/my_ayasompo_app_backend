<?php
namespace App\Repositories;

use App\Enums\NotiFor;

use App\Models\Messaging;
use Carbon\Carbon;



class MessagingRepository
{
    static function getWithPaginate($perpage)
    {
        return Messaging::query()->with('customer')->orderByDesc('id')->paginate($perpage);
    }
    static function store($input)
    {
        return Messaging::create($input);
    }
    static function getPromotionAndSystemNoti()
    {
        $threeMonthsAgo = Carbon::now()->subMonths(3);
        return Messaging::where("noti_for", "!=", NotiFor::TRANSACTION->value)
            ->whereBetween('created_at', [$threeMonthsAgo, now()])
            ->get();
    }

}