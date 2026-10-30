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
            height: 800px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1></h1>
    <div id="map"></div>
    <button id="activarSeleccion" style="position: absolute; top: 10px; left: 40px; z-index: 1000;">
        Seleccionar Área
    </button>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        
        var LeafIcon = L.Icon.extend({ 
        options: {
        shadowUrl: '{{asset("imagenes/marker-pos.png")}}',
        iconSize:     [30, 8],
        shadowSize:   [50, 64],
        iconAnchor:   [22, 95],
        shadowAnchor: [4, 22],
        popupAnchor:  [-3, -76]
    }
});

var blackIcon = L.icon({
    iconUrl: '{{asset("imagenes/black-marker.png")}}',
    iconSize: [35, 40],
    popupAnchor: [-3, -76],
    shadowUrl: 'my-icon-shadow.png',
    iconAnchor:   [22, 95],
    
});

var redIcon = L.icon({
    iconUrl: '{{asset("imagenes/red-marker.png")}}',
    iconSize: [35, 40],
    popupAnchor: [-3, -76],
    shadowUrl: 'my-icon-shadow.png',
    iconAnchor:   [22, 95],
    
});

var yellowIcon = L.icon({
    iconUrl: '{{asset("imagenes/yellow-marker.png")}}',
    iconSize: [35, 40],
    popupAnchor: [-3, -76],
    shadowUrl: 'my-icon-shadow.png',
    iconAnchor:   [22, 95],
});

        var map = L.map('map').setView([21.13073881186348, -101.69529336154037], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        let seleccionActiva = false;
        let circle = null;
        let startLatLng = null;
        let isDrawing = false;
        let marcadoresDel = [];

        var datosDel = @json($datos_del);

        datosDel.forEach(function(dato) {
            let marker = L.marker([parseFloat(dato.lon), parseFloat(dato.lat)]).addTo(map).bindPopup(dato.delegacion);
            marcadoresDel.push(marker);
        });

        var datosSec = @json($datos_sec);

        datosSec.forEach(function(dato) {
            L.marker([parseFloat(dato.lon), parseFloat(dato.lat)], {icon: yellowIcon}).addTo(map).bindPopup(dato.sector);
        });

        var datosCts = @json($datos_cts);

        datosCts.forEach(function(dato) {
            L.marker([parseFloat(dato.lon), parseFloat(dato.lat)], {icon: redIcon}).addTo(map).bindPopup(dato.cuadrante);
        });


        document.getElementById('activarSeleccion').addEventListener('click', function() {
            seleccionActiva = !seleccionActiva;
            this.textContent = seleccionActiva ? 'Cambiar Seleccion' : 'Seleccionar Área';
        });

        map.on('mousedown', function(ev) {
            if (!seleccionActiva) return;
            
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
                const distance = map.distance(startLatLng, ev.latlng);
                circle.setRadius(distance);
            }
        });
        
        map.on('mouseup', function(ev) {
            if(!isDrawing) return;
            isDrawing = false;
            map.dragging.enable();

            let seleccionados = marcadoresDel.filter(marker => {
                let distancia = map.distance(marker.getLatLng(), circle.getLatLng());
                return distancia <= circle.getRadius();
            });

            seleccionados.forEach(m => m.setIcon(new L.Icon.Default({ className : 'seleccionado'})));
           //alert(`Se seleccionaron ${seleccionados.length} marcador(es).`);
        });
    </script>
</body>

</html>
