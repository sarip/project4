<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model {

	public function get($where=NULL)
	{
		$this->db->order_by('pelajaran.id_pelajaran', 'ASC');
		$this->db->select('*');
		$this->db->from('nilai');
		$this->db->join('siswa', 'nilai.id_siswa = siswa.id_siswa');
		$this->db->join('pelajaran', 'nilai.id_pelajaran = pelajaran.id_pelajaran');
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get();
	}


	public function insert($data)
	{
		return $this->db->insert('nilai', $data);
	}

	public function update($data, $where)
	{
		return $this->db->update('nilai', $data, $where);
	}

	

}

/* End of file M_nilai.php */
/* Location: ./application/models/M_nilai.php */