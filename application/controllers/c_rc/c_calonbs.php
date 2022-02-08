<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_calonbs extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_rc/m_calonbs');
        $this->load->model('m_rc/m_status');
        $this->load->model('m_rc/m_bs');
        $this->load->model('m_rc/m_pembayaran');
        $this->load->model('m_rc/m_grafikbs');
    }


    public function index()
    {
        $data = array(

            'title'     => 'Status',
            'data_status' => $this->m_calonbs->get_all(),
            'data_statuss' => $this->m_status->get_all(),
            'data_statusv' => $this->m_status->validasi(),
            'data_bs' => $this->m_bs->get_all(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),
            'data_grafik' => $this->m_grafikbs->get_data(),
            'data_calonbs' => $this->m_calonbs->get_all(),

        );
        $this->load->view('rc/v_calonbs', $data);
    }

     public function validasi()
    {

       $data = array(

            'title'     => 'Tervalidasi',
            'data_status' => $this->m_calonbs->validasi(),
            'data_statuss' => $this->m_status->get_all(),
            'data_statusv' => $this->m_status->validasi(),
            'data_bs' => $this->m_bs->get_all(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),
            'data_grafik' => $this->m_grafikbs->get_data(),
            'data_calonbs' => $this->m_calonbs->get_all(),

        );
        $this->load->view('rc/v_calonbsv', $data);
    }

    public function selesai()
    {

       $data = array(

            'title'     => 'Terselesaikan',
            'data_status' => $this->m_calonbs->selesai(),

        );
        $this->load->view('rc/v_calonbsv', $data);
    }

    public function tambah()
    {
        $data = array(

            'title'     => 'Tambah Data Status'

        );

        $this->load->view('tambah_user', $data);
    }

    

    public function edit($id_map)
    {
        $id_map = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Status',
            'data_status' => $this->m_status->edit($id_map)

        );

        $this->load->view('edit_user', $data);
    }

    public function update()
    {
        $id['id_map'] = $this->input->post("id_map");
        $data = array(

            'nama_user'           => $this->input->post("nama_user"),
            'username'         => $this->input->post("username"),
            'password'    => md5($this->input->post("password")),

        );

        $this->m_status->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('rc/v_status');

    }

    public function hapus($id_map)
    {
        $id['id_map'] = $this->uri->segment(3);

        $this->m_status->hapus($id);

        //redirect
        redirect('rc/v_status');
    }

    public function aktif($id_dbs)
    {
        
        $data = [
            'bs_status' => 'Aktif'
        ];

        $this->m_calonbs->statusbs($data, $id_dbs);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('c_rc/c_calonbs');
    }

    public function tdkaktif($id_dbs)
    {
        
        $data = [
            'bs_status' => 'Tidak Aktif'
        ];

        $this->m_calonbs->statusbs($data, $id_dbs);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('c_rc/c_calonbs');
    }

    public function vstatus($id_dbs)
    {
        
        $data = [
            'v_status' => 'Sudah'
        ];

        $this->m_calonbs->statusbs($data, $id_dbs);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('c_rc/c_calonbs');
    }
}

