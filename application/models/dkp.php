<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dkp extends CI_Model
{
    //fungsi cek session
    function logged_dkp()
    {
        return $this->session->userdata('id_kyn');
    }

    //fungsi check login
    function check_logindkp($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
}