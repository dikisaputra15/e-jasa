<div class="container">
   <div class="row">
      <div class="col-md">
         <div class="card mb-3 shadow" style="max-width: 900px;">
            <div class="row no-gutters">
               <?php foreach ($barang as $brg) : ?>
                  <div class="col-md-4">
                     <img src="<?= base_url('public/img/upload/') . $brg['gambar']; ?>" class="card-img" style="width: 265px;">
                  </div>
                  <div class="col-md-8">
                     <table class="table mt-1">
                        <tr>
                           <th>Nama Barang</th>
                           <td><?= $brg['nama_barang']; ?></td>
                        </tr>
                        <tr>
                           <th>Keterangan</th>
                           <td><?= $brg['keterangan']; ?></td>
                        </tr>
                        <tr>
                           <th>Kategori</th>
                           <td><?= $brg['nama_kategori']; ?></td>
                        </tr>
                        <tr>
                           <th>Harga</th>
                           <td>Rp. <?= $brg['harga']; ?></td>
                        </tr>
                       
                     <?php endforeach; ?>
                     </table>
                  </div>

            </div>
         </div>

         <a href="<?= base_url('data_barang') ?>" class="btn btn-danger shadow"><i class="fas fa-backspace mr-1"></i> Kembali</a>
      </div>
   </div>
</div>