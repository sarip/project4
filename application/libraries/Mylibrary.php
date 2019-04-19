<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mylibrary
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();
        date_default_timezone_set('Asia/Jakarta');
	}

	public function templateadmin($content, $data=NULL){
		$this->ci->load->view('admin/template/header', $data);
	    $this->ci->load->view('admin/template/sidebar', $data);
	    $this->ci->load->view('admin/'.$content, $data);
	    $this->ci->load->view('admin/template/footer', $data);
	}
    public function date_indo($date)
    {
        if ($date == '0000-00-00') {
            return '0000-00-00';
        }
        $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl   = substr($date, 8, 2);

        $result = $tgl . " " . $BulanIndo[(int) $bulan - 1] . " " . $tahun;
        return ($result);
    }

}

/* End of file Mylibrary.php */
/* Location: ./application/libraries/Mylibrary.php */
