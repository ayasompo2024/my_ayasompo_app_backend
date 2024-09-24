<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingController extends Controller
{
    public function index()
    {
        $settings = SettingRepository::getAll();
        return view('admin.settings.index', compact('settings'));
    }
    public function update($id, Request $req)
    {
        $req->validate(['value' => 'required']);
        $input = ["current_value" => $req->value];
        $status = SettingRepository::update($id, $input);
        Cache::forget('SETTING_DATA');
        return $status ? back()->with('success', 'Success') :
            back()->with('fail', 'fail');
    }

    function downloadFile($filename)
    {
        $filePath = storage_path($filename);
        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return response()->json(['error' => 'File not found.'], 404);
        }
    }
}