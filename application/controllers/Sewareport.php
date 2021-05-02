<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewareport extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
		$this->title = 'Laporan Sewa';
		$this->link = 'sewareport';
		$this->load->model('m_sewa');
		// $this->load->model('m_sewad');
		// $this->load->model('m_sepeda');
		if (!$this->session->userdata('user')){
            redirect('login');
        }
    }

	public function index()
	{
		$this->load->helper('url');
		$data['title'] = $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'sewareport/v_index';
		$data['dataSewa'] = $this->m_sewa->getIndex();
		$this->load->view('layouts/v_layouts', $data);
	}
}
