<?php
// notificaciones.php
$ofertasEspeciales = [
    "¡Descuento del 20% en vuelos a Japón!",
    "¡2x1 en hoteles en Francia!",
    "¡Ofertas especiales para viajes a Brasil!",
];

$notificacion = $ofertasEspeciales[array_rand($ofertasEspeciales)];
echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            const contenedorNotificaciones = document.getElementById('contenedor-notificaciones');
            contenedorNotificaciones.textContent = '$notificacion';
            contenedorNotificaciones.style.display = 'block';
            setTimeout(() => {
                contenedorNotificaciones.style.display = 'none';
            }, 5000);
        });
      </script>";
?>
