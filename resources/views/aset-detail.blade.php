<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="widtr=device-widtr, initial-scale=1, shrink-to-fit=no">

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

    <div class="container-fluid">
        <div class="row">

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

                <div class="row">
                    @foreach ($aset as $s)
                    <div class="col-sm-4">
                        <div class="shadow p-3 mt-3 table-responsive">
                            <div class="h5 mb-3">Detail</div>
                            <table class="table table-striped table-sm">
                               <tr>
                                   <td>Pemilik</td>
                                   <td>{{$s->pemilik}}</td>
                               </tr>
                               <tr>
                                   <td>Jenis</td>
                                   <td>{{$s->jenis}}</td>
                               </tr>
                               <tr>
                                   <td>Alamat</td>
                                   <td>{{$s->alamat}}</td>
                               </tr>
                               <tr>
                                   <td>Luas</td>
                                   <td>{{$s->luas}}</td>
                               </tr>
                               <tr>
                                   <td>Keterangan</td>
                                   <td>{{$s->ket}}</td>
                               </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="shadow my-3 p-3">
                            <div class="h5 mb-3">Peta Aset</div>
                            <div id='mapv' style='height: 500px;'></div>
                    <script>
                        var mapview = L.map('mapv').setView([-0.629967, 100.2701533], 13);
                        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                            maxZoom: 20,
                            id: 'mapbox/outdoors-v11',
                            tileSize: 512,
                            zoomOffset: -1,
                            accessToken: 'pk.eyJ1IjoiYWN1cmFuZzIwMTIiLCJhIjoiY2t0c2Zsd3RpMGJiNjJvbWlvanpmODhuZSJ9.gaiCFv8brQqvmR3V2vDnOw'
                        }).addTo(mapview);
                        var ss=L.latLng({{$s->lat}},{{$s->lng}});
                        var maset= L.marker(ss).addTo(mapview).bindPopup("Lokasi aset disini");
                    </script>
                        </div>
                    </div>
                    <div class="shadow p-3 mt-3">
                        <div class="h5 mb-3">Foto Aset</div>
                        <img src="{{asset('gambaraset')}}/{{$s->g1}}" class="img-fluid">
                    </div>
                </div>
                @endforeach

            </main>
        </div><!-- /row -->
    </div><!-- /container-fluid -->

    {{-- JS Core --}}
    <script src="/vendor/jquery-3.5.1.slim.min.js"></script>
    <script src="/vendor/bootstrap.bundle.min.js"></script>
    <script src="/vendor/dashboard.js"></script>

</body>

</html>
