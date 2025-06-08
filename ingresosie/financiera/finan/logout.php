<?php
session_start();
session_destroy(); // Destruye la sesión para cerrar sesión
header("Location: ../sieingfinan.html"); // Redirige al inicio de sesión
exit(); // Asegúrate de que el script se detiene aquí
?>