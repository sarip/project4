<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wali_kelas extends CI_Model {

	function get($where = NULL){
		$this->db->select('*');
		$this->db->from('wali_kelas');
		$this->db->join('guru', 'wali_kelas.id_guru = guru.id_guru');
		$this->db->join('kelas', 'wali_kelas.id_kelas = kelas.id_kelas');
		$this->db->join('jurusan', 'wali_kelas.id_jurusan = jurusan.id_jurusan');
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get();
	}	

	public function insert()
	{
		return $this->db->insert('wali_kelas', [
			'id_guru' 		=> htmlspecialchars($this->input->post('id_guru')),
			'id_kelas' 		=> htmlspecialchars($this->input->post('id_kelas')),
			'id_jurusan' 	=> htmlspecialchars($this->input->post('id_jurusan'))
		]);
	}

	public function update($id)
	{
		
		return $this->db->update('wali_kelas', [
			'id_guru' 		=> htmlspecialchars($this->input->post('id_guru')),
			'id_kelas' 		=> htmlspecialchars($this->input->post('id_kelas')),
			'id_jurusan' 	=> $this->input->post('id_jurusan')
		], ['md5(id_wali_kelas)' => $id]);
	}

	public function delete($id)
	{
		return $this->db->delete('wali_kelas', ['md5(id_wali_kelas)' => $id]);
	}

}

/* End of file M_wali_kelas.php */
/* Location: ./application/models/M_wali_kelas.php */