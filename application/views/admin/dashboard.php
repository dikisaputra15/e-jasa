<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <!-- Begin Page Content -->
   <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
         <h1 class="h3 mb-0 text-gray-800">DASHBOARD</h1>
      </div>

      <div class="row">
         <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pendapatan</div>
                        <?php foreach ($pendapatan as $pen) : ?>
                           <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($pen['pendapatan']);  ?></div>
                        <?php endforeach; ?>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                     </div>
                     <small class="text-muted mt-1 p-0" style="font-size: 9px;">Pendapatan berdasarkan status SETTLEMENT</small>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Transaksi Masuk</div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $transaksi_masuk; ?></div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Transaksi Gagal</div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($transaksi_gagal); ?></div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Transaksi Berhasil</div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($transaksi_berhasil); ?></div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
               <div class="card-body">
                  <div class="row no-gutters align-items-center">
                     <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Transaksi Pending</div>

                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($transaksi_pending); ?></div>
                     </div>
                     <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>



      </div>
      <!-- /.container-fluid -->

   </div>
   <!-- End of Main Content -->