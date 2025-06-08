<?php
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "siealumnos";
// Crear conexión

$conn = new mysqli($host, $usuario, $password, $base_datos);
if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
}
?>