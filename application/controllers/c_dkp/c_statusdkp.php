<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_statusdkp extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dkp/m_statusdkp'); 
    }


    public function index()
    {
        $data = array(

            'title'     => 'Status',
            'data_status' => $this->m_statusdkp->get_all(),

        );
        $this->load->view('dkp/v_statusdkp', $data);
    }

    public function validasi()
    {
        $data = array(

            'title'     => 'Status',
            'data_status' => $this->m_statusdkp->get_validasi(),

        );
        $this->load->view('dkp/v_statusvdkp', $data);
    }

    public function status($id_map)
    {
        
        $data = [
            'u_dkp' => $this->session->userdata['nama_kryn'],
            'status' => 'Proses'
        ];

        $this->m_statusdkp->status($data, $id_map);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('c_dkp/c_statusdkp');
    }
    public function statusn($id_map)
    {
        
        $data = [
            'u_dkp' => $this->session->userdata['nama_kryn'],
            'status' => 'Selesai'
        ];

        $this->m_statusdkp->status($data, $id_map);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('dkp/v_statusvdkp');
    }
}

