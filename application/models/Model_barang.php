<?php

class Model_barang extends CI_Model
{

   public function tampil()
   {

      $query = "SELECT * FROM `tb_jasa`";
      return $this->db->query($query)->result_array();
   }

   public function tampil_baru()
   {
      $this->db->select('*');
      $this->db->from('tb_jasa');
      $this->db->order_by('id_barang', 'DESC');
      $this->db->limit(3);
      $query = $this->db->get();
      return $query->result_array();
   }

   public function search($keyword = null)
   {
      if ($keyword) {
         $this->db->like('nama_barang', $keyword);
      }
      return $this->db->get('tb_jasa')->result_array();
   }

   public function tampil_admin()
   {
      $query = "SELECT `tb_jasa`.*, `kategori`.`nama_kategori`
                  FROM `tb_jasa` JOIN `kategori`
                  ON `tb_jasa`.`id_kategori` = `kategori`.`id_kategori`
                ";
      return $this->db->query($query)->result_array();
   }

   public function tampil_kategori()
   {
      return $this->db->get('kategori')->result_array();
   }

   public function insert($data, $table)
   {
      $this->db->insert($table, $data);
   }

   public function delete($id)
   {
      $this->db->delete('tb_jasa', ['id_barang' => $id]);
   }

   public function tampilById($id)
   {
      $query = "SELECT `tb_jasa`.*, `kategori`.`nama_kategori`
                  FROM `tb_jasa` JOIN `kategori`
                  ON `tb_jasa`.`id_kategori` = `kategori`.`id_kategori`
                  WHERE `id_barang` = $id
                ";
      return $this->db->query($query)->result_array();
   }

   public function getById($id_barang)
   {
      $query = "SELECT `tb_jasa`.*, `kategori`.`nama_kategori`
               FROM `tb_jasa` JOIN `kategori`
                ON `tb_jasa`.`id_kategori` = `kategori`.`id_kategori`
               WHERE `id_barang` = $id_barang
    ";
      return $this->db->query($query)->row_array();
   }

   public function find($id_barang)
   {

      $result = $this->db->where('id_barang', $id_barang)
         ->limit(1)
         ->get('tb_jasa');

      if ($result->num_rows() > 0) {
         return $result->row();
      } else {
         return [];
      }
   }
}
