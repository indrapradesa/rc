<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Model {

public function insert_image($image, $sk, $f_profil)
 {
  // assign the data to an array
  $data = array(
   'id_dbs' => $this->input->post('id_dbs'),
   'n_penggurus' => $this->input->post('n_penggurus'),
   'alamat' => $this->input->post('alamat'),
   'email' => $this->input->post('email'),
   'tlpn' => $this->input->post('tlpn'),
   'username' => $this->input->post('username'),
   'password' => md5($this->input->post('password')),
   'nama_bs' => $this->input->post('nama_bs'),
   'lat' => $this->input->post('lat'),
   'lng' => $this->input->post('lng'),
   'f_ktp' => $image,
   'f_sk' => $sk,
   'f_profil' => $f_profil
  );
  //insert image to the database
  $this->db->insert('daftarbs', $data);
 }
 //get images from database

 public function get_images()
 {
  $this->db->select('*');
  $this->db->order_by('id_dbs');
  $query = $this->db->get('daftarbs');
  return $query->result();
 }
 public function edit($where,$table)
    {

        return $this->db->get_where($table,$where);

    }
}