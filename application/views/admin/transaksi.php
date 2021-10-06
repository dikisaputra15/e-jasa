<div class="container" style="font-size:13px;">
   <div class="row">
      <div class="col-md">
         <div class="card shadow">
            <div class="card-body">
               <table id="dataTable" class="table table-bordered table-sm">
                  <thead>
                     <tr>
                        <th class="text-center">#</th>
                        <th>Status message</th>
                        <th>Order id</th>
                        <th>Total bayar</th>
                        <th>Payment type</th>
                        <th>Transaction time</th>
                        <th>Transaction status</th>
                        <!-- <th>Bill key</th>
                        <th>Biller code</th> -->
                        <th>Bank</th>
                        <!-- <th>Va number</th>
                        <th>Bca va number</th>
                        <th>Permata va number</th> -->
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>

                     <?php $i = 1; ?>
                     <?php foreach ($transaksi as $value) : ?>
                        <tr>
                           <td class="text-center"><?= $i++; ?></td>
                           <td><?= $value['status_message']; ?></td>
                           <td><?= $value['order_id']; ?></td>
                           <td>Rp. <?= number_format($value['gross_amount']); ?></td>
                           <td><?= $value['payment_type']; ?></td>
                           <td><?= $value['transaction_time']; ?></td>
                           <?php if ($value['transaction_status'] == 'pending') : ?>
                              <td class="text-center"><span class="badge badge-warning" style="font-size: 12px;"><?= $value['transaction_status']; ?></span></td>
                           <?php elseif ($value['transaction_status'] == 'expire') : ?>
                              <td class="text-center"><span class="badge badge-danger" style="font-size: 12px;"><?= $value['transaction_status']; ?></span></td>
                           <?php else : ?>
                              <td class="text-center"><span class="badge badge-success" style="font-size: 12px;"><?= $value['transaction_status']; ?></span></td>
                           <?php endif; ?>
                           <!-- <td class="text-center"><?= $value['bill_key']; ?></td>
                           <td class="text-center"><?= $value['biller_code']; ?></td> -->
                           <?php if ($value['permata_va_number'] == '-') : ?>
                              <td><?= $value['bank']; ?></td>
                           <?php else : ?>
                              <td><?= 'Permata bank'; ?></td>
                           <?php endif; ?>
                           <!-- <td><?= $value['va_number']; ?></td>
                           <td><?= $value['bca_va_number']; ?></td>
                           <td><?= $value['permata_va_number']; ?></td> -->
                           <td><a class="btn btn-circle btn-sm btn-info" href="<?= base_url('snap/transaksi_detail/') . $value['id_transaksi']; ?>"><i class="fas fa-eye"></i></a></td>
                        </tr>

                     <?php endforeach; ?>
                  </tbody>
               </table>

            </div>

         </div>
      </div>
   </div>
</div>