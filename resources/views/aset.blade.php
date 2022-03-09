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

    {{-- DataTables --}}
    <link rel="stylesheet" type="text/css" href="/vendor/datatables.min.css">



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
    <nav class= "navbar navbar-dark  bg-dark flex-md-nowrap p-0 shadow">
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

                {{-- Tampilan Peta --}}
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
                    </script>
                    @foreach ($aset as $s)
                    <script>
                        var ss=L.latLng({{$s->lat}},{{$s->lng}});
                        var img='<img src="{{asset('gambaraset')}}/{{$s->g1}}" style="max-height: 100px;">';
                        var link='<a href="/aset/detail/{{$s->id}}" class="btn btn-link"><i class="fas fa-info fa-fw fa-sm"></i>detail lengkap</a>';
                        var maset= L.marker(ss)
                        .addTo(mapview)
                        .bindPopup("Pemilik {{$s->pemilik}} <br> Jenis {{$s->jenis}} <br>" + img + "<br>"+link,{maxWidth:"auto"});
                    </script>
                    @endforeach
                </div>

                <!-- Tabel -->
                <div class="shadow p-3 mt-3 table-responsive">
                    <div class="h5 mb-3">Tabel Data</div>
                    <a href="#inputd" class="btn btn-outline-secondary btn-sm"><i class="fas fa-plus fa-fw fa-sm"></i>Tambah data baru</a>
                    <table id="dataTable" class="table table-striped table-sm display" >
                        <thead>
                            <tr>
                                <th>Pemilik</th>
                                <th>alamat</th>
                                <th>jenis</th>
                                <th>luas</th>
                                {{-- <th>foto</th> --}}
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aset as $p)
                            <tr>
                                <td>{{$p->pemilik}}</td>
                                <td>{{$p->alamat}}</td>
                                <td>{{$p->jenis}}</td>
                                <td>{{$p->luas}}</td>
                                {{-- <td><img src="{{asset('gambaraset')}}/{{$p->g1}}" style="max-height: 60px;"></td> --}}
                                <td>
                                    <a href="/aset/detail/{{$p->id}}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-info fa-fw fa-sm"></i>Detail</a>
                                    <a href="/aset/edit/{{$p->id}}" class="btn btn-sm btn-outline-warning"><i class="fas fa-pen fa-fw fa-sm"></i>Edit</a>
                                    <a href="/aset/delete/{{$p->id}}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash fa-fw fa-sm"></i>Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Input  -->
                <div class=" shadow my-3 p-3"  id="inputd">
                    <div class="h5 mb-3">Tamahkan data baru</div>
                    <!-- Form Input -->
                    <form method="POST" enctype="multipart/form-data" action="{{route('aset.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Pemilik</label>
                            <input type="text" class="form-control form-control-sm" name="pemilik"
                                placeholder="masukkan nama pemilik">
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Aset</label>
                            <input type="text" class="form-control form-control-sm" name="alamat"
                                placeholder="masuukan alamat aset">
                        </div>
                        <div class="form-group">
                            <label for=""> Jenis Aset</label>
                            <input type="text" class="form-control form-control-sm" name="jenis"
                                placeholder="tanah/kebun/usahaternak/tani">
                        </div>
                        <div class="form-group">
                            <label for=""> Luas Aset(m2)</label>
                            <input type="text" class="form-control form-control-sm" name="luas"
                                placeholder="tidak perlu isi jika jenis aset selain lahan/kebun dsb">
                        </div>
                        <div class="form-group">
                            <label for="">Pilih Foto Aset</label>
                            <input type="file" class="form-control-file" name="g1" onchange="preview(this)">
                            <img id="prwg1" alt="" src="#" style="max-width:100px;marigin-top:50px;">
                        </div>
                        <div class="form-group">
                            <label for=""> Keterangan</label>
                            <input type="text" class="form-control form-control-sm" name="ket"
                                placeholder="masukan keterangan informasi spt nomer hp dan status">
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
                                class="form-control" readonly required>
                            <input type="text" id="lng" name="lng" aria-label="Pilih alamat pada peta"
                                class="form-control" readonly required>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline-secondary mt-2 mb-2">
                            <i class="fas fa-save fa-fw fa-sm"></i>
                            Simpan</button>
                    </form>
                </div>

            </main>
        </div><!-- /row -->
    </div><!-- /container-fluid -->

    {{-- JS Core --}}
    <script src="/vendor/jquery-3.5.1.slim.min.js"></script>
    <script src="/vendor/bootstrap.bundle.min.js"></script>
    <script src="/vendor/dashboard.js"></script>
    <script type="text/javascript" charset="utf8" src="/vendor/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="/vendor/datatables-demo.js"></script>

    <!-- Script JSmap -->
    <script>
        var map = L.map('mapid').setView([-0.629967, 100.2701533], 14);
        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            maxZoom: 20,
            id: 'mapbox/outdoors-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1IjoiYWN1cmFuZzIwMTIiLCJhIjoiY2t0c2Zsd3RpMGJiNjJvbWlvanpmODhuZSJ9.gaiCFv8brQqvmR3V2vDnOw'
        }).addTo(map);

        var popup = L.popup();
        function onMapClick(e) {
            var coord = e.latlng.toString().split(',');
            var lat = coord[0].split('(');
            var lng = coord[1].split(')');
            document.getElementById("lat").value = lat[1];
            document.getElementById("lng").value = lng[0];
            popup
                .setLatLng(e.latlng)
                .setContent("Lokasi Telah Dipilih!!<br> jangan pencet peta lagi dan tekan simpan")
                .openOn(map);
        }
        map.on('click', onMapClick);
    </script>

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
