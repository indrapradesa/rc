<?php
/**
* 
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class C_dkpgmaps extends CI_Controller
{
 function __construct()
{
parent::__construct();
}
function index()
{
$this->load->library('googlemaps');
// Load our model
$this->load->model('m_dkp/m_dkpgmaps', '', TRUE);
// Initialize the map, passing through any parameters
$config['center'] = '-7.968772, 112.635902';
$config['zoom'] = "auto";
$this->googlemaps->initialize($config);
// Get the co-ordinates from the database using our model
$coords = $this->m_dkpgmaps->get_coordinates();
// Loop through the coordinates we obtained above and add them to the map
foreach ($coords as $coordinate){
$marker = array();
$marker['animation'] = 'DROP';
$marker['position'] = $coordinate->lat.','.$coordinate->lng;
$marker['infowindow_content'] = '<br> Nama BS : '.$coordinate->nama_bs.'</br>' .' <br> Tanggal : ' .$coordinate->tgl. '<br>'. '<br> Sampah Plastik: '.$coordinate->plas. '</br>' . '<br> Sampah Kertas: '.$coordinate->ker. '</br>' . '<br> sampah Besi: '.$coordinate->bes. '</br>' . '<br> Total Sampah: '.$coordinate->tot. '</br>';
$this->googlemaps->add_marker($marker);
}
// Create the map
$data = array();
$data['map'] = $this->googlemaps->create_map();
// Load our view, passing through the map data
$this->load->view('dkp/v_dkpmap', $data);
}
}