<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Firebase Service Account
    |--------------------------------------------------------------------------
    |
    | Aquí puedes proporcionar la ruta a tu archivo JSON de la cuenta de servicio
    | para que la biblioteca de Firebase pueda autenticar tus solicitudes.
    | La ruta puede ser relativa o absoluta.
    |
    */

    'credentials' => env('FIREBASE_CREDENTIALS_PATH'),
];
