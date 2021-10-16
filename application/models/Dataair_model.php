<?php
class Dataair_model extends CI_model
{
    public function get_all_data_air($id)
    {
        $this->db->select('*');
        
        $this->db->from('data_air');
        
        $this->db->join('m_kecamatan', 'data_air.id_kecamatan = m_kecamatan.id_kecamatan', 'left');
        $this->db->where('m_kecamatan.id_kecamatan',  $id);
        return $this->db->get()->result_array();
       
    }
    public function get_data_air_byid($id)
    {
        return $this->db->get_where('data_air', array('id_data_air' =>  $id))->row_array();
    }
    public function update_data_air($data_air,$id_data_air)
    {
        
        $this->db->set('data_air',$data_air);
        $this->db->where('id_data_air',$id_data_air);
        $this->db->update('data_air');
    }
    public function hps_data_air($id)
    {
        $this->db->where('id_data_air', $id);
        $this->db->delete('data_air');
    }   
    public function add_data_air($id_kecamatan,$bulan,$tahun,$jumlah_air)
    {
        $data = array(
            'id_data_air'    => "",
            'id_kecamatan'    => $id_kecamatan,
            'bulan'    => $bulan,
            'tahun'    => $tahun,
            'jumlah_air'    => $jumlah_air
        );
 
        $this->db->insert('data_air', $data);
    }
    public function get_id_kec_byair($id)
    {
        $this->db->select('*');
        
        $this->db->from('data_air');
        
        $this->db->join('m_kecamatan', 'data_air.id_kecamatan = m_kecamatan.id_kecamatan', 'left');
        $this->db->where('data_air.id_data_air',  $id);
        return $this->db->get()->result_array();
    }   
}