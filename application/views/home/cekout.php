<form id="payment-form" method="post" action="<?= site_url() ?>snap/finish">
   <input type="hidden" name="result_type" id="result-type" value="">
   </div>
   <input type="hidden" name="result_data" id="result-data" value="">
   </div>
</form>
<div class="container" style="font-size: 13px;">
   <div class="container mb-3 mt-4">
      <div class="row justify-content-center">
         <div class="col-md-10">
            <div class="card">
               <div class="card-body">
                  <div class="row">

                     <!-- <button id="pay-button">Pay!</button> -->
                     <div class="col-md">
                        <h5> Detail Pesanan</h5>
                        <table class="table">
                           <thead>


                              <tr>
                                 <td scope="row">Nama</td>
                                 <td>:</td>
                                 <td id="td_nama_penerima" pesanan="<?= $pesanan_detail['nama_penerima']; ?>"><?= $pesanan_detail['nama_penerima']; ?></td>
                              </tr>

                              <tr>
                                 <td scope="row">Telepon</td>
                                 <td>:</td>
                                 <td><?= $pesanan_detail['telepon']; ?></td>
                              </tr>

                              <tr>
                                 <td scope="row">Provinsi</td>
                                 <td>:</td>
                                 <td><?= $pesanan_detail['provinsi']; ?></td>
                              </tr>

                              <tr>
                                 <td scope="row">Kota</td>
                                 <td>:</td>
                                 <td><?php
                                       echo $pesanan_detail['type'] . " ";
                                       echo $pesanan_detail['distrik']; ?> </td>
                              </tr>

                              <tr>
                                 <td scope="row">Alamat Lengkap</td>
                                 <td>:</td>
                                 <td><?= $pesanan_detail['alamat']; ?></td>
                              </tr>

                              <tr>
                                 <td scope="row">Catatan</td>
                                 <td>:</td>
                                 <td class="col"><?= $pesanan_detail['catatan']; ?></td>
                              </tr>
                           </thead>
                        </table>

                        <table class="table mt-3">
                           <tr>
                              <th>Nama Layanan</th>
                              <th>Jumlah Layanan</th>
                              <th class="text-right">Harga</th>
                              <th class="text-right">Total</th>
                           </tr>
                           <?php foreach ($barang_detail as $barang) : ?>
                              <?php $subtotal = $barang['qty'] * $barang['price']; ?>
                              <tr>
                                 <td><?= $barang['nama_barang']; ?></td>
                                 <td class="text-center"><?= $barang['qty']; ?></td>
                                 <td class="text-right">Rp. <?= number_format($barang['price']); ?></td>
                                 <td class="text-right" id="subtotal">Rp. <?= number_format($subtotal); ?></td>
                              </tr>
                           <?php endforeach; ?>

                        </table>
                        <button class="btn btn-block btn-danger" id="pay-button">Pilih Metode Pembayaran</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>