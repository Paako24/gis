<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persebaran Pelayanan Kesehatan</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="{{ asset('/css/info.css') }}">
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
        #map { height: 720px; }
     </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark" style="padding: 20px;">
        <a href="" class="navbar-brand" style="font-size: 25px;">daerah = {{ $daerah }}, jenis = {{ $jenis }}</a>
        <h1></h1>
    </nav>
   
    <div id="map"></div>
</body>

<script>
    var map = L.map('map').setView([-7.3105686,112.7888708], 11);
    map.createPane('labels');

  
    // Note that difference in the "lyrs" parameter in the URL:
    // Hybrid: s,h;
    // Satellite: s;
    // Streets: m;
    // Terrain: p;

    // layer
    var positron = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);

    var positronLabels = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}.png', {
            attribution: '©OpenStreetMap, ©CartoDB',
            pane: 'labels'
    }).addTo(map);

  
    // marker
    var hospitalIcon = L.icon({
        iconUrl: 'assets/icons/hospital.png',
        iconSize:     [30, 35], // size of the icon
    });
    var puskesmasIcon = L.icon({
        iconUrl: 'assets/icons/puskesmas.png',
        iconSize:     [38, 48], // size of the icon
    })
    var klinikIcon = L.icon({
        iconUrl: 'assets/icons/klinik.png',
        iconSize:     [38, 48], // size of the icon
    });

    //geojson polygon
    $.getJSON('assets/geojson/map.geojson', function(json){
        function getColor(d){
            return  d == 3 ? '#022D36':
                    d == 2 ? '#022D36':
                    d == 1 ? '#022D36': 
                            '#E31A1C';
        }

        geoLayer = L.geoJson(json, {
            style: function(feature){
                return{
                    fillColor: getColor(feature.properties.id),
                    weight: 2,
                    opacity: 1,
                    color: 'white',
                    // dashArray: '3',
                    fillOpacity: 0.2
                };
            },

            onEachFeature: function(feature, layer){
                var properties = feature.properties;

                // Membuat popup dengan informasi titik
                var popupContent =  properties.wilayah 
                
                layer.bindPopup(popupContent);
            }
        }).addTo(map);
    });

   
    //geojson titik
    $.getJSON('assets/geojson/mapTitik.geojson', function (data) {
        function daerahFilter(feature) {
            if("{{ $daerah }}" == "semua" && ("{{ $jenis }}" == "semua")){
                return true
            }else if((feature.properties.daerah == "{{ $daerah }}") && ("{{ $jenis }}" == "semua")) {
                return true
            }else if((feature.properties.daerah == "{{ $daerah }}") && (feature.properties.jenis == "{{ $jenis }}")) {
                return true
            }
        }

        function getIcon(d){
            if(d == "rs"){
                return hospitalIcon;
            }else if(d == "puskesmas"){
                return puskesmasIcon;
            }else if(d == "klinik"){
                return klinikIcon;
            }
        }

        geoPoint = L.geoJSON(data, {
            filter: daerahFilter,

            pointToLayer: function (feature, latlng) {
                return L.marker(latlng, {
                    icon: getIcon(feature.properties.jenis)
                });
            },

            onEachFeature: function (feature, layer) {
                var properties = feature.properties;

                // Membuat popup dengan informasi titik
                var popupContent = 
                    "<img  src=" + properties.image + " style=height:" + 100 + "px />" +
                    "<br><br><strong>Nama Rumah Sakit :</strong> " + "<br>" + properties.name +
                    "<br><br><strong>Alamat :</strong> "  + "<br>" + properties.location;
                layer.bindPopup(popupContent);
            }
        }).addTo(map);
    });


    //info
    var info = L.control();

    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
        this.update();
        return this._div;
    };

    // method that we will use to update the control based on feature properties passed
    info.update = function (props) {
        this._div.innerHTML = '<h4>Keterangan </h4>' + 
            "<img src='assets/icons/hospital.png'</img>" + '<a> Rumah Sakit</a>' + "<br>" +
            "<img src='assets/icons/puskesmas.png'</img>" + '<a> Puskesmas</a>' + "<br>" +
            "<img src='assets/icons/klinik.png'</img>" + '<a> Klinik</a>';
    };

    info.addTo(map);

</script>
</html>