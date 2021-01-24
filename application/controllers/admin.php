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
    
    public function barang()
    {
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

    public function view_barang($id)
    {
        $where = array('id_barang' => $id);
        $data['barang'] = $this->M_All->view_where('barang', $where)->result();
        $this->header();
        $this->load->view('admin/detail_barang', $data);
        $this->footer();
    }

    public function hapus_barang($id)
	{
		$where = array('id_barang' => $id);
		$this->M_All->delete($where,'barang');
		redirect('admin/barang');
    }
    
    public function data_user(){
        $where = array('role' => 'customer');
        $data['user'] = $this->M_All->view_where('user', $where)->result();
        // print_r($data);
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
}
