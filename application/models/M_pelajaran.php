<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelajaran extends CI_Model {

	function get($where = NULL){
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get('pelajaran');
	}	

	public function insert()
	{
		return $this->db->insert('pelajaran', [
			'nama_pelajaran' => $this->input->post('nama_pelajaran')
		]);
	}

	public function update($id)
	{
		return $this->db->update('pelajaran', [
			'nama_pelajaran' => $this->input->post('nama_pelajaran')
		], ['md5(id_pelajaran)' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('pelajaran', ['md5(id_pelajaran)' => $id]);
	}

}

/* End of file M_pelajaran.php */
/* Location: ./application/models/M_pelajaran.php */