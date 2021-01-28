<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// echo current_url();
		// $data['cart'] = $this->M_All->join_cart_bar()->result();
		// $data['count_cart'] = $this->M_All->count('cart');
		// print_r($data['cart']);
		// $this->load->view('base/header', $data);
		// $this->load->view('base/header_etc', $data);
		$this->header();
		$this->load->view('base/index');
		$this->footer();
		// $this->load->view('base/footer');
		// $this->load->view('base/header');
		// $this->load->view('home');
	}

	public function auth()
	{
		if($this->session->userdata('role') != "customer"){
			redirect(base_url("index.php/auth"));
		}
	}

	public function header()
	{
		// print_r($this->cart->contents());
		$data['cart'] = $this->M_All->join_cart_bar()->result();
		$data['count_cart'] = $this->M_All->count('cart');
		if (current_url() != base_url('index.php/home') && current_url() != base_url('index.php')) {
			$this->load->view('base/header_etc', $data);
		}else {
			$this->load->view('base/header', $data);
		}
	}

	public function footer()
	{
		if (current_url() != base_url('index.php/home') && current_url() != base_url('index.php')) {
			$this->load->view('base/footer_etc');
		}else {
			$this->load->view('base/footer');
		}
	}

	public function data()
	{
		$this->load->view('base/header');
		// $this->load->view('base/header');
		// $this->load->view('home');
	}

	public function shop()
	{
		$data['barang'] = $this->M_All->get('barang')->result();
		
		// $this->load->view('base/header_etc');
		$this->header();
		$this->load->view('base/shop', $data);
		$this->footer();
	}

	public function product($id)
	{
		$where = array('id_barang' => $id);
		$data['barang'] = $this->M_All->view_where('barang', $where)->row();
		// print_r($data);
		// echo '<br>';
		// echo $data['barang']->nama_barang;
		$this->header();
		$this->load->view('base/product', $data);
		$this->footer();
		// $this->load->view('base/footer_etc');
	}

	public function cart()
	{
		// $data['cart'] = $this->M_All->join_cart_bar()->result();
		// print_r($this->cart->contents());
		
		$this->header();
		$this->load->view('base/cart');
		$this->footer();
		// $this->load->view('base/footer_etc');
	}

	public function add_cart($id)
	{
		$data = array(
			'id_barang' => $id,
			'jumlah_barang' => 1
		);
		$this->M_All->insert('cart', $data);
		// $this->cart->insert($data);
		redirect('home/shop');
	}
	
	public function add_cart_prod($id)
	{
		$data = array(
			'id_barang' => $id,
			'jumlah_barang' => $this->input->post('jumlah'),
		);
		// $this->cart->insert($data);
		$this->M_All->insert('cart', $data);
		redirect('home/product/'.$id);
	}

	public function update_cart()
	{
		
	}

	public function del_item_cart($id)
	{
		$where = array('id_cart' => $id);
		$this->M_All->delete($where, 'cart');
		redirect();
	}

	public function wishlist()
	{
		$this->header();
		$this->load->view('base/cart');
		$this->footer();
	}

	public function action_cart()
	{
		$this->auth();
		$data = array(
			'id_shipping' => $this->input->post('shipping', 'Shipping', 'required'),
			'jumlah_bayar' => $this->input->post('total_harga', 'Total Harga', 'required'),
			'id_user' => $this->session->userdata('id_user'),
			'tanggal_checkout' => date('Y-m-d H:i:s'),
			'status' => 0,
		);
        $cek = $this->M_User->cek_login('checkout', $data)->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('flash_message', 'Anda sudah memesan ');
            $this->session->set_flashdata('type', 'warning');
			redirect('/home/cart/');
		}else {
			$this->M_All->insert('checkout', $data);
			redirect('/home/checkout/');
		}
		// print_r($data);
		// $this->checkout();
		
	}

	public function checkout()
	{
		$id_user = $this->session->userdata('id_user');
		$where = array('id_user' => $id_user);
		$data['checkout'] = $this->M_All->view_where('checkout', $where)->last_row();
		$data['address'] = $this->M_All->view_where('address', $where)->row();
		// print_r($data['address']);
		// print_r($data);
		$this->auth();
		$this->header();
		$data['cart'] = $this->M_All->join_cart_bar()->result();

		// $data = array(

		// );
		$this->load->view('base/checkout', $data);
		$this->footer();
	}

	public function action_checkout()
	{
		$data['address'] = array(
			'id_user' => $this->session->userdata('id_user'),
			'nama_depan' => $this->input->post('first_name'),
			'nama_belakang' => $this->input->post('last_name'),
			'alamat_jalan' => $this->input->post('alamat_jalan'),
			'alamat_kota' => $this->input->post('kota'),
			'alamat_negara' => $this->input->post('negara'),
			'kode_pos' => $this->input->post('kode_pos'),
			'nomor_telepon' => $this->input->post('nomor_telepon'),
			'alamat_email' => $this->input->post('email'),
		);
		$data['checkout'] = array(
			'status' => 1,
			'nomor_pembayaran' => time(),
			'notes' => $this->input->post('notes')
		);
		$data['invoice'] = array(
			'id_user' => $this->session->userdata('id_user'),
			'id_checkout' => $this->input->post('id_checkout'),
			'total_bayar' => $this->input->post('harga_grand_total'),
			'jenis_pembayaran' => $this->input->post('method'),
			'jumlah_item' => $this->input->post('jumlah_item'),
			'tanggal' => date('Y-m-d H:i:s'),
		);
		$where = array('id_checkout' => $this->input->post('id_checkout'));
		$cek_address = $this->M_User->cek_login('address', $data['address'])->num_rows();
		if ($cek_address > 0) {
			// $this->session->set_flashdata('flash_message', 'Anda sudah Mengisi data alamat ');
            // $this->session->set_flashdata('type', 'warning');
			// redirect('/home/checkout/');
		}else{
			$this->M_All->insert('address', $data['address']);
		}
		$this->M_All->insert('invoice', $data['invoice']);
		// print_r($data);
		$update = $this->M_All->update('checkout', $where, $data['checkout']);
		// if ($update > 0) {
			$cart = $this->M_All->get('cart')->result();
			foreach ($cart as $c) {
				$cart_data = array(
					'id_cart' => $c->id_cart,
					'id_barang' => $c->id_barang,
					'jumlah_barang' => $c->jumlah_barang,
					'id_user' => $this->session->userdata('id_user'),
					'id_checkout' => $this->input->post('id_checkout'),
				);
				$this->M_All->insert('db_cart', $cart_data);
			}
			$empty_cart = $this->M_All->empty('cart');
			// print_r($cart);
			// if ($empty_cart == true) {
				redirect('/home/invoice/');
			// }
			
		// }else {
			// echo 'error';
		// }
		// $this->M_All->update('checkout', $where, $data['checkout']);
		
	}

	public function invoice()
	{
		$id_user = $this->session->userdata('id_user');
		$where = array('id_user' => $id_user);
		$data['invoice'] = $this->M_All->view_where('invoice', $where)->last_row();
		$data['checkout'] = $this->M_All->view_where('checkout', $where)->last_row();
		$where_barang = array('id_checkout' => $data['invoice']->id_checkout);
		$data['barang'] = $this->M_All->join_invoice_bar($where_barang)->result();
		// print_r($data['invoice']);
		$this->auth();
		$this->header();
		$data['cart'] = $this->M_All->join_cart_bar()->result();

		// $data = array(

		// );
		$this->load->view('base/invoice', $data);
		$this->footer();
	}
}
