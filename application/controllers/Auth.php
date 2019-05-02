<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('login')) {
			redirect($this->session->userdata('login'),'refresh');
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
						'login' 	=> 'admin',
						'username' 	=> $row->username,
						'fullname' 	=> $row->fullname,
						'foto'		=> $row->foto
					]);
					redirect('admin','refresh');
					exit();
				}
			}

			$result1 = $this->db->get_where('guru', ['nip' => $username]);
			if ($result1->num_rows() > 0 ) {
				$row1 = $result1->row();
				if (password_verify($password, $row1->password)) {
					$this->session->set_userdata([
						'login' 	=> 'guru',
						'id_guru'	=> $row1->id_guru,
						'nama_guru' => $row1->nama_guru,
						'password'	=> $row1->password,	
						'foto'		=> $row1->foto
					]);
					redirect('guru','refresh');
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
		$this->session->set_flashdata('message', '<div class="alert alert-info"><i class="fa fa-check-square"></i> Terimakasih.. Logout Berhasil </div>');
		redirect('auth');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */