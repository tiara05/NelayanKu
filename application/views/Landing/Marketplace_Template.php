<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NelayanKu</title>

    <!-- Google Font -->
    <link href="<?php echo base_url();?>/assets/Markethttps://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <link href="<?php echo base_url();?>/assets/img/favicon.png" rel="icon">
    <link href="<?php echo base_url();?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/Market/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/Market/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/Market/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/Market/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/Market/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/Market/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/Market/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/Market/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay">
        
    </div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?php echo base_url('index.php/Marketplace'); ?>"><img src="<?php echo base_url();?>/assets/Market/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="<?php echo base_url('index.php/favorit'); ?>"><i class="fa fa-heart"></i> </a></li>
                <li><a href="<?php echo base_url('index.php/cart'); ?>"><i class="fa fa-shopping-bag"></i> </a></li>
                <i class="fa fa-user" data-toggle="modal" data-target="#login"></i>
                                    <span><?php echo $this->session->userdata('username'); ?></span>
                <li>
                    <div class="header__top__right__auth">
                        <i class="fa fa-user" data-toggle="modal" data-target="#login"></i>
                    </div>
                </li>
                <li>
                    <span><a href="<?php echo base_url('index.php/login/logout'); ?>"><?php echo $this->session->userdata('username'); ?></a></span>
                </li>
            </ul>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="<?php echo base_url('index.php/Marketplace'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('index.php/Preorder'); ?>">Pre Order</a></li>
                <li><a href="<?php echo base_url('index.php/Lelang'); ?>">Lelang</a></li>
                <li><a href="<?php echo base_url('index.php/Activity'); ?>">Activity</a></li>
                <li><a href="<?php echo base_url('index.php/Account'); ?>">Account</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header" style="background:white;" >
        
        <div class="container" style="background:white;">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?php echo base_url('index.php/Marketplace'); ?>"><img src="<?php echo base_url();?>/assets/Market/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li style="margin-right: 30px;" class="active"><a href="<?php echo base_url('index.php/Marketplace'); ?>">Home</a></li>
                            <li style="margin-right: 30px;"><a href="<?php echo base_url('index.php/Preorder'); ?>">Pre Order</a></li>
                            <li style="margin-right: 30px;"><a href="<?php echo base_url('index.php/Lelang'); ?>">Lelang</a></li>
                            <li style="margin-right: 30px;"><a href="<?php echo base_url('index.php/Activity'); ?>">Activity</a></li>
                            <li ><a href="<?php echo base_url('index.php/Account'); ?>">Account</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li style="margin-right: 15px;"><a href="<?php echo base_url('index.php/favorit'); ?>"><i class="fa fa-heart"></i> </a></li>
                            <li style="margin-right: 15px;"><a href="<?php echo base_url('index.php/cart'); ?>"><i class="fa fa-shopping-bag"></i></a></li>
                            <li style="margin-right: 15px;"><a href="<?php echo base_url('index.php/diskon'); ?>"><i class="fa fa-tags"></i></a></li>
                            <li style="margin-right: 15px;">
                                <div class="header__top__right__auth">
                                    <i class="fa fa-user" data-toggle="modal" data-target="#login"></i>
                                </div>
                            </li>
                            <li >
                                <span><a href="<?php echo base_url('index.php/login/logout'); ?>"><?php echo $this->session->userdata('username'); ?></a></span>
                            </li>
                            
                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <!-- Hero Section Begin -->
    <?php
        $this->load->view($main_view);
    ?>
    <!-- Latest Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="<?php echo base_url();?>/assets/Market./index.html"><img src="<?php echo base_url();?>/assets/Market/img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <p>
                              Jl. Telekomunikasi Jl. Terusan Buah Batu,<br>
                              Sukapura, Kec. Dayeuhkolot,<br>
                              Kota Bandung, Jawa Barat 40257<br><br>
                              <strong>Phone:</strong> (022) 7566456<br>
                              <strong>Email:</strong> info@telkomuniversity.ac.id<br>
                            </p>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h4>Menu</h4>
                        <ul>
                              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url('index.php/Marketplace'); ?>">Home</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url('index.php/Activity'); ?>">Activity</a></li>
                              <li><i class="bx bx-chevron-right"></i> <a href="<?php echo base_url('index.php/account'); ?>">Account</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h4>Hubungi Kami</h4>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  &copy; Copyright <strong><span>NelayanKu</span></strong>. All Rights Reserved
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment">Designed by <a href="<?php echo base_url();?>/assets/Market#">NelayanKu Team</a></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?php echo base_url();?>/assets/Market/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url();?>/assets/Market/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>/assets/Market/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo base_url();?>/assets/Market/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url();?>/assets/Market/js/jquery.slicknav.js"></script>
    <script src="<?php echo base_url();?>/assets/Market/js/mixitup.min.js"></script>
    <script src="<?php echo base_url();?>/assets/Market/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url();?>/assets/Market/js/main.js"></script>
    


<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">SELAMAT DATANG SILAHKAN LOGIN</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <form action="<?php echo base_url('index.php/login/cek_login'); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            
                <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                <br>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                <br>
            <center><input type="submit" class="btn btn-primary btn_login" name="submit" value="MASUK"></center>
          </div>
          <div class="modal-footer">
            
            <h6>Tidak Memiliki Akun ?</h6><button type="button" class="btn btn-default" data-dismiss="modal" style="color: blue;" data-toggle="modal" data-target="#signup">Daftar Disini</button>
          </div>
      </form>
    </div>

  </div>
</div>

<div id="signup" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">SELAMAT DATANG SILAHKAN DAFTAR</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <form action="<?php echo base_url('index.php/login/tambah'); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
                <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama">
                <br>
                <input type="text" class="form-control" placeholder="Nomer Telepon" name="telepon" id="telepon">
                <br>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat">
                <br>
                <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                <br>
                <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                <br>
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                <br>
            <center><input type="submit" class="btn btn-primary btn_login" name="submit" value="MASUK"></center>
          </div>
          <div class="modal-footer">
            
            
          </div>
      </form>
    </div>

  </div>
</div> 

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>

</html>