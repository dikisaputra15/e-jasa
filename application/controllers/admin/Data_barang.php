<?php

class Data_barang extends CI_Controller
{
   public function index()
   {
      $data['title'] = 'Data Barang';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['barang'] = $this->Model_barang->tampil_admin();
      $data['kategori'] = $this->Model_barang->tampil_kategori();
      $this->load->view('admin_templates/header', $data);
      $this->load->view('admin_templates/sidebar');
      $this->load->view('admin_templates/topbar', $data);
      $this->load->view('admin/data_barang', $data);
      $this->load->view('admin_templates/footer');
   }

   public function tambah()
   {
      $nama_barang = $this->input->post('nama_barang');
      $keterangan = $this->input->post('keterangan');
      $harga = $this->input->post('harga');
      $kategori = $this->input->post('id_kategori');
      // $stok = $this->input->post('stok');
      $gambar = $_FILES['gambar']['name'];

      if ($gambar) {
         $config['allowed_types'] = 'jpg|jpeg|png|gif|JPEG';
         $config['upload_path'] = './public/img/upload/';

         $this->load->library('upload', $config);

         if ($this->upload->do_upload('gambar')) {
         } else {
            echo $this->upload->display_errors();
         }
      }

      $data = [
         'nama_barang' => $nama_barang,
         'keterangan' => $keterangan,
         'id_kategori' => $kategori,
         'harga' => $harga,
         'gambar' => $gambar
      ];

      $this->Model_barang->insert($data, 'tb_barang');
      redirect('data_barang');
   }

   public function hapus($id)
   {
      $this->Model_barang->delete($id);
      redirect('data_barang');
   }

   public function detail($id)
   {
      $data['title'] = 'Detail Barang';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['barang'] = $this->Model_barang->tampilById($id);
      $this->load->view('admin_templates/header', $data);
      $this->load->view('admin_templates/sidebar');
      $this->load->view('admin_templates/topbar', $data);
      $this->load->view('admin/detail_barang', $data);
      $this->load->view('admin_templates/footer');
   }

   public function edit($id_barang)
   {
      $data['title'] = 'Edit';
      $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
      $data['barang'] = $this->Model_barang->getById($id_barang);
      $data['kategori'] = $this->db->get('kategori')->result_array();
      $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
      if ($this->form_validation->run() == false) {
         $this->load->view('admin_templates/header', $data);
         $this->load->view('admin_templates/sidebar');
         $this->load->view('admin_templates/topbar', $data);
         $this->load->view('admin/edit_barang', $data);
         $this->load->view('admin_templates/footer');
      } else {
         $nama_barang = $this->input->post('nama_barang');
         $keterangan = $this->input->post('keterangan');
         $harga = $this->input->post('harga');
         $kategori = $this->input->post('kategori');
         // $stok = $this->input->post('stok');
         $id_barang =  $this->input->post('id_barang');

         $gambar = $_FILES['gambar']['name'];

         if ($gambar) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['upload_path'] = './public/img/upload/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
               $old_image = $data['barang']['gambar'];
               if ($old_image != 'barang.jpg') {
                  unlink(FCPATH . 'public/img/upload/' . $old_image);
               }
               $new_image = $this->upload->data('file_name');
               $this->db->set('gambar', $new_image);
            } else {
               echo $this->upload->display_errors();
            }
         }
         $this->db->set([
            'nama_barang' => $nama_barang,
            'keterangan' => $keterangan,
            'harga' => $harga,
            'id_kategori' => $kategori
         ]);
         $this->db->where('id_barang', $id_barang);
         $this->db->update('tb_barang');
         redirect('data_barang');
      }
   }
}
