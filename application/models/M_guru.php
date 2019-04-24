<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {

	function get($where=null)
	{
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get('guru');
	}

	function insert()
	{
		$config['upload_path'] = './assets/guru/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '20000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$foto = $this->upload->data();
			$data = [
				'nip' 				=> $this->input->post('nip'),
				'nama_guru' 		=> $this->input->post('nama_guru'),
				'alamat' 			=> $this->input->post('alamat'),
				'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
				'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
				'agama' 			=> $this->input->post('agama'),
				'jenis_kelamin' 	=> $this->input->post('jenis_kelamin'),
				'foto'				=> $foto['file_name']
			];
			$this->db->insert('guru', $data);
			return $this->db->insert_id();
		}
	}

	function update($id)
	{
		return $this->db->update('guru', ['nama_guru' => $this->input->post('nama_guru')], ['md5(id_guru)' => $id]);
	}

	function delete($id)
	{
		if ($this->M_siswa->get(['md5(siswa.id_guru)' => $id])->num_rows() > 0) {
			return false;
		}else{
			return $this->db->delete('guru', ['md5(id_guru)' => $id]);
		}
	}

}

/* End of file M_guru.php */
/* Location: ./application/models/M_guru.php */