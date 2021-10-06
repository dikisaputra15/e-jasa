<div class="container mt-4">
   <div class="row">
      <div class="col-md-6">
         <div class="card shadow">
            <div class="card-header">
               <h6>Edit profile</h6>
            </div>
            <div class="card-body">
               <?= form_open_multipart('home/update_proses'); ?>
               <input type="hidden" name="id_user" value="<?= $get['id_user'] ?>">
               <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" value="<?= $get['nama'] ?>">
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" value="<?= $get['email'] ?>" disabled>
               </div>
               <div class="form-group">
                  <label for="gambar">Foto profile</label>
                  <img class="img-profile rounded-circle small ml-3" style="height: 25px;" src="<?= base_url('public/img/profile/') . $get['gambar']; ?>"> <br>
                  <input type="file" id="gambar" name="gambar">
               </div>
               <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i> Edit</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>