<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;

class FirebaseService
{
    protected $messaging;

    public function __construct()
    {
       $factory = (new Factory)->withServiceAccount(base_path(config('firebase.credentials')));
        $this->messaging = $factory->createMessaging();
    }

    public function sendPushNotification(string $deviceToken, string $title, string $body)
    {
       $message = CloudMessage::withTarget('token', $deviceToken)
    ->withNotification(Notification::create($title, $body))
    ->withData([
        'icon' => 'https://cdn-icons-png.flaticon.com/512/25/25231.png',
    ]);

        return $this->messaging->send($message);
    }
}
