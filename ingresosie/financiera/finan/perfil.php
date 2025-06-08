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
    <link rel="stylesheet" href="../css/estilos.css"> <!-- Asegúrate de que la ruta es correcta -->
</head>
<body>
    <header>
        <h1>Bienvenido(a), <?php echo htmlspecialchars($nombre); ?></h1>
    </header>
    <main>
        <section>
            <p>Matrícula: <?php echo htmlspecialchars($matricula); ?></p>
            <!-- Aquí puedes agregar más datos del alumno desde la sesión o desde una consulta -->
        </section>
        <section>
            <h2>Opciones</h2>
            <ul>
                <li><a href="cursos.php">Mis Cursos</a></li>
                <li><a href="calificaciones.php">Mis Calificaciones</a></li>
                <li><a href="horario.php">Mi Horario</a></li>
                <!-- Agrega más enlaces según sea necesario -->
            </ul>
        </section>
        <section>
            <!-- Aquí puedes agregar más datos del alumno desde la sesión o desde una consulta -->
            <a href="logout.php">Cerrar sesión</a>
        </section>
    </main>
    <footer>
        <p>Sistema de Integración Estudiantil&copy; <?php echo date("Y"); ?>. Todos los derechos reservados</p>
    </footer>    
</body>
</html>