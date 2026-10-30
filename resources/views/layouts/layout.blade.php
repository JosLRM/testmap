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
    <!--Data Table CSS-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
    <!-- Favicon Icons-->
    <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    <!-- -->
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" />
    <!-- -->


</head>
<style>
    #map {
        position: absolute;
        height: 800px;
        width: 93%;
    }

    <style>.bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>

<body>

    @include ('layouts.side_icons');
    <header>

    </header>
    <main>
        <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;">
            <a href="/" class="d-block p-3 link-dark text-decoration-none" title="Icon-only"
                data-bs-toggle="tooltip" data-bs-placement="right">
                <svg class="bi" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="visually-hidden">Icon-only</span>
            </a>
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                <li class="nav-item">
                    <a href="#" class="nav-link active py-3 border-bottom" aria-current="page" title="Home"
                        data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi" width="24" height="24" role="img" aria-label="Home">
                            <use xlink:href="#home" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom" title="Dashboard" data-bs-toggle="tooltip"
                        data-bs-placement="right">
                        <svg class="bi" width="24" height="24" role="img" aria-label="Dashboard">
                            <use xlink:href="#speedometer2" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom" title="Orders" data-bs-toggle="tooltip"
                        data-bs-placement="right">
                        <svg class="bi" width="24" height="24" role="img" aria-label="Orders">
                            <use xlink:href="#table" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom" title="Products" data-bs-toggle="tooltip"
                        data-bs-placement="right">
                        <svg class="bi" width="24" height="24" role="img" aria-label="Products">
                            <use xlink:href="#grid" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom" title="Customers" data-bs-toggle="tooltip"
                        data-bs-placement="right">
                        <svg class="bi" width="24" height="24" role="img" aria-label="Customers">
                            <use xlink:href="#people-circle" />
                        </svg>
                    </a>
                </li>
            </ul>
            <div class="dropdown border-top">
                <a href="#"
                    class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle"
                    id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24"
                        class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>
        @yield('content')

    </main>
    <footer>

    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <!-- LeaFlet JS-->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <!-- Data Table JS-->
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

    <script>
        var map = L.map('map').setView([21.1307, -101.6953], 12);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var yellowIcon = L.icon({
            iconUrl: '{{ asset('imagenes/yellow-marker.png') }}',
            iconSize: [35, 40],
            popupAnchor: [-3, -76],
            shadowUrl: 'my-icon-shadow.png',
            iconAnchor: [22, 95]
        });

        var blueIcon = L.icon({
            iconUrl: '{{ asset('imagenes/blue-marker.png') }}',
            iconSize: [35, 40],
            popupAnchor: [-3, -76],
            shadowUrl: 'my-icon-shadow.png',
            iconAnchor: [22, 95]
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
                let marker = L.marker([parseFloat(dato.lon), parseFloat(dato.lat)], {
                        icon: blueIcon
                    })
                    .bindPopup(
                        `${tipo}: ${dato.nombre || dato.delegacion || dato.sector || dato.cuadrante || 'Sin nombre'}`
                        );
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
        document.getElementById('btn_todos').addEventListener('click', () => mostrarMarcadores([...marcadoresDel, ...
            marcadoresSec, ...marcadoresCts
        ]));

        // Selección circular
        let seleccionActiva = false;
        let isDrawing = false;
        let startLatLng = null;
        let circle = null;

        document.getElementById('btn_seleccion').addEventListener('click', function() {
            seleccionActiva = !seleccionActiva;
            this.textContent = seleccionActiva ? 'Cancelar Selección' : 'Activar Selección';
        });

        map.on('mousedown', function(ev) {
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

        map.on('mousemove', function(ev) {
            if (isDrawing && circle) {
                const distancia = map.distance(startLatLng, ev.latlng);
                circle.setRadius(distancia);
            }
        });

        map.on('mouseup', function() {
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

        document.getElementById('btn_limpiar').addEventListener('click', function() {
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

        marker1 = L.marker([21.13202860215148, -101.6893807305502], {
            icon: yellowIcon
        }).addTo(map).bindPopup("Parque Hidalgo");
    </script>

</body>

</html>
