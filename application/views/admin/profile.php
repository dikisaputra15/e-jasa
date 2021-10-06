<div class="container">
   <div class="row">
      <div class="col-md-8">
         <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
               <div class="col-md-4">
                  <img src="<?= base_url('public/img/profile/') . $user['gambar'] ?>" class="card-img">
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h5 class="card-title"><?= $user['nama'] ?></h5>
                     <p class="card-text">Level : <?= $user['role'] ?></p>
                     <p class="card-text"><small class="text-muted"><?= $user['email'] ?></small></p>
                  </div>
               </div>
            </div>
         </div>
         <a class="btn btn-sm btn-danger" href="<?= base_url('admin/AdminController/edit_profile/') . $user['id_user'] ?>">Edit profile</a>
      </div>
   </div>
</div>