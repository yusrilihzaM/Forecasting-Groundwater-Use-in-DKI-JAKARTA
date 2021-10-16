<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kecamatan extends CI_Controller {


	public function __construct()
    {
        parent::__construct();
		$this->load->model('User_model');
        $this->load->model('Kecamatan_model');
        $this->load->model('Dataair_model');
		is_logged_in();
    }
	public function index()
	{
		$data['nama'] = "Data Kecamatan";
		$id_user=$this->session->userdata('id_user');
        $data['user']=$this->User_model->get_user($id_user);
		$data['data_kecamatan']=$this->Kecamatan_model->get_all_kecamatan();
        $this->load->view('Templates/header.php',$data);
        $this->load->view('Templates/navbar.php',$data);
        $this->load->view('Templates/leftmenu.php',$data);
        $this->load->view('kecamatan/index.php',$data);
        $this->load->view('Templates/footer.php',$data);
	}
	public function detail($id)
	{
		// $data['nama'] = "Data Kecamatan";
		$data['data_air']=$this->Dataair_model->get_all_data_air($id);
		$id_user=$this->session->userdata('id_user');
        $data['user']=$this->User_model->get_user($id_user);
		$data['dt_kecamatan'] = $this->Kecamatan_model->get_kecamatan_byid($id);
		$data['nama'] = $data['dt_kecamatan']['kecamatan'];
		
        $this->load->view('Templates/header.php',$data);
        $this->load->view('Templates/navbar.php',$data);
        $this->load->view('Templates/leftmenu.php',$data);
        $this->load->view('perkecamatan/index.php',$data);
        $this->load->view('Templates/footer.php',$data);
	}
	public function edit($id)
	{
		$data['nama'] = "Edit Data Kecamatan";
		
		$data['data_kecamatan_id']=$this->Kecamatan_model->get_kecamatan_byid($id);
		$id_user=$this->session->userdata('id_user');
        $data['user']=$this->User_model->get_user($id_user);
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		if ($this->form_validation->run() == false) {
			$this->load->view('Templates/header.php',$data);
			$this->load->view('Templates/navbar.php',$data);
			$this->load->view('Templates/leftmenu.php',$data);
			$this->load->view('kecamatan/kec_edit.php',$data);
			$this->load->view('Templates/footer.php',$data);
			}
			else{
				$this->e();
			}
	}
	public function e(){
		$kecamatan =$this->input->post('kecamatan', true);
		$id_kecamatan =$this->input->post('id_kecamatan', true);
		
		// echo($id_kecamatan);
		// echo($kecamatan);
		$this->db->set('kecamatan',$kecamatan);
        $this->db->where('id_kecamatan',$id_kecamatan);
        $this->db->update('m_kecamatan');
		$this->session->set_flashdata('flash', 'Diupdate');
		$this->session->set_flashdata('data', 'Kecamatan');
		redirect('kecamatan');
	}
	public function tambah()
	{
		$data['nama'] = "Tambah Data Kecamatan";
		$data['data_kecamatan']=$this->Kecamatan_model->get_all_kecamatan();
		$id_user=$this->session->userdata('id_user');
        $data['user']=$this->User_model->get_user($id_user);
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		if ($this->form_validation->run() == false) {
        $this->load->view('Templates/header.php',$data);
        $this->load->view('Templates/navbar.php',$data);
        $this->load->view('Templates/leftmenu.php',$data);
        $this->load->view('kecamatan/kec_add.php',$data);
		$this->load->view('Templates/footer.php',$data);
		}else{
			$kecamatan =$this->input->post('kecamatan', true);
		
			$this->Kecamatan_model->add_kecamatan($kecamatan);
			$this->session->set_flashdata('flash', 'Ditambahkan');
			$this->session->set_flashdata('data', 'Kecamatan');
			redirect('kecamatan');
		}
	}
	
	public function tambahair($id)
	{
		$data['dt_kecamatan'] = $this->Kecamatan_model->get_kecamatan_byid($id);
		$data['nama'] = $data['dt_kecamatan'];
		$data['dkc'] = $data['dt_kecamatan']['id_kecamatan'];
		$id_user=$this->session->userdata('id_user');
        $data['user']=$this->User_model->get_user($id_user);
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
		if ($this->form_validation->run() == false) {
        $this->load->view('Templates/header.php',$data);
        $this->load->view('Templates/navbar.php',$data);
        $this->load->view('Templates/leftmenu.php',$data);
        $this->load->view('perkecamatan/perkec_add.php',$data);
		$this->load->view('Templates/footer.php',$data);
		}
	}
	public function saveair()
	{
		// $id_data_air =$this->input->post('id_data_air', true);
		$id_kecamatan=$this->input->post('id_kecamatan', true);
		$bulan_tahun=date($this->input->post('bulan_tahun', true));
		$jumlah_air=date($this->input->post('jumlah_air', true));
		$bulan=date("m",strtotime($bulan_tahun));
		$tahun=date("Y",strtotime($bulan_tahun));
		$jumlah_air=$this->input->post('jumlah_air', true);
		
		$this->Dataair_model->add_data_air($id_kecamatan,$bulan,$tahun,$jumlah_air);
		$this->session->set_flashdata('flash', 'Ditambahkan');
		$this->session->set_flashdata('data', 'Data air');
		$url='Kecamatan/detail/'.$id_kecamatan;
		redirect($url);
	}
	public function hapus($id)
	{
		$this->Kecamatan_model->hps_kecamatan($id);
		$this->session->set_flashdata('flash', 'dihapus');
        $this->session->set_flashdata('data', 'Kecamatan');
        redirect('kecamatan');
	}
	public function hapusair($id)
	{
		$idkc=$this->Dataair_model->get_id_kec_byair($id);
		$id_kecamatan=$idkc[0]['id_kecamatan'];
		$this->Dataair_model->hps_data_air($id);
		$this->session->set_flashdata('flash', 'dihapus');
        $this->session->set_flashdata('data', 'Data air');
		$url='Kecamatan/detail/'.$id_kecamatan;
		redirect($url);
	}
}