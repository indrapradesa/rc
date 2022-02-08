<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        $this->load->model('m_rc/m_status');
        $this->load->model('m_rc/m_bs');
        $this->load->model('m_rc/m_pembayaran');
        $this->load->model('m_rc/m_grafikbs');
        $this->load->model('m_rc/m_calonbs');
    }

    public function index()
    {
        if($this->admin->logged_id())
        {

            $data = array(

            'title'     => 'Status',
            'data_status' => $this->m_status->get_all(),
            'data_statusv' => $this->m_status->validasi(),
            'data_bs' => $this->m_bs->get_all(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),
            'data_grafik' => $this->m_grafikbs->get_data(),
            'data_calonbs' => $this->m_calonbs->get_all(),

        );
            $this->load->view("menu", $data);         

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect('login');

        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url());
    }

}