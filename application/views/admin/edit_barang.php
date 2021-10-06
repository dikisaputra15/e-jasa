<div class="container">
   <div class="row">
      <div class="col-lg-8">
         <div class="card shadow">
            <div class="card-header">
               Form Ubah Data Jasa
            </div>
            <div class="card-body">
               <?= form_open_multipart(); ?>
               <input type="hidden" name="id_barang" value="<?= $barang['id_barang']; ?>">
               <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="nama_barang" value="<?= $barang['nama_barang']; ?>">
               </div>
               <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" value="<?= $barang['keterangan']; ?>">
               </div>
               <div class="form-group">
                  <label>Harga</label>
                  <input type="text" class="form-control" name="harga" value="<?= $barang['harga']; ?>">
               </div>
               <div class="form-group">
                  <label>Kategori</label>
                  <select name="kategori" id="kategori" class="form-control" value="<?= $barang['id_kategori'] ?>">
                     <?php foreach ($kategori as $kat) : ?>
                        <?php if ($kat['id_kategori'] == $barang['id_kategori']) : ?>
                           <option value="<?= $kat['id_kategori'] ?>" selected><?= $kat['nama_kategori'] ?></option>
                        <?php else : ?>
                           <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                        <?php endif; ?>
                     <?php endforeach; ?>
                  </select>
               </div>
               <!-- <div class="form-group">
                  <label>Stok</label>
                  <input type="text" class="form-control" name="stok" value="<?= $barang['stok']; ?>">
               </div> -->
               <div class="form-group">
                  <label>Gambar</label>
                  <input type="file" class="form-control" name="gambar" id="gambar" value="<?= $barang['gambar']; ?>">
               </div>

               <div class="mt-4">
                  <a href="<?= base_url('data_barang'); ?>" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-backspace"></i> Kembali</a>
                  <button type="submit" class="btn btn-sm btn-light shadow-sm ml-2" name="ubah"><i class="fas fa-edit"></i> Ubah Data</button>
               </div>
               </form>
            </div>
         </div>

      </div>
   </div>
</div>