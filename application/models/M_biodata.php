<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_biodata extends CI_Model {

	public function get()
	{
		return $this->db->get('biodata');
	}

	public function setting()
	{
		$config['upload_path'] = './assets/biodata/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '30000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			return $this->db->update('biodata', [
				'nama_sekolah'	=> htmlspecialchars($this->input->post('nama_sekolah')),
				'visi'			=> $this->input->post('visi'),
				'misi'			=> $this->input->post('misi'),
				'email_sekolah'	=> htmlspecialchars($this->input->post('email_sekolah')),
				'no_telepon_sekolah'	=> htmlspecialchars($this->input->post('no_telepon_sekolah')),
				'keterangan'	=> htmlspecialchars($this->input->post('keterangan')),
				'alamat_sekolah'	=> htmlspecialchars($this->input->post('alamat_sekolah'))
			]);
		}
		else{
			$data = $this->upload->data();
			$result = $this->get()->row();
			unlink('./assets/biodata/'.$result->logo_sekolah);
			return $this->db->update('biodata', [
				'nama_sekolah'	=> htmlspecialchars($this->input->post('nama_sekolah')),
				'visi'			=> $this->input->post('visi'),
				'misi'			=> $this->input->post('misi'),
				'email_sekolah'	=> htmlspecialchars($this->input->post('email_sekolah')),
				'no_telepon_sekolah'	=> htmlspecialchars($this->input->post('no_telepon_sekolah')),
				'keterangan'	=> htmlspecialchars($this->input->post('keterangan')),
				'alamat_sekolah'	=> htmlspecialchars($this->input->post('alamat_sekolah')),
				'logo_sekolah'	=> $data['file_name']
			], ['id_biodata' => $result->id_biodata]);
		}
	}	

}

/* End of file M_biodata.php */
/* Location: ./application/models/M_biodata.php */