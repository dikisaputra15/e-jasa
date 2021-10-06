<div class="container" style="font-size:13px;">
   <div class="row">
      <div class="col-md">
         <div class="card shadow">
            <div class="card-header">
               <h6 class="m-0 font-weight-bold text-dark">Detail Barang</h6>
            </div>
            <div class="card-body">
               <table class="table table-sm table-borderless">
                  <tr>
                     <th>#</th>
                     <th>Gambar</th>
                     <th>Nama barang</th>
                     <th>Harga</th>
                     <th>Kuantitas</th>
                     <th>Berat</th>
                     <th>Kurir pengiriman</th>
                     <th>Paket pengiriman</th>
                     <th>Ongkos pengiriman</th>
                     <th>Estimasi pengiriman</th>
                  </tr>
                  <?php $i = 1; ?>
                  <?php foreach ($detail as $value) : ?>
                     <tr>
                        <td><?= $i++; ?></td>
                        <td><img class="rounded" style="width: 50px;" src="<?= base_url('public/img/upload/') . $value['gambar']; ?>"></td>
                        <td><?= $value['nama_barang']; ?></td>
                        <td><?= $value['price']; ?></td>
                        <td><?= $value['qty']; ?></td>
                        <td><?= $value['berat']; ?></td>
                        <td><?= $value['kurir']; ?></td>
                        <td><?= $value['paket']; ?></td>
                        <td><?= $value['ongkir']; ?></td>
                        <td><?= $value['estimasi_pengiriman'] . " Hari"; ?></td>
                     </tr>
                  <?php endforeach; ?>
               </table>
            </div>
         </div>
         <div class="card shadow mt-3">
            <div class="card-header">
               <h6 class="m-0 font-weight-bold text-dark">Detail Pelanggan</h6>
            </div>
            <div class="card-body">
               <table class="table table-borderless table-sm">
                  <tr>
                     <th>Nama penerima</th>
                     <th>Email</th>
                     <th>Telepon</th>
                     <th>Alamat pengiriman</th>
                     <th>Provinsi</th>
                     <th>Kota/Kabupaten</th>
                     <th>Kodepos</th>
                     <th>Catatan pembelian</th>
                  </tr>
                  <tr>
                     <td><?= $pembeli['nama_penerima']; ?></td>
                     <td><?= $pembeli['email']; ?></td>
                     <td><?= $pembeli['telepon']; ?></td>
                     <td><?= $pembeli['alamat']; ?></td>
                     <td><?= $pembeli['provinsi']; ?></td>
                     <td><?= $pembeli['type'] . " " . $pembeli['distrik']; ?></td>
                     <td><?= $pembeli['kodepos']; ?></td>
                     <td><?= $pembeli['catatan']; ?></td>
                  </tr>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>