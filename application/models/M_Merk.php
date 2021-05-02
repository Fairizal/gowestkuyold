<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Merk extends CI_Model
{
	public function getIndex()
	{
		$this->db->select('*');
		$this->db->from('merk');
		$query = $this->db->get()->result();
		return $query;
	}

}