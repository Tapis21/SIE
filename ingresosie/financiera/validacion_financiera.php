<?php
session_start(); // Por si luego usas variables de sesión

include '../basephp/conexion.php';
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$matricula = $_POST['matricula'];
$clave = $_POST['clave'];
$carrera_requerida = 'Financiera'; // Asegúrate de que la carrera requerida es correcta
// Verifica si la matrícula y clave están vacías

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
        // Inicio de sesión exitoso
        header("Location: finan/perfil.php");
        exit();
    } else {
        // Usuario válido pero no pertenece a esta carrera
        echo "<script>alert('Acceso denegado: No perteneces a la carrera de Financiera.'); window.location.href='sieingfinan.html';</script>";
    }
} else {
    // Fallo en el inicio de sesión
    echo "<script>alert('Matrícula o contraseña incorrecta'); window.location.href='sieingfinan.html';</script>";
}

$stmt->close();
$conn->close();
?>
