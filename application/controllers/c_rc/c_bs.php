<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_bs extends CI_Controller {

    public function __construct(){

        parent ::__construct();

        //load model
        $this->load->model('m_rc/m_bs'); 
        $this->load->model('m_rc/m_status');
        $this->load->model('m_rc/m_pembayaran');
        $this->load->model('m_rc/m_grafikbs');
        $this->load->model('m_rc/m_calonbs');

    }

    public function index()
    {
        $data = array(

            'title'     => 'Data Bank Sampah',
            'data_bs' => $this->m_bs->get_all(),
            'data_status' => $this->m_status->get_all(),
            'data_statusv' => $this->m_status->validasi(),
            'data_pmbyr' => $this->m_pembayaran->get_blm(),
            'data_grafik' => $this->m_grafikbs->get_data(),
            'data_calonbs' => $this->m_calonbs->get_all(),

        );
        $this->load->view('rc/v_bs', $data);
        $this->session->set_userdata($data);
    }

    public function lihat($id_dbs)
    {
        $where = array('id_dbs' => $id_dbs);
        $x['data_bs']=$this->m_bs->get_data_sampah();
        $data['data_bs'] = $this->m_bs->edit($where,'daftarbs')->result();
        $this->load->view('rc/v_lihatbs', $data, $x);
    }

    public function tambah()
    {
        $data = array(

            'title'     => 'Tambah Data Bank Sampah'

        );

        $this->load->view('tambah_bs', $data);
    }

    public function edit($id_dbs)
    {
        $where = array('id_dbs' => $id_dbs);
        $data['daftarbs'] = $this->m_bs->edit($where,'daftarbs')->result();
        $this->load->view('rc/edit_bs',$data);
    }

    public function update($id_dbs)
    {
        
        // $id_dbs = $this->input->post('id_dbs');
        $n_penggurus = $this->input->post('n_penggurus');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $nama_bs = $this->input->post('nama_bs');

        if($_FILES[file]['name']!="")
            {
            $config['upload_path'] = '.assets/images/';
                $config['allowed_types'] =     'gif|jpg|png|jpeg|jpe|pdf|doc|docx|rtf|text|txt';
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('file'))
                {
                    $error = array('error' => $this->upload->display_errors());
                }
                else
                {
                    $upload_data=$this->upload->data();
                    $f_ktp=$upload_data['file_name'];
                    $f_sk=$upload_data['file_name'];
                    $f_profil=$upload_data['file_name'];
                }
            }
            else{
            $f_ktp=$this->input->post('f_ktp');
            $f_sk=$this->input->post('f_sk');
            $f_profil=$this->input->post('f_profil');

     
        $data = array(
            'n_penggurus' => $n_penggurus,
            'alamat' => $alamat,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'nama_bs' => $nama_bs,
            'f_ktp'=>$f_ktp,
            'f_sk'=>$f_sk,
            'f_profil'=>$f_profil
        );
     
        $where = array(
            'id_dbs' => $id_dbs
        );
     
        $this->m_bs->update($where,$data,'daftarbs');
        redirect('c_rc/c_bs');

    }
}

    public function hapus($id_bs)
    {
        $id['id_bs'] = $this->uri->segment(3);

        $this->m_bs->hapus($id);

        //redirect
        redirect('rc/v_bs');

    }

    public function grafik(){
        $x['data_bs']=$this->m_grafikbs->get_data();
        $this->load->view('rc/v_grafik',$x);
    }

}