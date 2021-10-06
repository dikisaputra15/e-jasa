<div class="container">

   <!-- Outer Row -->
   <div class="row justify-content-center">
      <a class="carousel-control-prev" href="<?= base_url('home') ?>" role="button" data-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
      </a>
      <div class="col-lg-6 mt-4">

         <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
               <!-- Nested Row within Card Body -->
               <div class="row">
                  <div class="col-lg">
                     <div class="p-5">
                        <div class="text-center">
                           <h1 class="h4 text-gray-900 mb-4">Halaman Login</h1>
                        </div>
                        <?= $this->session->flashdata('pesan'); ?>
                        <form class="user" method="POST" action="<?= base_url('auth/login') ?>">
                           <div class="form-group">
                              <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Masukan Email...">
                              <?= form_error('email'); ?>
                           </div>
                           <div class="form-group">
                              <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                           </div>

                           <button type="submit" class="btn btn-dark btn-user btn-block">
                              Login
                           </button>
                           <hr>
                           <div class="text-center">
                              <a class="small text-gray-700" href="<?= base_url('register') ?>">Buat akun baru!</a>
                           </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>

   </div>

</div>