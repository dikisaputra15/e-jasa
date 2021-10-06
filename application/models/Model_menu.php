<?php

class Model_menu extends CI_Model
{
   public function getKategori()
   {
      return $this->db->get('kategori')->result_array();
   }

   public function getKategoriById($id_kategori)
   {
      return $this->db->get_where('kategori', ['id_kategori' => $id_kategori])->row_array();
   }

   public function updateKategori()
   {
      $nama_kategori = $this->input->post('nama_kategori');

      $data = ['nama_kategori' => $nama_kategori];

      $this->db->update('kategori', $data, ['id_kategori' => $this->input->post('id_kategori')]);
   }

   public function tambahKategori($table, $data)
   {
      $this->db->insert($table, $data);
   }

   public function deleteKategori($id_kategori)
   {
      $this->db->delete('kategori', ['id_kategori' => $id_kategori]);
   }
}
