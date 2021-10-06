</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
         </div>
      </div>
   </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/sb-admin2/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/sb-admin2/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url('assets/sb-admin2/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<script src="<?= base_url('assets/sb-admin2/') ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('assets/sb-admin2') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sb-admin2') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/sb-admin2') ?>/js/sweetalert2.all.min.js"></script>

<!-- Core plugin JavaScript-->

<!-- Custom scripts for all pages-->
<!-- Page level plugins -->

<!-- Page level custom scripts -->
<script>
   $(document).ready(function() {
      $('#dataTable').DataTable();

      $('.custom-file-input').on('change', function() {
         let fileName = $(this).val().split('\\').pop();
         $(this).next('.custom-file-label').addClass("selected").html(fileName);
      });

      const pesandata = $('#pesandata').data('pesandata');
         if(pesandata){
           Swal.fire({
             title: 'Ups..',
             text: pesandata + '!',
             icon: 'warning'
           });
         }

         const berhasil = $('#pesanberhasil').data('pesanberhasil');
         if(berhasil){
           Swal.fire({
             title: 'Berhasil',
             text: 'Selamat ' + berhasil,
             icon: 'success'
           });
         }
// =========================================
        function date_indo(s) {
         var string = s;
         var split = string.split('-');
         var tahun = split[0];
         var bulan = split[1];
         var tanggal = split[2];
         var bulanArr = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

         return tanggal + ' ' + bulanArr[parseInt(bulan) - 1] + ' ' + tahun;
      }

      function days_between(StartDate, EndDate) {
         // Here are the two dates to compare
         var date1 = StartDate;
         var date2 = EndDate;

         // First we split the values to arrays date1[0] is the year, [1] the month and [2] the day
         date1 = date1.split('-');
         date2 = date2.split('-');

         // Now we convert the array to a Date object, which has several helpful methods
         date1 = new Date(date1[0], date1[1], date1[2]);
         date2 = new Date(date2[0], date2[1], date2[2]);

         // We use the getTime() method and get the unixtime (in milliseconds, but we want seconds, therefore we divide it through 1000)
         date1_unixtime = parseInt(date1.getTime() / 1000);
         date2_unixtime = parseInt(date2.getTime() / 1000);

         // This is the calculated difference in seconds
         var timeDifference = date2_unixtime - date1_unixtime;

         // in Hours
         var timeDifferenceInHours = timeDifference / 60 / 60;

         // and finaly, in days :)
         var timeDifferenceInDays = timeDifferenceInHours / 24;

         return (timeDifferenceInDays);
      }

      function formatRupiah(angka, prefix) {
         var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

         // tambahkan titik jika yang di input sudah menjadi angka ribuan
         if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
         }

         rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
         return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
      }

      $('#laporan-btn-lihat').click(function() {
         var tahun = $('#laporan-tahun').val();
         var bulan = $('#laporan-bulan').val();
         var getUrl = '<?= base_url('admin/AdminController/laporan_lihat/') ?>' + tahun + '/' + bulan;
         var bulanArr = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
         var html = '';
         $.ajax({
            url: getUrl,
            type: 'ajax',
            dataType: 'json',
            success: function(response) {
               console.log(response);
              
               if (response != null) {
                  html += '' +
                     '<div class="d-print-none float-right">' +
                     '<button onclick="window.print()" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak' +
                     '</button>' +
                     '</div>';
                  html += '' +
                     '<h2 style="text-align: center">Laporan Transaksi</h2>' +
                     '<p style="text-align: center">Laporan Bulan ' + bulanArr[parseInt(bulan) - 1] + ' ' + tahun + '</p>' +
                     '<table class="table table-bordered">' +
                     '<thead style="text-align: center">' +
                     '<tr>' +
                     '<th>No</th>' +
                     '<th>Id Transaksi</th>' +
                     '<th>Tanggal</th>' +
                     '<th>Pelanggan</th>' +
                     '<th>Total</th>' +
                     '</tr>' +
                     '</thead>' +
                     '<tbody>';
                  var no = 1;
                  var total = 0;
                  for (var i = 0; i < response.length; i++) {
                     html += '' +
                        '<tr>' +
                        '<td>' + no + '</td>' +
                        '<td>' + response[i].order_id + '</td>' +
                        '<td>' + response[i].transaction_time + '</td>' +
                        '<td>' + response[i].nama_penerima + '</td>' +
                        '<td style="text-align: right">Rp. ' + formatRupiah(response[i].gross_amount) + '</td>'
                     total = total + parseInt(response[i].gross_amount);
                     no++;
                  }
                  var d = new Date();
                  html += '' +
                     '</tbody>' +
                     '<tfoot>' +
                     '<tr>' +
                     '<td colspan="4" style="text-align: center"><b>Total</b></td>' +
                     '<td style="text-align: right"> <b>Rp. ' + formatRupiah(total.toString()) + '</b></td>' +
                     '</tr>' +
                     '</tfoot>' +
                     '</table>' +
                     '<div class="row">' +
                     '<div class="col-8"></div>' +
                     '<div class="col-4 text-center">' +
                     '<p>Serang, ' + bulanArr[parseInt(bulan) - 1] + ' ' + tahun +
                     '</p>' +
                     '<p>Owner</p>' +
                     '<br>' +
                     '<br>' +
                     '<br>' +
                     '<p><b><u>E-JASA</u></b></p>' +
                     '</div>' +
                     '</div>';
                  $('#laporan').html(html);
               }
            },
            error: function(response) {
               console.log(response.status + 'error');
            }
         })
      });

   });
</script>

</body>

</html>