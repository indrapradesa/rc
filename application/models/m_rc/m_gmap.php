<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class m_gmap extends CI_Model
{
  function __construct()
{
parent::__construct();
}
function get_coordinates()
{
$return = array();
$this->db->select("lat,lng,nama_bs,tgl,plas,ker,bes,tot");
$this->db->where('status','Permintaan');
$this->db->from("maps");
$query = $this->db->get();
if ($query->num_rows()>0) {
foreach ($query->result() as $row) {
array_push($return, $row);
}
}
return $return;
}
}

?>