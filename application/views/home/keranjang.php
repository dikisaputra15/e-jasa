<div class="container mb-3 mt-4">
   <div class="row mt-3">

      <div class="col-md-8">

         <div class="card mt-3 shadow">
            <div class="card-body">
               <?php if ($this->cart->contents()) : ?>
                  <table class="table table-borderless">
                     <?php
                     foreach ($this->cart->contents() as $items) :
                        echo form_open('home/update_keranjang/' . $items['rowid']);
                     ?>
                        <tr>
                           <td class="align-middle">
                              <img class="" style="width: 60px;" src="<?= base_url('public/img/upload/') . $items['image'] ?>">
                           </td>
                           <td class="align-middle">
                              <small><?= $items['name']; ?></small>
                           </td>
                           <td>
                              <a href="<?= base_url('home/hapus_keranjang/') . $items['rowid'] ?>"><i class="fas fa-trash" style="color:salmon; padding-top: 20px;"></i></a>
                           </td>
                           <td class="align-middle">
                              <div class="input-group" hidden>
                                 <div class="input-group-prepend">
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-edit fa-1x"></i></button>
                                 </div>
                                 <input style="width: 50px;" name="qty" type="number" class="text-center form-control" value="<?= $items['qty'] ?>">
                              </div>
                           </td>
                           <td class="align-middle">
                              <p style="padding:0px; margin:0px; bottom:0px;">Rp. <?= number_format($items['price'], 0, ',', '.'); ?></p>
                              <small class="text-muted" style="font-size: 10px;">Harga barang</small>
                           </td>
                           <td class="align-middle">
                              <p style="padding:0px; margin:0px; bottom:0px;" id="subtotal" subtotal="<?= $items['subtotal'] ?>">Rp. <?= number_format($items['subtotal'], 0, ',', '.'); ?></p>
                              <small class="text-muted" style="font-size: 10px;">Sub total</small>
                           </td>
                        </tr>
                     <?php
                        echo form_close();
                     endforeach; ?>
                  </table>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="card mt-3 shadow">
            <div class="card-body">
               <h5 class="float-left">Total Bayar</h5>
               <span class="float-right">Rp. <?= number_format($this->cart->total(), 0, ',', '.'); ?></span>
               <span class="float-right" hidden><small class="text-muted">Belum termasuk ongkos kirim</small></span>
            </div>
            <div class="card-body">
               <a href="<?= base_url('transaksi') ?>" class="btn btn-block btn-danger">Pesan Sekarang</a>
            </div>
         </div>
      </div>
   <?php else : ?>
      <div class="alert alert-danger">
         pesanan anda kosong
      </div>
   <?php endif; ?>

   </div>
</div>