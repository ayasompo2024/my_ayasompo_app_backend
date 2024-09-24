<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminAccountController extends Controller
{

    public function index(Role $role)
    {
        $users = User::paginate(30);
        $roles = $role->orderByDesc("id")->get();
        return view('admin.admin-accounnt.index')->with('users', $users)->with('roles',$roles);
    }

    public function edit($id, User $user,Role $role)
    {
        $roles = $role->orderByDesc("id")->get();
        return view('admin.admin-accounnt.edit')->with(['account' => $user->find($id),'roles'=> $roles]);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'role' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::find($id);
        $user->update([
            'role' => $validatedData['role'],
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => isset($validatedData['password']) ? bcrypt($validatedData['password']) : $user->password,
        ]);
        return redirect()->route('admin.account.index')->with('success', 'User updated successfully.');
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