<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_statusdkp extends CI_model{

    private static $table = 'maps';
    private static $pk = 'id_map';

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->where('status', 'Ambil')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function get_validasi()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->where('status', 'Proses')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function status($data, $s_id)
    {
        return $this->db->set($data)->where(self::$pk, $s_id)->update(self::$table);
    
    }
}