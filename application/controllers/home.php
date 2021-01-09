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

	public function header()
	{
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
		redirect('home/shop');
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

	
}
