<?php
session_start(); // Inicia la sesión
session_destroy(); // Destruye la sesión
header ("Location: ../sieingsoft.html"); // Redirige al usuario a la página de inicio
exit (); // Asegura que no se ejecute más código después de la redirección
?>