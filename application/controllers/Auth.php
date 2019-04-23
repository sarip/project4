<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('login')) {
			redirect('admin','refresh');
		}
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$result = $this->db->get_where('account', ['username' => $username]);
			if ($result->num_rows() > 0 ) {
				$row = $result->row();
				if (password_verify($password, $row->password)) {
					$this->session->set_userdata([
						'login' 	=> TRUE,
						'username' 	=> $row->username,
						'fullname' 	=> $row->fullname,
						'foto'		=> $row->foto
					]);
					redirect('admin','refresh');
					exit();
				}
			}
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><i class="fa fa-warning"></i> Cek Kembali Username Dan Password</div>');
			redirect('auth');
		}
	}
	public function logout(){
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('fullname');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('foto');
		$this->session->sess_destroy();
		$this->session->set_flashdata('message', '<div class="alert alert-info"><i class="fa fa-check-square"></i> Terimakasih.. Logout Berhasil </div>');
		redirect('auth');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */