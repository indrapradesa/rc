<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_amd extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('armada')
                 ->order_by('id_amd', 'DESC')
                 ->get();
        return $query->result();
    }

    public function simpan($data)
    {

        $query = $this->db->insert("armada", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($id_amd)
    {

        $query = $this->db->where("id_amd", $id_amd)
                ->get("armada");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id_amd)
    {

        $query = $this->db->update("armada", $data, $id_amd);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id_amd)
    {

        $query = $this->db->delete("armada", $id_amd);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}