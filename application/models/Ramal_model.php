<?php
class Ramal_model extends CI_model
{
    public function get_Ramal()
    {
        $this->db->select('*');
        $this->db->from('ramal_masadepan');
        return $this->db->get()->result_array();
    }
    public function add_ramal($id_kecamatan,$tahun,$bulan,$jumlah_air)
    {
        $data = array(
            'id_ramal_masadepan'    => "",
            'id_kecamatan'    => $id_kecamatan,
            'tahun'    => $tahun,
            'bulan'    => $bulan,
            'jumlah_air'    => $jumlah_air
        );
 
        $this->db->insert('ramal_masadepan', $data);
    }  
}