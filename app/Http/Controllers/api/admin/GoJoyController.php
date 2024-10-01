<?php

namespace App\Http\Controllers\api\admin;

use App\Enums\GeneralStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\GoJoyUpdateRequest;
use App\Models\GoJoy;
use App\Traits\api\ApiResponser;
use Exception;
use Illuminate\Support\Facades\DB;

class GoJoyController extends Controller
{
    use ApiResponser;

    public function index()
    {
        DB::beginTransaction();

        try {
            $gojoys = GoJoy::searchQuery()
                ->sortingQuery()
                ->filterQuery()
                ->filterDateQuery()
                ->paginationQuery();

            DB::commit();

            return $this->successResponse('Gojoy list is retrived successfully', $gojoys);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function show($id)
    {
        DB::beginTransaction();

        try {
            $gojoy = GoJoy::findOrFail($id);
            DB::commit();

            return $this->successResponse('Gojoy detail is retrived successfully', $gojoy);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update(GoJoyUpdateRequest $request, $id)
    {
        $payload = collect($request->validated());
        DB::beginTransaction();

        try {
            $gojoy = GoJoy::findOrFail($id);
            $gojoy->update($payload->toArray());
            DB::commit();

            return $this->successResponse('Gojoy record is updated successfully', $gojoy);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $gojoy = GoJoy::findOrFail($id);
            $payload['status'] = GeneralStatusEnum::DELETED->value;
            $gojoy->update($payload);
            $gojoy->delete();
            DB::commit();

            return $this->successResponse('Gojoy record is deleted successfully', $gojoy);
        } catch (Exception $e) {
            throw $e;
        }
    }
}
