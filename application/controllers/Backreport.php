<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backreport extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
		$this->title = 'Laporan Pengembalian';
		$this->link = 'backreport';
		// $this->load->model('m_sewa');
		// $this->load->model('m_sewad');
		$this->load->model('m_back');
		// $this->load->model('m_backd');
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
		$data['content'] = 'backreport/v_index';
		$data['dataBack'] = $this->m_back->getIndex();
		$this->load->view('layouts/v_layouts', $data);
	}

	
}
