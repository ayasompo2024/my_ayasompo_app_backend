<?php
namespace App\Services\common;

use App\Models\Customer;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use App\Models\SearchHistory;
use App\Models\ServiceItem;
use App\Models\Shop;

class UtilityService
{


    public function numberOfCustomers()
    {
        return Customer::count();
    }
    public function numberOfShops()
    {
        return Shop::count();
    }
    public function pendingShops()
    {
        return Shop::pendingShops();
    }
    public function approvedShops()
    {
        return Shop::approvedShops();
    }

    public function numberOfMenusItems()
    {
        return MenuItem::count();
    }
    public function numberOfMenuCategoires()
    {
        return MenuCategory::count();

    }
    public function numberOfServiceItems()
    {
        return ServiceItem::count();

    }
    public function numberOfSearchs()
    {
        return SearchHistory::count();
    }
    public function ToDayCustomers()
    {
        return Customer::towDayCustomers();

    }




}