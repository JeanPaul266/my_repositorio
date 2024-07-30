<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carrito de Compra - Agencia de Viajes</title>
    <link rel="stylesheet" type="text/css" href="AV.css">
</head>
<body>
    <h2><ul><strong>Carrito de Compra de Agencia Viajes</strong></ul></h2>
    <form action="CarritoAV.php" method="POST">
    <ul><label for="paquete">Selecciona un paquete:</label></ul>
    <ul><select id="paquete" name="paquete"></ul>
        <option value="paquete a Japón">Paquete a Japón</option>
        <option value="paquete a Francia">Paquete a Francia</option>
        <option value="paquete a Brasil">Paquete a Brasil</option>
        </select>
        <button type="submit">Agregar al Carrito</button>
    </form>
    <h3>Paquetes en tu carrito:</h3>
    <ul>
    <li>
        <?php
        session_start();
        if (!isset($_SESSION['carritoAV'])) {
            $_SESSION['carritoAV'] = [];
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $paquete = $_POST['paquete'];
            array_push($_SESSION['carritoAV'], $paquete);
        }

        foreach ($_SESSION['carritoAV'] as $item) {
            echo "<li>$item</li>";
        }
        ?>
    </li>
    </ul>
</body>
</html>


