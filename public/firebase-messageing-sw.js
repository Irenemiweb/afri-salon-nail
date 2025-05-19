importScripts('https://www.gstatic.com/firebasejs/10.11.0/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/10.11.0/firebase-messaging-compat.js');

firebase.initializeApp({
  apiKey: "AIzaSyBRXcn8SJNUTTNRHasOzzDv0fdC1QOYWc8",
  authDomain: "afri-nail-art-studio.firebaseapp.com",
  projectId: "afri-nail-art-studio",
  storageBucket: "afri-nail-art-studio.firebasestorage.app",
  messagingSenderId: "1054817594063",
  appId: "1:1054817594063:web:091c3b6fc44785d9b5e5ba",
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
  self.registration.showNotification(payload.notification.title, {
    body: payload.notification.body,
     icon: payload.data?.icon || 'https://cdn-icons-png.flaticon.com/512/25/25231.png'
  });
});
