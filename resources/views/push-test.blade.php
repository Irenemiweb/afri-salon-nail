<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Prueba de Notificaciones Push</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- icono --}}
<link style="" sizes="512x512" rel="icon" type="image/svg" href="{{ asset('storage/cabecera/logo_CC.svg') }}">
        <!-- Favicons -->
  <link href="{{ asset('storage/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('storage/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <meta name="theme-color" content="#cef1ea">
    <!-- Tu head existente -->
    <link rel="manifest" href="manifest.json">
</head>
<body>
  <h1>Notificaciones Push con Laravel y Firebase</h1>

  <button id="enable-push">Habilitar notificaciones</button>
  <button id="send-push">Enviar notificación de prueba</button>

  <!-- Firebase SDK -->
  <script src="https://www.gstatic.com/firebasejs/10.11.0/firebase-app-compat.js"></script>
  <script src="https://www.gstatic.com/firebasejs/10.11.0/firebase-messaging-compat.js"></script>

  <script>
    // Configuración de Firebase
    const firebaseConfig = {
      apiKey: "AIzaSyBRXcn8SJNUTTNRHasOzzDv0fdC1QOYWc8",
      authDomain: "afri-nail-art-studio.firebaseapp.com",
      projectId: "afri-nail-art-studio",
      storageBucket: "afri-nail-art-studio.firebasestorage.app",
      messagingSenderId: "1054817594063",
      appId: "1:1054817594063:web:091c3b6fc44785d9b5e5ba",
      measurementId: "G-CQWNT1XY46"
    };

    firebase.initializeApp(firebaseConfig);
    const messaging = firebase.messaging();

    document.getElementById('enable-push').addEventListener('click', async () => {
      try {
        const permission = await Notification.requestPermission();
        if (permission === 'granted') {

         const registration = await navigator.serviceWorker.register('firebase-messageing-sw.js');

            // Espera a que el service worker esté activo antes de pedir el token
            await navigator.serviceWorker.ready;

            const token = await messaging.getToken({
            vapidKey: 'BMf0y95ISDhk4Ga1JTGFR7zuLOK_C-M0aPtnQHB5qQF36zTAbzlIlWAq6jUs6gtkKp5fbLxKEXfToOYa4L7s-34',
            serviceWorkerRegistration: registration
            });


          console.log("Token FCM:", token);

          await fetch('guardar-device-token', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ token })
          });

          alert('Token guardado correctamente');
        } else {
          alert('Permiso denegado para notificaciones');
        }
      } catch (error) {
        console.error('Error al obtener el token:', error);
      }
    });

    document.getElementById('send-push').addEventListener('click', () => {
      fetch('enviar-notificacion', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      });
    });

    // Mostrar notificaciones si la app está abierta
    messaging.onMessage((payload) => {
      console.log('Mensaje recibido:', payload);
      new Notification(payload.notification.title, {
        body: payload.notification.body
      });
    });
  </script>
</body>
</html>
