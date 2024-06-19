<?php

namespace App\Http\Controllers\admin\iam;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class IAMController extends Controller
{
    function roles(Role $role)
    {
        return view('admin.iam.roles')->with(['roles' => $role->with('admin')->orderByDesc("id")->get()]);
    }
    function newRole(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);
        $role->create($request->only("name"));
        return back()->with("success", "Success");
    }

    function showPermission($id, Role $role, Permission $permission)
    {
        $old_permissions = $permission->where("role_id", $id)->get();
        return view('admin.iam.permission')->with(
            [
                'permissions' => config('menu'),
                "role" => $role->find($id),
                'old_permissions' => $old_permissions
            ]
        );
    }
    function addPermissionToRole(Request $request, $id, Role $role, Permission $permission)
    {
        $user_id = $request->user()->id;
        $permission->where('role_id', $id)->where('user_id',$user_id)->delete();
        foreach ($request->permissions as $item) {
            $permission->create([
                'user_id' => $user_id,
                'role_id' => $id,
                'route' => $item,
            ]);
        }
        return redirect()->route('admin.iam.roles')->with('success', 'Success');
    }

}
