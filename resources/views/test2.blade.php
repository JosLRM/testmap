<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- LeaFlet CSS-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
   <div id="map" style="height: 500px;"></div>

<div style="margin-top: 1rem;">
    <button id="btn_del">Delegaciones</button>
    <button id="btn_sec">Sectores</button>
    <button id="btn_cts">Cuadrantes</button>
    <button id="btn_todos">Mostrar Todos</button>
    <button id="btn_seleccion">Activar Selección</button>
    <button id="btn_limpiar">Limpiar Selección</button>
</div>
<table id="tablaSeleccion" border="1" style="margin-top:1rem; display: none; width: 100%;">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Nombre</th>
            <th>Lat</th>
            <th>Lon</th>
            <th>accion</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>

    var map = L.map('map').setView([21.1307, -101.6953], 12);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var yellowIcon = L.icon({
    iconUrl: '{{asset("imagenes/yellow-marker.png")}}',
    iconSize: [35, 40],
    popupAnchor: [-3, -76],
    shadowUrl: 'my-icon-shadow.png',
    iconAnchor:   [22, 95]
});

var blueIcon = L.icon({
    iconUrl: '{{asset("imagenes/blue-marker.png")}}',
    iconSize: [35, 40],
    popupAnchor: [-3, -76],
    shadowUrl: 'my-icon-shadow.png',
    iconAnchor:   [22, 95]
});

    const marcadoresDel = [];
    const marcadoresSec = [];
    const marcadoresCts = [];
    let marcadoresVisibles = [];

    const datosDel = @json($datos_del);
    const datosSec = @json($datos_sec);
    const datosCts = @json($datos_cts);

    function crearMarcadores(datos, tipo, listaDestino) {
        datos.forEach(dato => {
            let marker = L.marker([parseFloat(dato.lon), parseFloat(dato.lat)], {icon: blueIcon})
                .bindPopup(`${tipo}: ${dato.nombre || dato.delegacion || dato.sector || dato.cuadrante || 'Sin nombre'}`);
            marker.tipo = tipo;
            marker.data = dato;
            listaDestino.push(marker);
        });
    }

    // Crear marcadores
    crearMarcadores(datosDel, 'Delegación', marcadoresDel);
    crearMarcadores(datosSec, 'Sector', marcadoresSec);
    crearMarcadores(datosCts, 'Cuadrantes', marcadoresCts);

    // Mostrar marcadores en el mapa
    function mostrarMarcadores(lista) {
        limpiarMarcadores();
        lista.forEach(m => m.addTo(map));
        marcadoresVisibles = lista;
    }

    function limpiarMarcadores() {
        [...marcadoresDel, ...marcadoresSec, ...marcadoresCts].forEach(m => map.removeLayer(m));
    }

    // Botones de control
    document.getElementById('btn_del').addEventListener('click', () => mostrarMarcadores(marcadoresDel));
    document.getElementById('btn_sec').addEventListener('click', () => mostrarMarcadores(marcadoresSec));
    document.getElementById('btn_cts').addEventListener('click', () => mostrarMarcadores(marcadoresCts));
    document.getElementById('btn_todos').addEventListener('click', () => mostrarMarcadores([...marcadoresDel, ...marcadoresSec, ...marcadoresCts]));

    // Selección circular
    let seleccionActiva = false;
    let isDrawing = false;
    let startLatLng = null;
    let circle = null;

    document.getElementById('btn_seleccion').addEventListener('click', function () {
        seleccionActiva = !seleccionActiva;
        this.textContent = seleccionActiva ? 'Cancelar Selección' : 'Activar Selección';
    });

    map.on('mousedown', function (ev) {
        if (!seleccionActiva || circle) return;
        isDrawing = true;
        startLatLng = ev.latlng;
        map.dragging.disable();
        
        circle = L.circle(startLatLng, {
            radius: 0,
            color: 'blue',
            fillOpacity: 0.2
        }).addTo(map);
    });

    map.on('mousemove', function (ev) {
        if (isDrawing && circle) {
            const distancia = map.distance(startLatLng, ev.latlng);
            circle.setRadius(distancia);
        }
    });

    map.on('mouseup', function () {
        if (!isDrawing) return;
        isDrawing = false;
        map.dragging.enable();

        const seleccionados = marcadoresVisibles.filter(m => {
            const distancia = map.distance(circle.getLatLng(), m.getLatLng());
            return distancia <= circle.getRadius();
        });

        // Mostrar tabla con datos seleccionados
        actualizarTabla(seleccionados);
        seleccionActiva = false;
        document.getElemntById('btn_seleccion').textContent = 'Activar Seleccion';
    });

    function actualizarTabla(marcadores) {
        const tabla = document.getElementById('tablaSeleccion');
        const tbody = tabla.querySelector('tbody');
        tbody.innerHTML = '';

        if (marcadores.length === 0) {
            tabla.style.display = 'none';
            return;
        }

        marcadores.forEach(m => {
            const fila = document.createElement('tr');
            fila.innerHTML = `
                <td>${m.tipo}</td>
                <td>${m.data.nombre || m.data.delegacion || m.data.sector || m.data.cuadrante || 'Sin nombre'}</td>
                <td>${m.data.lat}</td>
                <td>${m.data.lon}</td>
                <td>Accion|Accion</td>
            `;
            tbody.appendChild(fila);
        });

        tabla.style.display = 'table';
    }

    // Mostrar todos al inicio
    mostrarMarcadores([...marcadoresDel, ...marcadoresSec, ...marcadoresCts]);

    document.getElementById('btn_limpiar').addEventListener('click', function () {
    // Eliminar círculo del mapa si existe
    if (circle) {
        map.removeLayer(circle);
        circle = null;
    }

    // Vaciar la tabla de selección
    const tabla = document.getElementById('tablaSeleccion');
    const tbody = tabla.querySelector('tbody');
    tbody.innerHTML = '';
    tabla.style.display = 'none';

    SeleccionActiva = false;
    document.getElementById('btn_seleccion').textContent = 'Activar Seleccion';
});

marker1 = L.marker([21.13202860215148, -101.6893807305502], {icon: yellowIcon}).addTo(map).bindPopup("Parque Hidalgo");
</script>

</body>
</html>
