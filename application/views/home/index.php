  <?= $this->session->flashdata('pesan'); ?>

  <!-- Page Content -->
  <div class="container">

     <div class="row d-flex justify-content-center">

        <div class="col-lg-3">
           <div class="my-5"></div>
           <div class="list-group">
              <h3>Jenis Layanan</h3>
              <a href="<?= base_url('kategori/sarana') ?>" class="list-group-item list-group-item-action">Sarana dan Prasarana</a>
              <a href="<?= base_url('kategori/limbah') ?>" class="list-group-item list-group-item-action">limbah khusus</a>
              <a href="<?= base_url('kategori/saluran') ?>" class="list-group-item list-group-item-action">Saluran mampet tanpa bongkar</a>
              <a href="<?= base_url('kategori/sumur') ?>" class="list-group-item list-group-item-action">sumur got dan penampungan air</a>
              <a href="<?= base_url('kategori/desa') ?>" class="list-group-item list-group-item-action">Desa dan perkampungan</a>
              <a href="<?= base_url('kategori/perumahan') ?>" class="list-group-item list-group-item-action">Perumahan dan Residen</a>
           </div>
        </div>

        <div class="col-lg-9">
           <div class="my-5"></div>
           <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
              <ol class="carousel-indicators">
                 <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                 <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                 <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner" role="listbox">
                 <div class="carousel-item active">
                    <img class="d-block img-fluid" src="<?= base_url('public/img/banner/banner.png') ?>" alt="First slide">
                 </div>
                 <div class="carousel-item">
                    <img class="d-block img-fluid" src="<?= base_url('public/img/banner/banner1.jpg') ?>" alt="Second slide">
                 </div>
                 <div class="carousel-item">
                    <img class="d-block img-fluid" src="<?= base_url('public/img/banner/banner2.jpg') ?>" alt="Third slide">
                 </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                 <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                 <span class="sr-only">Next</span>
              </a>
           </div>
           <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

     </div>
     <!-- /.row -->

  </div>
  <!-- /.container -->