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
    <title>Document</title>
    <style>
        /* #basemapDropdown {
            z-index: 2;
            position: fixed;
            top: 20px;
            right: 20px;
            margin-top: 10px;
            margin-right: 10px;
        } */

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
                {{-- <select id="basemapDropdown" class="form-select form-control"
                    style="z-index: 2; width: 12%; position: fixed; top: 20px; right: 20px; margin-top: 10px; margin-right: 10px;">
                    <option value="Streets">Streets</option>
                    <option value="Imagery">Imagery</option>
                    <option value="Topographic">Topographic</option>
                    <option value="Legend">Legenda</option>
                </select> --}}
                <script>
                    // var map = L.map('map').setView([-7.1893516, 112.6598194], 13);
                    const map = L.map("map", {
                        minZoom: 2
                    })

                    map.setView([34.02, -118.805], 13);
                    const apiKey =
                        "AAPK72a6255e33764d98a0912c7b7e86685bOMpW54evt4efnsQpDOZpDeiDpA_oVDhiHdAXa_OzjYm9n3qZ6nTrMRbFbDeMBntF";

                    const basemapLayers = {

                        Streets: L.esri.Vector.vectorBasemapLayer("ArcGIS:Streets", {
                            apiKey: apiKey
                        }).addTo(map),

                        Navigation: L.esri.Vector.vectorBasemapLayer("ArcGIS:Navigation", {
                            apiKey: apiKey
                        }),
                        Topographic: L.esri.Vector.vectorBasemapLayer("ArcGIS:Topographic", {
                            apiKey: apiKey
                        }),
                        "Light Gray": L.esri.Vector.vectorBasemapLayer("ArcGIS:LightGray", {
                            apiKey: apiKey
                        }),
                        "Dark gray": L.esri.Vector.vectorBasemapLayer("ArcGIS:DarkGray", {
                            apiKey: apiKey
                        }),
                        "Streets Relief": L.esri.Vector.vectorBasemapLayer("ArcGIS:StreetsRelief", {
                            apiKey: apiKey
                        }),
                        Imagery: L.esri.Vector.vectorBasemapLayer("ArcGIS:Imagery", {
                            apiKey: apiKey
                        }),
                        ChartedTerritory: L.esri.Vector.vectorBasemapLayer("ArcGIS:ChartedTerritory", {
                            apiKey: apiKey
                        }),
                        ColoredPencil: L.esri.Vector.vectorBasemapLayer("ArcGIS:ColoredPencil", {
                            apiKey: apiKey
                        }),
                        Nova: L.esri.Vector.vectorBasemapLayer("ArcGIS:Nova", {
                            apiKey: apiKey
                        }),
                        Midcentury: L.esri.Vector.vectorBasemapLayer("ArcGIS:Midcentury", {
                            apiKey: apiKey
                        }),
                        OSM: L.esri.Vector.vectorBasemapLayer("OSM:Standard", {
                            apiKey: apiKey
                        }),
                        "OSM:Streets": L.esri.Vector.vectorBasemapLayer("OSM:Streets", {
                            apiKey: apiKey
                        })
                    };

                    L.control.layers(basemapLayers, null, {
                        collapsed: false
                    }).addTo(map);


                    L.esri
                        .featureLayer({
                            url: "https://services.arcgis.com/P3ePLMYs2RVChkJx/arcgis/rest/services/USA_Congressional_Districts/FeatureServer/0",
                            simplifyFactor: 0.5,
                            precision: 5,
                            style: function(feature) {
                                if (feature.properties.PARTY === "Democrat") {
                                    return {
                                        color: "blue",
                                        weight: 2
                                    };
                                } else if (feature.properties.PARTY === "Republican") {
                                    return {
                                        color: "red",
                                        weight: 2
                                    };
                                } else {
                                    return {
                                        color: "white",
                                        weight: 2
                                    };
                                }
                            }
                        })
                        .addTo(map);
                </script>
            </div>
        </div>
    </div>
</body>

</html>

{{--
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('modal'));
        myModal.show();
    });
</script> --}}




{{-- code lawas --}}
{{-- // const basemapEnum = "ArcGIS:Streets";

// L.esri.Vector.vectorBasemapLayer(basemapEnum, {
// apiKey: apiKey
// }).addTo(map);

// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
// attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
// maxZoom: 18,
// }).addTo(map);

// var geojsonUrl = 'geojson/kabgresik.geojson';

// fetch(geojsonUrl)
// .then(function(response) {
// return response.json();
// })
// .then(function(geojsonData) {
// L.geoJSON(geojsonData).addTo(map);
// });

// var basemapLayer = L.esri.basemapLayer('Streets').addTo(map);

// var dropdown = document.getElementById("basemapDropdown");
// dropdown.addEventListener("change", function() {
// var selectedValue = dropdown.value;
// map.removeLayer(basemapLayer);
// basemapLayer = L.esri.basemapLayer(selectedValue).addTo(map);
// }); --}}
