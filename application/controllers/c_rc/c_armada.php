<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_armada extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('m_rc/m_amd');
        $this->load->model('m_rc/m_status');
        $this->load->model('m_rc/m_bs');
        $this->load->model('m_rc/m_pembayaran');
        $this->load->model('m_rc/m_grafikbs');
        $this->load->model('m_rc/m_calonbs'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Armada',
            'data_armada' => $this->m_amd->get_all(),
            'data_status' => $this->m_status->get_all(),
            'data_statusv' => $this->m_status->validasi(),
            'data_bs' => $this->m_bs->get_all(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),
            'data_grafik' => $this->m_grafikbs->get_data(),
            'data_calonbs' => $this->m_calonbs->get_all(),

        );

        $this->load->view('rc/v_armada', $data);
        $this->session->set_userdata($data);
    }

    public function tambah()
    {
        $data = array(

            'title'     => 'Tambah Data Armada'

        );

        $this->load->view('tambah_amd', $data);
    }

    

    public function edit($id_amd)
    {
        $id_amd = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Armada',
            'data_armada' => $this->m_amd->edit($id_amd)

        );

        $this->load->view('edit_amd', $data);
    }

    public function update()
    {
        $id['id_amd'] = $this->input->post("id_amd");
        $data = array(

            'nama_user'           => $this->input->post("nama_user"),
            'username'         => $this->input->post("username"),
            'password'    => md5($this->input->post("password")),

        );

        $this->m_amd->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('rc/v_armada');

    }

    public function hapus($id_amd)
    {
        $id['id_amd'] = $this->uri->segment(3);

        $this->m_amd->hapus($id);

        //redirect
        redirect('rc/v_armada');

    }

}