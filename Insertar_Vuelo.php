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
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];
$plazas_disponibles = $_POST['plazas_disponibles'];
$precio = $_POST['precio'];

// Validar y limpiar datos

if (empty($origen) || empty($destino) || empty($fecha) || empty($plazas_disponibles) || empty($precio)) {
    die("Todos los campos son obligatorios");
}

// Insertar datos en la base de datos
$sql = "INSERT INTO vuelo (origen, destino, fecha, plazas_disponibles, precio) VALUES ('$origen', '$destino', '$fecha', $plazas_disponibles, $precio)";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo vuelo agregado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
