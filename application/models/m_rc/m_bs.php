<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bs extends CI_model{

    private $_table = "daftarbs";
    public $id_dbs;
    public $nama_bs;
    public $f_ktp = "default.jpg";

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'price',
            'label' => 'Price',
            'rules' => 'required']
        ];
    }

    public function getById($id_dbs)
    {
        return $this->db->get_where($this->_table, ["id_dbs" => $id_dbs])->row();
    }

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('daftarbs')
                 ->where('v_status', 'Sudah')
                 ->order_by('id_dbs', 'DESC')
                 ->get();
        return $query->result();
    }

    public function get_bs($id_dbs)
    {
        $query = $this->db->select("*")
                 ->from('daftarbs')
                 ->where('v_status', 'Sudah')
                 // ->order_by('id_dbs', 'DESC')
                 ->get();
        return $query->result();
    }


    public function simpan($data)
    {

        $query = $this->db->insert("bs", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function edit($where,$table)
    {

        return $this->db->get_where($table,$where);

    }

    public function update($where,$data,$table)
    {

        $this->db->where($where);
        $this->db->update($table,$data);

    }

    public function hapus($id_bs)
    {

        $query = $this->db->delete("bs", $id_bs);

        if($query){
            return true;
        }else{
            return false;
        }

    }

   public function get_data_sampah(){
        $query = $this->db->query("SELECT nama_bs,SUM(plas) AS plas FROM maps GROUP BY plas");
          
        if($query->num_rows() > 0){
            foreach($query->result() as $data1){
                $hasil[] = $data1;
            }
            return $hasil;
        }
    }

}