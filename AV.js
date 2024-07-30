document.addEventListener('DOMContentLoaded', () => {
    class Paquete {
        constructor(destino, fecha, precio, disponible, ofertaEspecial) {
            this.destino = destino;
            this.fecha = fecha;
            this.precio = precio;
            this.disponible = disponible;
            this.ofertaEspecial = ofertaEspecial;
        }

        cambiarDisponibilidad() {
            this.disponible = !this.disponible;
        }

        mostrarInfo() {
            return `Destino: ${this.destino}, Fecha: ${this.fecha}, Precio: $${this.precio}, Disponible: ${this.disponible ? 'Sí' : 'No'}, Oferta Especial: ${this.ofertaEspecial ? 'Sí' : 'No'}`;
        }
    }

    const paquetes = [
        new Paquete('Japon', '2024-07-01', 3000, true, false),
        new Paquete('Francia', '2024-08-02', 2000, true, true),
        new Paquete('Brasil', '2024-09-03', 1000, false, false),
    ];

    function mostrarNotificacion(mensaje) {
        const contenedorNotificaciones = document.getElementById('contenedor-notificaciones');
        contenedorNotificaciones.textContent = mensaje;
        contenedorNotificaciones.style.display = 'block';
        setTimeout(() => {
            contenedorNotificaciones.style.display = 'none';
        }, 5000);
    }

    function buscar() {
        const destino = document.getElementById('destino').value.toLowerCase();
        const fechaViaje = document.getElementById('fecha-viaje').value;
        const soloDisponibles = document.getElementById('solo-disponibles').checked;
        const soloOfertasEspeciales = document.getElementById('solo-ofertas-especiales').checked;
        const contenedorResultados = document.getElementById('contenedor-resultados');
        contenedorResultados.innerHTML = '';

        const paquetesFiltrados = paquetes.filter(pkg => 
            pkg.destino.toLowerCase().includes(destino) && 
            (!fechaViaje || pkg.fecha === fechaViaje) &&
            (!soloDisponibles || pkg.disponible) &&
            (!soloOfertasEspeciales || pkg.ofertaEspecial)
        );

        if (paquetesFiltrados.length > 0) {
            paquetesFiltrados.forEach(pkg => {
                const itemResultado = document.createElement('div');
                itemResultado.className = 'result-item';
                itemResultado.textContent = pkg.mostrarInfo();
                contenedorResultados.appendChild(itemResultado);
            });
        } else {
            contenedorResultados.textContent = 'No se encontraron resultados';
        }

        paquetesFiltrados.forEach(pkg => {
            if (pkg.ofertaEspecial) {
                mostrarNotificacion(`¡Oferta especial para ${pkg.destino} el ${pkg.fecha}!`);
            }
        });
    }

    document.getElementById('btn-buscar').addEventListener('click', buscar);
    document.getElementById('destino').addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            buscar();
        }
    });
    document.getElementById('fecha-viaje').addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            buscar();
        }
    });

    setInterval(() => {
        const indiceAleatorio = Math.floor(Math.random() * paquetes.length);
        const paqueteAleatorio = paquetes[indiceAleatorio];
        paqueteAleatorio.cambiarDisponibilidad();
        mostrarNotificacion(`La disponibilidad del paquete para ${paqueteAleatorio.destino} el ${paqueteAleatorio.fecha} ha cambiado.`);
    }, 10000);
});

