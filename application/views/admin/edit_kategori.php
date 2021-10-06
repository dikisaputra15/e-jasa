<div class="container">
   <div class="row">
      <div class="col-md-6">
         <div class="card shadow">
            <div class="card-header">
               Form Ubah Kategori
            </div>
            <div class="card-body">
               <form action="" method="post">
                  <input type="hidden" name="id_kategori" value="<?= $kategori['id_kategori']; ?>">
                  <div class="form-group">
                     <label>Nama Kategori</label>
                     <input type="text" class="form-control" name="nama_kategori" value="<?= $kategori['nama_kategori']; ?>">
                  </div>

                  <div class="mt-4">
                     <a href="<?= base_url('admin/menu'); ?>" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-backspace"></i> Kembali</a>
                     <button type="submit" class="btn btn-sm btn-light shadow-sm ml-2" name="ubah"><i class="fas fa-edit"></i> Ubah Data</button>
                  </div>
               </form>
            </div>
         </div>

      </div>
   </div>
</div>