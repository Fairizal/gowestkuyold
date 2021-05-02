<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_help');
		// $this->title = 'Dashboard';
		// $this->link = strtolower($this->title);
		// if (!$this->session->userdata('user')){
  //           redirect('login');
  //       }
    }

	public function getallsewa()
	{
		$this->db->select('count(id) as sewa');
		$this->db->from('sewa');
		$query = $this->db->get()->result();
		$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'data' => $query[0])));
	}

	public function getonlysewa() 
	{
		$this->db->select('count(id) as sewa');
		$this->db->from('sewa');
		$this->db->where(['isback' => 0]);
		$query = $this->db->get()->result();
		$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'data' => $query[0])));
	}

	public function getonlykembali() 
	{
		$this->db->select('count(id) as back');
		$this->db->from('sewa');
		$this->db->where(['isback' => 1]);
		$query = $this->db->get()->result();
		$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'data' => $query[0])));
	}

	public function getqtysepeda() 
	{
		$this->db->select('sum(qty) as qtysepeda');
		$this->db->from('sepeda');
		$query = $this->db->get()->result();
		$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'data' => $query[0])));
	}

	public function getomzet() 
	{
		$this->db->select('sum(total) as omzet');
		$this->db->from('sewa');
		$query = $this->db->get()->result();
		// die(var_dump($query[0]->omzet));
		$hasil = $this->m_help->prettyCurrencyFormat($query[0]->omzet);
		$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'data' => $hasil)));
	}
}
