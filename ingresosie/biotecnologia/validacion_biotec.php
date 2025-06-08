<?php
session_start(); // Por si luego usas variables de sesión

include '../basephp/conexion.php'; // Asegúrate de que la ruta es correcta
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$matricula = $_POST['matricula'];
$clave = $_POST['clave'];
$carrera_requerida = 'Biotecnologia'; // Asegúrate de que la carrera requerida es correcta

// Protege contra inyecciones SQL usando sentencias preparadas (más seguro)
$stmt = $conn->prepare("SELECT * FROM alumnos WHERE matricula = ? AND clave = ?");
$stmt->bind_param("ss", $matricula, $clave);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $usuario = $resultado->fetch_assoc();
    
    if ($usuario['carrera'] === $carrera_requerida) {
        // Guardamos datos del usuario en sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['matricula'] = $usuario['matricula'];
        $_SESSION['nombre'] = $usuario['nombre']; // Solo si tu tabla tiene "nombre"
        $_SESSION['carrera'] = $usuario['carrera']; // Asegúrate de que tu tabla tiene "carrera"
        // Redirige al perfil del alumno
        header("Location: biotec/perfil.php");
        exit();
    } else {
        // Usuario válido pero no pertenece a esta carrera
        echo "<script>alert('Acceso denegado: No perteneces a la carrera de Biotecnología.'); window.location.href='sieingbiotec.html';</script>";
    }
    
    // // Inicio de sesión exitoso
    // header("Location: biotec/biotecnologia.html");
    // exit();
} else {
    // Fallo en el inicio de sesión
    echo "<script>alert('Matrícula o contraseña incorrecta'); window.location.href='sieingbiotec.html';</script>";
}

$stmt->close();
$conn->close();
?>
