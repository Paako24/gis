<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

    <style>
        #map { height: 720px; }
     </style>
</head>
<body>
<div id="map"></div>
</body>


<script>

    var map = L.map('map').setView([-7.3327197,112.7580582], 11);
   
    // Note that difference in the "lyrs" parameter in the URL:
    // Hybrid: s,h;
    // Satellite: s;
    // Streets: m;
    // Terrain: p;

    // layer
    L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);

    // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    // maxZoom: 19,
    // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    // }).addTo(map);

    // marker
    var hospitalIcon = L.icon({
        iconUrl: 'assets/icons/hospital.png',
        iconSize:     [38, 48], // size of the icon
    });
    
    L.marker([-7.269773749303442, 112.78496463520233], {icon: hospitalIcon}).bindPopup('Rumah Sakit Universitas Airlangga (RS UNAIR)').addTo(map);
    L.marker([-7.283213051670871, 112.77961767869486], {icon: hospitalIcon}).bindPopup('Rumah Sakit Umum Daerah Haji Provinsi Jawa Timur').addTo(map);
   

</script>
</html>