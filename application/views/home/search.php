<div class="container mt-4">
   <div class="row">
      <?php foreach ($barang as $brg) : ?>
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

                     <input style="text-align: center; margin-left: 15px;" type="number" id="<?= $brg['id_barang']; ?>" name="quantity" min="0" max="100" value="1">
                  </div>
               </div>
            </div>
         </div>
      <?php endforeach; ?>

   </div>
   <a class="btn btn-primary mt-3" href="<?= base_url('home/index') ?>">Kembali</a>
</div>