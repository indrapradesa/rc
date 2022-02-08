<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_status extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_rc/m_status');
        $this->load->model('m_rc/m_bs');
        $this->load->model('m_rc/m_pembayaran');
        $this->load->model('m_rc/m_grafikbs');
        $this->load->model('m_rc/m_calonbs'); 
    }


    public function index()
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
        $this->load->view('rc/v_status', $data);
    }

     public function validasi()
    {

       $data = array(

            'title'     => 'Tervalidasi',
            'data_status' => $this->m_status->validasi(),
            'data_statuss' => $this->m_status->get_all(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),

        );
        $this->load->view('rc/v_statusv', $data);
    }

    public function selesai()
    {

       $data = array(

            'title'     => 'Terselesaikan',
            'data_status' => $this->m_status->selesai(),
            'data_statusv' => $this->m_status->validasi(),
            'data_statuss' => $this->m_status->get_all(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),
        );
        $this->load->view('rc/v_statusn', $data);
    }

    public function cetak()
    {

        $data = array(

            'title'     => 'Rincian Setor Bank Sampah',
            'data_cetak' => $this->m_status->get_cetak(),

        );
            $this->load->view('rc/v_print', $data);
    }

    public function cetak_rekap()
    {

        $data = array(

            'title'     => 'Rincian Setor Bank Sampah',
            'data_cetak' => $this->m_status->get_rekap(),

        );
            $this->load->view('rc/v_printrekap', $data);
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

    public function status($id_map)
    {
        
        $data = [
            'status' => 'Proses'
        ];

        $this->m_status->status($data, $id_map);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('c_rc/c_status');
    }

    public function statusn($id_map)
    {
        
        $data = [
            'status' => 'Selesai'
        ];

        $this->m_status->statusn($data, $id_map);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> Success! data berhasil diupdate didatabase.
                                                </div>');

        //redirect
        redirect('c_rc/c_status');
    }

    public function total($id_map)
    {
        $where = array('id_map' => $id_map);
        $data['maps'] = $this->m_status->edit_data($where,'maps')->result();
        $this->load->view('rc/bayar', $data);
    }

    function simpan()
    {

    $id_map = $this->input->post('id_map');
    $h_plas = $this->input->post('h_plas');
    $h_ker = $this->input->post('h_ker');
    $h_bes = $this->input->post('h_bes');
    $h_tot = $this->input->post('h_tot');
    // $p_status = $this->input->post('p_status');
 
    $data = array(
        'map_id' => $id_map,
        'p_plas' => $h_plas,
        'p_ker' => $h_ker,
        'p_bes' => $h_bes,
        'p_tot' => $h_tot=$h_plas+$h_ker+$h_bes,
        'p_status' => 'Belum Dibayar'
        // 'p_status' => $p_status
    );

    $data1 = [
            'status' => 'Selesai'
        ];
 
    $where = array(
        'id_map' => $id_map
    );

    $this->m_status->insert_data($where,$data,$data1);

        //redirect
        redirect('c_rc/c_pembayaran');

    }
}

