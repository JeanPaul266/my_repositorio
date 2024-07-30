<?php
// procesar_registro.php
include 'FiltroViaje.php';

$nombreHotel = $_POST['nombre-hotel'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$fechaViaje = $_POST['fecha-viaje'];
$duracionViaje = $_POST['duracion-viaje'];

$viaje = new FiltroViaje($nombreHotel, $ciudad, $pais, $fechaViaje, $duracionViaje);

// Guardar el viaje en la base de datos o en un arreglo (Array) de objetos para futuras búsquedas.

// Muestra la información del viaje registrado
echo "<h2>Viaje Registrado</h2>";
echo "<p>" . $viaje->mostrarInfo() . "</p>";

// Ejemplo de recuperación y filtrado de viajes
$viajes = [
    new FiltroViaje('Hotel Tokio', 'Tokio', 'Japon', '2024-07-01', 7),
    new FiltroViaje('Hotel Paris', 'Paris', 'Francia', '2024-08-01', 5),
    new FiltroViaje('Hotel Rio', 'Rio de Janeiro', 'Brasil', '2024-09-01', 10)
];

$ciudadBusqueda = 'Tokio';
$fechaBusqueda = '2024-07-01';
$viajesFiltrados = FiltroViaje::filtrarViajes($viajes, $ciudadBusqueda, $fechaBusqueda);

echo "<h2>Resultados de la Búsqueda</h2>";
if (count($viajesFiltrados) > 0) {
    foreach ($viajesFiltrados as $v) {
        echo "<p>" . $v->mostrarInfo() . "</p>";
    }
} else {
    echo "<p>No se encontraron resultados</p>";
}
?>

