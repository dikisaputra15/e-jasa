<?php

class Kategori extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      // if (!$this->session->userdata('email')) {
      //    redirect('auth/login');
      // }
      $this->load->model('Kategori_model');
   }

   public function sarana()
   {
      $data['title'] = 'Kategori sarana dan prasarana';
      $data['sarana'] = $this->Kategori_model->sarana();
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/kategori/sarana', $data);
      $this->load->view('home/footer');
   }
   public function limbah()
   {
      $data['title'] = 'Kategori limbah';
      $data['limbah'] = $this->Kategori_model->limbah();
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/kategori/limbah', $data);
      $this->load->view('home/footer');
   }
   public function saluran()
   {
      $data['title'] = 'Kategori Saluran';
      $data['saluran'] = $this->Kategori_model->saluran();
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/kategori/saluran', $data);
      $this->load->view('home/footer');
   }
   public function sumur()
   {
      $data['title'] = 'Kategori sumur';
      $data['sumur'] = $this->Kategori_model->sumur();
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/kategori/sumur', $data);
      $this->load->view('home/footer');
   }
   public function desa()
   {
      $data['title'] = 'Kategori desa';
      $data['desa'] = $this->Kategori_model->desa();
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/kategori/desa', $data);
      $this->load->view('home/footer');
   }
   public function perumahan()
   {
      $data['title'] = 'Kategori perumahan';
      $data['perumahan'] = $this->Kategori_model->perumahan();
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/kategori/perumahan', $data);
      $this->load->view('home/footer');
   }
}
