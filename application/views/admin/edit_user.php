<div class="container">
   <div class="row">
      <div class="col-md-6">
         <div class="card shadow">
            <div class="card-header">
               Form Ubah User
            </div>
            <div class="card-body">
               <form action="" method="post">
                  <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                  <div class="form-group">
                     <label>Nama</label>
                     <input type="text" class="form-control" name="nama" value="<?= $user['nama']; ?>">
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="text" class="form-control" name="email" value="<?= $user['email']; ?>">
                  </div>
                  <div class="form-group">
                     <label>Role</label>
                     <input type="text" class="form-control" name="role_id" value="<?= $userMenu['role_id']; ?>">
                  </div>

                  <small>Role 1 = Administrator</small><br>
                  <small>Role 2 = Member</small>

                  <div class="mt-4">
                     <a href="<?= base_url('admin/user'); ?>" class="btn btn-sm btn-danger shadow-sm"><i class="fas fa-backspace"></i> Kembali</a>
                     <button type="submit" class="btn btn-sm btn-light shadow-sm ml-2" name="ubah"><i class="fas fa-edit"></i> Ubah Data</button>
                  </div>
               </form>
            </div>
         </div>

      </div>
   </div>
</div>