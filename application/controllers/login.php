<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model ('admin');

    }

    public function index()
    {
    	if($this->admin->logged_id())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("dashboard");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('user_name', 'Username', 'required');
                $this->form_validation->set_rules('user_pass', 'Password', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("user_name", TRUE);
                $password = MD5($this->input->post('user_pass', TRUE));

                //checking data via model
                $checking = $this->admin->check_login('userrc', array('user_name' => $username), array('user_pass' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->user_id,
                            'nama_user' => $apps->nama_user,
                            'n_lengkap' => $apps->n_lengkap,
                            'user_name' => $apps->user_name,
                            'user_pass' => $apps->user_pass,
                            'level' => $apps->level
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        if($this->session->userdata('level') == 'rc'){
                            redirect('dashboard');
                        }else{
                            redirect('v_login/login');
                        }

                    }
                }else{

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('v_login/login', $data);
                }

            }else{
            

                $this->load->view('v_login/login');
            }
        }
    }
}