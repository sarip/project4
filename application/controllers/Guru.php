<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if ($this->session->userdata('login') != 'guru' || $this->session->userdata('nama_guru') == '') {
			$this->session->set_flashdata('message', '<div class="alert alert-danger"><i class="fa fa-warning"></i> Ooppss... Silahkan Login Terlebih Dahulu! </div>');
			redirect('auth');
		}
		$this->load->model(['M_portfolio', 'M_extra', 'M_biodata', 'M_siswa', 'M_guru', 'M_wali_kelas', 'M_pelajaran', 'M_mengajar', 'M_nilai', 'M_kelas', 'M_jurusan']);
	}

	public function index()
	{
		$data['title'] 			= 'Halaman Home';
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
		$data['siswa']		= $this->M_siswa->get(['md5(id_siswa)' => $id])->row();
		$this->mylibrary->templateguru('wali_kelas/detail', $data);
	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */