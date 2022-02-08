<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pembayaran extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_rc/m_pembayaran'); 
        $this->load->model('m_rc/m_status');
        $this->load->model('m_rc/m_bs');;
        $this->load->model('m_rc/m_grafikbs');
        $this->load->model('m_rc/m_calonbs');
    }


    public function index()
    {
        $data = array(

            'title'     => 'Status',
            'data_status' => $this->m_pembayaran->get_all(),
            'data_statuss' => $this->m_status->get_all(),
            'data_statusv' => $this->m_status->validasi(),
            'data_bs' => $this->m_bs->get_all(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),
            'data_grafik' => $this->m_grafikbs->get_data(),
            'data_calonbs' => $this->m_calonbs->get_all(),

        );
        $this->load->view('rc/v_pembayaran', $data);
    }

    public function validasi()
    {

       $data = array(

            'title'     => 'Status',
            'data_status' => $this->m_pembayaran->validasi(),
            'data_statuss' => $this->m_status->get_all(),
            'data_statusv' => $this->m_status->validasi(),
            'data_bs' => $this->m_bs->get_all(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),
            'data_grafik' => $this->m_grafikbs->get_data(),
            'data_calonbs' => $this->m_calonbs->get_all(),

        );

       

        $this->load->view('rc/v_pembayaranv', $data);
    }

    public function view()
    {

       $data = array(

            'title'     => 'Status',
            'data_status' => $this->m_pembayaran->get_all(),

        );
        $this->load->view('rc/v_lihat', $data);
    }

    public function cetak()
    {

        $data = array(

            'title'     => 'Rincian Pembayaran',
            'data_status' => $this->m_pembayaran->get_cetak(),

        );
            $this->load->view('rc/cetak_pmbyr', $data);
    }

    public function total($id_map)
    {
        $where = array('id_map' => $id_map);
        $data['maps'] = $this->m_pembayaran->edit_data($where,'maps')->result();


        $this->load->view('rc/bayar', $data);
    }

    function simpan()
    {

    $id_map = $this->input->post('id_map');
    $h_plas = $this->input->post('h_plas');
    $h_ker = $this->input->post('h_ker');
    $h_bes = $this->input->post('h_bes');
    $h_tot = $this->input->post('h_tot');
 
    $data = array(
        'map_id' => $id_map,
        'p_plas' => $h_plas,
        'p_ker' => $h_ker,
        'p_bes' => $h_bes,
        'p_tot' => $h_tot=$h_plas+$h_ker+$h_bes
    );
 
    $where = array(
        'id_map' => $id_map
    );

    $this->m_pembayaran->insert_data($where,$data,'pembayaran');

        //redirect
        redirect('c_rc/c_pembayaran');

    }


    public function bayar($id_pmbyr)
    {
        $data = [
            //'u_status' => $this->session->userdata['nama_user'],
            'p_status' => 'Sudah Dibayar'
        ];

        

        $this->m_pembayaran->status($data, $id_pmbyr);
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('c_rc/c_pembayaran');
    }

    public function get_ajax()
    {
        $p_status = $this->input->post('p_status');
        $where = "p_status='".$p_status."'";
        $data = $this->m_pembayaran->get_tot($where,'pembayaran')->result();
        echo json_encode($data);
    }

}

