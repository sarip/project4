<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('login') != TRUE || $this->session->userdata('username') == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><i class="fa fa-warning"></i> Ooppss... Silahkan Login Terlebih Dahulu! </div>');
			redirect('auth');
		}
		$this->load->model(['M_siswa', 'M_pelajaran', 'M_nilai']);
	}




	public function index()
	{
		$data['title'] = 'Halaman Home';
		$this->mylibrary->templateadmin('dashboard', $data);
	}
	// START :: PELAJARAN
	public function pelajaran()
	{
		$data['title']	= 'Pelajaran';
		$data['judul']  = 'Halaman Data Pelajaran';
		$data['dataPelajaran'] = $this->M_pelajaran->get();	
		$this->mylibrary->templateadmin('pelajaran/index', $data);
	}
	public function insert_pelajaran()
	{
		$this->form_validation->set_rules('nama_pelajaran', 'Nama Pelajaran', 'trim|required|is_unique[pelajaran.nama_pelajaran]', ['is_unique' => 'Nama Pelajaran ini sudah di gunakan']);
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_pelajaran->insert()) {
				$this->session->set_flashdata('message', 'Data Pelajaran berhasil di tambahkan');
				redirect('admin/pelajaran','refresh');
			}
		}
		$data['title'] = 'Pelajaran';
		$data['judul'] = 'Halaman Tambah Pelajaran';
		$this->mylibrary->templateadmin('pelajaran/insert', $data);
	}
	public function update_pelajaran($id)
	{
		if ($this->M_pelajaran->get(['nama_pelajaran' => $this->input->post('nama_pelajaran')])->num_rows() > 0) {
			$this->form_validation->set_rules('nama_pelajaran', 'Nama Pelajaran', 'trim|required|is_unique[pelajaran.nama_pelajaran]', ['is_unique' => 'Nama Pelajaran ini sudah di gunakan']);
		}else{
			$this->form_validation->set_rules('nama_pelajaran', 'Nama Pelajaran', 'trim|required');
		}
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_pelajaran->update($id)) {
				$this->session->set_flashdata('message', 'Data Pelajaran berhasil di edit');
			}
			redirect('admin/pelajaran','refresh');
		}
		$data['title'] 		= 'Pelajaran';
		$data['judul'] 		= 'Halaman Edit Pelajaran';
		$data['pelajaran'] 	= $this->M_pelajaran->get(['md5(id_pelajaran)' => $id])->row();
		$this->mylibrary->templateadmin('pelajaran/update', $data);
	}
	public function delete_pelajaran($id)
	{
		if ($this->M_pelajaran->delete($id)) {
			$this->session->set_flashdata('message', 'Data pelajaran berhasil di hapus');
		}else{

		}
		redirect('admin/pelajaran','refresh');
	}
	// END :: PELAJARAN


	// START :: SISWA
	public function siswa(){
		$data['title'] 	= 'Siswa';
		$data['judul']	= 'Halaman Data Siswa';
		$data['dataSiswa'] = $this->M_siswa->get();
		$this->mylibrary->templateadmin('siswa/index', $data);
	} 
	public function insert_siswa(){
		$this->form_validation->set_rules('nis', 'Nis', 'trim|required|is_unique[siswa.nis]', ['is_unique' => 'Nis ini sudah di gunakan']);
		$this->_validation_siswa();
		if ($this->form_validation->run() == TRUE) {
			$id_siswa = $this->M_siswa->insert(); 
			foreach ($this->M_pelajaran->get()->result() as $pelajaran) {
				$this->M_nilai->insert([
					'id_siswa' 		=> $id_siswa,
					'id_pelajaran' 	=> $pelajaran->id_pelajaran
				]);
			}
			if ($id_siswa) {
				$this->session->set_flashdata('message', 'Data siswa berhasi di tambahkan');
				redirect('admin/siswa');
			}
		}
		$data['title'] = 'Tambah Siswa';
		$data['judul']	= 'Halaman Tambah Siswa';
		$this->mylibrary->templateadmin('siswa/insert', $data);
	}

	public function delete_siswa($id){
		if ($this->M_siswa->delete($id)) {
			$this->session->set_flashdata('message', 'Siswa Berhasil Di Hapus');
			redirect('admin/siswa');
		}else{
			$this->session->set_flashdata('message', 'Siswa Gagal Di Hapus');
			redirect('admin/siswa');
		}
	}
	public function detail_siswa($id){
		$data['title']		= 'Detail Siswa';
		$data['judul']		= 'Halaman Detail Siswa';
		$data['siswa']		= $this->M_siswa->get(['md5(id_siswa)' => $id])->row();
		$this->mylibrary->templateadmin('siswa/detail', $data);
	}
	public function edit_siswa($id){
		$nis = $this->input->post('nis');
		$siswa = $this->M_siswa->get(['md5(id_siswa)' => $id])->row();
		if ($nis != $siswa->nis) {
			$this->form_validation->set_rules('nis', 'Nis', 'trim|required|is_unique[siswa.nis]', ['is_unique' => 'Nis Sudah Digunakan']);
		}
		$this->_validation_siswa();
		if ($this->form_validation->run() == FALSE) {
			$data['title']		= 'Edit Siswa';
			$data['judul']		= 'Halaman Edit Siswa';
			$data['siswa']		= $siswa;
			$this->mylibrary->templateadmin('siswa/edit', $data);
		} else {
			$this->M_siswa->update($id);
			$this->session->set_flashdata('message', 'Data Siswa Berhasil DI Update');
			redirect('admin/siswa');
		}

	}
	private function _validation_siswa(){
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('warga_negara', 'Warga Negara', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('alamat_siswa', 'Alamat SIswa', 'trim|required');
		$this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'trim|required');
		
	}
	// END :: SISWA


	// START :: NILAI
	public function nilai()
	{
		$data['title'] 	= 'Nilai Siswa';
		$data['judul']	= 'Halaman Data Nilai Siswa';
		$data['dataSiswa'] = $this->M_siswa->get();
		$this->mylibrary->templateadmin('nilai/index', $data);
	}
	// END :: NILAI

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */