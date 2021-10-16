<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends CI_Controller {

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

        $this->load->model('Kecamatan_model');
        $this->load->model('Dataair_model');
        $this->load->model('Hasil_model');
        $this->load->model('Ramal_model');
        $this->load->model('User_model');
        is_logged_in();
    }
	public function index()
	{
        $data['nama'] = "Hasil Forecast Perecamatan";
        $id_user=$this->session->userdata('id_user');
        $data['user']=$this->User_model->get_user($id_user);
		$data['data_kecamatan']=$this->Kecamatan_model->get_all_kecamatan();
        $this->load->view('Templates/header.php',$data);
        $this->load->view('Templates/navbar.php',$data);
        $this->load->view('Templates/leftmenu.php',$data);
        $this->load->view('hasil_forecast/index.php',$data);
        $this->load->view('Templates/footer.php',$data);
    }
    public function detail($id)
	{
            // $data['nama'] = "Data Kecamatan";
            $id_user=$this->session->userdata('id_user');
            $data['user']=$this->User_model->get_user($id_user);
            $data['data_air']=$this->Dataair_model->get_all_data_air($id);
            $data['hitung']=$this->Hasil_model->get_hitung($id);
            $data['haha']=$this->Hasil_model->get_hitung($id);
            $data['MAPE']=$this->Hasil_model->get_mape($id);
            $data['masa_dpn']=$this->Hasil_model->get_masa_depan($id);
            $data['at']=$this->Hasil_model->get_at($id);
            $data['ft']=$this->Hasil_model->get_ft($id);
            $data['bulan']=$this->Hasil_model->get_label_bawah($id);
           
            $data['dt_kecamatan'] = $this->Kecamatan_model->get_kecamatan_byid($id);
            $data['nama'] = $data['dt_kecamatan']['kecamatan'];
            $data['nama'] = $data['dt_kecamatan']['kecamatan'];
            // echo(var_dump($data['at']));
            // die;
        $this->load->view('Templates/header.php',$data);
        $this->load->view('Templates/navbar.php',$data);
        $this->load->view('Templates/leftmenu.php',$data);
        $this->load->view('hasil_forecast/detail_hasil.php',$data);
        $this->load->view('Templates/footer.php',$data);
    }
    public function ramal($id)
	{
        $data['nama'] = "Ramal";
        $data['dt_kecamatan'] = $this->Kecamatan_model->get_kecamatan_byid($id);
        $data['nama_kc'] = $data['dt_kecamatan']['kecamatan'];
        $id_user=$this->session->userdata('id_user');
        $data['user']=$this->User_model->get_user($id_user);
        $this->load->view('Templates/header.php',$data);
        $this->load->view('Templates/navbar.php',$data);
        $this->load->view('Templates/leftmenu.php',$data);
        $this->load->view('hasil_forecast/ramal.php',$data);
        $this->load->view('Templates/footer.php',$data);
    }
    public function hitungramal()
	{ 
        $id_kecamatan=$this->input->post('id_kecamatan', true);
        $bulan=(integer) $this->input->post('bulan', true);

        $sqltahun="SELECT tahun  FROM data_air WHERE id_kecamatan=$id_kecamatan order by tahun desc limit 1" ;    
        $querytahun=$this->db->query($sqltahun);
        $tahun=(int) $querytahun->row_array()['tahun'];
      
        $sql1="SELECT count(id_ramal_masadepan) as total FROM ramal_masadepan WHERE id_kecamatan=$id_kecamatan";    
        $query1 = $this->db->query($sql1);
        $countramal=  (int) $query1->row_array()['total'];

        $sqlqueryhitungbulan="SELECT count(bulan) as totalbulan FROM data_air WHERE id_kecamatan=$id_kecamatan";    
        $queryhitungbulan=$this->db->query($sqlqueryhitungbulan);
        $hitungbulan=(int) $queryhitungbulan->row_array()['totalbulan'];

        $sqlquerya="SELECT a FROM hitung  natural join data_air WHERE id_kecamatan=$id_kecamatan order by id_hitung desc limit 1";    
        $querya=$this->db->query($sqlquerya);
        $a=(int) $querya->row_array()['a'];
        
        $sqlqueryb="SELECT b FROM hitung  natural join data_air WHERE id_kecamatan=$id_kecamatan order by id_hitung desc limit 1";    
        $queryb=$this->db->query($sqlqueryb);
        $b=(int) $queryb->row_array()['b'];
        
       
        if($hitungbulan==12){
            $tahunini=$tahun+1;
        }
        else{
            $tahunini=$tahun;
        }
        if($countramal!=0){
            $sqlhps="DELETE FROM ramal_masadepan WHERE id_kecamatan=$id_kecamatan";    
            $this->db->query($sqlhps);
            for ($x = 1; $x <= $bulan; $x++){
                $jumlah_air=$a+$b*$x;
                // $this->Ramal_model->add_ramal(1,1,$x,1);
                $this->Ramal_model->add_ramal($id_kecamatan,$tahunini,$x,$jumlah_air);
               
            }
        }else{
            for ($x = 1; $x <= $bulan; $x++){
                $jumlah_air=$a+$b*$x;
                // $this->Ramal_model->add_ramal(1,1,$x,1);
                $this->Ramal_model->add_ramal($id_kecamatan,$tahunini,$x,$jumlah_air);
               
            }
        }
        // echo(var_dump($countramal));
        // die;
        $this->session->set_flashdata('flash', 'Sukses');
                $this->session->set_flashdata('data', 'Ramalan Masa Depan');
                $url='hasil/detail/'.$id_kecamatan;
                redirect($url);
    }
}