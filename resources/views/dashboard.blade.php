<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"
        integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous">
    </script>
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
    <link rel="stylesheet" href="https://js.arcgis.com/4.26/esri/themes/light/main.css" />
    <script src="https://js.arcgis.com/4.26/"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Dashboard | GresikTaru</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar" style="background: rgb(0, 128, 87);">
                <div class="logo-name-container">
                    <img src="{{ asset('image/logo Gresik.png') }}" alt="Logo" class="logo">
                    <h4 class="name">SIG Kabupaten Gresik</h4>
                    <ul class="nav">
                        <li class="nav-item">
                            <div class="card">
                                <div class="card-body">
                                    <p><strong>Lokasi:</strong> <span id="locationInfo"></span></p>
                                    <p><strong>Koordinat : (Latitude-Longitude)</strong></p>
                                    <p><strong></strong> <span id="longitudeInfo"></span><strong></strong>
                                        <span id="latitudeInfo"></span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 main-content">
                <div class="toggle-button">
                    <button onclick="toggleLegend()"><img
                            src="{{ asset('image/plan-map-vector-icon-removebg-preview.png') }}" alt="Icon"
                            class="icon-toogle" style="width: 20px; height:25px;"> Legenda </button>
                </div>
                <div class="legend-container" id="layerSelector">
                    <h5>LEGEND</h5>
                    <h6>Wilayah Gresik</h6>
                    <div class="layer-container">
                        <label class="layer-checkbox">
                            <img src="{{ asset('image/MapsSymbol.png') }}" alt="Icon" class="icon-img"
                                style="margin-left: 8px;">
                            <span class="layer-label" style="font-size: 10px;">Titik Kecamatan</span>
                        </label>
                    </div>
                    <div class="layer-container">
                        <label class="layer-checkbox">
                            <input type="checkbox" name="layer" value="geojsonLayer1" checked>
                            <img src="{{ asset('image/Gresik.png') }}" alt="Icon" class="icon-img"
                                style="margin-left: 8px;">
                            <span class="layer-label" style="font-size: 10px;">Wilayah Gresik</span>
                        </label>
                    </div>
                    <h6>Wilayah Gresik</h6>
                    <div class="layer-container">
                        <label class="layer-checkbox">
                            <input type="checkbox" name="layer" value="geojsonLayer2" checked>
                            <img src="{{ asset('image/Jalan.png') }}" alt="Icon" class="icon-img"
                                style="margin-left: 8px;">
                            <span class="layer-label" style="font-size: 10px;">Jalan</span>
                        </label>
                    </div>
                    <label class="layer-checkbox">
                        <input type="checkbox" name="layer" value="geojsonLayer3" checked>
                        <img src="{{ asset('image/DotListrik.png') }}" alt="Icon" class="icon-img"
                            style="margin-left: 8px;">
                        <span class="layer-label" style="font-size: 10px;">Listrik</span>
                    </label>
                    <label class="layer-checkbox">
                        <input type="checkbox" name="layer" value="geojsonLayer4" checked>
                        <img src="{{ asset('image/DanauGresik.png') }}" alt="Icon" class="icon-img"
                            style="margin-left: 8px;">
                        <span class="layer-label" style="font-size: 10px;">Sempadan Danau</span>
                    </label>
                    <label class="layer-checkbox">
                        <input type="checkbox" name="layer" value="geojsonLayer5" checked>
                        <img src="{{ asset('image/SungaiGresik.png') }}" alt="Icon" class="icon-img"
                            style="margin-left: 8px;">
                        <span class="layer-label" style="font-size: 10px;">Sempadan Sungai</span>
                    </label>
                    <label class="layer-checkbox">
                        <input type="checkbox" name="layer" value="geojsonLayer6" checked>
                        <img src="{{ asset('image/DotMakamGresik.png') }}" alt="Icon" class="icon-img"
                            style="margin-left: 8px;">
                        <span class="layer-label" style="font-size: 10px;">Pemakaman</span>
                    </label>
                    <label class="layer-checkbox">
                        <input type="checkbox" name="layer" value="geojsonLayer5" checked>
                        <img src="{{ asset('image/PerkantoranGresik.png') }}" alt="Icon" class="icon-img"
                            style="margin-left: 8px;">
                        <span class="layer-label" style="font-size: 10px;">Perkantoran</span>
                    </label>
                </div>
                {{-- <div id="viewDiv" class="custom-border"></div> --}}
                <div id="viewDiv"></div>
            </div>
        </div>
    </div>

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
                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Setujui</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    require([
        "esri/widgets/Track",
        "esri/config",
        "esri/Map",
        "esri/views/MapView",
        "esri/layers/GeoJSONLayer",
        "esri/Graphic",
        "esri/geometry/Point",
        "esri/symbols/SimpleMarkerSymbol",
        "esri/layers/GraphicsLayer",
        "esri/layers/FeatureLayer",
        "esri/widgets/Locate",
    ], function(Track, esriConfig, Map, MapView, GeoJSONLayer, Graphic, Point, SimpleMarkerSymbol,
        GraphicsLayer, FeatureLayer, Locate) {

        esriConfig.apiKey =
            "AAPK72a6255e33764d98a0912c7b7e86685bOMpW54evt4efnsQpDOZpDeiDpA_oVDhiHdAXa_OzjYm9n3qZ6nTrMRbFbDeMBntF";
        const map = new Map({
            basemap: "arcgis-topographic"
        });

        const view = new MapView({
            map: map,
            center: [112.6598194, -7.1893516],
            zoom: 11,
            container: "viewDiv"
        });


        view.on("pointer-move", function(event) {
            var screenPoint = {
                x: event.x,
                y: event.y
            };
            view.hitTest(screenPoint).then(function(response) {
                var result = response.results[0];
                if (result) {
                    var mapPoint = result.mapPoint;
                    document.getElementById("longitudeInfo").innerHTML = "Longitude: " +
                        mapPoint.longitude.toFixed(6);
                    document.getElementById("latitudeInfo").innerHTML = "Latitude: " + mapPoint
                        .latitude.toFixed(6);
                }
            });
        });

        view.on("click", function(event) {
            var screenPoint = {
                x: event.x,
                y: event.y
            };
            view.hitTest(screenPoint).then(function(response) {
                var result = response.results[0];
                if (result) {
                    var mapPoint = result.mapPoint;
                    var url = "https://nominatim.openstreetmap.org/reverse?format=json&lat=" +
                        mapPoint.latitude + "&lon=" + mapPoint.longitude;
                    fetch(url)
                        .then(function(response) {
                            return response.json();
                        })
                        .then(function(data) {
                            if (data && data.display_name) {
                                document.getElementById("locationInfo").innerHTML =
                                    "Lokasi: " + data.display_name;
                            } else {
                                document.getElementById("locationInfo").innerHTML =
                                    "Lokasi tidak ditemukan.";
                            }
                        })
                        .catch(function(error) {
                            console.error("Terjadi kesalahan dalam geokode:", error);
                            document.getElementById("locationInfo").innerHTML =
                                "Terjadi kesalahan dalam geokode.";
                        });
                }
            });
        });

        view.on("mouse-wheel", function(event) {
            var mapPoint = view.center;
            document.getElementById("longitudeInfo").innerHTML = "Longitude: " + mapPoint.longitude
                .toFixed(6);
            document.getElementById("latitudeInfo").innerHTML = "Latitude: " + mapPoint.latitude
                .toFixed(6);
        });



        const locate = new Locate({
            view: view,
            useHeadingEnabled: false,
            goToOverride: function(view, options) {
                options.target.scale = 1500;
                return view.goTo(options.target);
            }
        });
        view.ui.add(locate, "top-left");

        var geojsonLayer1 = new GeoJSONLayer({
            url: "geojson/DesaGresik.geojson",
            renderer: {
                type: "simple", // Menggunakan SimpleRenderer
                symbol: {
                    type: "simple-fill",
                    color: [0, 255, 0, 0], // Mengatur fill transparan (alpha: 0)
                    outline: {
                        color: [255, 0, 0, 1], // Mengatur outline berwarna merah (alpha: 1)
                        width: 0.5 // Lebar outline
                    }
                }
            }
        });


        const geojsonLayer2 = new GeoJSONLayer({
            url: "geojson/JalanGresik.geojson",
            renderer: {
                type: "simple",
                symbol: {
                    type: "simple-line",
                    color: "rgba(128, 128, 128, 1.0)", // Mengatur warna menjadi abu-abu
                    width: 0.8
                }
            }
        });


        const geojsonLayer3 = new GeoJSONLayer({
            url: "geojson/DotListrikGresik.geojson",
            renderer: {
                type: "simple",
                symbol: {
                    type: "simple-marker",
                    color: [114, 155, 111, 1.0],
                    size: 6,
                    outline: {
                        color: [0, 0, 0, 0.5],
                        width: 1
                    }
                }
            }
        });

        const geojsonLayer4 = new GeoJSONLayer({
            url: "geojson/DanauGresik.geojson",
            renderer: {
                type: "simple",
                symbol: {
                    type: "simple-fill",
                    color: "rgba( 190, 178, 151, 1.00 )"
                }
            }
        });

        const geojsonLayer5 = new GeoJSONLayer({
            url: "geojson/SungaiGresik.geojson",
            renderer: {
                type: "simple",
                symbol: {
                    // type: "simple-fill",
                    color: "rgba( 164, 113, 88, 1.00)"
                }
            }
        });

        const geojsonLayer6 = new GeoJSONLayer({
            url: "geojson/PemakamanGresik.geojson",
            renderer: {
                type: "simple",
                symbol: {
                    type: "simple-marker",
                    color: "rgba( 164, 113, 88, 1.00 )",
                    size: 6,
                    outline: {
                        color: [0, 0, 0, 0.5],
                        width: 1
                    }
                }
            }
        });

        const geojsonLayer7 = new GeoJSONLayer({
            url: "geojson/PerkantoranGresik.geojson",
            renderer: {
                type: "simple",
                symbol: {
                    type: "simple-fill",
                    color: "rgba(201,152,119,1.000)",
                }
            }
        });

        // Buat koordinat titik baru
        const pointCoordinates1 = {
            longitude: 112.6598194,
            latitude: -7.1893516
        };

        //Driyorejo
        const pointCoordinates2 = {
            longitude: 112.6375064,
            latitude: -7.3518361
        };

        // Blong Panggang Location: -7.2608908, 112.4541940
        const pointCoordinates3 = {
            longitude: 112.4541940,
            latitude: -7.2608908
        };

        // kec Bungah Location: -7.0502432, 112.5755791
        const pointCoordinates4 = {
            longitude: 112.5755791,
            latitude: -7.0502432
        };

        // Kec Cerme  Location: -7.2241084, 112.5706235
        const pointCoordinates5 = {
            longitude: 112.5706235,
            latitude: -7.2241084
        };

        //Kec Duduk Sampeyan Location: -7.1569263, 112.5226304
        const pointCoordinates6 = {
            longitude: 112.5226304,
            latitude: -7.1569263
        };

        // kec kebomas Location: -7.1702337, 112.6287178
        const pointCoordinates7 = {
            longitude: 112.6287178,
            latitude: -7.1702337
        };

        // KEc Kedamean Location: -7.3251831, 112.5594405
        const pointCoordinates8 = {
            longitude: 112.5594405,
            latitude: -7.3251831
        };

        // Kec Manyar Location: -7.1239828, 112.6062529
        const pointCoordinates9 = {
            longitude: 112.6062529,
            latitude: -7.1239828
        };

        // KEc Menganti Location: -7.3028931, 112.5828799
        const pointCoordinates10 = {
            longitude: 112.5828799,
            latitude: -7.3028931
        };

        // Kec Sangkapura Location: -5.8445218, 112.6637009
        const pointCoordinates11 = {
            longitude: 112.6637009,
            latitude: -5.8445218
        };

        // KEc Sidayu Location: -6.9913243, 112.5646673
        const pointCoordinates12 = {
            longitude: 112.5646673,
            latitude: -6.9913243
        };

        // Kec Tambak   Location: -5.7482030, 112.6441292
        const pointCoordinates13 = {
            longitude: 112.6441292,
            latitude: -5.7482030
        };

        // Wringin Anom Location: -7.7330336, 114.2476263
        const pointCoordinates14 = {
            longitude: 112.5205706,
            latitude: -7.3898854
        };


        const graphicLayer = new GraphicsLayer();
        const pictureSymbol = {
            type: "picture-marker",
            url: "image/MapsSymbol.png",
            width: "25px",
            height: "25px"
        };

        const pointGraphic1 = new Graphic({
            geometry: new Point(pointCoordinates1),
            symbol: pictureSymbol,
            attributes: {
                name: "Kabupaten Gresik",
                description: "Gresik merupakan salah satu kabupaten yang terletak di pesisir Jawa Timur. Gresik dikenal sebagai kota tempat berdirinya pabrik semen pertama dan perusahaan semen terbesar di Indonesia, yaitu Semen Gresik. Di masa kolonial, daerah ini disebut Grisse."
            }
        });

        const pointGraphic2 = new Graphic({
            geometry: new Point(pointCoordinates2),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Driyorejo",
                description: "Kecamatan Driyorejo adalah nama salah satu kecamatan di Kabupaten Gresik, Jawa Timur dengan luas 5.129,72 hektare. Kecamatan ini berbatasan langsung dengan Kecamatan Karangpilang, Kota Surabaya di sebelah timur, Kecamatan Wringinanom, Kabupaten Gresik di sebelah barat, Kecamatan Menganti, Kabupaten Gresik dan Kecamatan Lakarsantri, Kota Surabaya di sebelah utara, serta Kecamatan Taman dan Kecamatan Krian, Kabupaten Sidoarjo di sebelah selatan."
            }
        });

        const pointGraphic3 = new Graphic({
            geometry: new Point(pointCoordinates3),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan BalongPanggang",
                description: "Balongpanggang adalah sebuah kecamatan di Kabupaten Gresik, provinsi Jawa Timur, Indonesia. Mayoritas penduduk Kecamatan Balongpanggang berprofesi sebagai Petani dan mayoritas beragama Islam. Serta masyarakat di kecamatan balong panggang mayoritas bekerja(mata pencarian)sebagai petani. Tidak hanya itu saja di kecamatan balong panggang juga ada beberapa waduk seperti waduk ngasin di desa ngasin waduk Pacuh di desa Pacuh."
            }
        });

        const pointGraphic4 = new Graphic({
            geometry: new Point(pointCoordinates4),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Bungah",
                description: "Bungah adalah sebuah kelurahan sekaligus kecamatan di Kabupaten Gresik, provinsi Jawa Timur, Indonesia. Kecamatan ini terletak antara kecamatan Manyar, kecamatan Sidayu dan kecamatan Dukun. Dengan letak yang berdekatan dengan sungai Bengawan Solo"
            }
        });

        const pointGraphic5 = new Graphic({
            geometry: new Point(pointCoordinates5),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Cerme",
                description: "Cerme adalah sebuah kecamatan di Kabupaten Gresik, provinsi Jawa Timur, Indonesia Cerme merupakan salah satu kecamatan yang terletak bagian selatan kota Gresik tepatnya dari Terminal bunder ke arah selatan.Kata Cerme mumpunyai beberapa makna yaitu ancer-ancere rame yang artinya pusat keramaian atau akan menjadi kota yang ramai karena jalan protokolnya merupakan jalan penghubung daerah Tapal Kuda dan Gerbangkertosusila "
            }
        });

        const pointGraphic6 = new Graphic({
            geometry: new Point(pointCoordinates6),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Duduk Sampeyan",
                description: "Duduksampeyan atau Duduk Sampeyan adalah sebuah kecamatan di Kabupaten Gresik, provinsi Jawa Timur, Indonesia."
            }
        });

        const pointGraphic7 = new Graphic({
            geometry: new Point(pointCoordinates7),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Kebomas",
                description: "Kebomas adalah sebuah kecamatan di Kabupaten Gresik, provinsi Jawa Timur, Indonesia. Kebomas adalah salah satu kecamatan yang ada di gresik. Kecamatan ini berdekatan dengan pusat pemerintahan kota Gresik. Meski Kecamatan Gresik adalah Pusat pemerintahan, Kantor Bupati dan beberapa Kantor Kedinasan juga terletak di kecamatan Kebomas. Kecamatan ini dapat dibilang kecamatan yang maju, karena kecamatan ini merupakan salah satu bagian dari CBD (centre business district) karena terdapat 2 bangunan mall yaitu Icon Mall Gresik dan Gress Mall, serta memiliki beberapa bangunan-bangunan penting, seperti Polres Gresik, Mal Pelayanan Publik, Pabrik Semen Gresik, RSUD Ibnu Sina Gresik (Bunder), Masjid Agung Gresik, makam Sunan Giri, perumahan-perumahan diantaranya Gresik Kota Baru, Griya Kembangan Asri, Alam Bukit Raya, Graha Bunder Asri, Rusunami dan Rusunawa di daerah Prambangan. Kecamatan ini juga sangat strategis, karena jalan raya di dalam kecamatan ini ialah sebagai jalan utama luar kota, menuju ke kota Lamongan, Tuban dll. Selain itu, kecamatan ini juga mempunyai 2 gerbang/exit tol yaitu tol Kebomas dari arah Kota Surabaya dan tol KLBM dari arah Krian."
            }
        });

        const pointGraphic8 = new Graphic({
            geometry: new Point(pointCoordinates8),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Kedamen",
                description: "Kedamean adalah sebuah kecamatan di Kabupaten Gresik, Provinsi Jawa Timur, Indonesia..Lokasi kecamatan Kedamean terletak di kabupaten/kota Kabupaten Gresik di Provinsi Jawa Timur."
            }
        });

        const pointGraphic9 = new Graphic({
            geometry: new Point(pointCoordinates9),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Manyar",
                description: "Manyar adalah sebuah kecamatan di Kabupaten Gresik, Provinsi Jawa Timur, Indonesia. secara geografis sebagian besar wilayahnya adalah berupa lahan tambak karena posisinya yang dekat dengan pantai, seiring perkembangan zaman kawasan ini sekarang mulai ditumbuhi dengan berbagai macam industri kecil menengah sampai dengan yang berskala Nasional maupun internasional."
            }
        });

        const pointGraphic10 = new Graphic({
            geometry: new Point(pointCoordinates10),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Menganti",
                description: "Menganti adalah sebuah kecamatan di Kabupaten Gresik, Provinsi Jawa Timur, Indonesia. Kecamatan Menganti terletak di wilayah selatan Kabupaten Gresik, berjarak kurang lebih 30 Km dari Kota Gresik. Letak Geografis Kecamatan Menganti berbatasan langsung dengan wilayah-wilayah sebagai berikut: sebelah timur wilayah Kota Surabaya, Sebelah selatan Kecamatan Driyorejo, Sebelah utara Kecamatan Cerme dan wilayah Kota Surabaya, sebelah barat Kecamatan Kedamean dan Kecamatan Cerme. Menganti mempunyai banyak desa di mana mayoritas masyarakat atau penduduknya bekerja sebagai petani padi, pengrajin rotan, pengusaha pembuatan mesin - mesin home industri dan pengusaha ayam."
            }
        });

        const pointGraphic11 = new Graphic({
            geometry: new Point(pointCoordinates11),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Sangkapura",
                description: "Sangkapura adalah sebuah kecamatan di Kabupaten Gresik, Provinsi Jawa Timur, Indonesia. Daerah ini terletak di Pulau Bawean. Sangkapura merupakan kecamatan di Kabupaten Gresik yang memiliki jarak antara daratan Gresik hingga Pulau Bawean adalah 117 km / 3 jam / 32,5 km via Pantai Delegan. Sangkapura merupakan central wilayah di Pulau Bawean. Sangkapura Kota terdapat Alun-Alun Sangkapura, pusat perkantoran, pusat perbelanjaan, pemukiman, pertanian, peternakan serta sosial ekonomi masyarakat di Pulau Bawean."
            }
        });

        const pointGraphic12 = new Graphic({
            geometry: new Point(pointCoordinates12),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Sidayu",
                description: "Sidayu merupakan Kota tua, jejak sejarah Kabupaten Gresik tertapak jelas di bekas Kadipaten Sedayu yang kini menjadi Kecamatan Sidayu. Berbagai peninggalan masih membekas sebagai ikon sebuah kadipaten di zaman penjajahan Belanda. Ada pintu gerbang dan pendapa keraton. Ada pula masjid dan alun-alun, telaga dan sumur sebagai sumber air Sedayu. Bangunan tersebut termasuk sebuah situs yang kini seperti onggokan bangunan tidak bermakna. Diperkirakan, situs itu berusia satu abad. Situs tersebut dibangun menjelang perpindahan Kadipaten Sedayu ke wilayah Kadipaten Jombang oleh penjajah Belanda pada sekitar 1910. Sejak berdiri pada 1675, Kadipaten Sedayu dipimpin oleh sedikitnya sepuluh adipati. Adipati yang paling dikenal adalah Kanjeng Sepuh Sedayu. Meski hanya sebuah kecamatan, Sidayu memiliki alun-alun yang cukup luas dan bangunan-bangunan tua yang cukup megah. Itu merupakan pertanda bahwa Sedayu, atau yang sekarang lebih dikenal dengan sebutan Kecamatan Sidayu, dulu merupakan kota tua yang pernah jaya. Sebelum akhirnya menjadi bagian yang terintegrasi dengan Kabupaten Gresik, Sedayu merupakan wilayah kadipaten tersendiri pada masa pemerintahan Mataram. Istimewanya, Kadipaten Sedayu saat itu mempunyai koneksitas kewilayahan secara langsung di bawah kekuasaan Raja Mataram Prabu Amangkurat I dengan adipati pertama bernama Raden Kromo Widjodjo."
            }
        });

        const pointGraphic13 = new Graphic({
            geometry: new Point(pointCoordinates13),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Tambak",
                description: "Tambak adalah salah satu kecamatan di Kabupaten Gresik, Provinsi Jawa Timur, Indonesia. Kecamatan ini adalah satu dari dua kecamatan yang ada di Pulau Bawean. Kecamatan lainnya adalah Kecamatan Sangkapura."
            }
        });

        const pointGraphic14 = new Graphic({
            geometry: new Point(pointCoordinates14),
            symbol: pictureSymbol,
            attributes: {
                name: "Kecamatan Wringin Anom",
                description: "Wringinanom adalah sebuah Kota Kecamatan di Kabupaten Gresik, Provinsi Jawa Timur, Indonesia. Wringinanom mempunyai wilayah yang sangat strategis karena terletak di sebelah selatan Kabupaten Gresik yang berbatasan dengan Kabupaten Mojokerto di sebelah barat dan Kabupaten Sidoarjo di sebelah selatan .Wringinanom juga dilintasi oleh Kali Surabaya yang juga membatasi Wringinanom dengan Kabupaten Sidoarjo."
            }
        });

        graphicLayer.add(pointGraphic1);
        graphicLayer.add(pointGraphic2);
        graphicLayer.add(pointGraphic3);
        graphicLayer.add(pointGraphic4);
        graphicLayer.add(pointGraphic5);
        graphicLayer.add(pointGraphic6);
        graphicLayer.add(pointGraphic7);
        graphicLayer.add(pointGraphic8);
        graphicLayer.add(pointGraphic9);
        graphicLayer.add(pointGraphic10);
        graphicLayer.add(pointGraphic11);
        graphicLayer.add(pointGraphic12);
        graphicLayer.add(pointGraphic13);
        graphicLayer.add(pointGraphic14);

        const featureLayer = new FeatureLayer({
            source: [pointGraphic1, pointGraphic2, pointGraphic3, pointGraphic4, pointGraphic5,
                pointGraphic6, pointGraphic7, pointGraphic8, pointGraphic9, pointGraphic10,
                pointGraphic11, pointGraphic12, pointGraphic13, pointGraphic14
            ],
            objectIdField: "OBJECTID",
            fields: [{
                    name: "OBJECTID",
                    alias: "OBJECTID",
                    type: "oid"
                },
                {
                    name: "name",
                    alias: "Name",
                    type: "string"
                },
                {
                    name: "description",
                    alias: "Description",
                    type: "string"
                }
            ],
            geometryType: "point",
            spatialReference: view.spatialReference,
            popupTemplate: {
                title: "{name}",
                content: "{description}"
            }
        });

        const layerSelector = document.getElementById('layerSelector');

        const checkboxes = layerSelector.querySelectorAll('input[type="checkbox"]');

        function handleLayerVisibility() {
            checkboxes.forEach((checkbox) => {
                const layerName = checkbox.value;
                const layer = eval(layerName);
                if (checkbox.checked) {
                    if (!map.layers.includes(layer)) {
                        map.add(layer);
                    }
                } else {
                    if (map.findLayerById(layer.id)) {
                        map.remove(layer);
                    }
                }
            });
        }

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', handleLayerVisibility);
        });
        handleLayerVisibility();
        map.add(graphicLayer);
    });
</script>



{{-- script modal pop up --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('modal'));
        myModal.show();
    });
</script>


{{-- script toggle legend --}}
<script>
    function toggleLegend() {
        var legendContainer = document.getElementById("legendContainer");
        if (legendContainer.style.display === "none") {
            legendContainer.style.display = "block";
        } else {
            legendContainer.style.display = "none";
        }
    }
</script>
