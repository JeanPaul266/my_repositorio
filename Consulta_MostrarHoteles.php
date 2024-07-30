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

// Consulta avanzada
$sql = "SELECT H.nombre, COUNT(R.id_reserva) AS num_reservas 
        FROM HOTEL H
        JOIN RESERVA R ON H.id_hotel = R.id_hotel
        GROUP BY H.id_hotel
        HAVING num_reservas > 2";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Hoteles con más de dos reservas</h2>";
    while($row = $result->fetch_assoc()) {
        echo "Hotel: " . $row["nombre"]. " - Número de Reservas: " . $row["num_reservas"]. "<br>";
    }
} else {
    echo "No hay hoteles con más de dos reservas";
}

$conn->close();
?>


