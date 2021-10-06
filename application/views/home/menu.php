 <!-- ======= Header ======= -->
    <header id="header" class="header-transparent">
        <div class="container">

            <div id="logo" class="pull-left">
                <h1><a href="#" class="scrollto"><?= $title ?></a></h1>

            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class="menu-active"><a href="#">Home</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                    <li><a href="#features">Layanan Kami</a></li>
                    <!-- <li><a href="#pricing">Pricing</a></li> -->

                    <!-- <li><a href="#gallery">Gallery</a></li> -->
                     <?php if (!$this->session->userdata('email')) : ?>
                        <li><a href="<?= base_url('login') ?>">Login</a></li>
                        <li><a href="<?= base_url('register') ?>">Daftar</a></li>
                     <?php else : ?>

                    <li><a class="nav-link d-inline" href="<?= base_url('snap/status_transaksi'); ?>">Transaksi</a></li>

                    <li>
                       <?php $keranjang = $this->cart->total_items(); ?>

                       <a href="<?= base_url('home/detail_keranjang/') . $keranjang; ?>">Pesananku <?= $keranjang; ?></a>
                    </li>

                    <li class="menu-has-children"><a href="">Profil</a>
                        <ul>
                            <div class="dropdown-item mb-3">
                         <img class="img-profile rounded-circle small mr-1" style="height: 25px;" src="<?= base_url('public/img/profile/') . $this->session->userdata('gambar'); ?>">
                         <span class="text-gray-600"><?= $this->session->userdata('nama'); ?></span><br>
                         <span class="text-muted" style="font-size: 10px;"><?= $this->session->userdata('email'); ?></span>
                      </div>
                             <li><a class="dropdown-item" href="<?= base_url('home/setting') ?>"> Setting</a></li>
                              <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                        </ul>
                    </li>

                    <?php endif; ?>
                </ul>
            </nav><!-- #nav-menu-container -->
        </div>
    </header><!-- End Header -->