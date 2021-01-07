<?= $this->extend('admin/detail/template'); ?>
<?= $this->section('content'); ?>
<i class="fa fa-arrow-circle-left fa-2x bg-primary" aria-hidden="true" onclick="goBack()"></i>
<center>
    <div class="container p-5">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <h1 class="mt-2">Spesifikasi Produk</h1>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="/img/product/<?= $adminproduct['gambar']; ?>" class="card-img" alt="...">
                                <h3 class="mt-2" style="margin-top:0px;font-size:20px;"><?= "Rp. " . number_format($adminproduct['harga'], 2, ",", ".") . " /Kg"; ?></h3>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $adminproduct['nama_produk']; ?></h5>
                                    <p class="card-text"><b>Deskripsi : </b><?= $adminproduct['desc']; ?></p>
                                    <p class="card-text"><small class="text-muted"><b>Digunakan : </b><?= $adminproduct['fungsi']; ?></small></p>
                                </div>
                                <br>
                                <a href="/adminproduct/edit/<?= $adminproduct['slug']; ?>" type="button" class="btn btn-warning ">Ubah</a>
                                <form action="/adminproduct/<?= $adminproduct['id']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin?');">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>

<script>
    function goBack() {
        window.history.back();
    }
</script>
<?= $this->endSection(); ?>