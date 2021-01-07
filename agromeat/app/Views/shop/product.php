<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container p-5 mt-4">
    <img src="img/Meat-Shop-info-header.jpg" alt="banner" width="100%" class="mt-2">

    <div class="carousel-inner mt-3">
        <div class="carousel-item active">
            <h1 class="mt-2">Daftar Produk</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($product as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/product/<?= $p['gambar']; ?>" alt="" class="gambar"></td>
                            <td>
                                <h3><a href="/product/<?= $p['slug']; ?>"><?= $p['nama_produk']; ?></a></h3>

                                <p><?= $p['fungsi']; ?></p>
                                <h4><?= $p['harga']; ?> / <?= $p['satuan']; ?> </h4>
                            </td>
                            <td>
                                <!-- <br> -->
                                <!-- <i class="fas fa-shopping-cart"> -->
                                <!-- <a type="button" class="btn btn-primary text-white add_cart" name="add_cart" nama_produk="<?= $p['nama_produk']; ?>" slug="<?= $p['slug']; ?>" harga="><?= $p['harga']; ?>" satuan="><?= $p['satuan']; ?>"> Add to Cart</a>-->
                                <a type="button" class="btn btn-primary text-white add_cart" href="/cart/beli/<?= $p['slug']; ?>"> Add to Cart</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>