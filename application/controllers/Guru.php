<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('login') != 'guru' || $this->session->userdata('nama_guru') == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><i class="fa fa-warning"></i> Ooppss... Silahkan Login Terlebih Dahulu! </div>');
			redirect('auth');
		}
		$this->load->model(['M_portfolio', 'M_extra', 'M_biodata', 'M_siswa', 'M_guru', 'M_wali_kelas', 'M_pelajaran', 'M_mengajar', 'M_nilai', 'M_kelas', 'M_jurusan', 'M_kepsek']);
	}

	public function index()
	{

		$data['title'] 			= 'Halaman Home';
		$data['wali_kelas']		= $this->M_wali_kelas->get(['wali_kelas.id_guru' => $this->session->userdata('id_guru')])->row();
		$data['mengajar']		= $this->M_mengajar->get(['mengajar.id_guru' => $this->session->userdata('id_guru')])->num_rows();
		$this->mylibrary->templateguru('dashboard', $data);
	}

	public function mengajar($id)
	{
		$data['title']		= "Mengajar";
		$data['judul']		= "Data Mengajar & Nilai";
		$data['mengajar']	= $this->M_mengajar->get(['md5(mengajar.id_guru)' => $id])->result();
		$this->mylibrary->templateguru('mengajar/index', $data);
	}

	public function nilai($id_kelas, $id_jurusan, $id_pelajaran)
	{
		foreach ($this->db->get_where('siswa', ['md5(id_kelas)' => $id_kelas, 'md5(id_jurusan)' => $id_jurusan])->result() as $siswa) {
			$this->db->delete('nilai', ['id_siswa' => $siswa->id_siswa, 'id_pelajaran' => $id_pelajaran]);
			$id_siswa = $siswa->id_siswa;

			if(@$this->input->post('id_siswa_'.$id_siswa.'_ap_1')){
				$ap_1 = $this->input->post('id_siswa_'.$id_siswa.'_ap_1');
			}else{
				$ap_1 = 0;
			}
			if(@$this->input->post('id_siswa_'.$id_siswa.'_ap_2')){
				$ap_2 = $this->input->post('id_siswa_'.$id_siswa.'_ap_2');
			}else{
				$ap_2 = 0;
			}
			if(@$this->input->post('id_siswa_'.$id_siswa.'_ap_3')){
				$ap_3 = $this->input->post('id_siswa_'.$id_siswa.'_ap_3');
			}else{
				$ap_3 = 0;
			}
			if(@$this->input->post('id_siswa_'.$id_siswa.'_ap_4')){
				$ap_4 = $this->input->post('id_siswa_'.$id_siswa.'_ap_4');
			}else{
				$ap_4 = 0;
			}
			if(@$this->input->post('id_siswa_'.$id_siswa.'_ap_5')){
				$ap_5 = $this->input->post('id_siswa_'.$id_siswa.'_ap_5');
			}else{
				$ap_5 = 0;
			}
			if(@$this->input->post('id_siswa_'.$id_siswa.'_ap_6')){
				$ap_6 = $this->input->post('id_siswa_'.$id_siswa.'_ap_6');
			}else{
				$ap_6 = 0;
			}


			if(@$this->input->post('id_siswa_'.$id_siswa.'_ak_1')){
				$ak_1 = $this->input->post('id_siswa_'.$id_siswa.'_ak_1');
			}else{
				$ak_1 = 0;
			}
			if(@$this->input->post('id_siswa_'.$id_siswa.'_ak_2')){
				$ak_2 = $this->input->post('id_siswa_'.$id_siswa.'_ak_2');
			}else{
				$ak_2 = 0;
			}
			if(@$this->input->post('id_siswa_'.$id_siswa.'_ak_3')){
				$ak_3 = $this->input->post('id_siswa_'.$id_siswa.'_ak_3');
			}else{
				$ak_3 = 0;
			}
			if(@$this->input->post('id_siswa_'.$id_siswa.'_ak_4')){
				$ak_4 = $this->input->post('id_siswa_'.$id_siswa.'_ak_4');
			}else{
				$ak_4 = 0;
			}
			if(@$this->input->post('id_siswa_'.$id_siswa.'_ak_5')){
				$ak_5 = $this->input->post('id_siswa_'.$id_siswa.'_ak_5');
			}else{
				$ak_5 = 0;
			}
			if(@$this->input->post('id_siswa_'.$id_siswa.'_ak_6')){
				$ak_6 = $this->input->post('id_siswa_'.$id_siswa.'_ak_6');
			}else{
				$ak_6 = 0;
			}

			if (@$this->input->post('id_siswa_'.$id_siswa.'_nilai_ijazah')) {
				$nilai_ijazah = $this->input->post('id_siswa_'.$id_siswa.'_nilai_ijazah');
			}else{
				$nilai_ijazah = 0;
			}

			if (@$this->input->post('id_siswa_'.$id_siswa.'_nilai_skhun')) {
				$nilai_skhun = $this->input->post('id_siswa_'.$id_siswa.'_nilai_skhun');
			}else{
				$nilai_skhun = 0;
			}

			$data = [
				'id_siswa'		=> $id_siswa,
				'id_pelajaran'	=> $id_pelajaran,
				'ap_1' 			=> $ap_1,
				'ap_2' 			=> $ap_2,
				'ap_3' 			=> $ap_3,
				'ap_4' 			=> $ap_4,
				'ap_5' 			=> $ap_5,
				'ap_6' 			=> $ap_6,
				'ak_1' 			=> $ak_1,
				'ak_2' 			=> $ak_2,
				'ak_3' 			=> $ak_3,
				'ak_4' 			=> $ak_4,
				'ak_5' 			=> $ak_5,
				'ak_6' 			=> $ak_6,
				'nilai_ijazah'	=> $nilai_ijazah,
				'nilai_skhun'	=> $nilai_skhun				
			];
			$this->db->insert('nilai', $data);
		}
		$kelas 	 	= $this->db->get_where('kelas', ['md5(id_kelas)'	=> $id_kelas])->row();
		$jurusan 	= $this->db->get_where('jurusan', ['md5(id_jurusan)'=> $id_jurusan])->row();
		$pelajaran 	= $this->db->get_where('pelajaran', ['id_pelajaran'	=> $id_pelajaran])->row();	
		$this->session->set_flashdata('message', 'Data nilai mengajar <br>Kelas : '.$kelas->nama_kelas.'<br> Jurusan : '.$jurusan->nama_jurusan.' <br> Mapel : ('.$pelajaran->nama_pelajaran.') <br><br> successfull di perbarui ');
		redirect('guru/mengajar/'.md5($this->session->userdata('id_guru')));
	}



	public function wali_kelas($id)
	{
		$result = $this->M_wali_kelas->get(['md5(wali_kelas.id_guru)' => $id])->row();
		$data['title']		= "Siswa";
		$data['judul']		= "Data Siswa ".$result->nama_kelas." ".$result->nama_jurusan;
		$data['dataSiswa']	= $this->M_siswa->get(['siswa.id_kelas' => $result->id_kelas, 'siswa.id_jurusan' => $result->id_jurusan]);
		$this->mylibrary->templateguru('wali_kelas/index', $data);
	
	}

	public function detail_siswa($id){
		$data['title']		= 'Detail Siswa';
		$data['judul']		= 'Halaman Detail Siswa';
		$data['dataNilai'] 	= $this->M_nilai->get(['md5(nilai.id_siswa)' => $id]);
		$data['siswa']		= $this->M_siswa->get(['md5(id_siswa)' => $id])->row();
		$this->mylibrary->templateguru('wali_kelas/detail', $data);
	}

	public function absen_siswa($id){
		$data['title']		= 'Absen Siswa';
		$data['judul']		= 'Halaman Absen Siswa';
		$data['nilai']		= $this->M_siswa->get(['md5(id_siswa)' => $id])->row();
		if (isset($_POST['simpan'])) {
			$data = [
					's_1'		=> $this->input->post('s_1'),
					's_2'		=> $this->input->post('s_2'),
					's_3'		=> $this->input->post('s_3'),
					's_4'		=> $this->input->post('s_4'),
					's_5'		=> $this->input->post('s_5'),
					's_6'		=> $this->input->post('s_6'),
					'i_1'		=> $this->input->post('i_1'),
					'i_2'		=> $this->input->post('i_2'),
					'i_3'		=> $this->input->post('i_3'),
					'i_4'		=> $this->input->post('i_4'),
					'i_5'		=> $this->input->post('i_5'),
					'i_6'		=> $this->input->post('i_6'),
					'a_1'		=> $this->input->post('a_1'),
					'a_2'		=> $this->input->post('a_2'),
					'a_3'		=> $this->input->post('a_3'),
					'a_4'		=> $this->input->post('a_4'),
					'a_5'		=> $this->input->post('a_5'),
					'a_6'		=> $this->input->post('a_6'),
					'th_1'		=> $this->input->post('th_1'),
					'th_2'		=> $this->input->post('th_2'),
					'th_3'		=> $this->input->post('th_3'),
					'catatan' 	=> $this->input->post('catatan')
				];
			if ($this->db->update('siswa', $data, ['md5(id_siswa)' => $id])) {
				$this->session->set_flashdata('message', 'Absen Berhasil');
				redirect('guru/absen_siswa/'.$id, 'refresh');
			}
		}
		$this->mylibrary->templateguru('wali_kelas/absen', $data);
	}

	public function print_siswa($id){
		$data['siswa']		= $this->M_siswa->get(['md5(id_siswa)' => $id])->row();
		$data['sekolah']	= $this->M_biodata->get()->row();
		$data['dataNilai'] 	= $this->M_nilai->get(['md5(nilai.id_siswa)' => $id]);
		$data['kepsek']		= $this->M_kepsek->get()->row();
		$this->load->view('guru/wali_kelas/print_siswa', $data);
	}

	public function edit_profil(){
			$password = $this->input->post('password');
			$result = $this->db->get_where('guru', ['id_guru' => $this->session->userdata('id_guru')])->row();
			if (password_verify($password, $result->password)) {
				$config['upload_path'] = './assets/guru/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '5000';
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload('foto')){
					$check = $this->db->update('guru', [
						'nama_guru' 	=> $this->input->post('nama_guru'),
						'alamat' 		=> $this->input->post('alamat'),
						'tempat_lahir'	=> $this->input->post('tempat_lahir'),
						'tanggal_lahir' => $this->input->post('tanggal_lahir'),
						'agama'			=> $this->input->post('agama'),
						'jenis_kelamin'	=> $this->input->post('jenis_kelamin')
					], ['id_guru' => $this->session->userdata('id_guru')]);
				}
				else{
					$foto = $this->upload->data();
					unlink('./assets/guru/'.$result->foto);
					$check = $this->db->update('guru', [
						'nama_guru' 	=> $this->input->post('nama_guru'),
						'alamat' 		=> $this->input->post('alamat'),
						'tempat_lahir'	=> $this->input->post('tempat_lahir'),
						'tanggal_lahir' => $this->input->post('tanggal_lahir'),
						'agama'			=> $this->input->post('agama'),
						'jenis_kelamin'	=> $this->input->post('jenis_kelamin'),
						'foto'			=> $foto['file_name']
					], ['id_guru' => $this->session->userdata('id_guru')]);
				}
					if ($check) {
						$this->session->unset_userdata('login');
						$this->session->unset_userdata('id_guru');
						$this->session->unset_userdata('nama_guru');
						$this->session->unset_userdata('foto');
						$this->session->set_flashdata('message', '<div class="alert alert-info"><i class="fa fa-check-square"></i> Edit Profil Berhasil Anda Akan Kembali Kehalaman login, Silahkan login kembali! </div>');
						redirect('auth');
					}else{
						$this->session->set_flashdata('failed', 'Edit Profil Gagal');
						redirect('guru');
					}
			}else{
				$this->session->set_flashdata('failed', 'Confirm Password Gagal');
				redirect('guru');
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
				$result = $this->db->get_where('guru', ['id_guru' => $this->session->userdata('id_guru')])->row();
				if (password_verify($password_lama, $result->password)) {
					if ($this->db->update('guru', ['password' => password_hash($pw1, PASSWORD_DEFAULT)], ['id_guru' => $this->session->userdata('id_guru')])) {
						$this->session->unset_userdata('login');
						$this->session->unset_userdata('id_guru');
						$this->session->unset_userdata('nama_guru');
						$this->session->unset_userdata('foto');
						$this->session->set_flashdata('message', '<div class="alert alert-info"><i class="fa fa-check-square"></i> Edit Password Berhasil Anda Akan Kembali Kehalaman login, Silahkan login kembali! </div>');
						redirect('auth');
					}else{
						$this->session->set_flashdata('failed', 'Edit Password Gagal');
						redirect('guru');	
					}
				}else{
					$this->session->set_flashdata('failed', 'Cofirm Password Lama Tidak Sesuai');
					redirect('guru');
				}
			}else{
				$this->session->set_flashdata('failed', 'Cofirm Password Tidak Sesuai');
				redirect('guru');
			}
		}
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */