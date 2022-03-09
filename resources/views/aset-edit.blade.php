<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/dashboard.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <title>Pakandangan</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

</head>

<body>
    <!-- Navbar -->
    <nav class= "navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Pakandangan</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse"
            data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row">

            <!-- Sidebar -->
            {{-- <nav id="sidebarMenu" class=" shadow-lg col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column ">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-archway fa-fw fa-sm"></i>
                                Beranda
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-file-word fa-fw fa-sm"></i>
                                Surat
                            </a>
                        </li>
                    </ul>
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Profil</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-map-marked fa-fw fa-sm"></i>
                                Peta Aset
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-home fa-fw fa-sm"></i>
                                Rumah Tangga
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-user fa-fw fa-sm"></i>
                                Individu
                            </a>
                        </li>
                    </ul>
                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Databasep</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-database fa-fw fa-sm"></i>
                                Penduduk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-database fa-fw fa-sm"></i>
                                Keluarga
                            </a>
                        </li>
                    </ul>
                </div>
            </nav> --}}

            <!-- Konten -->
            <main role="main" class="col-md ml-sm-auto col-lg px-md-4">

                <!-- Judul -->
                <div class=" shadow px-3 d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h4">Data Peta Aset</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group mr-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-share fa-fw fa-sm"></i>
                                Share</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-print fa-fw fa-sm"></i>
                                Cetak</button>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="location.reload()">
                            <i class="fas fa-sync fa-fw fa-sm"></i>
                            Refresh
                        </button>
                    </div>
                </div>

                <!-- Input  -->
                <div class="shadow my-3 p-3">
                    <div class="h5 mb-3">Input Data</div>
                    <!-- Form Input -->
                    @foreach ($aset as $p)
                    <form method="POST" enctype="multipart/form-data" action="/aset/update/{{$p->id}}',">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Nama Pemilik</label>
                            <input type="text" class="form-control form-control-sm" name="pemilik"
                                placeholder="masukkan nama pemilik" value="{{$p->pemilik}}">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Aset</label>
                            <input type="text" class="form-control form-control-sm" name="alamat"
                                placeholder="masuukan alamat aset" value="{{$p->alamat}}"">
                        </div>
                        <div class="form-group">
                            <label for=""> Jenis Aset</label>
                            <input type="text" class="form-control form-control-sm" name="jenis"
                                placeholder="tanah/kebun/usahaternak/tani" value="{{$p->jenis}}"">
                        </div>
                        <div class="form-group">
                            <label for=""> Luas Aset(m2)</label>
                            <input type="text" class="form-control form-control-sm" name="luas"
                                placeholder="tidak perlu isi jika jenis aset selain lahan/kebun dsb" value="{{$p->luas}}"">
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Foto Aset</label>
                            <input type="file" class="form-control-file" name="g1" onchange="preview(this)">
                            <img id="prwg1" alt="" src="{{asset('gambaraset')}}/{{$p->g1}}" style="max-width:100px;marigin-top:50px;">
                        </div>
                        <div class="form-group">
                            <label for=""> Keterangan</label>
                            <input type="text" class="form-control form-control-sm" name="ket"
                                placeholder="masukan keterangan informasi" value="{{$p->pemilik}}"">
                        </div>
                        <div class="form-group">
                            <label for="mapid">
                                Pilih Alamat Aset
                                <i><b>(Cukup klik lokasi anda pada peta hingga muncul latitudelongitude)</b></i>
                            </label>
                        </div>
                        <div id='mapid' style='height: 400px;'></div>
                        <div class="input-group" id="ipm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Latitude dan longitude</span>
                            </div>
                            <input type="text" id="lat" name="lat" aria-label="Pilih alamat pada peta"
                                class="form-control" readonly value="{{$p->lat}}">
                            <input type="text" id="lng" name="lng" aria-label="Pilih alamat pada peta"
                                class="form-control" readonly required value="{{$p->lng}}"">
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-secondary mt-2 mb-2">
                            <i class="fas fa-save fa-fw fa-sm"></i>
                            Simpan</button>
                     <!-- Script JSmap -->
                    <script>
                        var map = L.map('mapid').setView([{{$p->lat}}, {{$p->lng}}], 14);
                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                            maxZoom: 20,
                            id: 'mapbox/outdoors-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'pk.eyJ1IjoiYWN1cmFuZzIwMTIiLCJhIjoiY2t0c2Zsd3RpMGJiNjJvbWlvanpmODhuZSJ9.gaiCFv8brQqvmR3V2vDnOw'
                        }).addTo(map);

                        L.marker([{{$p->lat}}, {{$p->lng}}]).addTo(map)
                            .bindPopup('Alamat Sekarang')
                            .openPopup();

                        var popup = L.popup();
                        function onMapClick(e) {
                            var coord = e.latlng.toString().split(',');
                            var lat = coord[0].split('(');
                            var lng = coord[1].split(')');
                            document.getElementById("lat").value = lat[1];
                            document.getElementById("lng").value = lng[0];
                            popup
                                .setLatLng(e.latlng)
                                .setContent("Lokasi Baru Telah Dipilih!!<br> tekan simpan")
                                .openOn(map);
                        }
                        map.on('click', onMapClick);
                    </script>
                    </form>
                    @endforeach
                </div>
            </main>
        </div><!-- /row -->
    </div><!-- /container-fluid -->

    {{-- JS Core --}}
    <script src="/vendor/jquery-3.5.1.slim.min.js"></script>
    <script src="/vendor/bootstrap.bundle.min.js"></script>
    <script src="/vendor/dashboard.js"></script>



    <!-- Jspreview-->
    <script>
        function preview(input){
            var g1=$("input[type=file]").get(0).files[0];
            if(g1)
            {
                var reader= new FileReader();
                reader.onload=function(){
                    $("#prwg1").attr("src",reader.result);
                }
                reader.readAsDataURL(g1);
            }
        }
    </script>

</body>

</html>
