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

// Insertar registros de reserva
    $id_reserva= 5;
    $id_cliente = 5;
    $fecha_reserva = date('2024-11-01');
    $id_vuelo = rand(1, 3);
    $id_hotel = rand(1, 3);

 // Actualizar la cuarta fila de la tabla reserva
$sql = "UPDATE RESERVA SET id_cliente = $id_cliente, fecha_reserva = '$fecha_reserva', id_vuelo = $id_vuelo, id_hotel = $id_hotel WHERE id_reserva = $id_reserva";

if ($conn->query($sql) !== TRUE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    echo "Reserva actualizada exitosamente";
}

$conn->close();
?>

