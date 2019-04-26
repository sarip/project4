<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['title']  = 'Smkn Kadipaten';
		$data['judul']  = 'Selamat Datang Di Smkn Kadipaten';
		$this->mylibrary->templateuser('dashboard');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */