        <div class="container mt-4" style="font-size: 14px;">
           <div class="row">
              <div class="col-md-8 ">
                 <div class="card shadow">
                    <div class="card-header">Request pembayaran berhasil, silahkan lakukan pembayaran</div>
                    <div class="card-body">
                       <table class="table table-borderless table-sm">
                          <tr>
                             <td>Status code</td>
                             <td>:</td>
                             <td><?= $result['status_code']; ?></td>
                          </tr>

                          <tr>
                             <td>Payment type</td>
                             <td>:</td>
                             <td><?= $result['payment_type']; ?></td>
                          </tr>
                          <?php if ($result['payment_code'] == '-') : ?>
                             <?php echo ""; ?>
                          <?php elseif ($result['payment_code'] == 0) : ?>
                             <?php echo ""; ?>
                          <?php else : ?>
                             <tr>
                                <td>Payment code</td>
                                <td>:</td>
                                <td> <?= $result['payment_code'] ?> </td>
                             </tr>
                          <?php endif; ?>

                          <tr>
                             <td>Status message</td>
                             <td>:</td>
                             <td><?= $result['status_message']; ?></td>
                          </tr>

                          <tr>
                             <td>Order id</td>
                             <td>:</td>
                             <td><?= $result['order_id']; ?></td>
                          </tr>

                          <tr>
                             <td>Total bayar</td>
                             <td>:</td>
                             <td>Rp. <?= number_format($result['gross_amount']); ?></td>
                          </tr>

                          <tr>
                             <td>Status transaksi</td>
                             <td>:</td>
                             <td>
                                <?php if ($result['transaction_status'] == 'pending') : ?>
                                   <span class="badge badge-danger" style="font-size:13px;"><?= $result['transaction_status']; ?></span>
                                <?php else : ?>
                                   <span class="badge badge-success" style="font-size:13px;"><?= $result['transaction_status']; ?></span>
                                <?php endif; ?>
                             </td>
                          </tr>

                          <tr>
                             <td>Waktu transaksi</td>
                             <td>:</td>
                             <td><?= $result['transaction_time']; ?></td>
                          </tr>

                          <?php if ($result['bill_key'] == '-') : ?>
                             <?php echo ""; ?>
                          <?php elseif ($result['bill_key'] == 0) : ?>
                             <?php echo ""; ?>
                          <?php else : ?>
                             <tr>
                                <td>Bill key</td>
                                <td>:</td>
                                <td> <?= $result['bill_key'] ?> </td>
                             </tr>
                          <?php endif; ?>

                          <?php if ($result['biller_code'] == '-') : ?>
                             <?php echo ""; ?>
                          <?php elseif ($result['biller_code'] == 0) : ?>
                             <?php echo ""; ?>
                          <?php else : ?>
                             <tr>
                                <td>Biller code</td>
                                <td>:</td>
                                <td> <?= $result['biller_code'] ?> </td>
                             </tr>
                          <?php endif; ?>

                          <?php if ($result['bank'] == '-') : ?>
                             <?php echo ""; ?>
                          <?php else : ?>
                             <tr>
                                <td>Bank</td>
                                <td>:</td>
                                <td> <?= $result['bank'] ?> </td>
                             </tr>
                          <?php endif; ?>


                          <?php if ($result['va_number'] == '-') : ?>
                             <?php echo ""; ?>
                          <?php else : ?>
                             <tr>
                                <td>Va number</td>
                                <td>:</td>
                                <td> <?= $result['va_number'] ?> </td>
                             </tr>
                          <?php endif; ?>

                          <?php if ($result['bca_va_number'] == '-') : ?>
                             <?php echo ""; ?>
                          <?php else : ?>
                             <tr>
                                <td>BCA va number</td>
                                <td>:</td>
                                <td> <?= $result['bca_va_number'] ?> </td>
                             </tr>
                          <?php endif; ?>

                          <?php if ($result['permata_va_number'] == '-') : ?>
                             <?php echo ""; ?>
                          <?php else : ?>
                             <tr>
                                <td>Permata va number</td>
                                <td>:</td>
                                <td> <?= $result['permata_va_number'] ?> </td>
                             </tr>
                          <?php endif; ?>

                          <?php if ($result['pdf_url'] == '-') : ?>
                             <?php echo ""; ?>
                          <?php else : ?>
                             <tr>
                                <td>Panduan pembayaran</td>
                                <td>:</td>
                                <td><a href="<?= $result['pdf_url']; ?>"><?= $result['pdf_url']; ?></a></td>
                             </tr>
                          <?php endif; ?>

                       </table>
                       <a class="btn btn-sm btn-danger" href="<?= base_url('snap/status_transaksi') ?>">Lihat status</a>
                    </div>
                 </div>
                 <p><b>PERHATIAN!</b><br>
                    Segera lakukan pembayaran agar pesanan dapat segera di proses
                    jika ada masalah dengan pembelian, silahkan hubungi admin kami
                    Whatsapp - Admin : +62838 - xxxx - xxx
                 </p>
              </div>
           </div>
        </div>