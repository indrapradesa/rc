<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logindkp extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model ('dkp');

    }

    public function index()
    {
    	if($this->dkp->logged_dkp())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("dashboarddkp");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->dkp->check_logindkp('karyawan', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'id_kyn'   => $apps->id_kyn,
                            'nama_kryn' => $apps->nama_kryn,
                            'username' => $apps->username,
                            'password' => $apps->password,
                            'level' => $apps->level
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        if($this->session->userdata('level') == 'dkp'){
                            redirect('dashboarddkp');
                        }elseif ($this->session->userdata('level') == 'dkp') {
                            redirect('c_dkp/c_dkp');
                        }

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('logindkp', $data);
                }

            }else{
            

                $this->load->view('logindkp');
            }
        }
    }
}