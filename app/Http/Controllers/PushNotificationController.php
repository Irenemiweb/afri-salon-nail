<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\TestPushNotification;
use App\Services\FirebaseService;

class PushNotificationController extends Controller
{
  public function guardarToken(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
        ]);

        $user = auth()->user();
        $user->device_token = $request->token;
        $user->save();

        return response()->json(['message' => 'Token guardado']);
    }

   public function enviarNotificacion(Request $request, FirebaseService $firebase)
{
    $user = auth()->user();

    if ($user->device_token) {
        try {
            $firebase->sendPushNotification(
                $user->device_token,
                '¡Hola desde Afri nail art studio!',
                'Esta es una notificación enviada con Admin SDK.'
            );

            return response()->json(['message' => 'Notificación enviada']);
        } catch (\Exception $e) {
            \Log::error('Error al enviar notificación: ' . $e->getMessage());
            return response()->json(['error' => 'Error al enviar notificación'], 500);
        }
    }

    return response()->json(['error' => 'Usuario sin token'], 400);
}
}
