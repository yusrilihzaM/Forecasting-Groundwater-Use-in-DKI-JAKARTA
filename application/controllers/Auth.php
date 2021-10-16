<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
    
    }
	public function index()
	{
		$data['nama'] = "Login";
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
        $this->load->view('Auth/index.php', $data);
        }else{
            $this->_login();
        }
    }
    public function _login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('m_user', ['username' => $username])->row_array();
        if ($user) {
          
            if (password_verify($password, $user['password'])) {

                $data = [
                    'username' => $user['username'],
                    'id_user' => $user['id_user']
                   

                ];
                $this->session->set_userdata($data);
                redirect('home');
           
            } else {
                // jika password salaha
                $this->session->set_flashdata('flash', 'Salah');
                $this->session->set_flashdata('data', 'Password');
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
          
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username belum terdaftar</div>');
            $this->session->set_flashdata('flash', 'Terdaftar');
            $this->session->set_flashdata('data', 'Username Anda Belum');
            redirect('auth');
        }
    }
    public function registration()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        //rules ngecek email uniq
  
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[3]',
            [
                // 'matches' => 'password dont match',
                'min_length' => 'password too short'
            ]
        );
        $data['nama'] = "Registrasi";
        if ($this->form_validation->run() == false) {
            $this->load->view('Auth/auth-register', $data);
        } else {
           
            $data = [
                'id_user' => '',
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
              
            ];
           
            $this->db->insert('m_user', $data);
            //kasi pesan 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Registrasi Sukses</div');
            $this->session->set_flashdata('flash1', 'Terdaftar');
            $this->session->set_flashdata('data1', 'Anda Telah');
            redirect('auth');
        }
    }
    public function logout()
    {
        //membersihkan session
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('id_user');
        $this->session->set_flashdata('flash1', 'Logout');
		$this->session->set_flashdata('data1', 'Anda Telah Berhasil');
       
        redirect('auth');
    }
}