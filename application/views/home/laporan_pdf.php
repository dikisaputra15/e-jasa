<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Document</title>
   <link href="<?= base_url('assets/sb-admin2/') ?>css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="font-size: 13px;">
   <div class="text-center">
      <h4>INVOICE TRANSAKSI</h4>
      <p>E-JASA</p>
   </div>
   <div class="row mt-4 justify-content-center">
      <div class="col-md-6">
               <table class="table table-borderless table-sm">
                  <tr>
                     <td>Nama penerima</td>
                     <td>:</td>
                     <td><?= $laporan_pdf['nama_penerima'] ?></td>
                  </tr>
                  <tr>
                     <td>Email</td>
                     <td>:</td>
                     <td><?= $laporan_pdf['email'] ?></td>
                  </tr>
                  <tr>
                     <td>Telepon</td>
                     <td>:</td>
                     <td><?= $laporan_pdf['telepon'] ?></td>
                  </tr>
                  <tr>
                     <td>Provinsi</td>
                     <td>:</td>
                     <td><?= $laporan_pdf['provinsi'] ?></td>
                  </tr>
                  <tr>
                     <td>Kota/Kabupaten</td>
                     <td>:</td>
                     <td><?= $laporan_pdf['type'] . ' ' . $laporan_pdf['distrik'] ?></td>
                  </tr>
                  <tr>
                     <td>Alamat</td>
                     <td>:</td>
                     <td><?= $laporan_pdf['alamat'] ?></td>
                  </tr>
                  <tr>
                     <td>Kode pos</td>
                     <td>:</td>
                     <td><?= $laporan_pdf['kodepos'] ?></td>
                  </tr>
                  <tr>
                     <td>Pesanan status</td>
                     <td>:</td>
                     <td><?= $laporan_pdf['status_message'] ?></td>
                  </tr>
                  <tr>
                     <td>Status transaksi</td>
                     <td>:</td>
                     <?php if ($laporan_pdf['transaction_status'] == 'pending') : ?>
                        <td><span class="badge badge-warning" style="font-size: 14px;"><?= $laporan_pdf['transaction_status'] ?></span></td>
                     <?php elseif ($laporan_pdf['transaction_status'] == 'expire') : ?>
                        <td><span class="badge badge-danger" style="font-size: 14px;"><?= $laporan_pdf['transaction_status'] ?></span></td>
                     <?php else : ?>
                        <td><span class="badge badge-success" style="font-size: 14px;"><?= $laporan_pdf['transaction_status'] ?></span></td>
                     <?php endif; ?>
                  </tr>
                  <tr>
                     <td>Tipe pembayaran</td>
                     <td>:</td>
                     <td><?= $laporan_pdf['payment_type'] ?></td>
                  </tr>

                  <?php if ($laporan_pdf['bill_key'] == '-') : ?>
                     <?php echo ""; ?>
                  <?php elseif ($laporan_pdf['bill_key'] == 0) : ?>
                     <?php echo ""; ?>
                  <?php else : ?>
                     <tr>
                        <td>Bill key</td>
                        <td>:</td>
                        <td> <?= $laporan_pdf['bill_key'] ?> </td>
                     </tr>
                  <?php endif; ?>

                  <?php if ($laporan_pdf['biller_code'] == '-') : ?>
                     <?php echo ""; ?>
                  <?php elseif ($laporan_pdf['biller_code'] == 0) : ?>
                     <?php echo ""; ?>
                  <?php else : ?>
                     <tr>
                        <td>Biller code</td>
                        <td>:</td>
                        <td> <?= $laporan_pdf['biller_code'] ?> </td>
                     </tr>
                  <?php endif; ?>

                  <?php if ($laporan_pdf['permata_va_number'] == '-') : ?>
                     <tr>
                        <td>Bank</td>
                        <td>:</td>
                        <td> <?= $laporan_pdf['bank'] ?> </td>
                     </tr>
                  <?php else : ?>
                     <tr>
                        <td>Bank</td>
                        <td>:</td>
                        <td><?= 'Permata bank'; ?></td>
                     </tr>
                  <?php endif; ?>

                  <?php if ($laporan_pdf['va_number'] == '-') : ?>
                     <?php echo ""; ?>
                  <?php else : ?>
                     <tr>
                        <td>Va number</td>
                        <td>:</td>
                        <td> <?= $laporan_pdf['va_number'] ?> </td>
                     </tr>
                  <?php endif; ?>

                  <?php if ($laporan_pdf['bca_va_number'] == '-') : ?>
                     <?php echo ""; ?>
                  <?php else : ?>
                     <tr>
                        <td>BCA va number</td>
                        <td>:</td>
                        <td> <?= $laporan_pdf['bca_va_number'] ?> </td>
                     </tr>
                  <?php endif; ?>

                  <?php if ($laporan_pdf['permata_va_number'] == '-') : ?>
                     <?php echo ""; ?>
                  <?php else : ?>
                     <tr>
                        <td>Permata va number</td>
                        <td>:</td>
                        <td> <?= $laporan_pdf['permata_va_number'] ?> </td>
                     </tr>
                  <?php endif; ?>
               </table>
      </div>
   </div>
</div>

<script src="<?= base_url('assets/sb-admin2/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/sb-admin2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/sb-admin2/') ?>js/sb-admin-2.min.js"></script> 
</body>
</html>