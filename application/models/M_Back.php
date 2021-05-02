<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_Back extends CI_Model
{
	public function getIndex()
	{
		$this->db->select('*');
		$this->db->from('back');
		$query = $this->db->get()->result();
		return $query;
	}

	public function getData($id)
	{
		$this->db->select('*');
		$this->db->from('back');
		$this->db->where(['id' => $id]);
		$query = $this->db->get()->result();
		return $query;
	}

	public function insertData($data, $dataDetail)
	{
		$this->db->trans_begin();
		$this->db->insert('back', $data);
		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        return 0;
		}
		else
		{
			$backId = $this->db->insert_id();
			$idx = 1;
			foreach ($dataDetail as $detail) {
				// die(var_dump($detail));
				$saveDetail = [
					'idx' => $idx,
					'back_id' => $backId,
					'sepeda_id' => $detail['sepeda_id'],
					'subdenda' => $detail['subdenda']
				];
				$this->db->insert('backd', $saveDetail);
				$qtySepeda = $this->db->select('qty')->from('sepeda')->where(['id' => $detail['sepeda_id']])->get()->result();
				$qty = $qtySepeda[0]->qty;
				$this->db->where(['id' => $detail['sepeda_id']])->update('sepeda', ['qty' => $qty+1]);
			}

			if ($this->db->trans_status() === FALSE)
			{
		        $this->db->trans_rollback();
		        return 0;
			}

			$this->db->where(['id' => $data['sewa_id']]);
			$this->db->update('sewa', ['isback' => true]);

        	$this->db->trans_commit();
			return $backId;
		}

	}

	public function updateData($id, $data, $dataDetail)
	{
		$this->db->trans_begin();

		$this->db->select('sewa_id');
		$this->db->where(['id' => $id]);
		$this->db->from('back');
		$dataOld = $this->db->get()->result();
		$this->db->where(['id' => $dataOld[0]->sewa_id]);
		$this->db->update('sewa', ['isback' => false]);
		if ($this->db->trans_status() === FALSE)
		{
	        $this->db->trans_rollback();
	        return 0;
		}
		else {
			$this->db->where(['id' => $id]);
			$this->db->update('back', $data);
		// die(var_dump($id));
			if ($this->db->trans_status() === FALSE)
			{
		        $this->db->trans_rollback();
		        return 0;
			}
			else
			{
				$backId = $id;
				$dataBackdOld = $this->db->select('*')->from('backd')->where(['back_id' => $backId])->get()->result();
				foreach ($dataBackdOld as $backd) {
					$qtySepeda = $this->db->select('qty')->from('sepeda')->where(['id' => $backd->sepeda_id])->get()->result();
					$qty = $qtySepeda[0]->qty;
					$this->db->where(['id' => $backd->sepeda_id])->update('sepeda', ['qty' => $qty-1]);
				}
				$this->db->delete('backd', ['back_id' => $backId]);
				$idx = 1;
				foreach ($dataDetail as $detail) {
					// die(var_dump($detail));
					$saveDetail = [
						'idx' => $idx,
						'back_id' => $backId,
						'sepeda_id' => $detail['sepeda_id'],
						'subdenda' => $detail['subdenda']
					];
					$this->db->insert('backd', $saveDetail);
					$qtySepeda = $this->db->select('qty')->from('sepeda')->where(['id' => $detail['sepeda_id']])->get()->result();
					// die(var_dump($qtySepeda));
					$qty = $qtySepeda[0]->qty;
					$this->db->where(['id' => $detail['sepeda_id']])->update('sepeda', ['qty' => $qty+1]);
					$idx++;
				}

				if ($this->db->trans_status() === FALSE)
				{
			        $this->db->trans_rollback();
			        return 0;
				}
				else
				{
					$this->db->where(['id' => $data['sewa_id']]);
					$this->db->update('sewa', ['isback' => true]);
				}


			}

		}
    	$this->db->trans_commit();
		return $id;


	}

	public function deleteData($id)
	{
		$this->db->trans_begin();

		$this->db->select('sewa_id');
		$this->db->where(['id' => $id]);
		$this->db->from('back');
		$dataBack = $this->db->get()->result();

		// die(var_dump($dataBack[0]->sewa_id));
		$dataBackdOld = $this->db->select('*')->from('backd')->where(['back_id' => $id])->get()->result();
		foreach ($dataBackdOld as $backd) {
			$qtySepeda = $this->db->select('qty')->from('sepeda')->where(['id' => $backd->sepeda_id])->get()->result();
			$qty = $qtySepeda[0]->qty;
			$this->db->where(['id' => $backd->sepeda_id])->update('sepeda', ['qty' => $qty-1]);
		}
		$this->db->delete('backd', ['back_id' => $id]);
		if($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
	        return 0;
		}
		else
		{
			$this->db->where(['id' => $dataBack[0]->sewa_id]);
			$this->db->update('sewa', ['isback' => false]);
			if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
			    return 0;
			}
			else
			{
				$this->db->delete('back', ['id' => $id]);
				if ($this->db->trans_status() === FALSE)
				{
					$this->db->trans_rollback();
				    return 0;
				}
			}
		}
		$this->db->trans_commit();
		return 1;
	}
}