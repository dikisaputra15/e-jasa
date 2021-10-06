<div class="container" style="font-size:13px;">
   <div class="row">
      <div class="col-md-8">
         <div class="card shadow">
            <div class="card-body">
                <button class="btn btn-sm btn-dark mb-3" data-toggle="modal" data-target="#exampleModal">Tambah user</button>
               <table id="dataTable" class="table table-sm table-bordered">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $i = 1;
                     foreach ($userMenu as $us) : ?>
                        <tr>
                           <td><?= $i++; ?></td>
                           <td><?= $us['nama']; ?></td>
                           <td><?= $us['email']; ?></td>
                           <td><?= $us['role']; ?></td>
                           <td>
                              <a href="<?= base_url('admin/user/hapusUser/') . $us['id_user'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fas fa-trash"></i></a>
                              <a href="<?= base_url('admin/user/editUser/') . $us['id_user'] ?>" class="btn btn-primary btn-circle btn-sm"><i class="fas fa-edit"></i></a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>

</div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form action="<?= base_url('admin/user/tambah') ?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                     <input class="form-control form-control-sm mb-3" type="text" placeholder="Nama lengkap" name="nama">
                  </div>
                  <div class="form-group">
                     <input class="form-control form-control-sm mb-3" type="text" placeholder="Email" name="email">
                  </div>
                  <div class="form-group">
                     <input class="form-control form-control-sm mb-3" type="password" placeholder="Password" name="password">
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