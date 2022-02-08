<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('userrc')
                 ->order_by('user_id', 'DESC')
                 ->get();
        return $query->result();
    }

    public function simpan($data)
    {

        $query = $this->db->insert("userrc", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id_user)
    {

        $query = $this->db->where("user_id", $id_user)
                ->get("userrc");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("userrc", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("userrc", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}