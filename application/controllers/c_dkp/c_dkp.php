<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dkp extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {

                $this->load->view('dkp/dkp');
            
    }

     public function logout()
     
    {
        $this->session->sess_destroy();
        redirect('dkp/dkp');
    }
}