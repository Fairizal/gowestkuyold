<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sewad extends CI_Model
{
	public function getIndex($sewa_id)
	{
		$this->db->select('sd.*, s.nama as namaSepeda');
		$this->db->from('sewad sd');
		$this->db->join('sepeda s', 's.id = sd.sepeda_id');
		$this->db->where(['sewa_id' => $sewa_id]);
		$query = $this->db->get()->result();
		return $query;
	}

	// public function getData($id)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('sewa');
	// 	$this->db->where(['id' => $id]);
	// 	$query = $this->db->get()->result();
	// 	return $query;
	// }

	// public function insertData($data)
	// {
	// 	$this->db->insert('user', $data);
	// 	return $this->db->insert_id();
	// }

	// public function updateData($id, $data)
	// {
	// 	$this->db->trans_start();
	// 	$this->db->where('id', $id);
	// 	$this->db->update('user', $data);
	// 	$this->db->trans_complete();
	// 	if ($this->db->trans_status() === FALSE)
	// 	{
	// 	    return 0;
	// 	} else {
	// 		return 1;
	// 	}
	// }

	// public function deleteData($id)
	// {
	// 	$this->db->trans_start();
	// 	$this->db->delete('user', ['id' => $id]);
	// 	$this->db->trans_complete();
	// 	if ($this->db->trans_status() === FALSE)
	// 	{
	// 	    return 0;
	// 	} else {
	// 		return 1;
	// 	}
	// }
}