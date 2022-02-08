<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

	public $CI;

	public function __construct() {
		$this->CI = &get_instance();
	}

	public static $table = 'userrc';

	public function login($user_name, $user_pass)
	{
		$where = [
			'user_name' => $user_name,
		];

		$result = $this->CI->db->where($where)->limit(1)->get(self::$table);

		if ($result->num_rows() === 1) {
			$data = $result->row();
			if (password_verify($user_pass, $data->user_pass)) {
				$session_data = [];
				$session_data['user_id'] = $data->user_id;
				$session_data['user_name'] = $data->user_name;
				$session_data['level'] = $data->level;
				$this->CI->session->set_userdata($session_data);
				$this->last_logged_in();
				return TRUE;
			}
			return FALSE;
		} else {
			return FALSE;
		}
	}

	private function last_logged_in()
	{
		$data = [
			'u_last_logged_in' => date('Y-m-d H:i:s'),
			'u_ip_address' => $_SERVER['REMOTE_ADDR'],
		];
		$this->CI->db
			->where('user_name', $this->CI->session->userdata('user_name'))
			->update(self::$table, $data);
	}

	public function is_logged_in()
	{
		return $this->CI->session->userdata('is_logged_in');
	}

	public function auth()
	{
		if ($this->is_logged_in() == TRUE) {
			redirect('dashboard');
		}
	}

	public function restrict()
	{
		if (!$this->is_logged_in()) {
			redirect(site_url());
		}
	}

	public function is_admin()
	{
		return $this->CI->session->userdata('level');
	}

	public function rc()
	{
		if ($this->is_admin() != "rc") {
			redirect('dashboard');
		}
	}

	public function dkp()
	{
		if ($this->is_admin() != "dkp") {
			redirect('dasboarddkp');
		}
	}
}
