<div class="container">
   <div class="row">
      <div class="col-md-8">
         <div class="card mb-3 shadow">
            <div class="card-body">
               <?= form_open_multipart('admin/AdminController/edit_proses') ?>
               <div class="form-group row">
                  <input type="hidden" name="id_user" id="id_user" value="<?= $user['id_user'] ?>">
                  <label for="email" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" value="<?= $user['email']; ?>" readonly>
                  </div>
               </div>
               <div class="form-group row">
                  <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                     <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-sm-2">Foto profile</div>
                  <div class="col-sm-10">
                     <div class="row">
                        <div class="col-sm-3">
                           <img src="<?= base_url('public/img/profile/') . $user['gambar']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="gambar" name="gambar">
                              <label class="custom-file-label" for="image">Choose file</label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="form-group row justify-content-end">
                  <div class="col-sm-10">
                     <button type="submit" class="btn btn-danger">Edit</button>
                  </div>
               </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>