<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_status extends CI_model{

    private static $table = 'maps';
    private static $table2 = 'ss';
    private static $pk = 'id_map';
    private static $pk2 = 'id_ss';

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->where('status', 'Permintaan')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function validasi()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->where('status', 'Proses')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function selesai()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->where('status', 'Selesai')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function get_cetak()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->where('nama_bs',$this->session->userdata('nama_bs'))
                 ->where('status','Proses')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function get_rekap()
    {
        $query = $this->db->select("*")
                 ->from('maps')
                 ->where('nama_bs',$this->session->userdata('nama_bs'))
                 ->where('status','Selesai')
                 ->order_by('id_map', 'DESC')
                 ->get();
        return $query->result();
    }

    public function simpan($data)
    {

        $query = $this->db->insert("maps", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

     public function edit($id_user)
    {

        $query = $this->db->where("id_status", $id_user)
                ->get("status");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("status", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("status", $id);

        if($query){
            return true;
        }else{
            return false;
        }
    }

    public function status($data, $s_id)
    {
        return $this->db->set($data)->where(self::$pk, $s_id, $pk2)->update(self::$table, $table2);
    
    }
    public function statusn($data, $s_id)
    {
        return $this->db->set($data)->where(self::$pk, $s_id)->update(self::$table);
    
    }

    public function edit_data($where,$table)
    {      
        return $this->db->get_where($table,$where);

    }
}