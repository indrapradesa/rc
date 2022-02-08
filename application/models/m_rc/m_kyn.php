<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kyn extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('karyawan')
                 ->order_by('id_kyn', 'DESC')
                 ->get();
        return $query->result();
    }

    public function simpan($data)
    {

        $query = $this->db->insert("karyawan", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id_kyn)
    {

        $query = $this->db->where("id_kyn", $id_kyn)
                ->get("karyawan");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id_kyn)
    {

        $query = $this->db->update("karyawan", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id_kyn)
    {

        $query = $this->db->delete("karyawan", $id_kyn);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}