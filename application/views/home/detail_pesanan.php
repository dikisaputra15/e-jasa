<div class="container" style="font-size: 13px;">
   <div class="row mt-4">
      <div class="col-md-6">
         <!-- kolom barang -->
         <div class="card shadow">
            <div class="card-body">
               <table class="table table-borderless table-sm">
                  <?php foreach ($detail_pesanan as $barang) : ?>
                     <tr>
                        <td><img class="rounded" style="width: 50px;" src="<?= base_url('public/img/upload/') . $barang['gambar'] ?>"></td>
                        <td>
                           <p class="mt-2 text-muted"><small><?= $barang['nama_barang'] ?></small></p>
                        </td>
                        <td class="text-right">
                           <p class="mt-2"> Rp.<?= number_format($barang['price']) . ' x' . $barang['qty']  ?></p>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </table>
               <small class="text-muted ml-2"> <b>Catatan pembelian : </b><?= $detail_pelanggan['catatan']; ?></small>
               <hr class="divider">
              <!--  <p class="text-center my-0">KURIR</p>
               <ul class="list-group list-group-horizontal-lg justify-content-center">
                  <li class="list-group-item text-uppercase"><?= $barang['kurir'] ?></li>
                  <li class="list-group-item "><?= $barang['paket'] ?></li>
                  <li class="list-group-item"><?= $barang['estimasi_pengiriman'] ?> Hari</li>
               </ul> -->
               <table class="table table-borderless table-sm mt-3">
                 <!--  <tr>
                     <td class="text-left">Ongkos Kirim</td>
                     <td class="text-right">Rp. <?= number_format($barang['ongkir'])  ?></td>
                  </tr> -->
                  <tr>
                     <td class="text-left">Total Bayar</td>
                     <td class="text-right">Rp. <?= number_format($barang['total_bayar'])  ?></td>
                  </tr>
               </table>
            </div>
         </div>
         <a class="btn btn-sm btn-danger mt-3 shadow" href="<?= base_url('snap/status_transaksi') ?>">kembali</a>
         <a class="btn btn-sm btn-primary mt-3 shadow" href="<?= base_url('home/laporan_pdf/') . $detail_pelanggan['id_transaksi'] ?>"><i class="fas fa-print"></i> Cetak</a>

      </div>
      <div class="col-md-6">
         <div class="card shadow">
            <div class="card-body">
               <table class="table table-borderless table-sm">
                  <tr>
                     <td>Nama penerima</td>
                     <td>:</td>
                     <td><?= $detail_pelanggan['nama_penerima'] ?></td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td>:</td>
                     <td><?= $detail_pelanggan['email'] ?></td>
                  </tr>
                  <tr>
                     <td>Telepon</td>
                     <td>:</td>
                     <td><?= $detail_pelanggan['telepon'] ?></td>
                  </tr>
                  <tr>
                     <td>Provinsi</td>
                     <td>:</td>
                     <td><?= $detail_pelanggan['provinsi'] ?></td>
                  </tr>
                  <tr>
                     <td>Kota/Kabupaten</td>
                     <td>:</td>
                     <td><?= $detail_pelanggan['type'] . ' ' . $detail_pelanggan['distrik'] ?></td>
                  </tr>
                  <tr>
                     <td>Alamat</td>
                     <td>:</td>
                     <td><?= $detail_pelanggan['alamat'] ?></td>
                  </tr>
                  <tr>
                     <td>Kode pos</td>
                     <td>:</td>
                     <td><?= $detail_pelanggan['kodepos'] ?></td>
                  </tr>
                  <tr>
                     <td>Pesanan status</td>
                     <td>:</td>
                     <td><?= $detail_pelanggan['status_message'] ?></td>
                  </tr>
                  <tr>
                     <td>Status transaksi</td>
                     <td>:</td>
                     <?php if ($detail_pelanggan['transaction_status'] == 'pending') : ?>
                        <td><span class="badge badge-warning" style="font-size: 14px;"><?= $detail_pelanggan['transaction_status'] ?></span></td>
                     <?php elseif ($detail_pelanggan['transaction_status'] == 'expire') : ?>
                        <td><span class="badge badge-danger" style="font-size: 14px;"><?= $detail_pelanggan['transaction_status'] ?></span></td>
                     <?php else : ?>
                        <td><span class="badge badge-success" style="font-size: 14px;"><?= $detail_pelanggan['transaction_status'] ?></span></td>
                     <?php endif; ?>
                  </tr>
                  <tr>
                     <td>Tipe pembayaran</td>
                     <td>:</td>
                     <td><?= $detail_pelanggan['payment_type'] ?></td>
                  </tr>

                  <?php if ($detail_pelanggan['bill_key'] == '-') : ?>
                     <?php echo ""; ?>
                  <?php elseif ($detail_pelanggan['bill_key'] == 0) : ?>
                     <?php echo ""; ?>
                  <?php else : ?>
                     <tr>
                        <td>Bill key</td>
                        <td>:</td>
                        <td> <?= $detail_pelanggan['bill_key'] ?> </td>
                     </tr>
                  <?php endif; ?>

                  <?php if ($detail_pelanggan['biller_code'] == '-') : ?>
                     <?php echo ""; ?>
                  <?php elseif ($detail_pelanggan['biller_code'] == 0) : ?>
                     <?php echo ""; ?>
                  <?php else : ?>
                     <tr>
                        <td>Biller code</td>
                        <td>:</td>
                        <td> <?= $detail_pelanggan['biller_code'] ?> </td>
                     </tr>
                  <?php endif; ?>

                  <?php if ($detail_pelanggan['permata_va_number'] == '-') : ?>
                     <tr>
                        <td>Bank</td>
                        <td>:</td>
                        <td> <?= $detail_pelanggan['bank'] ?> </td>
                     </tr>
                  <?php else : ?>
                     <tr>
                        <td>Bank</td>
                        <td>:</td>
                        <td><?= 'Permata bank'; ?></td>
                     </tr>
                  <?php endif; ?>

                  <?php if ($detail_pelanggan['va_number'] == '-') : ?>
                     <?php echo ""; ?>
                  <?php else : ?>
                     <tr>
                        <td>Va number</td>
                        <td>:</td>
                        <td> <?= $detail_pelanggan['va_number'] ?> </td>
                     </tr>
                  <?php endif; ?>

                  <?php if ($detail_pelanggan['bca_va_number'] == '-') : ?>
                     <?php echo ""; ?>
                  <?php else : ?>
                     <tr>
                        <td>BCA va number</td>
                        <td>:</td>
                        <td> <?= $detail_pelanggan['bca_va_number'] ?> </td>
                     </tr>
                  <?php endif; ?>

                  <?php if ($detail_pelanggan['permata_va_number'] == '-') : ?>
                     <?php echo ""; ?>
                  <?php else : ?>
                     <tr>
                        <td>Permata va number</td>
                        <td>:</td>
                        <td> <?= $detail_pelanggan['permata_va_number'] ?> </td>
                     </tr>
                  <?php endif; ?>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>