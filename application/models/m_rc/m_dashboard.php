<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_model{

    public function map()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();

    }

}