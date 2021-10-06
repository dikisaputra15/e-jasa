<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Snap extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
	{
		parent::__construct();
		$params = array('server_key' => 'SB-Mid-server-4klFJN2IwUW3WI09Pv9cZcnn', 'production' => false);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
		$this->load->model('Model_snap');
	}

	public function index()
	{
		$data['title'] = 'Cekout';
		$this->load->view('home/header', $data);
		$this->load->view('home/cekout');
	}

	public function token()
	{

		//menampilkan pesanan
		$this->db->select("
			tb_pesanan_detail.id_pesanan as id,
			tb_pesanan_detail.qty as quantity,
			tb_jasa.harga as price,
			tb_jasa.nama_barang as name
		");
		$this->db->from('tb_pesanan_detail');
		$this->db->join('tb_jasa', 'tb_jasa.id_barang=tb_pesanan_detail.id_barang');
		$this->db->where('id_pesanan', $this->session->userdata('id_pesanan'));
		$item = $this->db->get();


		//ongkir
		$ongkir = $this->db->query("select ongkir from tb_pesanan_detail where id_pesanan='" . $this->session->userdata('id_pesanan') . "' ")->row();

		$gross_amount = 0;
		foreach ($item->result() as $r) {
			$gross_amount += $r->price * $r->quantity; //menghitung gross amount
		}
		// Required
		$transaction_details = array(
			'order_id' => rand(),
			'gross_amount' => $gross_amount + (int) $ongkir->ongkir, // no decimal allowed for creditcard
		);

		$data_ongkir = array(
			'id' => 'Ongkir',
			'price' => (int) $ongkir->ongkir,
			'quantity' => 1,
			'name' => "Ongkir"
		);

		$item_details = array_merge($item->result_array(), array($data_ongkir));

		//menampilkan data customer
		$cust = $this->db->query("select * from tb_pesanan where id_pesanan='" . $this->session->userdata('id_pesanan') . "'")->row();
		// Optional
		$billing_address = array(
			'first_name'    => "E",
			'last_name'     => "JASA",
			'address'       => "Jl.xx xx",
			'city'          => "Pandeglang",
			'postal_code'   => "00000",
			'phone'         => "081122334455",
			'country_code'  => 'IDN'
		);

		// Optional
		$shipping_address = array(
			'first_name'    => $cust->nama_penerima,
			'last_name'     => "",
			'address'       => $cust->alamat,
			'city'          => $cust->type . " " . $cust->distrik,
			'postal_code'   => $cust->kodepos,
			'phone'         => "",
			'country_code'  => 'IDN'
		);

		// Optional
		$customer_details = array(
			'first_name'    => $cust->nama_penerima,
			'last_name'     => "",
			'email'         => $this->session->userdata('email'),
			'phone'         => $cust->telepon,
			'billing_address'  => $billing_address,
			'shipping_address' => $shipping_address
		);

		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'minute',
			'duration'  => 2
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		// echo json_encode($transaction_data);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{

		$result = json_decode($this->input->post('result_data'));

		// echo "<pre>";
		// print_r($result);
		// echo "</pre>";
		// die;

		if (isset($result->va_numbers[0]->bank)) {
			$bank = $result->va_numbers[0]->bank;
		} else {
			$bank = '-';
		}

		if (isset($result->va_numbers[0]->va_number)) {
			$va_number = $result->va_numbers[0]->va_number;
		} else {
			$va_number = '-';
		}

		if (isset($result->bca_va_number)) {
			$bca_va_number = $result->bca_va_number;
		} else {
			$bca_va_number = '-';
		}

		if (isset($result->bill_key)) {
			$bill_key = $result->bill_key;
		} else {
			$bill_key = '-';
		}

		if (isset($result->biller_code)) {
			$biller_code = $result->biller_code;
		} else {
			$biller_code = '-';
		}

		if (isset($result->permata_va_number)) {
			$permata_va_number = $result->permata_va_number;
		} else {
			$permata_va_number = '-';
		}

		if (isset($result->fraud_status)) {
			$fraud_status = $result->fraud_status;
		} else {
			$fraud_status = '-';
		}

		if (isset($result->pdf_url)) {
			$pdf_url = $result->pdf_url;
		} else {
			$pdf_url = '-';
		}
		if (isset($result->payment_code)) {
			$payment_code = $result->payment_code;
		} else {
			$payment_code = '-';
		}

		$data = [
			'status_code' => $result->status_code,
			'status_message' => $result->status_message,
			'transaction_id' => $result->transaction_id,
			'order_id' => $result->order_id,
			'gross_amount' => $result->gross_amount,
			'payment_type' => $result->payment_type,
			'payment_code' => $payment_code,
			'transaction_time' => $result->transaction_time,
			'transaction_status' => $result->transaction_status,
			'fraud_status' => $fraud_status,
			'bill_key' => $bill_key,
			'biller_code' => $biller_code,
			'pdf_url' => $pdf_url,
			'finish_redirect_url' => $result->finish_redirect_url,
			'bank' => $bank,
			'va_number' => $va_number,
			'bca_va_number' => $bca_va_number,
			'permata_va_number' => $permata_va_number
		];

		// $this->session->set_userdata($data);
		// echo "<pre>";
		// var_dump($data);
		// echo "</pre>";
		// die;

		$id_pesanan =  $this->session->userdata('id_pesanan');
		$proses = $this->Model_snap->insert($data, $id_pesanan);
		if ($proses) {
			$id_transaksi = $proses;
			// $this->data['finish'] = json_decode($this->input->post('result_data'));
			$data['title'] = 'Finish';
			$data['result'] = $this->Model_snap->get_data($id_transaksi);
			$this->load->view('home/header', $data);
			$this->load->view('home/topbar');
			$this->load->view('home/finish', $data);
			$this->load->view('home/footer');
		} else {
			echo "Request pembayaran gagal";
		}
	}

	public function status_transaksi()
	{
		$data['title'] = 'Status Transaksi';
		$id_user = $this->session->userdata('id_user');
		$data['barang'] = $this->Model_snap->get_barang_pesanan($id_user);
		$this->load->view('home/header', $data);
		$this->load->view('home/topbar');
		$this->load->view('home/status_transaksi', $data);
		$this->load->view('home/footer');
	}

	public function detail($id_pesanan)
	{
		$data['title'] = 'Detail';
		$data['detail_pesanan'] = $this->Model_snap->detail_pesanan($id_pesanan);
		$data['detail_pelanggan'] = $this->Model_snap->detail_pelanggan($id_pesanan);
		$this->load->view('home/header', $data);
		$this->load->view('home/topbar');
		$this->load->view('home/detail_pesanan', $data);
		$this->load->view('home/footer');
	}

	public function transaksi()
	{
		$data['title'] = 'Transaksi';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['transaksi'] = $this->Model_snap->get_transaksi();
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_templates/sidebar');
		$this->load->view('admin_templates/topbar', $data);
		$this->load->view('admin/transaksi', $data);
		$this->load->view('admin_templates/footer');
	}

	public function transaksi_detail($id_transaksi)
	{
		$data['title'] = 'Transaksi Detail';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['detail'] = $this->Model_snap->detail($id_transaksi);
		$data['pembeli'] = $this->Model_snap->pembeli($id_transaksi);

		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_templates/sidebar');
		$this->load->view('admin_templates/topbar', $data);
		$this->load->view('admin/transaksi_detail', $data);
		$this->load->view('admin_templates/footer');
	}
}
