<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
class AdminAccountController extends Controller
{
    public function index()
    {
        $users =  User::paginate(30);
        return view('admin.admin-accounnt.index')->with('users', $users);
    }

    function disabledToggle($id){
        $user =  User::find($id);
        $user->update([
            'status' => !$user->status
        ]);
        return $user ? back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }
}