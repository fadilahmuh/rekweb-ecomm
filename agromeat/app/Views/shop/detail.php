<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container p-5">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <i class="fas fa-long-arrow-alt-left fa-2x text-dark" onclick="goBack()"></i>
                <h1 class="mt-2">Spesifikasi Produk</h1>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/img/product/<?= $product['gambar']; ?>" class="card-img" alt="...">
                            <h3 class="mt-2" style="margin-top:0px;font-size:20px;"><?= "Rp. " . number_format($product['harga'], 2, ",", ".") . " /Kg"; ?></h3>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['nama_produk']; ?></h5>
                                <p class="card-text"><b>Deskripsi : </b><?= $product['desc']; ?></p>
                                <p class="card-text"><small class="text-muted"><b>Digunakan : </b><?= $product['fungsi']; ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>
<?= $this->endSection(); ?>