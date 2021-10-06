<div class="container">

   <div class="card o-hidden border-0 shadow-lg col-lg-6 mx-auto mt-4 my-5">
      <div class="card-body p-0">
         <!-- Nested Row within Card Body -->
         <div class="row">
            <div class="col-lg">
               <div class="p-5">
                  <div class="text-center">
                     <h1 class="h4 text-gray-900 mb-4">Registrasi Akun Baru</h1>
                  </div>

                  <form class="user" method="POST" action="<?= base_url('auth/register') ?>">
                     <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="name" name="nama" placeholder="Nama Lengkap">
                        <?= form_error('nama'); ?>
                     </div>
                     <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email">
                        <?= form_error('email'); ?>
                     </div>
                     <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                     </div>
                     <button type="submit" class="btn btn-dark btn-user btn-block">
                        Register Akun
                     </button>
                     <hr>
                     <div class="text-center">
                        <a class="small text-gray-700" href="<?= base_url('login') ?>">Sudah punya akun? Login!</a>
                     </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</div>