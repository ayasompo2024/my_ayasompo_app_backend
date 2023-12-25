<?php
namespace App\Services;

use App\Repositories\CustomerRepository;

use App\Enums\MessagingType;
use App\Repositories\MessagingRepository;
use App\Traits\SendPushNotification;

use App\Traits\FileUpload;

class MessagingService
{
    use SendPushNotification;
    use FileUpload;
    function unicast($request)
    {
        $customer = CustomerRepository::getById($request->customer_id);
        $data = ["title" => $request->title, "body" => $request->message];
        $notification = ["title" => $request->title, "body" => $request->message];
        $this->sendAsUnicast($customer->device_token, $data, $notification);
        $input = $request->only('title', 'message', 'type', 'customer_id');
        $input['type'] = MessagingType::UNICAST->value;
        return MessagingRepository::store($input);
    }
    function broadcast($request)
    {
        dd($request->file("image"));
        $data = ["title" => $request->title, "body" => $request->message];
        $notification = ["title" => $request->title, "body" => $request->message];

        // $this->sendAsbroadcast($notification, $data);
        $input = $request->only('noti_for', 'title', 'message', 'description');
        if ($request->image)
            $input['image_url'] = $this->uploadFile($request->image, '/uploads/noti/', 'ayasompo');
        $input['type'] = MessagingType::BROADCAST->value;
        return MessagingRepository::store($input);
    }

    function histories($per_page)
    {
        return MessagingRepository::getWithPaginate($per_page);
    }
}
