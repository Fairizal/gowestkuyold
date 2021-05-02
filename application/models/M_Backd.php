<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Backd extends CI_Model
{
	public function getIndex($back_id)
	{
		$this->db->select('bd.*, s.nama as namaSepeda');
		$this->db->from('backd bd');
		$this->db->join('sepeda s', 's.id = bd.sepeda_id');
		$this->db->where(['back_id' => $back_id]);
		$query = $this->db->get()->result();
		return $query;
	}
}