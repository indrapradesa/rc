<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_grafikbs extends CI_Model{

	public function get_data_ss()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    function get_data(){
      $query = $this->db->query("SELECT nama_bs,SUM(tot) AS tot FROM maps GROUP BY tot");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data1){
                $hasil[] = $data1;
            }
            return $hasil;
        }
    }
 
}