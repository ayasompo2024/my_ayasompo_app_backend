<?php

namespace App\Http\Controllers\api\app;

use App\Enums\GeneralStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\app\AppGoJoyStoreRequest;
use App\Http\Requests\api\app\AppGoJoyUpdateRequest;
use App\Models\GoJoy;
use App\Traits\api\ApiResponser;
use Exception;
use Illuminate\Support\Facades\DB;

class AppGoJoyController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $auth = auth();

        DB::beginTransaction();

        try {
            $gojoys = GoJoy::where(['customer_id' => $auth->id()])
                ->searchQuery()
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

    public function store(AppGoJoyStoreRequest $request)
    {
        $payload = collect($request->validated());
        $auth = auth();
        DB::beginTransaction();

        try {
            $payload['customer_id'] = $auth->id();
            $payload['status'] = GeneralStatusEnum::ACITVE->value;

            $gojoy = GoJoy::create($payload->toArray());
            DB::commit();

            return $this->successResponse('Gojoy record is created successfully', $gojoy);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function show($id)
    {
        DB::beginTransaction();
        $auth = auth();
        try {
            $gojoy = GoJoy::where([
                'customer_id' => $auth->id(),
                'id' => $id,
            ])->first();
            DB::commit();

            return $this->successResponse('Gojoy detail is retrived successfully', $gojoy);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update(AppGoJoyUpdateRequest $request, $id)
    {
        $payload = collect($request->validated());
        $auth = auth();

        DB::beginTransaction();

        try {
            $gojoy = GoJoy::where([
                'customer_id' => $auth->id(),
                'id' => $id,
            ])->first();

            $gojoy->update($payload->toArray());
            DB::commit();

            return $this->successResponse('Gojoy record is updated successfully', $gojoy);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
