<?php

class Auth extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
   }

   public function login()
   {
      $this->form_validation->set_rules('email', 'Email', 'required|trim');
      if ($this->form_validation->run() == false) {
         $data['title'] = "Login";
         $this->load->view('auth/templates/header', $data);
         $this->load->view('auth/login');
         $this->load->view('auth/templates/footer');
      } else {
         $this->prosesLogin();
      }
   }

   private function prosesLogin()
   {
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $user = $this->db->get_where('user', ['email' => $email])->row_array();

      if ($user) {
         if (password_verify($password, $user['password'])) {
            $data = [
               'id_user' => $user['id_user'],
               'nama' => $user['nama'],
               'email' => $user['email'],
               'gambar' => $user['gambar'],
               'role_id' => $user['role_id']
            ];
            $this->session->set_userdata($data);
            if ($user['role_id'] == 1) {
               redirect('admin');
            } else {
               redirect('home');
            }
         } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Password Salah!</div>');
            redirect('auth/login');
         }
      } else {
         $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         Email Belum Teregistrasi!</div>');
         redirect('auth/login');
      }
   }

   public function logout()
   {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('nama');
      $this->session->unset_userdata('gambar');
      $this->session->unset_userdata('role_id');
      $this->session->set_flashdata(
         'pesan',
         '<div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            Terima kasih telah berkunjung :)
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>'
      );
      redirect('home');
   }

   public function register()
   {
      $this->form_validation->set_rules('nama', 'Name', 'required|trim');
      $this->form_validation->set_rules('email', 'Email', 'required|trim');
      if ($this->form_validation->run() == false) {

         $data['title'] = "Registrasi Akun";
         $this->load->view('auth/templates/header', $data);
         $this->load->view('auth/register');
         $this->load->view('auth/templates/footer');
      } else {
         $data = [
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'gambar' => 'default.jpg',
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => 2
         ];

         $this->db->insert('user', $data);
         $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         Registrasi Berhasil! </div>');
         redirect('auth/login');
      }
   }
}
