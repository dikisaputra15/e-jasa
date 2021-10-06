<?php

class Model_user extends CI_Model
{
   public function getAllUser()
   {
      $query = "SELECT `user`.*, `user_role`.`role`
                  FROM `user` JOIN `user_role`
                  ON `user`.`role_id` = `user_role`.`id`
                ";
      return $this->db->query($query)->result_array();

   }

   public function add($data)
   {
       $this->db->insert('user', $data);
   }

   public function getUserById($id)
   {
      return $this->db->get_where('user', ['id_user' => $id])->row_array();
   }

   public function updateUser()
   {
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $role_id = $this->input->post('role_id');

      $data = [
         'nama' => $nama,
         'email' => $email,
         'role_id' => $role_id
      ];

      $this->db->update('user', $data, ['id_user' => $this->input->post('id')]);
   }

   public function deleteUser($id)
   {
      $this->db->delete('user', ['id_user' => $id]);
   }

   public function get($id_user)
   {
      return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
   }

   public function getUserId($id_user)
   {
      return $this->db->get_where('user', ['id_user' => $id_user])->row_array();
   }
}
