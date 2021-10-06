<?php

class Model_transaksi extends CI_Model
{
   public function proses_pesan($id_user)
   {
      $nama = $this->input->post('nama');
      $provinsi = $this->input->post('nama_provinsi');
      $distrik = $this->input->post('nama_distrik');
      $telepon = $this->input->post('telepon');
      $type = $this->input->post('type');
      $alamat = $this->input->post('alamat_lengkap');
      $catatan = $this->input->post('catatan');
      $berat = $this->input->post('total_berat');
      $kodepos = $this->input->post('nama_kodepos');
      $ekspedisi = $this->input->post('nama_ekspedisi');
      $paket = $this->input->post('nama_paket');
      $ongkoskirim =  $this->input->post('ongkoskirim');
      $estimasi = $this->input->post('estimasi');
      $total_bayar = $this->input->post('total_bayar');

      $invoice = [
         'tanggal_pesan'        => date('Y-m-d H:i:s'),
         'batas_bayar'    => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
         'status'    => 'pending'
      ];
      $this->db->insert('invoice', $invoice);
      $id_invoice = $this->db->insert_id();

      $pesanan = [
         'id_invoice' => $id_invoice,
         'id_user' => $id_user,
         'nama_penerima' => $nama,
         'telepon' => $telepon,
         'alamat' => $alamat,
         'provinsi' => $provinsi,
         'distrik' => $distrik,
         'type' => $type,
         'kodepos' => $kodepos,
         'catatan' => $catatan
      ];
      $this->db->insert('tb_pesanan', $pesanan);
      $id_pesanan = $this->db->insert_id();

      foreach ($this->cart->contents() as $item) {
         $data['pesanan'] = [
            'id_pesanan' => $id_pesanan,
            'id_barang' => $item['id'],
            'id_invoice' => $id_invoice,
            'qty' => $item['qty'],
            'price' => $item['price'],
            'berat' => '0',
            'kurir' => '0',
            'paket' => '0',
            'ongkir' => '0',
            'estimasi_pengiriman' => '0',
            'total_bayar' =>  $item['price']
         ];
         $this->db->insert('tb_pesanan_detail', $data['pesanan']);
         $this->db->insert_id();
      }

      return $data['pesanan'];
   }

   public function get_pesanan_id($last_id)
   {
      $query = "SELECT `tb_pesanan`.`nama_penerima`, `tb_pesanan`.`telepon`, `tb_pesanan`.`alamat`, `tb_pesanan`.`provinsi`, 
                        `tb_pesanan`.`distrik`, `tb_pesanan`.`type`, `tb_pesanan`.`kodepos`, `tb_pesanan`.`catatan`, `user`.`nama`, `invoice`.`tanggal_pesan`  
                        FROM `tb_pesanan` JOIN `user` ON `tb_pesanan`.`id_user`=`user`.`id_user` JOIN `invoice` ON `invoice`.`id_invoice`=`tb_pesanan`.`id_invoice` 
                        WHERE `tb_pesanan`.`id_pesanan`=$last_id";

      return $this->db->query($query)->row_array();
   }

   public function get_barang_detail($last_id)
   {
      $query = "SELECT `tb_pesanan_detail`.*, `tb_jasa`.`nama_barang` FROM `tb_pesanan_detail` JOIN `tb_jasa` ON `tb_pesanan_detail`.`id_barang`=`tb_jasa`.`id_barang` WHERE `tb_pesanan_detail`.`id_pesanan`=$last_id";

      return $this->db->query($query)->result_array();
   }

   public function tampil()
   {
      return $this->db->get('pelanggan')->row_array();
   }

   public function invoice()
   {
      return $this->db->get('invoice')->result_array();
   }

   public function barang_invoice($id_invoice)
   {
      // ambil data barang JOIN
      $query = "SELECT `tb_pesanan_detail`.*, `tb_jasa`.`nama_barang` FROM `tb_pesanan_detail` JOIN `tb_jasa` ON `tb_pesanan_detail`.`id_barang`=`tb_jasa`.`id_barang` JOIN `invoice` ON `invoice`.`id_invoice`=`tb_pesanan_detail`.`id_invoice` WHERE `tb_pesanan_detail`.`id_invoice`=$id_invoice";

      return $this->db->query($query)->result_array();
   }

   public function get_detail_pesanan($id_invoice)
   {
      // ambil data pelanggan join
      $query = "SELECT `tb_pesanan`.`nama_penerima`, `tb_pesanan`.`telepon`, `tb_pesanan`.`alamat`, `tb_pesanan`.`provinsi`, 
                        `tb_pesanan`.`distrik`, `tb_pesanan`.`type`, `tb_pesanan`.`kodepos`, `tb_pesanan`.`catatan`, `invoice`.`tanggal_pesan`  
                        FROM `tb_pesanan` JOIN `invoice` ON `invoice`.`id_invoice`=`tb_pesanan`.`id_invoice` 
                        WHERE `invoice`.`id_invoice`=$id_invoice";

      return $this->db->query($query)->row_array();
   }

   public function pendapatan()
   {
      $query = "SELECT SUM(IF(`transaction_status` like 'settlement', gross_amount, 0)) as 'pendapatan'
                  FROM tb_transaksi";
      return $this->db->query($query)->result_array();
   }
}
