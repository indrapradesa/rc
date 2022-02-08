<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('m_rc/m_user');
        $this->load->model('m_rc/m_status');
        $this->load->model('m_rc/m_bs');
        $this->load->model('m_rc/m_pembayaran');
        $this->load->model('m_rc/m_grafikbs');
        $this->load->model('m_rc/m_calonbs'); 

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data User',
            'data_user' => $this->m_user->get_all(),
            'data_status' => $this->m_status->get_all(),
            'data_statusv' => $this->m_status->validasi(),
            'data_bs' => $this->m_bs->get_all(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),
            'data_grafik' => $this->m_grafikbs->get_data(),
            'data_calonbs' => $this->m_calonbs->get_all(),

        );

        $this->load->view('rc/data_user', $data);
        $this->session->set_userdata($data);
    }

    public function tambah()
    {
        $data = array(

            'title'     => 'Tambah Data User'

        );

        $this->load->view('tambah_user', $data);
    }

    

    public function edit($id_user)
    {
        $id_user = $this->uri->segment(3);

        $data = array(

            'title'     => 'Edit Data User',
            'data_user' => $this->m_user->edit($id_user)

        );

        $this->load->view('edit_user', $data);
    }

    public function update()
    {
        $id['id_user'] = $this->input->post("id_user");
        $data = array(

            'nama_user'           => $this->input->post("nama_user"),
            'username'         => $this->input->post("username"),
            'password'    => md5($this->input->post("password")),

        );

        $this->m_user->update($data, $id);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('rc/data_user');

    }

    public function hapus($id_user)
    {
        $id['id_user'] = $this->uri->segment(3);

        $this->m_user->hapus($id);

        //redirect
        redirect('rc/data_user');

    }

}