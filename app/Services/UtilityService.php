<?php
namespace App\Services;

use Illuminate\Support\Carbon;
use App\Models\Customer;


class UtilityService
{
    function countTotalCustomer()
    {
        return Customer::count();
    }

    function currentMonthChart()
    {
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $recordsForLastMonth = Customer::select(\DB::raw('DATE(created_at) as date'), \DB::raw('count(*) as count'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy(\DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();
        $allDaysOfMonth = Carbon::now()->daysInMonth;
        $daysArray = [];
        for ($day = 1; $day <= $allDaysOfMonth; $day++) {
            $daysArray[] = $startDate->copy()->addDays($day - 1)->format('Y-m-d');
        }
        
        return collect($daysArray)->map(function ($day) use ($recordsForLastMonth) {
            $record = $recordsForLastMonth->where('date', $day)->first();
            return [
                'date' => $day,
                'count' => $record ? $record->count : 0,
            ];
        });
    }

    function userType()
    {
        $data = Customer::select('app_customer_type', \DB::raw('COUNT(*) as total'))
            ->groupBy('app_customer_type')
            ->get();

        $pieChartData = [];
        foreach ($data as $item) {
            $pieChartData[] = [
                'label' => $item->app_customer_type,
                'value' => $item->total
            ];
        }
        return $pieChartData;
    }

}

