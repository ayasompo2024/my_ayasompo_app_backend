<?php
namespace App\Repositories;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
class SettingRepository
{
    static function getAll(){
        $value = Cache::remember('SETTING_DATA', null, function () {
            return Setting::all();
        });
        return $value;
    }
    static function update($id,$input){
        $setting =  Setting::find($id);
        $setting->update($input);
        return $setting->refresh();
    }
    static function getByKey($key){
         return Setting::where('key',$key)->get();
    }
}



