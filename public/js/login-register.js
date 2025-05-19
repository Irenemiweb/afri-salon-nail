// if (window.location.pathname.includes("/login")) {
//     const get = elem => document.getElementById(elem),
// 					 registerButton = get('register'),
// 					 loginButton = get('login'),
// 					 container = get('container_login_register')

// registerButton.onclick = () => {
// 					 container.className = "active"
// }

// loginButton.onclick = () => {
// 						container.className = "close"
// }
// //poner letras en verde si coincide con password
// const passwordInput = document.getElementById('password');
// const confirmPasswordInput = document.getElementById('confirm-password');

// // Función para verificar si las contraseñas coinciden
// const validatePasswords = () => {
//     if (confirmPasswordInput.value === passwordInput.value && confirmPasswordInput.value !=='') {
//         confirmPasswordInput.classList.remove('invalid');
//         confirmPasswordInput.classList.add('valid');
//         passwordInput.classList.remove('invalid');
//         passwordInput.classList.add('valid');
//     } else if(confirmPasswordInput.value !== passwordInput.value && confirmPasswordInput.value !=='') {
//         confirmPasswordInput.classList.remove('valid');
//         confirmPasswordInput.classList.add('invalid');
//         passwordInput.classList.remove('valid');
//         passwordInput.classList.add('invalid');
//     }else if(confirmPasswordInput.value ==='' && passwordInput.value === ''){
//         confirmPasswordInput.classList.remove('valid');
//         confirmPasswordInput.classList.remove('invalid');
//         passwordInput.classList.remove('valid');
//         passwordInput.classList.remove('invalid');
//     }else if(passwordInput.value ===''){
//         passwordInput.classList.add('invalid');
//     }
// };

// // Escuchar eventos de entrada en ambos campos
// passwordInput.addEventListener('input', validatePasswords);
// confirmPasswordInput.addEventListener('input', validatePasswords);

// //desavilitar boton hasta aceptar condiciones
// // Seleccionar elementos del DOM
// const termsCheckbox = document.getElementById('terms');
// const registerButtonn = document.getElementById('button-login-register33');
// const errorMessage = document.getElementById('error-message');

// // Función para verificar el estado del checkbox
// const validateCheckbox = () => {
//     if (termsCheckbox.checked) {
//         registerButtonn.removeAttribute('disabled');
//         registerButtonn.classList.add('enabled');
//         errorMessage.classList.remove('visible');
//         errorMessage.classList.add('hidden');
//     } else {
//         registerButtonn.setAttribute('disabled', 'true');
//         registerButtonn.classList.remove('enabled');
//         errorMessage.classList.add('hidden'); // Asegura que esté oculto cuando no esté hover
//     }
// };

// // Añadir event listener al checkbox
// termsCheckbox.addEventListener('change', validateCheckbox);

// // Mostrar mensaje de error al hover sobre el botón si el checkbox no está marcado
// registerButtonn.addEventListener('mouseenter', () => {

//     if (!termsCheckbox.checked) {
//         console.log("no está marcado");
//         errorMessage.classList.add('visible');
//         errorMessage.classList.remove('hidden');
//     }else{
//         console.log("si esta marcado");
//     }
// });

// // Ocultar mensaje de error cuando se deja de hacer hover sobre el botón
// registerButtonn.addEventListener('mouseleave', () => {
//     errorMessage.classList.remove('visible');
//     errorMessage.classList.add('hidden');
// });

// // Validación adicional al intentar enviar el formulario
// document.getElementById('registerForm').addEventListener('submit', (event) => {
//     if (!termsCheckbox.checked) {
//         errorMessage.classList.add('visible');
//         errorMessage.classList.remove('hidden');
//         event.preventDefault(); // Evitar envío del formulario
//     }
// });

// //ojos para ver contraseña
// const togglePasswordIcons = document.querySelectorAll('.toggle-password');

// togglePasswordIcons.forEach(icon => {
//     icon.addEventListener('click', () => {
//         // Obtén el input al que se refiere el ícono
//         const passwordInput = document.querySelector(icon.getAttribute('data-toggle'));
//         // Alterna el tipo de input entre 'password' y 'text'
//         if (passwordInput.type === 'password') {
//             passwordInput.type = 'text';
//             icon.classList.remove('fa-eye');
//             icon.classList.add('fa-eye-slash');
//         } else {
//             passwordInput.type = 'password';
//             icon.classList.remove('fa-eye-slash');
//             icon.classList.add('fa-eye');
//         }
//     });
// });

// }
