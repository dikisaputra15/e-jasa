<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller
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
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
	}

	public function index()
	{
		$data['title'] = 'Transaction';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('admin_templates/header', $data);
		$this->load->view('admin_templates/sidebar');
		$this->load->view('admin_templates/topbar', $data);
		$this->load->view('transaction');
		$this->load->view('admin_templates/footer');
	}

	public function process()
	{
		$order_id = $this->input->post('order_id');
		$action = $this->input->post('action');
		switch ($action) {
			case 'status':
				$this->status($order_id);
				break;
			case 'approve':
				$this->approve($order_id);
				break;
			case 'expire':
				$this->expire($order_id);
				break;
			case 'cancel':
				$this->cancel($order_id);
				break;
		}
	}

	public function status($order_id)
	{
		$result = $this->veritrans->status($order_id);
		$data = [
			'transaction_status' => $result->transaction_status,
			'status_message' => $result->status_message,
			'status_code' => $result->status_code
		];
		$this->db->update('tb_transaksi', $data, ['order_id' => $order_id]);
		$id_pesanan =  $this->session->userdata('id_pesanan');
		$id_barang =  $this->session->userdata('id_barang');
		$status = $this->db->get_where('tb_transaksi', ['order_id' => $order_id])->row_array();

		if ($status['transaction_status'] == 'expired') {
			echo " ";
		} else {
			$result = $this->db->select('tb_pesanan_detail.*, tb_jasa.stok')->from('tb_pesanan_detail')->join('tb_jasa', 'tb_jas.id_barang=tb_pesanan_detail.id_barang')->where('id_pesanan', $id_pesanan)->get()->result_array();
			foreach ($result as $row) {
				$id_barang = $row['id_barang'];
				$stok = (int)$row['stok'];
				$qty = (int)$row['qty'];
				$sisa = $stok - $qty;
				$this->db->query("update tb_jasa set stok='" . $sisa . "' where id_barang='" . $id_barang . "'");
			}
		}

		redirect('snap/transaksi');
	}

	public function cancel($order_id)
	{
		echo 'test cancel trx </br>';
		echo $this->veritrans->cancel($order_id);
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		print_r($this->veritrans->approve($order_id));
	}

	public function expire($order_id)
	{
		echo 'test get expire </br>';
		print_r($this->veritrans->expire($order_id));
	}
}
