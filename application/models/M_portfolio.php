<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_portfolio extends CI_Model {

	function get($where=null)
	{
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get('portfolio');
	}

	function insert()
	{
		$config['upload_path'] = './assets/portfolio/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '300000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto_portfolio')){
			$error = array('error' => $this->upload->display_errors());		
			return false;
		}
		else{
			$data = $this->upload->data();
			return $this->db->insert('portfolio', 
				[
					'foto' => $data['file_name'], 
					'title' => htmlspecialchars($this->input->post('title'))
				]);
		}
	}

	function update($id)
	{
		$config['upload_path'] = './assets/portfolio/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']  = '30000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto_portfolio')){
			return $this->db->update('portfolio', ['title' => htmlspecialchars($this->input->post('title'))], ['md5(id_portfolio)' => $id]);
		}else{
			$data = $this->upload->data();
			$result = $this->get(['md5(id_portfolio)' => $id])->row();
			unlink('./assets/portfolio/'.$result->foto);
			return $this->db->update('portfolio', ['foto' => $data['file_name'], 'title' => htmlspecialchars($this->input->post('title'))], ['md5(id_portfolio)' => $id]);
		}
	}

	function delete($id)
	{
		return $this->db->delete('portfolio', ['md5(id_portfolio)' => $id]);
	}

}

/* End of file M_portfolio.php */
/* Location: ./application/models/M_portfolio.php */