<?php
// FiltroViaje.php
class FiltroViaje {
    public $nombreHotel;
    public $ciudad;
    public $pais;
    public $fechaViaje;
    public $duracionViaje;

    public function __construct($nombreHotel, $ciudad, $pais, $fechaViaje, $duracionViaje) {
        $this->nombreHotel = $nombreHotel;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->fechaViaje = $fechaViaje;
        $this->duracionViaje = $duracionViaje;
    }

    public function mostrarInfo() {
        return "Hotel: $this->nombreHotel, Ciudad: $this->ciudad, País: $this->pais, Fecha: $this->fechaViaje, Duración: $this->duracionViaje días";
    }

    public static function filtrarViajes($viajes, $ciudad, $fechaViaje) {
        return array_filter($viajes, function($viaje) use ($ciudad, $fechaViaje) {
            return (stripos($viaje->ciudad, $ciudad) !== false && $viaje->fechaViaje === $fechaViaje);
        });
    }
}
?>
