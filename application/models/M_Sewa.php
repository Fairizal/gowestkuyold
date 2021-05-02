<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Sewa extends CI_Model
{
	public function getIndex()
	{
		$this->db->select('*');
		$this->db->from('sewa');
		$query = $this->db->get()->result();
		return $query;
	}

	// public function getIndexNotBack()
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('sewa');
	// 	$this->db->where(['isback' => false]);
	// 	$query = $this->db->get()->result();
	// 	return $query;
	// }

	public function getData($id)
	{
		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->where(['id' => $id]);
		$query = $this->db->get()->result();
		return $query;
	}

	public function insertData($data)
	{
		$this->db->trans_begin();
		$this->db->insert('sewa', $data);
		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        return 0;
		}
		else
		{
			$sewaId = $this->db->insert_id();
			$qtySepeda = $this->db->select('qty')->from('sepeda')->where(['id' => $data['sepeda_id']])->get()->result();
			$qty = $qtySepeda[0]->qty;
			$this->db->where(['id' => $data['sepeda_id']])->update('sepeda', ['qty' => $qty-1]);
        	$this->db->trans_commit();
			return $sewaId;
		}

	}

	public function updateData($id, $data, $oldSepeda)
	{
		$this->db->trans_begin();
		$this->db->where(['id' => $id]);
		$this->db->update('sewa', $data);
		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        return 0;
		}
		else
		{
			$sewaId = $id;
			$qtySepedaOld = $this->db->select('qty')->from('sepeda')->where(['id' => $oldSepeda])->get()->result();
			$qtyOld = $qtySepedaOld[0]->qty;
			$this->db->where(['id' => $oldSepeda])->update('sepeda', ['qty' => $qtyOld+1]);

			if ($this->db->trans_status() === FALSE)
			{
		        $this->db->trans_rollback();
		        return 0;
			} else {
				$qtySepeda = $this->db->select('qty')->from('sepeda')->where(['id' => $data['sepeda_id']])->get()->result();
				$qty = $qtySepeda[0]->qty;
				$this->db->where(['id' => $data['sepeda_id']])->update('sepeda', ['qty' => $qty-1]);
	        	$this->db->trans_commit();
				return $sewaId;
			}
		}
	}

	public function kembali($id, $data)
	{
		$this->db->trans_begin();
		$this->db->where(['id' => $id]);
		$this->db->update('sewa', $data);
		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        return 0;
		}
		else
		{
			$sewaId = $id;
			
			$qtySepeda = $this->db->select('qty')->from('sepeda')->where(['id' => $data['sepeda_id']])->get()->result();
			$qty = $qtySepeda[0]->qty;
			$this->db->where(['id' => $data['sepeda_id']])->update('sepeda', ['qty' => $qty+1]);
        	$this->db->trans_commit();
			return $sewaId;
		}
	}

	public function deleteData($id)
	{
		$this->db->trans_begin();
		$sepedaId = $this->db->select('sepeda_id')->from('sewa')->where(['id' => $id])->get()->result();
		
		$this->db->delete('sewad', ['sewa_id' => $id]);
		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
	        return 0;
		}
		else
		{
			$qtySepeda = $this->db->select('qty')->from('sepeda')->where(['id' => $sepedaId])->get()->result();
			$qty = $qtySepeda[0]->qty;
			$this->db->where(['id' => $sewad->sepeda_id])->update('sepeda', ['qty' => $qty+1]);
			if($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
		        return 0;
			}
			else
			{
				$this->db->trans_commit();
				return 1;
			}
		}
	}
}