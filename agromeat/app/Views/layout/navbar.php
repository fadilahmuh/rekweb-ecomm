<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="/">
        <img src="/img/logoagro.png" width="60" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/howtobuy">How To Buy</a>
                </li>
            </ul>
            <span class="navbar-text">
                <a href="/cart" class="notification"><i class="fas fa-shopping-cart"></i> <span class="badge"><?php echo count($total); ?></span></a>
            </span>

        </div>
    </div>
</nav>