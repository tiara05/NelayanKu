    <section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url();?>/assets/Market/img/dasar.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2 style="color: black;">Account</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo base_url('index.php/Marketplace'); ?>" style="color: black;">Home</a>
                            <span style="color: black;">Account</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            
            <div class="checkout__form">
                <h4 style="font-style: italic;">Profile Saya</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <table class="table table-borderless">
                                    <tbody>
                                    <?php
                                        foreach ($account as $a) {
                                            echo '
                                        <tr>
                                            <th>Nama</th>
                                            <td>:</td>
                                            <td>'.$a->namauser.'</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td>'.$a->email.'</td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>:</td>
                                            <td>'.$a->username.'</td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Password</th>
                                            <td>:</td>
                                            <td>'.$a->password.'</td>
                                            
                                        </tr>
                                        <tr>
                                            <th>Nomer Telepon</th>
                                            <td>:</td>
                                            <td>'.$a->nomertelpon.'</td>
                                            
                                        </tr>
                                            ';
                                    }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br>
            <div class="checkout__form">
                <h4 style="font-style: italic;">Alamat Saya<!--  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#login" style="float: right;"><i class="fa fa-user"></i>    Hapus</button>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#login" style="float: right; margin-right: 15px;"><i class="fa fa-user"></i>    Ubah</button> --></h4>

                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="checkout__input">
                                <table class="table table-borderless">
                                    <tbody>
                                    <?php
                                        foreach ($account as $a) {
                                            echo '
                                        <tr>
                                            <th>Nama</th>
                                            <td>:</td>
                                            <td>'.$a->namauser.'</td>
                                        </tr>
                                        <tr>
                                            <th>Nomer Telepon</th>
                                            <td>:</td>
                                            <td>'.$a->nomertelpon.'</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>:</td>
                                            <td>'.$a->alamat.'</td>
                                        </tr>
                                        ';
                                    }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

