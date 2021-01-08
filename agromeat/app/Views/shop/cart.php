<?= $this->extend('layout/template'); ?>

use Config\Validation;

<?= $this->section('content'); ?>
<div class="container p-5">
    <div class="carousel-inner mt-5">
        <div class="carousel-item active">
            <div class="card">
                <div class="card-header">List Cart</div>
                <div class="card-body">
                    <!-- tampilkan pesan success -->
                    <?php if (session()->getFlashdata('success') != null) { ?>
                        <div class="alert alert-success">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php } ?>
                    <!-- selesai menampilkan pesan success -->
                    <?php if (count($items) != 0) { // cek apakan keranjang belanja lebih dari 0, jika iya maka tampilkan list dalam bentuk table di bawah ini: 
                    ?>
                        <div class="table-responsive">
                            <?php echo form_open('cart/update'); ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Photo</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($items as $key => $item) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $item['name']; ?></td>
                                            <td><img src="/img/product/<?= $item['photo']; ?>" width="100px"></td>
                                            <td>
                                                <input type="number" name="quantity[]" min="1" class="form-control" value="<?php echo $item['quantity']; ?>" style="width:50px">
                                            </td>
                                            <td>Rp. <?php echo number_format($item['price'], 0, 0, '.'); ?></td>
                                            <td>Rp. <?php echo number_format($item['quantity'] * $item['price'], 0, 0, '.'); ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                                                    <a href="<?php echo base_url('/cart/remove/' . $item['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus product ini dari keranjang belanja?')"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td colspan="5" class="text-right">Jumlah</td>
                                        <td>Rp. <?php echo number_format($c_total, 0, 0, '.'); ?></td>
                                        <td class="text-center"><a href="/cart/clear" class="btn btn-danger">Clear Cart <i class="fa fa-trash"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php echo form_close(); ?>

                        </div>
                    <?php } // selesai menampilkan list cart dalam bentuk table 
                    ?>

                    <?php if (count($items) == 0) { // jika cart kosong, maka tampilkan: 
                    ?>
                        Keranjang belanja Anda sedang kosong. <a href="<?php echo base_url('product'); ?>" class="btn btn-success">Belanja Yuk</a>
                    <?php } else { // jika cart tidak kosong, tampilkan: 
                    ?>
                        <a class="btn btn-success float-right text-light" data-toggle="modal" data-target=".bd-example-modal-lg">Lanjut Pesan <i class="fas fa-chevron-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-4">
                <h2>Order List</h2>
                <table class="table-striped">
                    <thead>
                        <tr>
                            <th scope="col-1" class="text-center">Item</th>
                            <th scope="col-1">Quantity</th>
                            <th scope="col">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($items as $key => $item) { ?>
                            <tr>
                                <td>
                                    <p class="m-0">
                                        <img src="/img/product/<?= $item['photo']; ?>" width="200px" class="p-4">
                                        <?php echo $item['name']; ?>
                                    </p>
                                </td>
                                <td class="text-center">
                                    x<?php echo $item['quantity']; ?>
                                </td>
                                <td>Rp. <?php echo number_format($item['quantity'] * $item['price'], 0, 0, '.'); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-right mt-3 pt-3">
                                <p>Total Rp. <?php echo number_format($c_total, 0, 0, '.'); ?></p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <h3>Data Pemesan</h3>
                <form action="/cart/checkout" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ivan Pakpahan">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="telephone">No.Handphone</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="085234569874">
                        </div>
                    </div>
                    <div class="form-group justify-content-center">
                        <label for="alamat">Alamat</label>
                        <div class="geocoder">
                            <div id="geocoder"></div>
                        </div>
                        <div id="map"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" id="lat" name="lat" placeholder="Kordinat">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" id="lng" name="lng" placeholder="Kordinat">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Detail</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Gg.abcdefghijkl , RT/RW 0X/1X, No.XX">
                    </div>
                    <div class="form-group">
                        <label for="note">Catatan:</label>
                        <input type="text" class="form-control" id="note" name="note" placeholder="Note">
                    </div>
                    <label for="gambar">Bukti Transaksi</label>
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <img src="/img/bill.png" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-8">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" id="gambar" name="gambar" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('gambar'); ?>
                                </div>
                                <label class="custom-file-label" for="gambar">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Pesan Sekarang</button>
                </form>

            </div>
        </div>
    </div>
</div>

<style>
    #map {
        position: relative;
        /* left: 40px; */
        /* bottom: 200px; */
        height: 300px;
        width: 100%;
        /* right: 110px; */
    }

    .geocoder {
        position: relative;
        /* left: 350px; */
        /* top: 290px; */
    }
</style>


<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.48.0/mapbox-gl.css' rel='stylesheet' />
<script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.min.js'></script>
<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v2.3.0/mapbox-gl-geocoder.css' type='text/css' />
<script>
    var user_location = [107.634987, -6.897559];
    mapboxgl.accessToken = 'pk.eyJ1IjoiZmFraHJhd3kiLCJhIjoiY2pscWs4OTNrMmd5ZTNra21iZmRvdTFkOCJ9.15TZ2NtGk_AtUvLd27-8xA';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: user_location,
        zoom: 17
    });
    var geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
    });
    var marker;
    map.on('load', function() {
        addMarker(user_location, 'load');
        add_markers(saved_markers);
        geocoder.on('result', function(ev) {
            alert("Lokasi ditemukan");
            console.log(ev.result.center);
        });
    });
    map.on('click', function(e) {
        marker.remove();
        addMarker(e.lngLat, 'click');
        document.getElementById("lat").value = e.lngLat.lat;
        document.getElementById("lng").value = e.lngLat.lng;

    });

    function addMarker(ltlng, event) {
        if (event === 'click') {
            user_location = ltlng;
        }
        marker = new mapboxgl.Marker({
                draggable: true,
                color: "#d02922"
            })
            .setLngLat(user_location)
            .addTo(map)
            .on('dragend', onDragEnd);
    }

    function add_markers(coordinates) {
        var geojson = (saved_markers == coordinates ? saved_markers : '');
        console.log(geojson);
        geojson.forEach(function(marker) {
            console.log(marker);
            new mapboxgl.Marker()
                .setLngLat(marker)
                .addTo(map);
        });

    }

    function onDragEnd() {
        var lngLat = marker.getLngLat();
        document.getElementById("lat").value = lngLat.lat;
        document.getElementById("lng").value = lngLat.lng;
        console.log('lng: ' + lngLat.lng + '<br />lat: ' + lngLat.lat);
    }
    $('#signupForm').submit(function(event) {
        event.preventDefault();
        var lat = $('#lat').val();
        var lng = $('#lng').val();
        var url = 'locations_model.php?add_location&lat=' + lat + '&lng=' + lng;
        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                alert(data);
                location.reload();
            }
        });
    });
    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));
</script>

<script>
    function previewImg() {
        const gambar = document.querySelector('#gambar');
        const gambarLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');
        gambarLabel.textContent = gambar.files[0].name;
        const fileGambar = new FileReader();
        fileGambar.readAsDataURL(gambar.files[0]);
        fileGambar.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

<?= $this->endSection(); ?>