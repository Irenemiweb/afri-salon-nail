<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Fcm\FcmChannel;
use NotificationChannels\Fcm\FcmMessage;
use NotificationChannels\Fcm\Resources\Notification as FcmNotification;

class TestPushNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return [FcmChannel::class];
    }

    public function toFcm($notifiable)
    {
         \Log::info('Construyendo mensaje FCM');
        return FcmMessage::create()
            ->setNotification(FcmNotification::create()
                ->setTitle('¡Hola desde Laravel!')
                ->setBody('Esta es una notificación de prueba.'));
    }
}
