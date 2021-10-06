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
         <div class="row">
            <?php foreach ($perumahan as $brg) : ?>
               <div class="col-lg-3 col-md-6 mb-4">
                  <div class="card h-100 shadow">
                     <a href="<?= base_url('home/detail/') . $brg['id_barang']; ?>"><img class="card-img-top" src="<?= base_url('public/img/upload/') . $brg['gambar']; ?>"></a>
                     <div class="card-body mx-0 my-0 px-0 py-0 p-2 text-center">
                        <h6>
                           <?= $brg['nama_barang']; ?>
                        </h6>
                        <small class="card-subtitle text-muted">Rp. <?= number_format($brg['harga']); ?></small><br>
                        <div class="d-inline d-flex mt-3 justify-content-center">
                           <button class="tambah_keranjang btn btn-sm btn-dark" data-gambar="<?= $brg['gambar']; ?>" data-produkid="<?= $brg['id_barang']; ?>" data-produknama="<?= $brg['nama_barang']; ?>" data-produkharga="<?= $brg['harga']; ?>"><i class="fas fa-shopping-cart mr-2"></i></button>

                           <input style="text-align: center; margin-left: 15px;" type="number" id="<?= $brg['id_barang']; ?>" name="quantity" min="0" max="100" value="1" hidden>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>

         </div>
         <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

   </div>
   <!-- /.row -->

</div>
<!-- /.container -->