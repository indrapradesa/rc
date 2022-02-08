<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_calonbs extends CI_model{

    private static $table = 'daftarbs';
    private static $pk = 'id_dbs';

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('daftarbs')
                 ->where('bs_status', 'Tidak Aktif')
                 ->order_by('id_dbs', 'DESC')
                 ->get();
        return $query->result();
    }

    public function validasi()
    {
        $query = $this->db->select("*")
                 ->from('daftarbs')
                 ->where('bs_status', 'Aktif')
                 ->order_by('id_dbs', 'DESC')
                 ->get();
        return $query->result();
    }

    public function selesai()
    {
        $query = $this->db->select("*")
                 ->from('daftarbs')
                 ->where('v_status', 'Sudah')
                 ->order_by('id_dbs', 'DESC')
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

    public function statusbs($data, $id_dbs)
    {
        return $this->db->set($data)->where(self::$pk, $id_dbs)->update(self::$table);
    
    }
    public function n_status($data, $id_dbs)
    {
        return $this->db->set($data)->where(self::$pk, $s_id)->update(self::$table);
    
    }
}