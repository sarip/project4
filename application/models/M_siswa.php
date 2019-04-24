<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {

	public function get($where = NULL){
		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas');
		$this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get();
	}


	function insert()
	{	
		$config['upload_path'] = './assets/siswa/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '200000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto_siswa')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$foto = $this->upload->data();
			$data = [
				'nis'			 				=> $this->input->post('nis'),
				'id_kelas'						=> $this->input->post('id_kelas'),
				'id_jurusan'					=> $this->input->post('id_jurusan'),
				'nama_siswa' 					=> $this->input->post('nama_siswa'),
				'jenis_kelamin' 				=> $this->input->post('jenis_kelamin'),
				'tempat_lahir' 					=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' 				=> $this->input->post('tanggal_lahir'),
				'warga_negara' 					=> $this->input->post('warga_negara'),
				'agama' 						=> $this->input->post('agama'),
				'alamat_siswa' 					=> $this->input->post('alamat_siswa'),
				'nama_orang_tua' 				=> $this->input->post('nama_orang_tua'),
				'pekerjaan' 					=> $this->input->post('pekerjaan'),
				'alamat_orang_tua' 				=> $this->input->post('alamat_orang_tua'),
				'nama_wali' 					=> $this->input->post('nama_wali'),
				'pekerjaan_wali' 				=> $this->input->post('pekerjaan_wali'),
				'alamat_wali' 					=> $this->input->post('alamat_wali'),
				'tanggal_masuk' 				=> $this->input->post('tanggal_masuk'),
				'asal_sekolah' 					=> $this->input->post('asal_sekolah'),
				'alamat_sekolah' 				=> $this->input->post('alamat_sekolah'),
				'nomor_sttb' 					=> $this->input->post('nomor_sttb'),
				'tanggal_sttb' 					=> $this->input->post('tanggal_sttb'),
				'tanggal_meninggalkan_sekolah' 	=> $this->input->post('tanggal_meninggalkan_sekolah'),
				'alasan_meninggalkan_sekolah' 	=> $this->input->post('alasan_meninggalkan_sekolah'),
				'tamat_nomor_sttb' 				=> $this->input->post('tamat_nomor_sttb'),
				'tamat_tanggal_sttb' 			=> $this->input->post('tamat_tanggal_sttb'),
				'keterangan_lain' 				=> $this->input->post('keterangan_lain'),
				'foto_siswa' 					=> $foto['file_name']
			];
			
			$this->db->insert('siswa', $data);
			return $this->db->insert_id();
		}
	}

	function update($id){

		$config['upload_path'] = './assets/siswa/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '200000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto_siswa')){
			$data = [
				'nis'			 				=> $this->input->post('nis'),
				'id_kelas'						=> $this->input->post('id_kelas'),
				'id_jurusan'					=> $this->input->post('id_jurusan'),
				'nama_siswa' 					=> $this->input->post('nama_siswa'),
				'jenis_kelamin' 				=> $this->input->post('jenis_kelamin'),
				'tempat_lahir' 					=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' 				=> $this->input->post('tanggal_lahir'),
				'warga_negara' 					=> $this->input->post('warga_negara'),
				'agama' 						=> $this->input->post('agama'),
				'alamat_siswa' 					=> $this->input->post('alamat_siswa'),
				'nama_orang_tua' 				=> $this->input->post('nama_orang_tua'),
				'pekerjaan' 					=> $this->input->post('pekerjaan'),
				'alamat_orang_tua' 				=> $this->input->post('alamat_orang_tua'),
				'nama_wali' 					=> $this->input->post('nama_wali'),
				'pekerjaan_wali' 				=> $this->input->post('pekerjaan_wali'),
				'alamat_wali' 					=> $this->input->post('alamat_wali'),
				'tanggal_masuk' 				=> $this->input->post('tanggal_masuk'),
				'asal_sekolah' 					=> $this->input->post('asal_sekolah'),
				'alamat_sekolah' 				=> $this->input->post('alamat_sekolah'),
				'nomor_sttb' 					=> $this->input->post('nomor_sttb'),
				'tanggal_sttb' 					=> $this->input->post('tanggal_sttb'),
				'tanggal_meninggalkan_sekolah' 	=> $this->input->post('tanggal_meninggalkan_sekolah'),
				'alasan_meninggalkan_sekolah' 	=> $this->input->post('alasan_meninggalkan_sekolah'),
				'tamat_nomor_sttb' 				=> $this->input->post('tamat_nomor_sttb'),
				'tamat_tanggal_sttb' 			=> $this->input->post('tamat_tanggal_sttb'),
				'keterangan_lain' 				=> $this->input->post('keterangan_lain')
			];
		}
		else{
			$foto = $this->upload->data();
			$result = $this->get(['md5(id_siswa)' => $id])->row();
			unlink('assets/siswa/'.$result->foto_siswa);
			$data = [
				'nis'			 				=> $this->input->post('nis'),
				'id_kelas'						=> $this->input->post('id_kelas'),
				'id_jurusan'					=> $this->input->post('id_jurusan'),
				'nama_siswa' 					=> $this->input->post('nama_siswa'),
				'jenis_kelamin' 				=> $this->input->post('jenis_kelamin'),
				'tempat_lahir' 					=> $this->input->post('tempat_lahir'),
				'tanggal_lahir' 				=> $this->input->post('tanggal_lahir'),
				'warga_negara' 					=> $this->input->post('warga_negara'),
				'agama' 						=> $this->input->post('agama'),
				'alamat_siswa' 					=> $this->input->post('alamat_siswa'),
				'nama_orang_tua' 				=> $this->input->post('nama_orang_tua'),
				'pekerjaan' 					=> $this->input->post('pekerjaan'),
				'alamat_orang_tua' 				=> $this->input->post('alamat_orang_tua'),
				'nama_wali' 					=> $this->input->post('nama_wali'),
				'pekerjaan_wali' 				=> $this->input->post('pekerjaan_wali'),
				'alamat_wali' 					=> $this->input->post('alamat_wali'),
				'tanggal_masuk' 				=> $this->input->post('tanggal_masuk'),
				'asal_sekolah' 					=> $this->input->post('asal_sekolah'),
				'alamat_sekolah' 				=> $this->input->post('alamat_sekolah'),
				'nomor_sttb' 					=> $this->input->post('nomor_sttb'),
				'tanggal_sttb' 					=> $this->input->post('tanggal_sttb'),
				'tanggal_meninggalkan_sekolah' 	=> $this->input->post('tanggal_meninggalkan_sekolah'),
				'alasan_meninggalkan_sekolah' 	=> $this->input->post('alasan_meninggalkan_sekolah'),
				'tamat_nomor_sttb' 				=> $this->input->post('tamat_nomor_sttb'),
				'tamat_tanggal_sttb' 			=> $this->input->post('tamat_tanggal_sttb'),
				'keterangan_lain' 				=> $this->input->post('keterangan_lain'),
				'foto_siswa' 					=> $foto['file_name']
			];
		}
		return $this->db->update('siswa', $data, ['md5(id_siswa)' => $id]);
	}

	public function update_absen($data, $where)
	{
		return $this->db->update('siswa', $data, $where);
	}

	function delete($id){
		$result = $this->get(['md5(id_siswa)' => $id])->row();
		unlink('assets/siswa/'.$result->foto_siswa);
		return $this->db->delete('siswa', ['md5(id_siswa)' => $id]);
	}

}

/* End of file M_siswa.php */
/* Location: ./application/models/M_siswa.php */