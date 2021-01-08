<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Agro Admin | Order</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="/css/orderstyle.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="stylesheet" href="/plugins/lightbox/lightbox.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>Agro</b> Admin</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/img/admin/<?= user()->pas_foto; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= user()->nama; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/img/admin/<?= user()->pas_foto; ?>" class="img-circle" alt="User Image">

                                    <p>
                                        <?= user()->nama; ?>
                                        <small>Member since <?= date('d F Y', strtotime(user()->created_at)); ?></small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <!-- <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div> -->
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <!-- <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/img/admin/<?= user()->pas_foto; ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= user()->nama; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Custom Page</li>
                    <li><a href=""><i class="fa fa-book"></i><span>Carousel</span></a></li>
                    <li><a href="/profil"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span>Profile</span></a></li>
                    <li class="header">Data</li>
                    <li><a href="/adminproduct"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Data Produk</span></a></li>
                    <li><a href="/adminorder"><i class="fa fa-shopping-bag" aria-hidden="true"></i><span>Data Order</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- -------------------------------- -->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            </section>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="container">
                        <h3>Order Table</h3>
                        <table class="table table-fixed">
                            <thead>
                                <tr>
                                    <th class="col-xs-2">Order Id</th>
                                    <th class="col-xs-1">Nama</th>
                                    <th class="col-xs-2">No Hp</th>
                                    <th class="col-xs-1">Maps</th>
                                    <th class="col-xs-1">Total</th>
                                    <th class="col-xs-1">Tanggal</th>
                                    <th class="col-xs-2">Bukti</th>
                                    <th class="col-xs-2">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($adminorder as $p) : ?>
                                    <tr>
                                        <td class="col-xs-2"><?= $p['order_id']; ?></td>
                                        <td class="col-xs-1"><?= $p['nama_pemesan']; ?></td>
                                        <td class="col-xs-2"><?= $p['no_pemesan']; ?></td>
                                        <td class="col-xs-1">
                                            <a target="_blank" href="<?= $p['maps']; ?>">Maps</a>
                                        </td>
                                        <td class="col-xs-1 align-middle">Rp. <?= number_format($p['total'], 0, 0, '.'); ?></td>
                                        <td class="col-xs-1 align-middle"><?= $p['created_at']; ?></td>
                                        <td class="col-xs-2 align-middle">
                                            <a class="example-image-link" href="/img/bukti/<?= $p['bukti_pembayaran']; ?>" data-lightbox="bukti" data-title="">
                                                <img class="example-image" src="/img/bukti/<?= $p['bukti_pembayaran']; ?>">
                                            </a>
                                        </td>
                                        <td class="col-xs-2 align-middle"><?= $p['status']; ?></td>
                                        <!-- <td><a href="" type="button" class="btn btn-success">Lihat</a></td> -->
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                        <h3>Order Detail</h3>
                        <table class="table table-fixed">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-xs-3">Order Id</th>
                                    <th scope="col" class="col-xs-3">Item</th>
                                    <th scope="col" class="col-xs-3">Quantity</th>
                                    <th scope="col" class="col-xs-3">Sub-Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                use App\Models\ProductModel;

                                foreach ($orderdetail as $d) : ?>
                                    <tr>
                                        <th scope="row" class="col-xs-3"><?= $d['id_order']; ?></th>
                                        <?php
                                        $this->product = new ProductModel();
                                        $product = $this->product->getProduct($d['product_id']);
                                        ?>
                                        <td class="col-xs-3" style="height: 50px;"><?= $product['nama_produk']; ?></td>
                                        <td class="col-xs-3" style="height: 50px;"><?= $d['jumlah']; ?></td>
                                        <td class="col-xs-3" style="height: 50px;">Rp. <?= number_format($d['subtotal'], 0, 0, '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <!-- <tr>
                                    <th scope="row" class="col-xs-3">1</th>
                                    <td class="col-xs-3">Mark</td>
                                    <td class="col-xs-3">Otto</td>
                                    <td class="col-xs-3">@mdo</td>
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>


        <!-- -------------------------------- -->
        <!-- /.content-wrapper -->
        <div id="image-viewer">
            <span class="close">&times;</span>
            <img class="modal-content" id="full-image" src="">
        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
            </div>
            <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <script>
        $(".images img").click(function() {
            $("#full-image").attr("src", $(this).attr("src"));
            $('#image-viewer').show();
        });

        $("#image-viewer .close").click(function() {
            $('#image-viewer').hide();
        });
    </script>

    <style>
        /* Style the Image Used to Trigger the Modal */
        img {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        img:hover {
            opacity: 0.7;
        }

        /* The Modal (background) */
        #image-viewer {
            display: none;
            position: fixed;
            z-index: 1;
            padding-top: 100px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        .modal-content {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        #image-viewer .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        #image-viewer .close:hover,
        #image-viewer .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <!-- jQuery 3 -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- jQuery UI 1.11.4 -->
    <!-- <script src="bower_components/jquery-ui/jquery-ui.min.js"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <!-- <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
    <!-- Morris.js charts -->
    <!-- <script src="bower_components/raphael/raphael.min.js"></script> -->
    <!-- <script src="bower_components/morris.js/morris.min.js"></script> -->
    <!-- Sparkline -->
    <!-- <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script> -->
    <!-- jvectormap -->
    <!-- <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script> -->
    <!-- <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
    <!-- jQuery Knob Chart -->
    <!-- <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script> -->
    <!-- daterangepicker -->
    <!-- <script src="bower_components/moment/min/moment.min.js"></script> -->
    <!-- <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script> -->
    <!-- datepicker -->
    <!-- <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
    <!-- Bootstrap WYSIHTML5 -->
    <!-- <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->
    <!-- Slimscroll -->
    <!-- <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
    <!-- FastClick -->
    <!-- <script src="bower_components/fastclick/lib/fastclick.js"></script> -->
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>

    <script src="/plugins/lightbox/lightbox.js"></script>
</body>

</html>