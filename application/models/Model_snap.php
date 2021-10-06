<?php

class Model_snap extends CI_Model
{

   public function insert($data, $id_pesanan)
   {
      $this->db->insert('tb_transaksi', $data);
      $id_transaksi = $this->db->insert_id();

      $this->db->query("update tb_pesanan set id_transaksi='" . $id_transaksi . "' where id_pesanan='" . $id_pesanan . "' ");
      return $id_transaksi;
   }

   public function get_data($id_transaksi)
   {
      return $this->db->get_where('tb_transaksi', ['id_transaksi' => $id_transaksi])->row_array();
   }


   public function get_barang_pesanan($id_user)
   {
      $this->db->select("
         tb_pesanan.*,
         tb_jasa.nama_barang,
         tb_jasa.gambar,
         tb_pesanan_detail.*,
         tb_transaksi.status_message,
         tb_transaksi.transaction_status
      ");
      $this->db->from('tb_pesanan');
      $this->db->join('tb_pesanan_detail', 'tb_pesanan_detail.id_pesanan=tb_pesanan.id_pesanan');
      $this->db->join('tb_jasa', 'tb_pesanan_detail.id_barang=tb_jasa.id_barang');
      $this->db->join('tb_transaksi', 'tb_pesanan.id_transaksi=tb_transaksi.id_transaksi');
      $this->db->where('id_user', $id_user);
      $result = $this->db->get()->result_array();
      return $result;
   }

   // ========================================
   public function detail_pesanan($id_pesanan)
   {
      $this->db->select("
      tb_jasa.nama_barang,
      tb_jasa.gambar,
      tb_pesanan_detail.*  
       ");
      $this->db->from('tb_pesanan_detail');
      $this->db->join('tb_jasa', 'tb_pesanan_detail.id_barang=tb_jasa.id_barang');
      $this->db->where('id_pesanan', $id_pesanan);
      $result = $this->db->get()->result_array();
      return $result;
   }

   public function detail_pelanggan($id_pesanan)
   {
      $this->db->select("
      tb_pesanan.*,
      tb_transaksi.*,
      user.email
      ");
      $this->db->from('tb_pesanan');
      $this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi=tb_pesanan.id_transaksi');
      $this->db->join('user', 'user.id_user=tb_pesanan.id_user');
      $this->db->where('id_pesanan', $id_pesanan);
      $result = $this->db->get()->row_array();
      return $result;
   }
   // =========================================

   public function get_transaksi()
   {
      return $this->db->get('tb_transaksi')->result_array();
   }

   public function detail($id_transaksi)
   {
      $this->db->select('
         tb_pesanan.id_transaksi,
         tb_pesanan_detail.*,
         tb_jasa.nama_barang,
         tb_jasa.gambar
      ');
      $this->db->from('tb_pesanan_detail');
      $this->db->join('tb_jasa', 'tb_jasa.id_barang=tb_pesanan_detail.id_barang');
      $this->db->join('tb_pesanan', 'tb_pesanan.id_pesanan=tb_pesanan_detail.id_pesanan');
      $this->db->where('id_transaksi', $id_transaksi);
      $result = $this->db->get()->result_array();
      return $result;
   }

   public function pembeli($id_transaksi)
   {
      $this->db->select('
      tb_pesanan.*,
      user.email
         ');
      $this->db->from('user');
      $this->db->join('tb_pesanan', 'tb_pesanan.id_user=user.id_user');
      $this->db->where('id_transaksi', $id_transaksi);
      $result = $this->db->get()->row_array();
      return $result;
   }
}
