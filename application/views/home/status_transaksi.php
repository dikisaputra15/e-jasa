<div class="container mt-4" style="font-size:13px;">
   <?php if ($barang == null) : ?>
      <div class="row justify-content-center">
         <div class="col-md-9">
            <div class="justify-content-center">
               <div class="alert alert-danger" role="alert">
                  <h1 class="mb-4 text-center"><i class="fa fa-frown-o"></i></h1>
                  <h2 class="alert-heading text-center">Transaksi tidak ditemukan!</h2>
                  <p class="text-center">Sepertinya anda belum melakukan transaksi</p>
               </div>
            </div>
         </div>
      </div>
   <?php else : ?>
      <div class="row justify-content-center">
         <div class="col-md-8">
            <div class="list-group shadow">
               <?php foreach ($barang as $barang) : ?>
                  <a href="<?= base_url('snap/detail/') . $barang['id_pesanan'] ?>" class="list-group-item list-group-item-action">
                     <img class="rounded mr-2 " style="width: 50px;" src="<?= base_url('public/img/upload/') . $barang['gambar'] ?>">
                     <span class="text-muted"><?= $barang['nama_barang'] ?></span>
                     <?php if ($barang['transaction_status'] == 'expire') : ?>
                        <span class="btn btn-sm btn-danger float-right mt-2 disabled"><?= $barang['transaction_status'] ?></span>
                     <?php elseif ($barang['transaction_status'] == 'pending') : ?>
                        <span class="btn btn-sm btn-warning float-right mt-2 disabled"><?= $barang['transaction_status'] ?></span>
                     <?php else : ?>
                        <span class="btn btn-sm btn-success float-right mt-2 disabled"><?= $barang['transaction_status'] ?></span>
                     <?php endif; ?>
                     <span class="float-right mr-1 mt-2 btn btn-sm btn-outline-danger disabled"><?= $barang['status_message'] ?></span>
                  </a>
               <?php endforeach; ?>
            </div>
         </div>
      </div>
   <?php endif; ?>
</div>