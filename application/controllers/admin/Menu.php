<?php

class Menu extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Model_menu');
   }

   public function index()
   {
      $data['title'] = 'Kategori';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['kategori'] = $this->Model_menu->getKategori();
      $this->load->view('admin_templates/header', $data);
      $this->load->view('admin_templates/sidebar');
      $this->load->view('admin_templates/topbar', $data);
      $this->load->view('admin/kategori', $data);
      $this->load->view('admin_templates/footer');
   }

   public function addKategori()
   {
      $nama_kategori = $this->input->post('nama_kategori');
      $data = ['nama_kategori' => $nama_kategori];
      $this->Model_menu->tambahKategori('kategori', $data);
      redirect('admin/Menu');
   }

   public function editKategori($id_kategori)
   {
      $data['title'] = 'Edit';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['kategori'] = $this->Model_menu->getKategoriById($id_kategori);
      $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
      if ($this->form_validation->run() == false) {
         $this->load->view('admin_templates/header', $data);
         $this->load->view('admin_templates/sidebar');
         $this->load->view('admin_templates/topbar', $data);
         $this->load->view('admin/edit_kategori', $data);
         $this->load->view('admin_templates/footer');
      } else {
         $this->Model_menu->updateKategori();
         redirect('admin/menu');
      }
   }

   public function hapusKategori($id_kategori)
   {
      $this->Model_menu->deleteKategori($id_kategori);
      redirect('admin/menu');
   }
}
