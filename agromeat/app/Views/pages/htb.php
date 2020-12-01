<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container p-5">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/carapesan.jpg">
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>