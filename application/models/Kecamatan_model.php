<?php
class Kecamatan_model extends CI_model
{
    public function get_all_kecamatan()
    {
        $this->db->select('*');
        $this->db->from('m_kecamatan');
        return $this->db->get()->result_array();
    }
    public function get_kecamatan_byid($id)
    {
        return $this->db->get_where('m_kecamatan', array('id_kecamatan' =>  $id))->row_array();
    }
    public function update_kecamatan($kecamatan,$id_kecamatan)
    {
        
        $this->db->set('kecamatan',$kecamatan);
        $this->db->where('id_kecamatan',$id_kecamatan);
        $this->db->update('m_kecamatan');
    }
    public function hps_kecamatan($id)
    {
        $this->db->where('id_kecamatan', $id);
        $this->db->delete('m_kecamatan');
    }   
    public function add_kecamatan($kecamatan)
    {
        $data = array(
            'id_kecamatan'    => "",
            'kecamatan'    => $kecamatan
           
        );
 
        $this->db->insert('m_kecamatan', $data);
    }   
}