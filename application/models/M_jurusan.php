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
		return $this->db->insert('jurusan', ['nama_jurusan' => $this->input->post('nama_jurusan')]);
	}

	function update($id)
	{
		return $this->db->update('jurusan', ['nama_jurusan' => $this->input->post('nama_jurusan')], ['md5(id_jurusan)' => $id]);
	}

	function delete($id)
	{
		if ($this->M_siswa->get(['md5(siswa.id_jurusan)' => $id])->num_rows() > 0) {
			return false;
		}else{
			return $this->db->delete('jurusan', ['md5(id_jurusan)' => $id]);
		}
	}

}

/* End of file M_jurusan.php */
/* Location: ./application/models/M_jurusan.php */