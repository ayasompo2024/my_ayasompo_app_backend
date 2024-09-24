<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\api\ApiResponser;
use Exception;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    use ApiResponser;

    public function index()
    {
        DB::beginTransaction();

        try {
            $users = User::searchQuery()
                ->sortingQuery()
                ->filterQuery()
                ->filterDateQuery()
                ->paginationQuery();

            DB::commit();

            return $this->successResponse('User list is retrived successfully', $users);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
