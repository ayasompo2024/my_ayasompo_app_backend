<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class FirebaseService
{
    protected $messaging;

    public function __construct()
    {
        $serviceAccountPath = base_path('hipo-mobile-firebase-adminsdk-i2y4o-55d6d6c5ad.json');

        $factory = (new Factory)->withServiceAccount($serviceAccountPath);
        $this->messaging = $factory->createMessaging();
    }

    /**
     * Send push notification
     *
     * @param  string  $token  The FCM device token
     * @param  string  $title  The notification title
     * @param  string  $body  The notification body
     * @param  array  $data  Optional data payload
     * @return bool
     */
    public function sendNotification($token, $title, $body, $imageUrl = null, $data = [])
    {

        $message = CloudMessage::withTarget('token', $token)
            ->withNotification([
                'title' => $title,
                'body' => $body,
                'imageUrl' => $imageUrl,
            ])
            ->withData($data); // Optional custom data

        try {
            $this->messaging->send($message);

            return true;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
