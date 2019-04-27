<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_guru');
	}

	public function index()
	{
		$data['title']  = 'Smkn Kadipaten';
		$data['judul']  = 'Selamat Datang Di Smkn Kadipaten';
		$data['guru']	= $this->M_guru->get()->result();
		$this->mylibrary->templateuser('dashboard', $data);
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */