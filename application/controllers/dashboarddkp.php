<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboarddkp extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('dkp');
    }

    public function index()
    {
        if($this->dkp->logged_dkp())
        {

            $this->load->view("dkp");         

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect('logindkp');

        }
    }
    public function logoutdkp()
    {

    $this->session->sess_destroy();
        redirect(site_url('logindkp'));
    }
}