<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- <div class="container-fluid px-0">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 min-vh-100" src="img/carousel_HD_2.png" alt="First slide">
            </div>
            <div class="carousel-caption d-none d-md-block mb-5">
                <h5><a href=""><button type="button" class="btn btn-primary"> <i class="fas fa-shopping-cart"></i> Buy Now</button></a></h5>
            </div>
        </div>
    </div>
</div> -->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="0" class="active"></li>
        <li data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="1"></li>
        <li data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="2"></li>
    </ol>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="img/carousel_HD_2.png" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5><a href="/product"><button type="button" class="btn btn-primary"> <i class="fas fa-shopping-cart"></i> Shop Now</button></a></h5>
                <br>
                <br>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/carousel_HD_2.png" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5><a href="/product"><button type="button" class="btn btn-primary"> <i class="fas fa-shopping-cart"></i> Shop Now</button></a></h5>
                <br>
                <br>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/carousel_HD_2.png" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5><a href="/product"><button type="button" class="btn btn-primary"> <i class="fas fa-shopping-cart"></i> Shop Now</button></a></h5>
                <br>
                <br>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<?= $this->endSection(); ?>