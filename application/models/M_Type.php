<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Type extends CI_Model
{
	public function getIndex()
	{
		$this->db->select('*');
		$this->db->from('type');
		$query = $this->db->get()->result();
		return $query;
	}

}