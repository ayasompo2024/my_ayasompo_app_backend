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
        $data = ["title" => $request->title, "body" => $request->message];
        $notification = ["title" => $request->title, "body" => $request->message];

        $this->sendAsbroadcast($notification, $data);
        $input = $request->only('title', 'message', 'noti_for', 'description');
        if ($request->image)
            $input['image_url'] = $this->uploadFile($request->file("image"), '/uploads/noti/', 'ayasompo');
        $input['type'] = MessagingType::BROADCAST->value;
        return MessagingRepository::store($input);
    }

    function multicast($request)
    {
        $data = ["title" => $request->title, "body" => $request->message];
        $notification = ["title" => $request->title, "body" => $request->message];

        $customer_array = explode(",", $request->customer_ids);

        $input = $request->only('title', 'message', 'noti_for', 'description');
        if ($request->image)
            $input['image_url'] = $this->uploadFile($request->file("image"), '/uploads/noti/', 'ayasompo');
        $input['type'] = MessagingType::MULTICAST->value;
        $input["multicast_uid"] = uniqid();

        foreach ($customer_array as $customer) {
            $customer = CustomerRepository::getById($customer);
            $this->sendAsUnicast($customer->device_token, $data, $notification);
            $input["customer_id"] = $customer->id;
            return MessagingRepository::store($input);
        }

    }
    function histories($per_page)
    {
        return MessagingRepository::getWithPaginate($per_page);
    }
    function getByCustomerID($per_page, $id)
    {
        return MessagingRepository::getByCustomerID($per_page, $id);
    }
}

