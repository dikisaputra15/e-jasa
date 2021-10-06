<div class="container mb-3 mt-4">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card shadow">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">

                     <form method="POST">
                        <div class="form-group">
                           <label for="nama">Nama lengkap</label>
                           <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value('nama') ?>">
                           <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                           <label for="nama">Nomor Telpon</label>
                           <input type="number" class="form-control" id="telepon" name="telepon" value="<?= set_value('telpon') ?>">
                           <?= form_error('telpon', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                           <label>Provinsi</label>
                           <select class="form-control" id="provinsi" name="provinsi">

                           </select>
                           <?= form_error('provinsi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                           <label>Kota/Kabupaten</label>
                           <select class="form-control" id="kota" name="kota">

                           </select>
                        </div>

                       <!--  <div class="form-group">
                           <label>Kurir</label>
                           <select class="form-control" id="kurir" name="kurir">
                              <option>Pilih Kurir</option>
                              <option value="pos">POS Indonesia</option>
                              <option value="tiki">TIKI</option>
                              <option value="jne">JNE</option>

                           </select>
                           <?= form_error('kurir', '<small class="text-danger">', '</small>'); ?>
                        </div> -->
                  </div>

                  <div class="col-md">
                     <div class="form-group">
                        <label for="alamat_lengkap">Alamat Lengkap</label>
                        <input type="text" name="alamat_lengkap" id="alamat_lengkap" class="form-control" placeholder="Isikan alamat lengkap anda" value="<?= set_value('alamat_lengkap') ?>"></input>
                        <?= form_error('alamat_lengkap', '<small class="text-danger">', '</small>'); ?>
                     </div>
                     <div class="form-group">
                        <label for="alamat_lengkap">Catatan untuk penjual</label>
                        <input type="text" name="catatan" id="catatan" class="form-control" value="<?= set_value('catatan') ?>"></input>
                     </div>

                     <!-- <div class="form-group">
                        <label>Paket ongkos kirim</label>
                        <select class="form-control" id="paket" name="paket">
                           <option>Pilih Paket</option>

                        </select>
                        <?= form_error('paket', '<small class="text-danger">', '</small>'); ?>
                     </div> -->

                     <table class="table">
                        <tr>
                           <td>Total :</td>
                           <td>
                              <p id="belanja" cart_total="<?= $this->cart->total() ?>">Rp. <?= number_format($this->cart->total())  ?></p>
                           </td>
                        </tr>
                        <!-- <tr>
                           <td> Ongkos kirim :</td>
                           <td>
                              <span class="d-inline">Rp.
                                 <p class="d-inline" id="ongkir"></p>
                              </span>
                           </td>
                        </tr> -->
                        <!-- <tr>
                           <td> <b>Total bayar</b></td>
                           <td>
                              <span class="d-inline"> <b>Rp. <p class="d-inline" id="total_belanja"></p></b> </span>
                           </td>
                        </tr> -->
                     </table>

                  </div>
               </div>

               <input type="hidden" name="total_berat" value="1200">
               <input type="hidden" name="nama_provinsi" value="">
               <input type="hidden" name="nama_distrik">
               <input type="hidden" name="type">
               <input type="hidden" name="nama_kodepos">
               <input type="hidden" name="nama_ekspedisi">
               <input type="hidden" name="nama_paket">
               <input type="hidden" name="ongkoskirim">
               <input type="hidden" name="estimasi">
               <input type="hidden" name="total_belanja" value="<?= $this->cart->total() ?>">
               <input type="hidden" name="total_bayar">
               <!-- 
               <input type="hidden" id="price" name="price" value="<?= $price ?>">
               <input type="hidden" id="quantity" name="quantity" value="<?= $quantity; ?>">
               <input type="hidden" id="barang" name="name" value="<?= $barang; ?>"> -->
               <button type="submit" class="btn btn-block btn-danger" id="submit">Ke Pembayaran</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>