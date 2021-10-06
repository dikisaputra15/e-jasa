<?php

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata('email')) {
		// 	redirect('auth/login');
		// }
		$this->load->model('Model_transaksi');
	}


	public function index()
	{
		$data['title'] = 'Pembayaran';
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
		$this->form_validation->set_rules('alamat_lengkap', 'Alamat', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('home/header', $data);
			$this->load->view('home/topbar');
			$this->load->view('home/pembayaran');
			$this->load->view('home/footer');
		} else {
			$id_user = $this->session->userdata('id_user');
			$proses = $this->Model_transaksi->proses_pesan($id_user);
			if ($proses) {
				$this->cart->destroy();

				$data['last_id'] = $proses['id_pesanan'];
				$this->session->set_userdata([
					'id_pesanan' => $proses['id_pesanan'],
					'id_barang' => $proses['id_barang']
				]);
				$data['pesanan_detail'] = $this->Model_transaksi->get_pesanan_id($data['last_id']);
				$data['barang_detail'] = $this->Model_transaksi->get_barang_detail($data['last_id']);
				$data['title'] = 'Transaksi';
				$this->load->view('home/header', $data);
				$this->load->view('home/topbar');
				$this->load->view('home/cekout', $data);
				$this->load->view('home/footer');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         Transaksi Gagal!</div>');
				redirect('home');
			}
		}
	}

	public function provinsi()
	{
		// provinsi
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_HTTPHEADER => array(
				"key: 34405acd160537667a4f4917ff507e3c"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$array_response = json_decode($response, TRUE);
			$data_provinsi = $array_response['rajaongkir']['results'];
			echo "<option>Pilih Provinsi</option>";
			foreach ($data_provinsi as $key => $tiap_provinsi) {
				echo "<option value='" . $tiap_provinsi['province_id'] . "' id_provinsi='" . $tiap_provinsi['province_id'] . "'>";
				echo $tiap_provinsi['province'];
				echo "</option>";
			}
		}
	}

	public function distrik()
	{
		// kota

		$id_provinsi_terpilih = $this->input->post('id_provinsi');

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_provinsi_terpilih,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_HTTPHEADER => array(
				"key: 34405acd160537667a4f4917ff507e3c"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$array_response = json_decode($response, TRUE);
			$data_distrik = $array_response['rajaongkir']['results'];
			echo "<option>Pilih distrik</option>";
			foreach ($data_distrik as $key => $tiap_distrik) {
				echo "<option value='' 
				id_distrik='" . $tiap_distrik['city_id'] . "'
				nama_provinsi='" . $tiap_distrik['province'] . "' 
				nama_distrik='" . $tiap_distrik['city_name'] . "' 
				type_distrik='" . $tiap_distrik['type'] . "' 
				kodepos='" . $tiap_distrik['postal_code'] . "' >";
				echo $tiap_distrik['type'] . " ";
				echo $tiap_distrik['city_name'];
				echo "</option>";
			}
		}
	}


	public function ongkir()
	{

		// ekspedisi / kurir - ongkir
		$ekspedisi = $this->input->post('ekspedisi');
		$distrik = $this->input->post('distrik');
		$berat = $this->input->post('berat');

		// kota asal nya pandeglang
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_SSL_VERIFYHOST => 0,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "origin=331&destination=" . $distrik . "&weight=" . $berat . "&courier=" . $ekspedisi,
			CURLOPT_HTTPHEADER => array(
				"content-type: application/x-www-form-urlencoded",
				"key: 34405acd160537667a4f4917ff507e3c"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		} else {
			$array_response =	json_decode($response, TRUE);
			$paket = $array_response['rajaongkir']['results']['0']['costs'];

			echo "<option>Pilih Paket</option>";
			foreach ($paket as $key => $tiap_paket) {
				echo "<option 
				paket='" . $tiap_paket['service'] . "'
				ongkir='" . $tiap_paket['cost']['0']['value'] . "'
				etd='" . $tiap_paket['cost']['0']['etd'] . "' >";
				echo $tiap_paket['service'] . " ";
				echo number_format($tiap_paket['cost']['0']['value']) . " ";
				echo $tiap_paket['cost']['0']['etd'];
				echo "</option>";
			}
		}
	}
}
