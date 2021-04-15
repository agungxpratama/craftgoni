<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {
    function __construct()
    {
 		parent::__construct();

 		if($this->session->userdata('role') != "admin"){
 			redirect(base_url("index.php/"));
 		}
    }

    public function header()
    {
        $this->load->view('admin/base/header');
    }

    public function footer()
    {
        $this->load->view('admin/base/footer');
    }

	public function index()
	{
        $this->header();
        $this->load->view('admin/dashboard');
        $this->footer();
    }

    public function update_stock($id)
    {
        $where = ['id_barang' => $id];
        $this->input->post('stok');
        $data = [
            'id_barang' => $id,
            'status' => 0,
            'tanggal' => date('Y-m-d H:i:s'),
        ];
        for ($i=0; $i < $this->input->post('stok'); $i++) {
            $this->M_All->insert('stock', $data);
        }
        // $this->M_All->update('barang', $where, $data);
        // if ($this->M_All->insert('stock', $data) != true) {
        //     redirect('admin/barang');
        // }else {
        //     redirect('admin/barang');
        // }
		redirect('admin/view_barang/'.$id);
    }

    public function barang()
    {
        $data['kategori'] = $this->M_All->get('kategori')->result();
        $data['barang'] = $this->M_All->get('barang')->result();
        $this->header();
        $this->load->view('admin/barang', $data);
        $this->footer();
    }

    public function tambah_barang()
    {
        $config['upload_path'] = './assets_admin/img/barang/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['overwrite'] = true;
		$config['max_size'] = 1024;
		// $config['max_width'] = 1024;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $this->session->set_flashdata('error', $this->upload->display_errors());
			$data = array('error' => $this->upload->display_errors());
            // $this->load->view('pengelolaan/gudang', $data);
            redirect('admin/barang');
        }else{
            $this->session->set_flashdata('success', 'Berhasil di Upload');
			$data = array('success' => $this->upload->data('foto'));
			// $this->load->view('pengelolaan/gudang', $data);
            $gambar = $this->upload->data('orig_name');
            $data = array(
                'nama_barang' => $this->input->post('nama_barang',true),
                'gambar' => $gambar,
                'detail_barang' => $this->input->post('detail_barang',true),
                'kategori' => $this->input->post('kategori',true),
                'jenis_barang' => $this->input->post('jenis_barang',true),
                'harga_barang' => $this->input->post('harga_barang',true),
            );
            if ($this->M_All->insert('barang', $data) != true) {
                redirect('admin/barang');
            }else {
                redirect('admin/barang');
            }

		}
    }

    public function tambah_stok()
    {
        // code...
    }

    public function view_barang($id)
    {
        $data['kategori'] = $this->M_All->get('kategori')->result();
        $where = array('id_barang' => $id);
        $data['barang'] = $this->M_All->view_where('barang', $where)->result();
        $data['stock'] = $this->M_All->count_like('stock', $id);
        $data['stock_terjual'] = $this->M_All->count_like_stat('stock', $id);
        // print_r($data);
        $this->header();
        $this->load->view('admin/detail_barang', $data);
        $this->footer();
    }

    public function update_barang()
    {
        $where = array('id_barang' => $this->input->post('id_barang'), );
        $data = [
            'nama_barang' => $this->input->post('nama_barang'),
            'detail_barang' => $this->input->post('detail_barang'),
            'harga_barang' => $this->input->post('harga_barang'),
        ];
        $update = $this->M_All->update('barang', $where, $data);
        redirect('admin/view_barang/'.$where['id_barang']);

    }

    public function hapus_barang($id)
	{
		$where = array('id_barang' => $id);
		$this->M_All->delete($where,'barang');
		redirect('admin/barang');
    }

    public function kategori()
    {
        $data['kategori'] = $this->M_All->get('kategori')->result();
        $this->header();
        $this->load->view('admin/kategori', $data);
        $this->footer();
    }

    public function tambah_kategori()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        if ($this->M_All->insert('kategori', $data) != true) {
            redirect('admin/kategori');
        }else {
            redirect('admin/kategori');
        }
    }

    public function view_kategori($id)
    {
        $data['kategori'] = $this->M_All->get('kategori')->result();
        $where = array('kategori' => $id);
        $data['barang'] = $this->M_All->view_where('barang', $where)->result();
        $this->header();
        $this->load->view('admin/barang', $data);
        $this->footer();
    }

    public function hapus_kategori($id)
    {
        $where = array('id_kategori' => $id);
		$this->M_All->delete($where,'kategori');
		redirect('admin/kategori');
    }

    public function data_user(){
        $where = array('role' => 'customer');
        $data['user'] = $this->M_All->view_where('user', $where)->result();
        print_r($data);
        $this->header();
        // print_r($data);
        $this->load->view('admin/data_user', $data);
        $this->footer();
    }

    public function pemesanan()
    {
        $data['invoice'] = $this->M_All->join_pemesanan()->result();
        $this->header();
        $this->load->view('admin/pemesanan', $data);
        $this->footer();
    }

    public function view_pemesanan($id)
    {
        $where = ['invoice.id_invoice' => $id];
		$where_by = ['id_invoice' => $id];

        $data['invoice'] = $this->M_All->join_where_pemesanan($where)->row();
		$where_c = ['id_checkout' => $data['invoice']->id_checkout];
		$data['checkout'] = $this->M_All->view_where('checkout', $where_c)->row();
		$where_barang = array('id_checkout' => $data['invoice']->id_checkout);
		$data['barang'] = $this->M_All->join_invoice_bar($where_barang)->result();

        // var_dump($data);
        // print_r($data);
        $this->header();
        $this->load->view('admin/view_pemesanan', $data);
        $this->footer();
    }

    public function update_admin()
    {

    }

    public function proses_pesanan()
    {
        $id_pem = $this->input->post('id_invoice');
        $where = ['id_checkout' => $this->input->post('id_checkout')];
        $data = [
            'kode_resi' => $this->input->post('kode_resi'),
            'kurir' => $this->input->post('kurir'),
            'status' => '3',
        ];
        $this->M_All->update('checkout', $where, $data);
        redirect('admin/view_pemesanan/'.$id_pem);
    }

    public function profile()
    {
        $where = ['role' => 'admin'];
        $data['user'] = $this->M_All->view_where('user', $where)->result();
        // print_r($data);
        $this->header();
        $this->load->view('admin/list_user', $data);
        $this->footer();
    }
}
