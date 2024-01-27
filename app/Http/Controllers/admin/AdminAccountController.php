<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends Controller
{

    public function index()
    {
        $users = User::paginate(30);
        return view('admin.admin-accounnt.index')->with('users', $users);
    }

    function disabledToggle($id)
    {
        $user = User::find($id);
        $user->update([
            'status' => !$user->status
        ]);
        return $user ? back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'max:255'],
        ]);
        $user = $this->create($request);
        return $user ? back()->with(['success' => 'Successfully!']) :
            back()->with(['fail' => 'Fail']);
    }
    private function create($request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
    }
}