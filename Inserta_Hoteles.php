<?php
$servername = "localhost";
$username = "root";
$password = "R3nata147";
$dbname = "agencia";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['nombre'];
$ubicacion = $_POST['ubicacion'];
$habitaciones_disponibles = $_POST['habitaciones_disponibles'];
$tarifa_noche = $_POST['tarifa_noche'];

// Validar y limpiar datos

if (empty($nombre) || empty($ubicacion) || empty($habitaciones_disponibles) || empty($tarifa_noche)) {
    die("Todos los campos son obligatorios");
}

// Insertar datos en la base de datos
$sql = "INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche) VALUES ('$nombre', '$ubicacion', $habitaciones_disponibles, $tarifa_noche)";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo hotel agregado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

