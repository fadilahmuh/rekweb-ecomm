<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/carousel.jpeg" alt="First slide">
        </div>
        <div class="carousel-caption d-none d-md-block mb-5">
            <h5><a href=""><button type="button" class="btn btn-primary"> <i class="fas fa-shopping-cart"></i> Buy Now</button></a></h5>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>