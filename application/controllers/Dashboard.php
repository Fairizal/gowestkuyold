<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();
		$this->title = 'Dashboard';
		$this->link = strtolower($this->title);
		if (!$this->session->userdata('user')){
            redirect('login');
        }
    }

	public function index()
	{
		$this->load->helper('url');
		$data['title'] = $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'dashboard/v_dashboard';
		$this->load->view('layouts/v_layouts', $data);
	}

	public function logout() 
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
