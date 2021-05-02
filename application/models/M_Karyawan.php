<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Karyawan extends CI_Model
{
	public function getIndex()
	{
		$this->db->select('id, nama, alamat, nohp');
		$this->db->from('user');
		$query = $this->db->get()->result();
		return $query;
	}

	public function getData($id)
	{
		$this->db->select('id, nama, alamat, nohp');
		$this->db->from('user');
		$this->db->where(['id' => $id]);
		$query = $this->db->get()->result();
		return $query;
	}

	public function insertData($data)
	{
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

	public function updateData($id, $data)
	{
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('user', $data);
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
		$this->db->delete('user', ['id' => $id]);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
		{
		    return 0;
		} else {
			return 1;
		}
	}
}