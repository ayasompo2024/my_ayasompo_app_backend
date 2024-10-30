<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\TermAndConditionStoreRequest;
use App\Http\Requests\admin\TermAndConditionUpdateRequest;
use App\Models\TermAndCondition;
use App\Traits\api\ApiResponser;
use Exception;
use Illuminate\Support\Facades\DB;

class TermAndConditionController extends Controller
{
    use ApiResponser;

    public function index()
    {
        DB::beginTransaction();

        try {
            $termAndConditions = TermAndCondition::searchQuery()
                ->sortingQuery()
                ->filterQuery()
                ->filterDateQuery()
                ->paginationQuery();

            DB::commit();

            return $this->successResponse('Term and condition list is retrived successfully', $termAndConditions);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function store(TermAndConditionStoreRequest $request)
    {
        $payload = collect($request->validated());
        DB::beginTransaction();

        try {
            $termAndCondition = TermAndCondition::store($payload->toArray());
            DB::commit();

            return $this->successResponse('Term and condition record is create successfully', $termAndCondition);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function show($id)
    {
        DB::beginTransaction();

        try {
            $termAndCondition = TermAndCondition::findOrFail($id);
            DB::commit();

            return $this->successResponse('Term and condition detail is retrived successfully', $termAndCondition);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update(TermAndConditionUpdateRequest $request, $id)
    {
        $payload = collect($request->validated());
        DB::beginTransaction();

        try {
            $termAndCondition = TermAndCondition::findOrFail($id);
            $termAndCondition->update($payload->toArray());
            DB::commit();

            return $this->successResponse('Term and condition record is updated successfully', $termAndCondition);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $termAndCondition = TermAndCondition::findOrFail($id);
            $termAndCondition->delete();
            DB::commit();

            return $this->successResponse('Term and condition record is deleted successfully', $termAndCondition);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
