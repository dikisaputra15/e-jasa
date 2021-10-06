<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      if (!$this->session->userdata('email')) {
         redirect('auth/login');
      }
      $this->load->model('Model_user');
   }

   public function index()
   {
      $data['title'] = 'User';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['userMenu'] = $this->Model_user->getAllUser();
      $this->load->view('admin_templates/header', $data);
      $this->load->view('admin_templates/sidebar');
      $this->load->view('admin_templates/topbar', $data);
      $this->load->view('admin/user', $data);
      $this->load->view('admin_templates/footer');
   }

   public function tambah()
   {
       $data = [
         'nama' => $this->input->post('nama'),
         'email' => $this->input->post('email'),
         'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
         'gambar' => 'default.jpg',
         'role_id' => 2
       ];
       $this->Model_user->add($data);
       redirect('admin/user');

   }

   public function editUser($id)
   {
      $data['title'] = 'Edit User';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['userMenu'] = $this->Model_user->getUserById($id);
      $this->form_validation->set_rules('nama', 'Nama', 'required');
      if ($this->form_validation->run() == false) {
         $this->load->view('admin_templates/header', $data);
         $this->load->view('admin_templates/sidebar');
         $this->load->view('admin_templates/topbar', $data);
         $this->load->view('admin/edit_user', $data);
         $this->load->view('admin_templates/footer');
      } else {
         $this->Model_user->updateUser();
         redirect('admin/user');
      }
   }

   public function hapusUser($id)
   {
      $this->Model_user->deleteUser($id);
      redirect('admin/user');
   }
}
