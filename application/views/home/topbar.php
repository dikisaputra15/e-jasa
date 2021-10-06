 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
    <div class="container">
       <a class="navbar-brand h1" style="color: grey;" href="<?= base_url('home') ?>"><i class="mr-2 fas fa-shopping-bag"></i> E-JASA </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
       </button>
      <!--  <ul class="navbar-nav mr-auto">
          <li class="nav-item ml-4">
             <form action="<?= base_url('home/search') ?>" method="POST">
                <div class="input-group">
                   <input type="text" name="keyword" class="form-control" placeholder="Cari layanan.." autocomplete="off" required>
                   <div class="input-group-append">
                      <input class="btn btn-outline-secondary" type="submit" value="Cari" name="submit">
                   </div>
                </div>
             </form>
          </li>
       </ul> -->
       <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav ml-auto">
             <?php if (!$this->session->userdata('email')) : ?>

                <li class="nav-item">
                   <a class="nav-link d-inline" href="<?= base_url('register') ?>">Daftar</a>
                   <a class="nav-link d-inline" href="<?= base_url('login') ?>">Login</a>
                </li>

             <?php else : ?>

                <li class="nav-item mr-4 mt-1">
                   <a class="nav-link d-inline" href="<?= base_url('snap/status_transaksi'); ?>">Transaksi</a>
                </li>

                <li class="nav-item mr-5 mt-2">
                   <?php $keranjang = $this->cart->total_items(); ?>

                   <a href="<?= base_url('home/detail_keranjang/') . $keranjang; ?>"><i class="fas fa-shopping-cart" style="color: grey; width:11px;"></i></a>
                   <div class="badge-saya-posisi" style="position:absolute;">
                      <div class="badge-saya-background">
                         <span class="style-text-saya"> <?= $keranjang; ?> </span>
                      </div>
                   </div>
                </li>

                <div class="dropdown">
                   <div class="dropdown-toggle mt-1" style="cursor: pointer;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <img class="img-profile rounded-circle" style="width: 25px;" src="<?= base_url('public/img/profile/') . $this->session->userdata('gambar'); ?>">
                   </div>

                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                      <div class="dropdown-item mb-3">
                         <img class="img-profile rounded-circle small mr-1" style="height: 25px;" src="<?= base_url('public/img/profile/') . $this->session->userdata('gambar'); ?>">
                         <span class="text-gray-600"><?= $this->session->userdata('nama'); ?></span><br>
                         <span class="text-muted" style="font-size: 10px;"><?= $this->session->userdata('email'); ?></span>
                      </div>
                      <a class="dropdown-item" href="<?= base_url('home/setting') ?>"><i class="fas fa-cog text-muted"></i> Setting</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt text-muted"></i> Logout</a>
                   </div>
                </div>
             <?php endif; ?>
          </ul>
       </div>
    </div>
 </nav>