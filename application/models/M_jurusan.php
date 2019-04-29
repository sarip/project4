<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jurusan extends CI_Model {

	function get($where=null)
	{
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get('jurusan');
	}

	function insert()
	{
		$config['upload_path'] = './assets/jurusan/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '30000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto_jurusan')){
			return $this->db->insert('jurusan', [
				'nama_jurusan' => $this->input->post('nama_jurusan'),
				'keterangan_jurusan' => $this->input->post('keterangan_jurusan')
			]);
		}else{
			$data = $this->upload->data();
			return $this->db->insert('jurusan', [
				'nama_jurusan' => $this->input->post('nama_jurusan'),
				'foto_jurusan' => $data['file_name'],
				'keterangan_jurusan' => $this->input->post('keterangan_jurusan')
			]);
		}
	}

	function update($id)
	{
		$config['upload_path'] = './assets/jurusan/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '30000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto_jurusan')){
			return $this->db->update('jurusan', [
				'nama_jurusan' => $this->input->post('nama_jurusan'),
				'keterangan_jurusan' => $this->input->post('keterangan_jurusan')
			], ['md5(id_jurusan)' => $id]);
		}else{
			$data =  $this->upload->data();
			$result = $this->db->get_where('jurusan', ['md5(id_jurusan)' => $id])->row();
			unlink('./assets/jurusan/'.$result->foto_jurusan);
			return $this->db->update('jurusan', [
				'nama_jurusan' => $this->input->post('nama_jurusan'),
				'foto_jurusan' => $data['file_name'],
				'keterangan_jurusan' => $this->input->post('keterangan_jurusan')
			], ['md5(id_jurusan)' => $id]);
		}
	}

	function delete($id)
	{
		if ($this->M_siswa->get(['md5(siswa.id_jurusan)' => $id])->num_rows() > 0 || $this->M_wali_kelas->get(['md5(wali_kelas.id_jurusan)' => $id])->num_rows() > 0  || $this->M_mengajar->get(['md5(mengajar.id_jurusan)' => $id])->num_rows() > 0 ) {
			return false;
		}else{
			$result = $this->get(['md5(id_jurusan)' => $id])->row();
			unlink('./assets/jurusan/'.$result->foto_jurusan);
			return $this->db->delete('jurusan', ['md5(id_jurusan)' => $id]);
		}
	}

}

/* End of file M_jurusan.php */
/* Location: ./application/models/M_jurusan.php */