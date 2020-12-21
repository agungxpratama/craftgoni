<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
	public function index()
	{
		$this->load->view('auth/login');
    }

    public function login_admin()
    {
        
    }

    public function login_customer()
    {
        
    }

    public function action_login()
    {
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $where = array(
            'username' => $username,
            'password' => $password,
        );
        $cek = $this->M_User->cek_login('user', $where)->num_rows();

        if ($cek > 0) {
            $where_user = ['username' => $username];
            $data_user = $this->M_All->view_where('user', $where_user)->row();
            if ($data_user->role != 'admin') {
                $data_session = array(
                    'nama' => $data_user->nama_user,
                    'status' => 'login',
                    'role' => $data_user->role,
                    'email' => $data_user->email,
                );
                $this->session->set_userdata($data_session);
                redirect(base_url('index.php/'));
            }else{
                $data_session = array(
                    'nama' => $data_user->nama_user,
                    'status' => 'login',
                    'role' => $data_user->role,
                    'email' => $data_user->email,
                );
                $this->session->set_userdata($data_session);
                redirect(base_url('index.php/admin'));
            }
            // print_r($data_session);
        }else{
            $this->session->set_flashdata('flash_message', 'username dan password salah');
            $this->session->set_flashdata('type', 'warning');
            redirect(base_url('index.php/auth'));
        }
    }

    public function register()
    {
        $this->load->view('auth/register');
        // echo $this->M_All->count('user');
    }

    public function action_register()
    {
        $nama = $this->input->post('full_name');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $where = array(
            'username' => $username,
            // 'password' => $password,
        );

        $cek = $this->M_User->cek_login('user', $where)->num_rows();

        if ($cek > 0) {
            echo "Error";
            $this->session->set_flashdata('flash_message', 'anda sudah memiliki akun');
            $this->session->set_flashdata('type', 'warning');
            redirect('auth/register');
        }else{
            $data = array(
                'nama_user' => $nama,
                'username' => $username,
                'role' => 'customer',
                'email' => $email,
                'password' => $password,
            );
            $this->M_All->insert('user', $data);
            redirect('auth');
        }

        // print_r($data);
    }
    
    function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/'));
	}
}
