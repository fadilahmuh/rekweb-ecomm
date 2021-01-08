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
        <li data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="3"></li>
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
            <img class="d-block w-100" src="img/sirloin.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5><a href="/product"><button type="button" class="btn btn-primary"> <i class="fas fa-shopping-cart"></i> Shop Now</button></a></h5>
                <br>
                <br>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/barbeque.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5><a href="/product"><button type="button" class="btn btn-primary"> <i class="fas fa-shopping-cart"></i> Shop Now</button></a></h5>
                <br>
                <br>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="img/steaks.jpg" alt="Fourth slide">
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

<?php if (session()->getFlashdata('notif')) : ?>
    <div class="modal hide fade" id="myModal">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">×</a>
            <h3>Thank You...!</h3>
        </div>
        <div class="modal-body">
            <p><?= session()->getFlashdata('notif'); ?></p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn">Close</a>
            <a href="#" class="btn btn-primary">Save changes</a>
        </div>
    </div>
<?php endif; ?>

<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });
</script>

<?= $this->endSection(); ?>