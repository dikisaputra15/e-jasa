<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Kategori_model');
      $this->load->model('Model_user');
      $this->load->model('Model_barang');
   }

   public function index()
   {
      $data['title'] = 'E-JASA';
      $data['barang'] = $this->Model_barang->tampil();
      $data['barang_baru'] = $this->Model_barang->tampil_baru();
      $this->load->view('home/headerhome', $data);
      $this->load->view('home/menu');
      $this->load->view('home/indexhome', $data);
      $this->load->view('home/footerhome');
   }

   public function search()
   {
      if ($this->input->post('submit')) {
         $data['keyword'] = $this->input->post('keyword');
      } else {
         $data['keyword'] = null;
      }
      $data['title'] = 'Cari';
      $data['barang'] = $this->Model_barang->search($data['keyword']);
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/search', $data);
      $this->load->view('home/footer');
   }

   public function tambah_keranjang()
   {

      $data = [
         'id' => $this->input->post('produk_id'),
         'name' => $this->input->post('produk_nama'),
         'price' => $this->input->post('produk_harga'),
         'qty' => $this->input->post('quantity'),
         'image'   => $this->input->post('gambar')
      ];

      $this->cart->insert($data);
      redirect('home');
   }

   public function detail_keranjang()
   {
      $data['title'] = 'detail pemesanan';
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/keranjang');
      $this->load->view('home/footer');
   }

   public function hapus_keranjang($data)
   {
      $row_id = $data;
      $qty = 0;
      $array = array('rowid' => $row_id, 'qty' => $qty);
      $this->cart->update($array);
      redirect('home/detail_keranjang');
   }

   public function pembayaran()
   {
      $data['title'] = 'Pembayaran';
      $data['barang'] = $this->Model_barang->tampil();
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/pembayaran', $data);
      $this->load->view('home/footer');
   }

   public function detail($id_barang)
   {
      $data['title'] = 'Detail';
      $data['barang'] = $this->Model_barang->getById($id_barang);
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/detail', $data);
      $this->load->view('home/footer');
   }

   public function update_keranjang($rowid)
   {
      $data = [
         'rowid'   => $rowid,
         'qty'     => $this->input->post('qty')
      ];
      $this->cart->update($data);
      redirect('home/detail_keranjang');
   }

   public function setting()
   {
      $data['title'] = 'Setting';
      $id_user = $this->session->userdata('id_user');
      $data['user'] = $this->Model_user->get($id_user);

      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/setting', $data);
      $this->load->view('home/footer');
   }

   public function edit_profile($id_user)
   {
      $data['title'] = 'Edit Profile';
      $data['get'] = $this->Model_user->getUserId($id_user);
      $this->load->view('home/header', $data);
      $this->load->view('home/topbar');
      $this->load->view('home/edit_profile', $data);
      $this->load->view('home/footer');
   }

   public function update_proses()
   {
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
      if ($this->form_validation->run() == false) {
         $this->load->view('home/header');
         $this->load->view('home/topbar');
         $this->load->view('home/edit_profile');
         $this->load->view('home/footer');
      } else {

         $nama = $this->input->post('nama');
         $id_user = $this->input->post('id_user');
         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['upload_path'] = './public/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
               $old_image = $data['user']['gambar'];

               if ($old_image != 'default.jpg') {
                  unlink(FCPATH . 'public/img/profile/' . $old_image);
               }
               $new_image = $this->upload->data('file_name');
               $this->db->set('gambar', $new_image);
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->set('nama', $nama);
         $this->db->where('id_user', $id_user);
         $this->db->update('user');

         redirect('home/setting');
      }
   }

   public function changePassword()
    {
        $data = [
            'title' => 'Ubah Password'
        ];
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('home/header', $data);
            $this->load->view('home/topbar');
            $this->load->view('home/ganti_password');
            $this->load->view('home/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('pesandata', 'Password salah');
                redirect('home/changePassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesandata', 'Password baru tidak boleh sama dengan password sekarang');
                    redirect('admin/AdminController/changePassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('user');

                    $this->session->set_flashdata('pesanberhasil', 'password anda sudah diganti');
                    redirect('home/changePassword');
                }
            }
        }
    }

    public function laporan_pdf($id)
    {
        $this->load->model('LaporanModel');
        $data['laporan_pdf'] = $this->LaporanModel->read($id);

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-alumni.pdf";
        $this->pdf->load_view('home/laporan_pdf', $data);
    }

    public function about()
    {
       $data['title'] = 'Tentang';
       $this->load->view('home/header', $data);
       $this->load->view('home/topbar');
       $this->load->view('home/about', $data);
       $this->load->view('home/footer');
    }
}
