<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\NotificationStoreRequest;
use App\Models\Messaging;
use App\Services\FirebaseService;
use App\Traits\api\ApiResponser;
use App\Traits\FileUpload;
use Exception;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    use ApiResponser, FileUpload;

    public function store(NotificationStoreRequest $request, FirebaseService $firebaseService)
    {
        $payload = collect($request->validated());
        $payload['multicast_uid'] = uniqid();

        $customers = json_decode($payload['customers']);

        if (isset($payload['image_url'])) {
            $fileName = $this->uploadFile($payload['image_url'], '/uploads/noti/', prefix: 'aya_sompo_');
            $payload['image_url'] = $fileName;
        }

        DB::beginTransaction();

        try {
            collect($customers)->map(function ($customer) use ($payload, $firebaseService) {

                $payload['customer_id'] = $customer->user_id;
                $payload['device_token'] = $customer->device_token;

                try {
                    $firebaseService->sendNotification($customer->device_token, $payload['title'], $payload['message'], []);
                    $payload['status'] = 'SUCCESS';
                } catch (Exception $e) {
                    $payload['status'] = 'FAIL';
                    throw $e;
                }

                Messaging::create($payload->toArray());
                DB::commit();
            });

            return $this->successResponse('Messaging is send successfully', null);
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
