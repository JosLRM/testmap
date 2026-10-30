<!DOCTYPE html>
<html>
<head>
  <title>Ejemplo Leaflet con Marcador y Popup</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS de Leaflet -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

  <style>
    #map {
      height: 500px;
      width: 100%;
    }
  </style>
</head>
<body>

<h3>Mapa con Leaflet, marcador y popup</h3>
<div id="map"></div>

<!-- JS de Leaflet -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
  // Crear el mapa y centrarlo en una ubicación (ej. Ciudad de México)
  var map = L.map('map').setView([19.4326, -99.1332], 13);

  // Agregar capa base de OpenStreetMap
  L.tileLayer('https:tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
  }).addTo(map);

  // Añadir un popup al marcador
  L.marker([19.4326, -99.1332]).addTo(map).bindPopup("<b>Welcome!</b><br>Estás en Ciudad de México.").openPopup();
  
</script>

</body>
</html>

