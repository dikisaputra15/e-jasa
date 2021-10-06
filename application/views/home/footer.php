<style>
   .context-dark, .bg-gray-dark, .bg-primary {
    color: #231f20;
}

.footer-classic a, .footer-classic a:focus, .footer-classic a:active {
    color: #231f20;
}
.nav-list li {
    padding-top: 5px;
    padding-bottom: 5px;
}

.nav-list li a:hover:before {
    margin-left: 0;
    opacity: 1;
    visibility: visible;
}

ul, ol {
    list-style: none;
    padding: 0;
    margin: 0;
}

.social-inner {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 23px;
    font: 900 13px/1 "Lato", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    text-transform: uppercase;
    color: #231f20;
}

.nav-list li a:before {
    content: "\f14f";
    font: 400 21px/1 "Material Design Icons";
    color: #4d6de6;
    display: inline-block;
    vertical-align: baseline;
    margin-left: -28px;
    margin-right: 7px;
    opacity: 0;
    visibility: hidden;
    transition: .22s ease;
}
</style>
</div>
</div>
</div>

<!-- </footer> -->
<!-- Bootstrap core JavaScript -->
<br>
<br>
<br>
<br>
<footer class="section footer-classic context-dark bg-image" style="background: #e3e4d6;">
    <div class="px-5 py-5">
      <div class="row">
      <div class="col-md-4 col-xl-5">
        <div class="pr-xl-4">
        <!--<a class="brand" href="index.html"><img class="brand-logo-light" src="images/agency/logo-inverse-140x37.png" alt="" width="140" height="37" srcset="images/agency/logo-retina-inverse-280x74.png 2x"></a>-->
         
          <!-- Rights-->
          <p class="rights"><span>©  </span><span class="copyright-year">2020</span><span> </span><span>elektronik jasa</span><span></p>
        </div>
      </div>
    
  </div>
  </div>
</div>
</footer>
<script src="<?= base_url("assets/jquery-3.4.1.min.js"); ?>"></script>
<script src="<?= base_url("assets/shop-pages/"); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url("assets/shop-pages/"); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/sb-admin2') ?>/js/sweetalert2.all.min.js"></script>

<script>
   $(document).ready(function() {
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

      $.ajax({
         type: 'post',
         url: '<?= base_url('transaksi/provinsi') ?>',
         success: function(hasil) {
            $('select[name=provinsi]').html(hasil);
         }
      });

      $("select[name=provinsi]").on("change", function() {
         let id_provinsi_terpilih = $("option:selected", this).attr("id_provinsi");
         $.ajax({
            type: 'post',
            url: '<?= base_url('transaksi/distrik') ?>',
            data: 'id_provinsi=' + id_provinsi_terpilih,
            success: function(hasil) {
               $("select[name=kota]").html(hasil);
            }
         })
      });

      $("select[name=kurir]").on("change", function() {
         // dapatkan id kurir atau value dari select option kurir
         let kurir_terpilih = $("select[name=kurir]").val();

         // dapatkan id_disktrik atau kota
         let kota_terpilih = $("option:selected", "select[name=kota]").attr("id_distrik");

         // dapatkan total berat
         let total_berat = $("input[name=total_berat]").val();
         $.ajax({
            type: 'post',
            url: '<?= base_url('transaksi/ongkir') ?>',
            data: 'ekspedisi=' + kurir_terpilih + '&distrik=' + kota_terpilih + '&berat=' + total_berat,
            success: function(hasil) {
               $("select[name=paket]").html(hasil);
               $("input[name=nama_ekspedisi]").val(kurir_terpilih);
            }
         })
      });

      $("select[name=kota]").on("change", function() {
         let prov = $("option:selected", this).attr("nama_provinsi");
         let dist = $("option:selected", this).attr("nama_distrik");
         let tipe = $("option:selected", this).attr("type_distrik");
         let kodepos = $("option:selected", this).attr("kodepos");

         $("input[name=nama_provinsi]").val(prov);
         $("input[name=nama_distrik]").val(dist);
         $("input[name=type]").val(tipe);
         $("input[name=nama_kodepos]").val(kodepos);
      });

      $("select[name=paket]").on("change", function() {
         let paket = $("option:selected", this).attr("paket");
         let ongkir = $("option:selected", this).attr("ongkir");
         let etd = $("option:selected", this).attr("etd");
         $("input[name=nama_paket]").val(paket);
         $("input[name=ongkoskirim]").val(ongkir);
         $("input[name=estimasi]").val(etd);
      });

      $("select[name=paket]").on("change", function() {
         var ongkir_terpilih = $("option:selected", this).attr("ongkir");
         var belanja = $("#belanja").attr("cart_total");
         var total = Number(ongkir_terpilih) + Number(belanja);
         $("#ongkir").text(Intl.NumberFormat().format(ongkir_terpilih));
         $("#total_belanja").text(Intl.NumberFormat().format(total));
         $("input[name=total_bayar]").val(total);
      });

      // midtrans action ============================
      $('#pay-button').click(function(event) {
         event.preventDefault();
         $(this).attr("disabled", "disabled");


         $.ajax({
            url: '<?= site_url() ?>/snap/token',
            cache: false,
            // data: 'nama_penerima=' + nama_penerima,

            success: function(data) {
               //location = data;


               console.log('token = ' + data);

               var resultType = document.getElementById('result-type');
               var resultData = document.getElementById('result-data');

               function changeResult(type, data) {
                  $("#result-type").val(type);
                  $("#result-data").val(JSON.stringify(data));
                  //resultType.innerHTML = type;
                  //resultData.innerHTML = JSON.stringify(data);
               }

               snap.pay(data, {

                  onSuccess: function(result) {
                     changeResult('success', result);
                     console.log(result.status_message);
                     console.log(result);
                     $("#payment-form").submit();
                  },
                  onPending: function(result) {
                     changeResult('pending', result);
                     console.log(result.status_message);
                     $("#payment-form").submit();
                  },
                  onError: function(result) {
                     changeResult('error', result);
                     console.log(result.status_message);
                     $("#payment-form").submit();
                  }
               });
            }
         });
      });

      // jquery tambah quantitiy halaman home
      $(".tambah_keranjang").on("click", function() {
         var produk_id = $(this).data("produkid");
         var produk_nama = $(this).data("produknama");
         var produk_harga = $(this).data("produkharga");
         var gambar = $(this).data("gambar");
         var quantity = $('#' + produk_id).val();
         $.ajax({
            method: "post",
            url: "<?= base_url('Home/tambah_keranjang') ?>",
            data: {
               produk_id: produk_id,
               produk_nama: produk_nama,
               produk_harga: produk_harga,
               gambar: gambar,
               quantity: quantity
            },
            success: function(hasil) {
               location.reload();
            }
         });


      });
   });
</script>

</body>

</html>