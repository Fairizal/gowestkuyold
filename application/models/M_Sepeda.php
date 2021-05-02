<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sepeda extends CI_Model
{
	public function getIndex()
	{
		$this->db->select('*');
		$this->db->from('sepeda s');
		// $this->db->join('type t', 't.id = s.type_id');
		// $this->db->join('merk m', 'm.id = s.merk_id');
		$query = $this->db->get()->result();
		return $query;
	}

	public function getData($id)
	{
		$this->db->select('*');
		$this->db->from('sepeda');
		$this->db->where(['id' => $id]);
		$query = $this->db->get()->result();
		return $query;
	}

	public function insertData($data)
	{
		$this->db->insert('sepeda', $data);
		return $this->db->insert_id();
	}

	public function updateData($id, $data)
	{
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('sepeda', $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return 0;
		} else {
			return 1;
		}
	}

	public function deleteData($id)
	{
		$this->db->trans_start();
		$this->db->delete('sepeda', ['id' => $id]);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return 0;
		} else {
			return 1;
		}
	}

}