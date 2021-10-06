<div class="container">
   <div class="row">
      <div class="col-md-10">
         <div class="card shadow mt-4" style="max-width: 840px;">
            <div class="row no-gutters">
               <div class="col-md-4">
                  <img src="<?= base_url('public/img/upload/') . $barang['gambar']; ?>" class="card-img" style="width: 280px;">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title"><?= $barang['nama_barang'] ?></h5>
                     <p class="card-text"><?= $barang['keterangan'] ?></p>
                     <p class="card-text">Rp. <?= number_format($barang['harga']);  ?></p>
                     <p class="card-text"><small class="text-muted">Buruan Pesan</small></p>
                  </div>
                  <div class="card-footer">
                     <div class="d-inline">
                        <button class="tambah_keranjang btn btn-sm btn-dark" data-gambar="<?= $barang['gambar']; ?>" data-produkid="<?= $barang['id_barang']; ?>" data-produknama="<?= $barang['nama_barang']; ?>" data-produkharga="<?= $barang['harga']; ?>"><i class="fas fa-shopping-cart mr-2"></i></button>

                        <input style="text-align: center; margin-left: 15px;" type="number" id="<?= $barang['id_barang']; ?>" name="quantity" min="0" max="100" value="1" hidden>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <a class="btn btn-danger mt-3" href="<?= base_url('home') ?>">Kembali</a>
      </div>
   </div>
</div>