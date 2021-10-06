<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanModel extends CI_Model {

	public function lihat_laporan($tanggal)
   {
      $this->db->select('*');
      $this->db->from('tb_pesanan');
      $this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_pesanan.id_transaksi');
      $this->db->like('transaction_time', $tanggal);
      $this->db->where('transaction_status', 'settlement');
      $this->db->order_by('id_pesanan', 'ASC');
      $query = $this->db->get();
      return $query->result_array();
   }

   public function get_barang()
   {
      return $this->db->get('tb_jasa')->result_array();
   }

   public function laporan_stok()
   {
      $query = "SELECT SUM(qty) as `laporan_stok` FROM tb_pesanan_detail";
      return $this->db->query($query)->result_array();
   }

   public function read($id)
   {
       $this->db->select("*");
      $this->db->from('tb_pesanan');
      $this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi=tb_pesanan.id_transaksi');
      $this->db->join('user', 'user.id_user=tb_pesanan.id_user');
      $this->db->where('tb_transaksi.id_transaksi', $id);
      $result = $this->db->get()->row_array();
      return $result;
   }

   public function cetak()
   {
      $this->db->select('*');
      $this->db->from('tb_pesanan');
      $this->db->join('tb_transaksi', 'tb_transaksi.id_transaksi = tb_pesanan.id_transaksi');
      $this->db->where('transaction_status', 'settlement');
      $this->db->order_by('id_pesanan', 'ASC');
      $query = $this->db->get();
      return $query->result_array();
   }

   public function total()
   {
       $query = "SELECT SUM(IF(`transaction_status` like 'settlement', gross_amount, 0)) as 'pendapatan'
                  FROM tb_transaksi";
      return $this->db->query($query)->result_array();
   }

}

/* End of file LaporanModel.php */
/* Location: ./application/models/LaporanModel.php */