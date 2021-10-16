<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alpha extends CI_Controller {

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
		$this->load->model('User_model');
        $this->load->model('Alpha_model');
		is_logged_in();
    }
	public function index()
	{
		$data['nama'] = "Parameter Alpha";
		$id_user=$this->session->userdata('id_user');
        $data['user']=$this->User_model->get_user($id_user);
		$data['alpha']=$this->Alpha_model->get_alpha();
		$this->form_validation->set_rules('alpha', 'Alpha', 'required');
		if ($this->form_validation->run() == false) {
        $this->load->view('Templates/header.php', $data);
        $this->load->view('Templates/navbar.php', $data);
        $this->load->view('Templates/leftmenu.php', $data);
        $this->load->view('Alpha/index.php', $data);
		$this->load->view('Templates/footer.php', $data);
	}else{
		$alpha =$this->input->post('alpha', true);
		
		$this->Alpha_model->update_alpha($alpha,1);
		$this->session->set_flashdata('flash', 'Diubah');
		$this->session->set_flashdata('data', 'Alpha');
		redirect('alpha');
	}
	}
}