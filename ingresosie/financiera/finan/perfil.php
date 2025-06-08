<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../sieingfinan.html");
    exit();
}

$nombre = $_SESSION['nombre'];
$matricula = $_SESSION['matricula'];
?>
<!DOCTYPE html>
<html lang="es-LA">
<head>
    <meta charset="UTF-8">
    <title>Perfil del Estudiante</title>
</head>
<body>
    <h1>Bienvenido(a), <?php echo htmlspecialchars($nombre); ?></h1>
    <p>Matrícula: <?php echo htmlspecialchars($matricula); ?></p>

    <!-- Aquí puedes agregar más datos del alumno desde la sesión o desde una consulta -->
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>