<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('login') != TRUE || $this->session->userdata('username') == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><i class="fa fa-warning"></i> Ooppss... Silahkan Login Terlebih Dahulu! </div>');
			redirect('auth');
		}
		$this->load->model(['M_portfolio', 'M_biodata', 'M_siswa', 'M_guru', 'M_wali_kelas', 'M_pelajaran', 'M_mengajar', 'M_nilai', 'M_kelas', 'M_jurusan']);
	}




	public function index()
	{
		$data['title'] 			= 'Halaman Home';
		$data['nilai'] 			= $this->M_nilai->get()->num_rows();
		$data['pelajaran'] 		= $this->M_pelajaran->get()->num_rows();
		$data['siswa'] 			= $this->M_siswa->get()->num_rows();
		$data['kelas']			= $this->M_kelas->get()->num_rows();
		$data['jurusan']		= $this->M_jurusan->get()->num_rows();
		$data['guru']			= $this->M_guru->get()->num_rows();
		$data['walikelas']		= $this->M_wali_kelas->get()->num_rows();
		$this->mylibrary->templateadmin('dashboard', $data);
	}




	// START :: BIOADATA
	public function biodata()
	{
		$this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'trim|required');
		$this->form_validation->set_rules('visi', 'Visi', 'trim|required');
		$this->form_validation->set_rules('misi', 'Misi', 'trim|required');
		$this->form_validation->set_rules('email_sekolah', 'Email Sekolah', 'trim|required|valid_email');
		$this->form_validation->set_rules('no_telepon_sekolah', 'No Telp Sekolah', 'trim|required');
		$this->form_validation->set_rules('alamat_sekolah', 'Alamat Sekolah', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_biodata->setting()) {
				$this->session->set_flashdata('message', 'Data biodata berhasil di perbarui');
			}else{
				$this->session->set_flashdata('failed', 'Data biodata gagal di perbarui');
			}
			redirect('admin/biodata');
		}
		$data['title']		= 'Biodata Sekolah';
		$data['judul']		= 'Halaman Data Biodata Sekolah';
		$data['biodata']	= $this->M_biodata->get()->row();
		$this->mylibrary->templateadmin('biodata/index', $data);
	}
	// END :: BIODATA 




	// START : PORTFOLIO
	public function portfolio()
	{
		$data['title']		= 'Portfolio';
		$data['judul']		= 'Data Portfolio';
		$data['portfolio']	= $this->M_portfolio->get()->result();
		$this->mylibrary->templateadmin('portfolio/index', $data);
	}
	public function insert_portfolio()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_portfolio->insert()) {
				$this->session->set_flashdata('message', 'Data portfolio berhasil di tambahkan');
			}else{
				$this->session->set_flashdata('failed', 'Data portfolio gagal di tambahkan');
			}
			redirect('admin/portfolio');
		}
		$data['title']		= 'Portfolio';
		$data['judul']	 	= 'Halaman Tambah Portfolio';
		$this->mylibrary->templateadmin('portfolio/insert', $data);
	}
	public function update_portfolio($id)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_portfolio->update($id)) {
				$this->session->set_flashdata('message', 'Data portfolio berhasil di edit');
			}else{
				$this->session->set_flashdata('failed', 'Data portfolio gagal di edit');
			}
			redirect('admin/portfolio');
		}
		$data['title']		= 'Portfolio';
		$data['judul']	 	= 'Halaman Edit Portfolio';
		$data['portfolio']	= $this->M_portfolio->get(['md5(id_portfolio)' => $id])->row();
		$this->mylibrary->templateadmin('portfolio/update', $data);
	}
	public function delete_portfolio($id)
	{
		if ($this->M_portfolio->delete($id)) {
			$this->session->set_flashdata('message', 'Data portfolio berhasil di hapus');
		}else{
			$this->session->set_flashdata('failed', 'Data portfolio gagal di hapus');
		}
		redirect('admin/portfolio');
	}
	// END :: PORTFOLIO






	// START :: KELAS 
	public function kelas()
	{
		$data['title']  		= 'Kelas';
		$data['judul']  		= 'Halaman Data kelas';
		$data['dataKelas']		= $this->M_kelas->get();	
		$this->mylibrary->templateadmin('kelas/index', $data);
	}
	public function insert_kelas()
	{
		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required|is_unique[kelas.nama_kelas]', ['is_unique' => 'Nama Kelas ini sudah di gunakan']);
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_kelas->insert()) {
				$this->session->set_flashdata('message', 'Data Kelas berhasil di tambahkan');
				redirect('admin/kelas','refresh');
			}
		}
		$data['title'] = 'kelas';
		$data['judul'] = 'Halaman Tambah kelas';
		$this->mylibrary->templateadmin('kelas/insert', $data);
	}
	public function update_kelas($id)
	{
		if ($this->M_kelas->get(['nama_kelas' => $this->input->post('nama_kelas')])->num_rows() > 0) {
			$this->form_validation->set_rules('nama_kelas', 'Nama Pelajaran', 'trim|required|is_unique[kelas.nama_kelas]', ['is_unique' => 'Nama Kelas ini sudah di gunakan']);
		}else{
			$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'trim|required');
		}
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_kelas->update($id)) {
				$this->session->set_flashdata('message', 'Data Kelas berhasil di edit');
			}
			redirect('admin/kelas','refresh');
		}
		$data['title'] 		= 'Kelas';
		$data['judul'] 		= 'Halaman Edit Kelas';
		$data['kelas'] 		= $this->M_kelas->get(['md5(id_kelas)' => $id])->row();
		$this->mylibrary->templateadmin('kelas/update', $data);
	}
	public function delete_kelas($id)
	{
		if ($this->M_kelas->delete($id)) {
			$this->session->set_flashdata('message', 'Data kelas berhasil di hapus');
		}else{
			$this->session->set_flashdata('failed', 'Data kelas gagal di hapus, dikarena kan data kelas ini masih terpakai');
		}
		redirect('admin/kelas','refresh');
	}
	// END :: KELAS 



	// START :: JURUSAN 
	public function jurusan()
	{
		$data['title']			= 'Jurusan';
		$data['judul'] 			= 'Halaman Data Jurusan';
		$data['dataJurusan']	= $this->M_jurusan->get()->result();
		$this->mylibrary->templateadmin('jurusan/index', $data);
	}
	function insert_jurusan()
	{
		$this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'trim|required|is_unique[jurusan.nama_jurusan]');
		if($this->form_validation->run() == TRUE){
			if ($this->M_jurusan->insert()) {
				$this->session->set_flashdata('message', 'Data Pelajaran berhasil di tambahkan');
				redirect('admin/jurusan','refresh');
			}
		}
		$data['title']	= 'Jurusan';
		$data['judul']	= 'Halaman Tambah Jurusan';
		$this->mylibrary->templateadmin('jurusan/insert', $data);
	}
	public function update_jurusan($id)
	{
		if ($this->M_jurusan->get(['nama_jurusan' => $this->input->post('nama_jurusan')])->num_rows() > 0) {
			$this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'trim|required|is_unique[jurusan.nama_jurusan]', ['is_unique' => 'Nama Jurusan ini sudah di gunakan']);
		}else{
			$this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'trim|required');
		}
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_jurusan->update($id)) {
				$this->session->set_flashdata('message', 'Data Jurusan berhasil di edit');
			}
			redirect('admin/jurusan','refresh');
		}
		$data['title'] 		= 'Jurusan';
		$data['judul'] 		= 'Halaman Edit Jurusan';
		$data['jurusan'] 	= $this->M_jurusan->get(['md5(id_jurusan)' => $id])->row();
		$this->mylibrary->templateadmin('jurusan/update', $data);
	}
	public function delete_jurusan($id)
	{
		if ($this->M_jurusan->delete($id)) {
			$this->session->set_flashdata('message', 'Data jurusan berhasil di hapus');
		}else{
			$this->session->set_flashdata('failed', 'Data jurusan gagal di hapus, dikarena kan data jurusan ini masih terpakai');
		}
		redirect('admin/jurusan','refresh');
	}
	// END :: JURUSAN



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
			$this->session->set_flashdata('failed', 'Data pelajaran gagal di hapus, dikarena kan data pelajaran ini masih terpakai');
		}
		redirect('admin/pelajaran','refresh');
	}
	// END :: PELAJARAN




	// START :: GURU
	public function guru()
	{
		$data['title']		= 'Guru';
		$data['judul']	 	= 'Halaman Data Guru';
		$data['dataGuru']	= $this->M_guru->get()->result();
		$this->mylibrary->templateadmin('guru/index', $data);
	}
	public function insert_guru()
	{
		$this->form_validation->set_rules('nip', 'Nip', 'trim|required|is_unique[guru.nip]', ['is_unique' => 'Nip ini sudah terpakai']);
		$this->_validation_guru();
		if ($this->form_validation->run() == TRUE) {
			$result_result = $this->M_guru->insert();
			if ($result_result) {
				foreach ($this->M_jurusan->get()->result() as $jurusan) {
					foreach ($this->M_kelas->get()->result() as $kelas) {
						foreach ($this->M_pelajaran->get()->result() as $pelajaran) {
							$check = $this->input->post('id_jurusan_'.$jurusan->id_jurusan.'_id_kelas_'.$kelas->id_kelas.'_id_pelajaran_'.$pelajaran->id_pelajaran);
							if ($check) {
								$check = explode(',', $check);
								$data_insert = [
									'id_guru'		=> $result_result,
									'id_kelas' 		=> $check[0],
									'id_jurusan' 	=> $check[1],
									'id_pelajaran'	=> $check[2]
								];
								$this->M_mengajar->insert($data_insert);
							}
						}
					}
				}
				$this->session->set_flashdata('message', 'Data guru berhasil di tambahkan');
			}else{
				$this->session->set_flashdata('failed', 'Data guru gagal di tambahkan');
			}
			redirect('admin/guru','refresh');
		}
		$data['title']			= 'Guru';
		$data['judul']			= 'Halaman Tambah Guru';
		$data['dataPelajaran']	= $this->M_pelajaran->get()->result();
		$data['dataKelas']		= $this->M_kelas->get()->result();
		$data['dataJurusan']	= $this->M_jurusan->get()->result();
		$this->mylibrary->templateadmin('guru/insert', $data);
	}


	public function delete_guru($id){
		if ($this->M_guru->delete($id)) {
			$this->session->set_flashdata('message', 'Data guru berhasil di hapus');
		}else{
			$this->session->set_flashdata('failed', 'Data guru gagal di hapus');
		}
		redirect('admin/guru');
	}

	public function update_guru($id){
		$nip = $this->input->post('nip');
		$guru = $this->M_guru->get(['md5(id_guru)' => $id])->row();
		if ($nip != $guru->nip) {
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required|is_unique[guru.nip]', ['is_unique' => 'Nip Sudah Digunakan']);
		}
		$this->_validation_guru();
		if ($this->form_validation->run() == TRUE) {
			$result_result = $this->M_guru->update($id);
			$this->db->delete('mengajar', ['md5(id_guru)' => $id]);
			if ($result_result) {
				foreach ($this->M_jurusan->get()->result() as $jurusan) {
					foreach ($this->M_kelas->get()->result() as $kelas) {
						foreach ($this->M_pelajaran->get()->result() as $pelajaran) {
							$check = $this->input->post('id_jurusan_'.$jurusan->id_jurusan.'_id_kelas_'.$kelas->id_kelas.'_id_pelajaran_'.$pelajaran->id_pelajaran);
							if ($check) {
								$check = explode(',', $check);
								$data_insert = [
									'id_guru'		=> $result_result,
									'id_kelas' 		=> $check[0],
									'id_jurusan' 	=> $check[1],
									'id_pelajaran'	=> $check[2]
								];
								$this->M_mengajar->insert($data_insert);
							}
						}
					}
				}
				$this->session->set_flashdata('message', 'Data guru berhasil di edit');
			}else{
				$this->session->set_flashdata('failed', 'Data guru gagal di edit');
			}
			redirect('admin/guru','refresh');
		}
		$data['title']			= 'Guru';
		$data['judul']			= 'Halaman Edit Guru';
		$data['dataPelajaran']	= $this->M_pelajaran->get()->result();
		$data['dataKelas']		= $this->M_kelas->get()->result();
		$data['dataJurusan']	= $this->M_jurusan->get()->result();
		$data['guru']			= $this->M_guru->get(['md5(id_guru)' => $id])->row();
		$data['mengajar']		= $this->M_mengajar->get(['md5(id_guru)' => $id])->result();
		$this->mylibrary->templateadmin('guru/edit', $data);
	}

	private function _validation_guru(){
		$this->form_validation->set_rules('nama_guru', 'Nama Guru', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
	}
	public function detail_guru($id){
		$data['title']		= 'Guru';
		$data['judul']		= 'Halaman Detail Guru';
		$data['guru']		= $this->M_guru->get(['md5(id_guru)' => $id])->row();
		$data['mengajar']	= $this->M_mengajar->get(['md5(id_guru)' => $id])->result();
		$this->mylibrary->templateadmin('guru/detail', $data);
	}
	// END :: GURU




	// START :: WALIK KELAS
	public function wali_kelas()
	{
		$data['title']		= 'Wali Kelas';
		$data['judul']	 	= 'Halaman Data Wali Kelas';
		$data['waliKelas']	= $this->M_wali_kelas->get()->result();
		$this->mylibrary->templateadmin('wali_kelas/index', $data);
	}
	public function insert_wali_kelas()
	{
		$this->form_validation->set_rules('id_guru', 'Nama Guru', 'trim|required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_wali_kelas->insert()) {
				$this->session->set_flashdata('message', 'Data wali kelas berhasli di tambahkan');
			}else{
				$this->session->set_flashdata('failed', 'Data wali kelas gagal di tambahkan');
			}
			redirect('admin/wali_kelas');
		}
		$data['title']		= 'Wali Kelas';
		$data['judul']		= 'Halaman Tambah Wali Kelas';
		$data['guru']		= $this->M_guru->get()->result();
		$data['kelas']		= $this->M_kelas->get()->result();
		$data['jurusan']	= $this->M_jurusan->get()->result();
		$this->mylibrary->templateadmin('wali_kelas/insert', $data);
	}
	public function update_wali_kelas($id)
	{
		$this->form_validation->set_rules('id_guru', 'Nama Guru', 'trim|required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_wali_kelas->update($id)) {
				$this->session->set_flashdata('message', 'Data wali kelas berhasli di edit');
			}else{
				$this->session->set_flashdata('failed', 'Data wali kelas gagal di edit');
			}
			redirect('admin/wali_kelas');
		}
		$data['title']		= 'Wali Kelas';
		$data['judul']		= 'Halaman Edit Wali Kelas';
		$data['waliKelas']	= $this->M_wali_kelas->get(['md5(id_wali_kelas)'])->row();
		$data['guru']		= $this->M_guru->get()->result();
		$data['kelas']		= $this->M_kelas->get()->result();
		$data['jurusan']	= $this->M_jurusan->get()->result();
		$this->mylibrary->templateadmin('wali_kelas/update', $data);
	}
	public function delete_wali_kelas($id)
	{
		if ($this->M_wali_kelas->delete($id)) {
			$this->session->set_flashdata('message', 'Data wali kelas berhasil di hapus');
		}else{
			$this->session->set_flashdata('failed', 'Data wali kelas gagal di hapus');
		}
		redirect('admin/wali_kelas');
	}
	// END :: WALI KELAS




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
			if ($id_siswa) {
				foreach ($this->M_pelajaran->get()->result() as $pelajaran) {
					$this->M_nilai->insert([
						'id_siswa' 		=> $id_siswa,
						'id_pelajaran' 	=> $pelajaran->id_pelajaran
					]);
				}
				$this->session->set_flashdata('message', 'Data siswa berhasi di tambahkan');
			}else{
				$this->session->set_flashdata('failed', 'Data siswa gagal di tambahkan');
			}
			redirect('admin/siswa');
		}
		$data['title'] 		= 'Tambah Siswa';
		$data['judul']		= 'Halaman Tambah Siswa';
		$data['jurusan']	= $this->M_jurusan->get()->result();
		$data['kelas']		= $this->M_kelas->get()->result();
		$this->mylibrary->templateadmin('siswa/insert', $data);
	}

	public function delete_siswa($id){
		if ($this->M_siswa->delete($id)) {
			$this->session->set_flashdata('message', 'Siswa Berhasil Di Hapus');
			$this->db->delete('nilai', ['md5(id_siswa)' => $id]);
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
			$data['jurusan']	= $this->M_jurusan->get()->result();
			$data['kelas']		= $this->M_kelas->get()->result();
			$data['siswa']		= $siswa;
			$this->mylibrary->templateadmin('siswa/edit', $data);
		} else {
			if ($this->M_siswa->update($id)) {
				$this->session->set_flashdata('message', 'Data siswa berhasil di update');
			}else{
				$this->session->set_flashdata('failed', 'Data siswa gagal di update');
			}
			redirect('admin/siswa');
		}

	}
	private function _validation_siswa(){
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required');
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('warga_negara', 'Warga Negara', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('alamat_siswa', 'Alamat SIswa', 'trim|required');
		
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
	public function update_nilai($id)
	{
		$data['siswa']		= $this->M_siswa->get(['md5(id_siswa)' => $id])->row();
		if (isset($_POST['simpan'])) {
			$i =1;
			foreach ($this->M_nilai->get(['md5(nilai.id_siswa)' => $id]) as $n) {
				$ap_1 = $this->input->post('ap_1_'.$i);
				$ak_1 = $this->input->post('ak_1_'.$i);
				$ap_2 = $this->input->post('ap_2_'.$i);
				$ak_2 = $this->input->post('ak_2_'.$i);
				$ap_3 = $this->input->post('ap_3_'.$i);
				$ak_3 = $this->input->post('ak_3_'.$i);
				$ap_4 = $this->input->post('ap_4_'.$i);
				$ak_4 = $this->input->post('ak_4_'.$i);
				$ap_5 = $this->input->post('ap_5_'.$i);
				$ak_5 = $this->input->post('ak_5_'.$i);
				$ap_6 = $this->input->post('ap_6_'.$i);
				$ak_6 = $this->input->post('ak_6_'.$i);
				$this->M_nilai->update([
					'ap_1' => $ap_1,
					'ak_1' => $ak_1,
					'ap_2' => $ap_2,
					'ak_2' => $ak_2,
					'ap_3' => $ap_3,
					'ak_3' => $ak_3,
					'ap_4' => $ap_4,
					'ak_4' => $ak_4,
					'ap_5' => $ap_5,
					'ak_5' => $ak_5,
					'ap_6' => $ap_6,
					'ak_6' => $ak_6
				], ['id_nilai' => $this->input->post('id_nilai_'.$i)]);
			$i++;
			}
			$rows = [
				's_1' 		=> $this->input->post('s_1'),
				's_2' 		=> $this->input->post('s_2'),
				's_3' 		=> $this->input->post('s_3'),
				's_4' 		=> $this->input->post('s_4'),
				's_5' 		=> $this->input->post('s_5'),
				's_6' 		=> $this->input->post('s_6'),
				'i_1' 		=> $this->input->post('i_1'),
				'i_2' 		=> $this->input->post('i_2'),
				'i_3' 		=> $this->input->post('i_3'),
				'i_4' 		=> $this->input->post('i_4'),
				'i_5' 		=> $this->input->post('i_5'),
				'i_6' 		=> $this->input->post('i_6'),
				'a_1' 		=> $this->input->post('a_1'),
				'a_2' 		=> $this->input->post('a_2'),
				'a_3' 		=> $this->input->post('a_3'),
				'a_4' 		=> $this->input->post('a_4'),
				'a_5' 		=> $this->input->post('a_5'),
				'a_6' 		=> $this->input->post('a_6'),
				'th_1'		=> $this->input->post('th_1'),
				'th_2'		=> $this->input->post('th_2'),
				'th_3'		=> $this->input->post('th_3'),
				'catatan'	=> $this->input->post('catatan')
			];
			if ($this->M_siswa->update_absen($rows, ['md5(id_siswa)' => $id])) {
				$this->session->set_flashdata('message', 'Data nilai & absen berhasil di edit atas Nama  : '.$data['siswa']->nama_siswa);
				redirect('admin/update_nilai/'.$id,'refresh');
			}
		}
		$data['title']	= 'Nilai Siswa';
		$data['judul']	= 'Halaman Edit Nilai Siswa';
		$data['dataNilai'] 	= $this->M_nilai->get(['md5(nilai.id_siswa)' => $id]);
		$this->mylibrary->templateadmin('nilai/update', $data);
	}

	


	public function delete_nilai($id, $id_siswa)
	{
		if ($this->M_nilai->delete(['md5(id_nilai)' => $id])) {
			$this->session->set_flashdata('message', 'Data nilai pelajaran berhasil di hapus');
		}else{
			$this->session->set_flashdata('failed', 'Data nilai pelajaran gagal di hapus !');
		}
		redirect('admin/update_nilai/'.$id_siswa,'refresh');
	}
	public function insert_nilai($id_siswa)
	{
		if ($this->M_nilai->insert(['id_pelajaran' => $this->input->post('id_pelajaran'), 'id_siswa' => $id_siswa])) {
			$this->session->set_flashdata('message', 'Data mata pelajaran berhasil di tambahkan ke dalam penilaian siswa');
		}else{
			$this->session->set_flashdata('message', 'Data mata pelajaran gagal di tambahkan ke dalam penilaian siswa');
		}
		redirect('admin/update_nilai/'.md5($id_siswa),'refresh');
	}


	public function print_nilai($id){
		$data['siswa'] = $this->M_siswa->get(['md5(siswa.id_siswa)' => $id])->row();
		$data['dataNilai'] 	= $this->M_nilai->get(['md5(nilai.id_siswa)' => $id]);
		$this->load->view('admin/nilai/print', $data);

	}
	// END :: NILAI

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */