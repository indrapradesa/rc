<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembayaran extends CI_model{

    private static $table = 'maps';
    private static $pk = 'id_map';
    private static $table1 = 'pembayaran';
    private static $pk1 = 'id_pmbyr';

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->where('status','Selesai')
                 // ->where('p_status', 'Belum Dibayar')
                 ->join('pembayaran','pembayaran.map_id=maps.id_map', 'left')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function get_blm()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 // ->where('status','Selesai')
                 ->where('p_status', 'Belum Dibayar')
                 ->join('pembayaran','pembayaran.map_id=maps.id_map', 'left')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function get_cetak()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 // ->where('status', 'Selesai')
                 ->where('p_status', 'Belum Dibayar')
                 ->join('pembayaran','pembayaran.map_id=maps.id_map', 'left')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function validasi()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->join('pembayaran','pembayaran.map_id=maps.id_map', 'left')
                 ->where('p_status', 'Sudah Dibayar')
                 ->where('status', 'Selesai')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

     public function edit_data($where,$table)
    {      
        return $this->db->get_where($table,$where);

    }

    function insert_data($where,$data,$table1){
        $this->db->where($where);
        $this->db->insert($table1,$data);
    }

    public function status($data, $s_id)
    {
        return $this->db->set($data)->where(self::$pk1, $s_id)->update(self::$table1);
    
    }

    public function get_tot($where,$table)
    {

        return $this->db->get_where($table,$where);

    }
}