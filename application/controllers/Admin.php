<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('login') != 'admin' || $this->session->userdata('username') == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><i class="fa fa-warning"></i> Ooppss... Silahkan Login Terlebih Dahulu! </div>');
			redirect('auth');
		}
		$this->load->model(['M_portfolio', 'M_extra', 'M_biodata', 'M_siswa', 'M_guru', 'M_wali_kelas', 'M_pelajaran', 'M_mengajar', 'M_nilai', 'M_kelas', 'M_jurusan', 'M_kepsek', 'M_berita']);
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
		$data['portfolio']		= $this->M_portfolio->get()->num_rows();
		$data['extra']			= $this->M_extra->get()->num_rows();
		$data['berita']			= $this->M_berita->get()->num_rows();
		$data['kepsek']			= $this->M_kepsek->get()->row();
		if (isset($_POST['save'])) {
			$this->form_validation->set_rules('nip', 'NIP', 'trim|required');
			$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('no_telepon', 'Nomor Telepon', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

			if ($this->form_validation->run() == TRUE) {
				if ($this->M_kepsek->update()) {
					$this->session->set_flashdata('message', 'Data kepala sekolah berhasil di perbarui');		
				}else{
					$this->session->set_flashdata('failed', 'Data kepala sekolah gagal di perbarui');
				}
				redirect('admin');
			}
		}
		$this->mylibrary->templateadmin('dashboard', $data);
	}


	public function update_kenaikan($id_kelas, $id_jurusan){
		$kelas = $this->input->post('kelas');
		foreach ($this->M_siswa->get(['md5(siswa.id_kelas)' => $id_kelas, 'md5(siswa.id_jurusan)' => $id_jurusan])->result() as $key) {
			$check = $this->input->post($key->id_siswa);
			if ($check) {
				$this->db->update('siswa', ['id_kelas' => $kelas], ['id_siswa' => $key->id_siswa]);
			}
		}
		$kelas = $this->M_kelas->get(['md5(id_kelas)' => $id_kelas])->row();
		$jurusan = $this->M_jurusan->get(['md5(id_jurusan)' => $id_jurusan])->row();
		$this->session->set_flashdata('message', 'Data siswa <br>Kelas &nbsp;&nbsp;&nbsp; : '.$kelas->nama_kelas.'<br>Jurusan : '.$jurusan->nama_jurusan.'<br><br>  berhasil diperbarui');
		redirect('admin/kenaikan');
	}




	// START :: BERITA
	public function berita(){
		$data['title']		= 'Berita Sekolah';
		$data['judul']		= 'Halaman Data Berita Sekolah';
		$data['berita']	= $this->M_berita->get()->result();
		$this->mylibrary->templateadmin('berita/index', $data);
	}

	public function insert_berita(){
		$this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('slogan', 'Slogan', 'trim|required|min_length[5]');
		if ($this->form_validation->run() === TRUE) {
			if ($this->M_berita->insert()) {
				$this->session->set_flashdata('message', 'Data berita berhasil di tambahkan');
			}else{
				$this->session->set_flashdata('failed', 'Data berita gagal di tambahkan');
			}
			redirect('admin/berita','refresh');
		}
		$data['title']		= 'Berita Sekolah';
		$data['judul']		= 'Halaman Tambah Berita Sekolah';
		$this->mylibrary->templateadmin('berita/insert', $data);
	}

	public function update_berita($id){
		$this->form_validation->set_rules('content', 'Content', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('slogan', 'Slogan', 'trim|required|min_length[5]');
		if ($this->form_validation->run() === TRUE) {
			if ($this->M_berita->update($id)) {
				$this->session->set_flashdata('message', 'Data berita berhasil di edit');
			}else{
				$htis->session->set_flashdata('failed', 'Data berita gagal di edit');
			}
			redirect('admin/berita','refresh');
		}
		$data['title']		= 'Berita Sekolah';
		$data['berita']		= $this->M_berita->get(['md5(id_berita)' => $id])->row();
		$data['judul']		= 'Halaman Edit Berita Sekolah';
		$this->mylibrary->templateadmin('berita/update', $data);
	}

	public function delete_berita($id){
		if ($this->M_berita->delete($id)) {
			$this->session->set_flashdata('message', 'Data berita berhasil di hapus');
		}else{
			$this->session->set_flashdata('failed', 'Data berita gagal di hapus');
		}
		redirect('admin/berita','refresh');
	}
	public function detail_berita($id)
	{
		$data['title']	= 'Detail Berita';
		$data['judul']	= 'Halaman Detail Berita';
		$data['berita']	= $this->M_berita->get(['md5(id_berita)' => $id])->row();
		$this->mylibrary->templateadmin('berita/detail', $data);
	}
	// END :: BERITA





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



	// START :: EXTRAKKURIKULER
	public function extrakurikuler()
	{
		$data['title']	= 'Extrakurikuler';
		$data['judul']	= 'Data Extrakurikuler';
		$data['extrakurikuler'] = $this->M_extra->get()->result();
		$this->mylibrary->templateadmin('extra/index', $data);
	}

	private function _validation_extrakurikuler()
	{
		$this->form_validation->set_rules('nama_extra', 'Nama Extrakurikuler', 'trim|required');
		$this->form_validation->set_rules('hari', 'Hari', 'trim|required');
		$this->form_validation->set_rules('jam', 'Jam', 'trim|required');
		// $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim');
		$this->form_validation->set_rules('nama_pembimbing', 'Nama Pembimbing', 'trim|required');
	}

	public function insert_extrakurikuler()
	{
		$this->_validation_extrakurikuler();
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_extra->insert()) {
				$this->session->set_flashdata('message', 'Data Extrakurikuler berhasil di tambahkan');
			}else{
				$this->session->set_flashdata('failed', 'Data Extrakurikuler gagal di tambahkan');				
			}
			redirect('admin/extrakurikuler');
		}
		$data['title']	= 'Extrakurikuler';
		$data['judul']	= 'Halaman Tambah Extrakurikuler';
		$this->mylibrary->templateadmin('extra/insert', $data);
	}

	public function update_extrakurikuler($id)
	{
		$this->_validation_extrakurikuler();
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_extra->update($id)) {
				$this->session->set_flashdata('message', 'Data Extrakurikuler berhasil di edit');
			}else{
				$this->session->set_flashdata('failed', 'Data Extrakurikuler gagal di edit');
			}
			redirect('admin/extrakurikuler');
		}
		$data['title']		= 'Extrakurikuler';
		$data['judul']		= 'Halaman Edit Extrakurikuler';
		$data['extra']		= $this->M_extra->get(['md5(id_extra)' => $id])->row();
		$this->mylibrary->templateadmin('extra/update', $data);
	}

	public function delete_extrakurikuler($id)
	{
		if ($this->M_extra->delete($id)) {
			$this->session->set_flashdata('message', 'Data Extrakurikuler berhasil di hapus');
		}else{
			$this->session->set_flashdata('failed', 'Data Extrakurikuler gagal di hapus');
		}
		redirect('admin/extrakurikuler');
	}
	// END :: EXTRAKKURIKULER






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
		$data['title']			= 'Program Keahlian';
		$data['judul'] 			= 'Halaman Data Program Keahlian';
		$data['dataJurusan']	= $this->M_jurusan->get()->result();
		$this->mylibrary->templateadmin('jurusan/index', $data);
	}
	function insert_jurusan()
	{
		$this->form_validation->set_rules('nama_jurusan', 'Nama Program Keahlian', 'trim|required|is_unique[jurusan.nama_jurusan]');
		if($this->form_validation->run() == TRUE){
			if ($this->M_jurusan->insert()) {
				$this->session->set_flashdata('message', 'Data Pelajaran berhasil di tambahkan');
				redirect('admin/jurusan','refresh');
			}
		}
		$data['title']	= ' Program Keahlian';
		$data['judul']	= 'Halaman Tambah Program Keahlian';
		$this->mylibrary->templateadmin('jurusan/insert', $data);
	}
	public function update_jurusan($id)
	{
		if ($this->M_jurusan->get(['nama_jurusan' => $this->input->post('nama_jurusan')])->num_rows() > 0) {
			$this->form_validation->set_rules('nama_jurusan', 'Nama Program Keahlian', 'trim|required');
		}else{
			$this->form_validation->set_rules('nama_jurusan', 'Nama Program Keahlian', 'trim|required|is_unique[jurusan.nama_jurusan]', ['is_unique' => 'Nama Program Keahlian ini sudah di gunakan']);
		}
		if ($this->form_validation->run() == TRUE) {
			if ($this->M_jurusan->update($id)) {
				$this->session->set_flashdata('message', 'Data Program Keahlian berhasil di edit');
			}
			redirect('admin/jurusan','refresh');
		}
		$data['title'] 		= 'Program Keahlian';
		$data['judul'] 		= 'Halaman Edit Program Keahlian';
		$data['jurusan'] 	= $this->M_jurusan->get(['md5(id_jurusan)' => $id])->row();
		$this->mylibrary->templateadmin('jurusan/update', $data);
	}
	public function delete_jurusan($id)
	{
		if ($this->M_jurusan->delete($id)) {
			$this->session->set_flashdata('message', 'Data Program Keahlian berhasil di hapus');
		}else{
			$this->session->set_flashdata('failed', 'Data Program Keahlian gagal di hapus, dikarena kan data jurusan ini masih terpakai');
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
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('con_password', 'Confirm Password', 'matches[password]');
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
		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('con_password', 'COnfrim Password', 'matches[password]');
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

	public function print_siswa($id){
		$data['siswa']		= $this->M_siswa->get(['md5(id_siswa)' => $id])->row();
		$data['sekolah']	= $this->M_biodata->get()->row();
		$data['dataNilai'] 	= $this->M_nilai->get(['md5(nilai.id_siswa)' => $id]);
		$data['kepsek']		= $this->M_kepsek->get()->row();
		$this->load->view('admin/siswa/print', $data);
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
				$nilai_ijazah = $this->input->post('nilai_ijazah_'.$i);
				$nilai_skhun = $this->input->post('nilai_skhun_'.$i);
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
					'ak_6' => $ak_6,
					'nilai_ijazah' => $nilai_ijazah,
					'nilai_skhun' => $nilai_skhun
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
		$data['biodata']	= $this->M_biodata->get()->row();
		$this->load->view('admin/nilai/print', $data);

	}
	// END :: NILAI


	// SETTING PROFIL
	public function edit_profil(){
		$this->form_validation->set_rules('fullname', 'Full Name', 'trim');
		$this->form_validation->set_rules('username', 'Username', 'trim');
		$this->form_validation->set_rules('password', 'Password', 'trim');

		if ($this->form_validation->run() == TRUE) {
			$password = $this->input->post('password');
			$result = $this->db->get_where('account', ['id_account' => $this->session->userdata('id')])->row();
			if (password_verify($password, $result->password)) {
				$config['upload_path'] = './assets/img/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '5000';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto')){
					 $check =  $this->db->update('account', [
						'fullname' => $this->input->post('fullname'),
						'username' => $this->input->post('username')
					], ['id_account' => $this->session->userdata('id')]);
				}
				else{
					$foto = $this->upload->data();
					unlink('./assets/img/'.$result->foto);
					 $check =  $this->db->update('account', [
						'fullname'		=> $this->input->post('fullname'),
						'username'		=> $this->input->post('username'),
						'foto'			=> $foto['file_name']
					], ['id_account' => $this->session->userdata('id')]);
				}
				if ($check) {
					$this->session->unset_userdata('id');
					$this->session->unset_userdata('login');
					$this->session->unset_userdata('fullname');
					$this->session->unset_userdata('password');
					$this->session->unset_userdata('username');
					$this->session->unset_userdata('foto');
					$this->session->set_flashdata('message', '<div class="alert alert-info"><i class="fa fa-check-square"></i> Edit Profil Berhasil Anda Akan Kembali Kehalaman login, Silahkan login kembali! </div>');
					redirect('auth');
					
				}else{
					$this->session->set_flashdata('failed', 'Edit Profil Gagal');
					redirect('admin');
				}
			}else{
				$this->session->set_flashdata('failed', 'Confirm Password Salah');
				redirect('admin');
			}
		}
	}

	public function setting_password(){
		$this->form_validation->set_rules('pw1', 'Password', 'trim');
		$this->form_validation->set_rules('pw2', 'Password', 'trim');
		if ($this->form_validation->run() == TRUE) {
			$pw1 = $this->input->post('pw1');
			$pw2 = $this->input->post('pw2');
			$password_lama = $this->input->post('password_lama');
			if ($pw1 == $pw2) {
				$result = $this->db->get_where('account', ['id_account' => $this->session->userdata('id')])->row();
				if (password_verify($password_lama, $result->password)) {
					if ($this->db->update('account', ['password' => password_hash($pw1, PASSWORD_DEFAULT)], ['id_account' => $this->session->userdata('id')])) {
						$this->session->unset_userdata('id');
						$this->session->unset_userdata('login');
						$this->session->unset_userdata('fullname');
						$this->session->unset_userdata('password');
						$this->session->unset_userdata('username');
						$this->session->unset_userdata('foto');
						$this->session->set_flashdata('message', '<div class="alert alert-info"><i class="fa fa-check-square"></i> Edit Password Berhasil Anda Akan Kembali Kehalaman login, Silahkan login kembali! </div>');
						redirect('auth');
					}else{
						$this->session->set_flashdata('failed', 'Edit Password Gagal');
						redirect('admin');	
					}
				}else{
					$this->session->set_flashdata('failed', 'Cofirm Password Lama Tidak Sesuai');
					redirect('admin');
				}
			}else{
				$this->session->set_flashdata('failed', 'Cofirm Password Tidak Sesuai');
				redirect('admin');
			}
		}
	}





	// START :: KENAIKAN
	function kenaikan(){
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'trim|required');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$kelas = $this->M_kelas->get(['id_kelas' => $this->input->post('id_kelas')])->row();
			$jurusan = $this->M_jurusan->get(['id_jurusan' => $this->input->post('id_jurusan')])->row();
			if ($this->M_siswa->get(['siswa.id_kelas' => $kelas->id_kelas, 'siswa.id_jurusan' => $jurusan->id_jurusan])->num_rows() <= 0) {
				$data['message'] = $kelas->nama_kelas.' '.$jurusan->nama_jurusan;
			}
			$data['dataSiswa']	= $this->M_siswa->get(['siswa.id_kelas' => $kelas->id_kelas, 'siswa.id_jurusan' => $jurusan->id_jurusan])->result();

		}

		$data['title']			= 'Kenaikan Kelas';
		$data['judul']			= 'Proses Kenaikan';
		$data['dataKelas']		= $this->M_kelas->get()->result();
		$data['dataJurusan']	= $this->M_jurusan->get()->result();
		$this->mylibrary->templateadmin('kenaikan/index', $data);
	}

	
	// END :: KENAIKAN


	// START :: CETAK DATA
	public function cetak_data(){
		$data['title']			= 'Cetak data';
		$data['judul']			= 'Halaman cetak data';
		$data['dataKelas']		= $this->M_kelas->get()->result();
		$data['dataJurusan']	= $this->M_jurusan->get()->result();
		$data['dataNilai']		= $this->M_nilai->get()->result();
		$data['sekolah']		= $this->M_biodata->get()->row();
		$data['kepsek']			= $this->M_kepsek->get()->row();
		if (isset($_POST['cari'])) {
			$id_kelas  			= $this->input->post('id_kelas');
			$id_jurusan 		= $this->input->post('id_jurusan');

			if ($id_kelas == 'all' && $id_jurusan == 'all') {
				if ($this->M_siswa->get()->num_rows() > 0) {
					$data['dataSiswa']	= $this->M_siswa->get()->result();
				}
			}
			if ($id_kelas == 'all' && $id_jurusan != 'all') {
				if ($this->M_siswa->get(['siswa.id_jurusan' => $id_jurusan])->num_rows() > 0) {
					$data['dataSiswa']	= $this->M_siswa->get(['siswa.id_jurusan' => $id_jurusan])->result();
				}
			}
			if ($id_kelas != 'all' && $id_jurusan == 'all') {
				if ($this->M_siswa->get(['siswa.id_kelas' => $id_kelas])->num_rows() > 0) {
					$data['dataSiswa']	= $this->M_siswa->get(['siswa.id_kelas' => $id_kelas])->result();
				}
			}
			if ($id_kelas != 'all' && $id_jurusan != 'all') {
				if ($this->M_siswa->get(['siswa.id_kelas' => $id_kelas, 'siswa.id_jurusan' => $id_jurusan])->num_rows() > 0) {
					$data['dataSiswa']	= $this->M_siswa->get(['siswa.id_kelas' => $id_kelas, 'siswa.id_jurusan' => $id_jurusan])->result();
				}
			}
			if (!@$data['dataSiswa']) {
				$data['message'] = "Data Tidak di temukan";
				$this->mylibrary->templateadmin('cetak_data/index', $data);
			}else{
				$this->load->view('admin/cetak_data/print', $data);

			}
		}else{
			$this->mylibrary->templateadmin('cetak_data/index', $data);

		}
	}
	// END :: CETAK DATA

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */