<?php
class Hasil_model extends CI_model
{
    public function get_hitung($id)
    {
        $this->db->select('*');
        
        $this->db->from('data_air');
        
        $this->db->join('m_kecamatan', 'data_air.id_kecamatan = m_kecamatan.id_kecamatan', 'left');
        $this->db->join('hitung', 'data_air.id_data_air = hitung.id_data_air', 'left');
        $this->db->where('data_air.id_kecamatan',  $id);
       

        return $this->db->get()->result_array();
    }
    public function get_at($id)
    {
        $this->db->select('jumlah_air');
        
        $this->db->from('data_air');
        
        $this->db->join('m_kecamatan', 'data_air.id_kecamatan = m_kecamatan.id_kecamatan', 'left');
        $this->db->join('hitung', 'data_air.id_data_air = hitung.id_data_air', 'left');
        $this->db->where('data_air.id_kecamatan',  $id);
        // $this->db->where('hasil_forecast !=',  '');
        return $this->db->get()->result_array();
    }
    public function get_ft($id)
    {
        $this->db->select('hasil_forecast');
        
        $this->db->from('data_air');
        
        $this->db->join('m_kecamatan', 'data_air.id_kecamatan = m_kecamatan.id_kecamatan', 'left');
        $this->db->join('hitung', 'data_air.id_data_air = hitung.id_data_air', 'left');
        $this->db->where('data_air.id_kecamatan',  $id);
        // $this->db->where('hasil_forecast !=',  '');
        return $this->db->get()->result_array();
    }
    public function get_mape($id)
    {
        $sum="SELECT SUM(abs_at_ft_bagiat) as total FROM hitung NATURAL JOIN data_air WHERE id_kecamatan=$id";    
        $query1 = $this->db->query($sum);
        $sumabs=  (double) $query1->row_array()['total'];
        $carin="SELECT COUNT(abs_at_ft_bagiat) as n FROM hitung NATURAL JOIN data_air WHERE id_kecamatan=$id";
        $query2 = $this->db->query($carin);
        $n=  (integer) $query2->row_array()['n'];
        if ($n==0){
            
            $MAPE=0;
        }else{
            $MAPE=(100/$n)*$sumabs;
        }
       
        return $MAPE;
    }
    public function get_masa_depan($id)
    {
        $this->db->select('*');
        
        $this->db->from('ramal_masadepan');
        
        $this->db->join('m_kecamatan', 'ramal_masadepan.id_kecamatan = m_kecamatan.id_kecamatan', 'left');
      
        $this->db->where('ramal_masadepan.id_kecamatan',  $id);
        return $this->db->get()->result_array();
    }
    public function get_label_bawah($id)
    {
        $this->db->select('bulan');
        
        $this->db->from('data_air');

        $this->db->where('id_kecamatan',  $id);
        return $this->db->get()->result_array();
    }
}