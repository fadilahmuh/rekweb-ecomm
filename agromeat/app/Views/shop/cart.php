<?= $this->extend('layout/template'); ?>

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
                            <!-- <td class="text-right mt-3 pt-3"> -->
                            <!-- <h3>Total</h3> -->
                            <!-- Total -->
                            <!-- </td> -->
                            <!-- <td class="mt-3 pt-3"> -->
                            <!-- <h3>Rp. <?php //echo number_format($total, 0, 0, '.'); 
                                            ?></h3> -->

                            <!-- </td> -->
                            <td colspan="3" class="text-right mt-3 pt-3">
                                <p>Total Rp. <?php echo number_format($c_total, 0, 0, '.'); ?></p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <h3>Data Pemesan</h3>
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Nama</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Ivan Pakpahan">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputTel">No.Handphone</label>
                            <input type="tel" class="form-control" id="inputTel" placeholder="085234569874">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Alamat Lengkap</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Jl.Aaaaaaa, Kel.bbbbb, Kec,cccccc, RT/RW 0X/1X, No.xx">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Catatan:</label>
                        <input type="text" class="form-control" id="inputAddress2" placeholder="Note">
                    </div>
                    <a target="_blank" href="cart/checkout" class="btn btn-primary float-right">Pesan Sekarang</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>