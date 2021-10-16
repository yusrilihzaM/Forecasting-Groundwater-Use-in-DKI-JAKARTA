<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');
        is_logged_in();
    }
	public function index()
	{
        $data['nama'] = "Beranda";
        $id_user=$this->session->userdata('id_user');
        $data['user']=$this->User_model->get_user($id_user);
        $this->load->view('Templates/header.php',$data);
        $this->load->view('Templates/navbar.php',$data);
        $this->load->view('Templates/leftmenu.php',$data);
        $this->load->view('Beranda/index.php',$data);
        $this->load->view('Templates/footer.php',$data);
	}
}
