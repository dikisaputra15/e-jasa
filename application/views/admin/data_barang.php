<div class="container" style="font-size:13px;">
   <div class="row">
      <div class="col-md">
         <div class="card shadow">
            <div class="card-body">
               <button type="button" class="btn btn-sm btn-dark mb-3" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-plus fa-sm"></i> Tambah Jasa
               </button>
               <table id="dataTable" class="table table-sm table-bordered">
                  <thead>
                     <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Jasa</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kategori</th>
                        <th scope="col" class="text-center">Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $i = 1;
                     foreach ($barang as $brg) : ?>
                        <tr>
                           <th scope="row"><?= $i++; ?></th>
                           <td><?= $brg['nama_barang']; ?></td>
                           <td><?= $brg['keterangan'];; ?></td>
                           <td><?= $brg['harga']; ?></td>
                           <td><?= $brg['nama_kategori'];; ?></td>
                           <td>
                              <a href="<?= base_url('admin/data_barang/detail/') . $brg['id_barang']; ?>" class="btn btn-circle btn-sm btn-info"><i class="fas fa-eye"></i></a>

                              <a href="<?= base_url('admin/data_barang/edit/') . $brg['id_barang']; ?>" class="btn btn-circle btn-sm btn-primary"><i class="fas fa-edit"></i></a>

                              <a href="<?= base_url('admin/data_barang/hapus/') . $brg['id_barang']; ?>" class="btn btn-circle btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

   <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah Jasa</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form action="<?= base_url('admin/data_barang/tambah'); ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                     <input class="form-control form-control-sm mb-3" type="text" placeholder="Nama Jasa" name="nama_barang" id="nama_barang">
                     <input class="form-control form-control-sm mb-3" type="text" placeholder="Keterangan" name="keterangan" id="keterangan">
                     <input class="form-control form-control-sm mb-3" type="text" placeholder="Harga" name="harga" id="harga">

                     <select name="id_kategori" id="id_kategori" class="form-control form-control-sm mb-3">
                        <option value="">Kategori</option>
                        <?php foreach ($kategori as $kt) : ?>
                           <option value="<?= $kt['id_kategori'] ?>"><?= $kt['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                     </select>
                     <!-- <input class="form-control form-control-sm mb-3" type="text" placeholder="kategori" name="kategori" id="kategori"> -->

                     <!-- <input class="form-control form-control-sm mb-3" type="text" placeholder="Stok" name="stok" id="stok"> -->
                     <input class="form-control form-control-sm mb-3" type="file" placeholder="Gambar" name="gambar" id="gambar">
                  </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
               <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>