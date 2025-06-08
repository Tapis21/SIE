<?php
session_start(); // Por si luego usas variables de sesión

include '../basephp/conexion.php';
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$matricula = $_POST['matricula'];
$clave = $_POST['clave'];

// Protege contra inyecciones SQL usando sentencias preparadas (más seguro)
$stmt = $conn->prepare("SELECT * FROM alumnos WHERE matricula = ? AND clave = ?");
$stmt->bind_param("ss", $matricula, $clave);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    // Inicio de sesión exitoso
    header("Location: tera/terapia.html");
    // Puedes guardar la matrícula en una variable de sesión si es necesario
    //$_SESSION['matricula'] = $matricula;
    // Redirigir a la página de bienvenida o al dashboard
    //echo "<script>alert('Inicio de sesión exitoso'); window.location.href='financiera/financiera.html';</script>";
    exit();
} else {
    // Fallo en el inicio de sesión
    echo "<script>alert('Matrícula o contraseña incorrecta'); window.location.href='sieingsoft.html';</script>";
}

$stmt->close();
$conn->close();
?>
