<div class="container mt-4">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card shadow">
            <div class="card-body">
               <img class="img-profile rounded-circle" style="height: 80px;" src="<?= base_url('public/img/profile/') . $user['gambar'] ?>">
               <div class="mt-3">
                  <h5 class="text-muted"><?= $user['nama'] ?></h5>
                  <small class="text-muted"><?= $user['email'] ?></small>
               </div>
               <hr class="divider">
               <a href="<?= base_url('home/edit_profile/') . $user['id_user'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Edit profile</a>
               <a href="<?= base_url('home/changePassword/') ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i>Ganti Password</a>
            </div>
         </div>
      </div>
   </div>
</div>