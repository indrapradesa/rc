<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_karyawan extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('m_rc/m_kyn'); 
         $this->load->model('m_rc/m_status');
        $this->load->model('m_rc/m_bs');
        $this->load->model('m_rc/m_pembayaran');
        $this->load->model('m_rc/m_grafikbs');
        $this->load->model('m_rc/m_calonbs');

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Karyawan',
            'data_kyn' => $this->m_kyn->get_all(),
            'data_status' => $this->m_status->get_all(),
            'data_statusv' => $this->m_status->validasi(),
            'data_bs' => $this->m_bs->get_all(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),
            'data_grafik' => $this->m_grafikbs->get_data(),
            'data_calonbs' => $this->m_calonbs->get_all(),

        );

        $this->load->view('rc/v_karyawan', $data);
        $this->session->set_userdata($data);
    }

    public function tambah()
    {
        $data = array(

            'title'     => 'Tambah Data Karyawan'

        );

        $this->load->view('tambah_user', $data);
    }

    

    public function edit($id_kyn)
    {
        $id_kyn = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data Karyawan',
            'data_kyn' => $this->m_kyn->edit($id_kyn)

        );

        $this->load->view('edit_user', $data);
    }

    public function update()
    {
        $id['id_kyn'] = $this->input->post("id_kyn");
        $data = array(

            'nama_user'           => $this->input->post("nama_user"),
            'username'         => $this->input->post("username"),
            'password'    => md5($this->input->post("password")),

        );

        $this->m_kyn->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('rc/v_karyawan');

    }

    public function hapus($id_kyn)
    {
        $id['id_kyn'] = $this->uri->segment(3);

        $this->m_kyn->hapus($id);

        //redirect
        redirect('rc/v_karyawan');

    }

}