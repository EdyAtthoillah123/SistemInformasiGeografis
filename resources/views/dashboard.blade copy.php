<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-vector@4.0.2/dist/esri-leaflet-vector.js" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://jsdev.arcgis.com/4.26/esri/themes/light/main.css">
    <script src="https://jsdev.arcgis.com/4.26/"></script>
    <title>Document</title>
    <style>
        .sidebar {
            background-color: #28a745;
            color: #fff;
            padding: 20px;
            height: 100vh;
        }

        .main-content {
            padding: 20px;
            overflow: hidden;
        }

        #map {
            z-index: 1;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .logo-name-container {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .logo {
            max-width: 50%;
            height: auto;
        }

        .custom-border {
            border: 3px solid gray;
        }

        .name {
            margin-top: 10px;
            text-align: center;
        }

        #mapViewDiv {
            z-index: 1;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar" style="background: rgb(0, 128, 87);">
                <div class="logo-name-container">
                    <img src="{{ asset('image/new-logo-white.png') }}" alt="Logo" class="logo">
                    <h3 class="name">SIG Kabupaten Gresik</h3>
                </div>
            </div>
            <div class="col-md-9 main-content">
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h6 class="modal-title" id="exampleModalLabel" style="color: rgb(255, 72, 0);   ">
                                    Penjelasan dan Ketentuan</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h6 class="fw-light">Penggunaan data dan informasi dalam situs ini sebagai basis
                                    perizinan dan dokumen
                                    resmi lainnya sangat tidak disarankan. Informasi yang dapat digunakan dalam
                                    perizinan tetap mengacu pada instansi/lembaga yang berwenang.</h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Setujui</button>
                                {{-- <button type="button" class="btn btn-primary">Setuju</button> --}}
                            </div>
                        </div>
                    </div>a
                </div>
                <div id="map" class="map-container custom-border"></div>
                <script>
                    const map = L.map("map", {
                        minZoom: 2
                    })

                    map.setView([-7.3620476, 112.6104519], 13);

                    const apiKey =
                        "AAPK72a6255e33764d98a0912c7b7e86685bOMpW54evt4efnsQpDOZpDeiDpA_oVDhiHdAXa_OzjYm9n3qZ6nTrMRbFbDeMBntF";

                    const basemapEnum = "ArcGIS:Streets";

                    L.esri.Vector.vectorBasemapLayer(basemapEnum, {
                        apiKey: apiKey
                    }).addTo(map);

                    L.esri.request(
                        'https://services7.arcgis.com/PFo9pG2FpT6asp4R/arcgis/rest/services/trans_53ec27a6c98c4a7f940ff0b1f618db18_geojson/FeatureServer/2', {},
                        (error,
                            response) => {
                            if (response.features.length > 0) {
                                for (let i = 0; i < 1000; i++) {
                                    L.geoJson(response.features[i]).addTo(map);
                                }
                            }
                        });
                </script>
                {{-- <script>
                    require([
                        "esri/Map",
                        "esri/views/MapView"
                    ], function(Map, MapView) {
                        var map = new Map({
                            basemap: "streets" // Menggunakan lapisan dasar Streets
                        });

                        var view = new MapView({
                            container: "mapViewDiv",
                            map: map,

                            center: [112.6104519, -7.3620476], // Koordinat pusat tampilan
                            zoom: 12 // Tingkat zoom awal
                        });
                    });

                    var imageryBasemap = new Basemap({
                        baseLayers: [
                            new ImageryLayer({
                                url: "https://services.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer"
                            })
                        ]
                    });

                    L.esri.request('https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_month.geojson', {}, (error,
                        response) => {
                        if (response.features.length > 0) {
                            for (let i = 0; i < 1000; i++) {
                                L.geoJson(response.features[i]).addTo(map);
                            }
                        }
                    });

                    var map = new Map({
                        basemap: imageryBasemap
                    });

                    require([
                        "esri/Map",
                        "esri/views/MapView",
                        "esri/Graphic",
                        "esri/geometry/Point"
                    ], function(Map, MapView, Graphic, Point) {
                        var map = new Map({
                            basemap: "streets"
                        });

                        var view = new MapView({
                            container: "mapViewDiv",
                            map: map,
                            center: [-118.244, 34.052],
                            zoom: 12
                        });

                        var point = new Point({
                            longitude: -118.245,
                            latitude: 34.051
                        });

                        var pointGraphic = new Graphic({
                            geometry: point,
                            symbol: {
                                type: "simple-marker",
                                color: "red",
                                size: "10px"
                            }
                        });

                        view.graphics.add(pointGraphic);
                    });
                </script> --}}
            </div>
        </div>
    </div>
</body>

</html>
