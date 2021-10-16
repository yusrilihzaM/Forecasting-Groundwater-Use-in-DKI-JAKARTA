<?php
class Alpha_model extends CI_model
{
    public function get_alpha()
    {
        $this->db->select('*');
        $this->db->from('alpha');
        return $this->db->get()->row_array();
    }
    public function update_alpha($alpha,$id)
    {
        $this->db->empty_table('hitung');
        $sqldtall="SELECT * FROM data_air NATURAL JOIN m_kecamatan ORDER BY id_kecamatan, bulan ASC";
        $query1 = $this->db->query($sqldtall);
        $dataall=  $query1->result_array();
        // echo(var_dump($dataall));
        $this->db->set('alpha',$alpha);
        $this->db->where('id_alpha',$id);
        $this->db->update('alpha');
        $dtseblumnya=0;
        $yaksendblsblm=0;
        
        foreach ($dataall as $dataall) {
        //    echo($dataall['bulan']);
           if($dataall['bulan']==1){
            //    echo($dataall['jumlah_air']);
            $data = array(
                'id_hitung'    => "",
                'id_data_air'    => $dataall['id_data_air'] ,
                'y_aksen'    =>  $dataall['jumlah_air'],
                'y_dbl_aksen'    =>  $dataall['jumlah_air'],
                'a'    =>  $dataall['jumlah_air'],
                'b'    => '',
                'hasil_forecast'    => '',
                'at_ft'    => '',
                'abs_at_ft_bagiat'    => ''
            );
            $dtseblumnya=$dataall['jumlah_air'];
            $yaksendblsblm=$dataall['jumlah_air'];
            $this->db->insert('hitung', $data);
           }
           else{
            $Yaksen=$alpha*$dataall['jumlah_air']+(1-$alpha)*$dtseblumnya;
            $dtseblumnya= $Yaksen;
            $Yaksendbl=$alpha* $Yaksen+(1-$alpha)*$yaksendblsblm;
            $yaksendblsblm=$Yaksendbl;
            $a=2*$Yaksen-$Yaksendbl;
            $b=$alpha/(1-$alpha)*($Yaksen-$Yaksendbl);
            $hasil_forecast=$a+$b;
            $at_ft= $dataall['jumlah_air']-  $hasil_forecast;
            $abs_at_ft=abs(  $at_ft/$dataall['jumlah_air']);
            $data = array(
                'id_hitung'    => "",
                'id_data_air'    => $dataall['id_data_air'] ,
                'y_aksen'    =>   $Yaksen,
                'y_dbl_aksen'    =>  $Yaksendbl,
                'a'    => $a,
                'b'    => $b,
                'hasil_forecast'    =>  $hasil_forecast,
                'at_ft'    =>  $at_ft,
                'abs_at_ft_bagiat'    =>  $abs_at_ft
            );
          
            $this->db->insert('hitung', $data);
            // echo($alpha.'*'.$dataall['jumlah_air'].'1-'.$alpha.'*'.$dtseblumnya."=".$Yaksen."<br>");
           }
        }
        
    }   
}