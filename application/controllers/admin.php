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
     
	public function index()
	{
		$this->load->view('admin/dashboard');
	}
}
