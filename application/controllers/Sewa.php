<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sewa extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
		$this->title = 'Sewa';
		$this->link = strtolower($this->title);
		$this->load->model('m_sewa');
		// $this->load->model('m_sewad');
		$this->load->model('m_sepeda');
		if (!$this->session->userdata('user')){
            redirect('login');
        }
    }

	public function index()
	{
		$this->load->helper('url');
		$data['title'] = $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'sewa/v_index';
		$data['dataSewa'] = $this->m_sewa->getIndex();
		$this->load->view('layouts/v_layouts', $data);
	}

	public function create()
	{
		$this->load->helper('url');
		$data['title'] = 'Tambah ' . $this->title;
		$data['link'] = $this->link;
		$data['dataSepeda'] = $this->m_sepeda->getIndex();
		$data['content'] = 'sewa/v_create';
		if ($this->input->method() == 'post') {
			$postData = $this->input->post();
			// die(var_dump($postData));
			$data = [
				'trxno' => $postData['trxno'],
				'tgl_sewa' => $postData['tgl_sewa'],
				'duedays' => $postData['duedays'],
				'pelanggan' => $postData['pelanggan'],
				'nohp' => $postData['nohp'],
				'alamat' => $postData['alamat'],
				'sepeda_id' => $postData['sepeda_id'],
				'total' => $postData['total'],
				'tgl_kembali' => null,
				'denda' => 0,
				'isback' => 0,
			];
			// $dataDetail = $postData['detail'];
			$id = $this->m_sewa->insertData($data);
			if($id){
				$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'msg'=>'Berhasil menyimpan data', 'id' => $id)));

			} else {
				$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>false, 'msg'=>'Gagal menyimpan data')));
			}
		} else {
			$this->load->view('layouts/v_layouts', $data);
		}
	}

	public function view($id)
	{
		$this->load->helper('url');
		$data['title'] = 'Detail ' . $this->title;
		$data['link'] = $this->link;
		$data['dataSewa'] = $this->m_sewa->getData($id);
		$data['dataSepeda'] = $this->m_sepeda->getIndex();
		$data['content'] = 'sewa/v_view';

		$this->load->view('layouts/v_layouts', $data);
	}

	public function update($id)
	{
		$this->load->helper('url');
		$data['title'] = 'Ubah ' . $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'sewa/v_update';
		$data['dataSepeda'] = $this->m_sepeda->getIndex();
		$data['dataSewa'] = $this->m_sewa->getData($id);
		// $data['dataSewad'] = $this->m_sewad->getIndex($id);
		if ($this->input->method() == 'post') {
			$postData = $this->input->post();
			$id = $id;
			$data = [
				'trxno' => $postData['trxno'],
				'tgl_sewa' => $postData['tgl_sewa'],
				'duedays' => $postData['duedays'],
				'pelanggan' => $postData['pelanggan'],
				'nohp' => $postData['nohp'],
				'alamat' => $postData['alamat'],
				'sepeda_id' => $postData['sepeda_id'],
				'total' => $postData['total'],
				'tgl_kembali' => null,
				'denda' => 0,
				'isback' => 0,
			];
			$id = $this->m_sewa->updateData($id, $data, $postData['sepeda_id_old']);
			if($id){
				$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'msg'=>'Berhasil menyimpan data', 'id' => $id)));

			} else {
				$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>false, 'msg'=>'Gagal menyimpan data')));
			}
		} else {
			$this->load->view('layouts/v_layouts', $data);
		}
	}

	public function kembali($id)
	{
		$this->load->helper('url');
		$data['title'] = 'Pengembalian ' . $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'sewa/v_kembali';
		$data['dataSepeda'] = $this->m_sepeda->getIndex();
		$data['dataSewa'] = $this->m_sewa->getData($id);
		// $data['dataSewad'] = $this->m_sewad->getIndex($id);
		if ($this->input->method() == 'post') {
			$postData = $this->input->post();
			$id = $id;
			$data = [
				'trxno' => $postData['trxno'],
				'tgl_sewa' => $postData['tgl_sewa'],
				'duedays' => $postData['duedays'],
				'pelanggan' => $postData['pelanggan'],
				'nohp' => $postData['nohp'],
				'alamat' => $postData['alamat'],
				'sepeda_id' => $postData['sepeda_id'],
				'total' => $postData['total'],
				'tgl_kembali' => $postData['tgl_kembali'],
				'denda' => $postData['denda'],
				'isback' => 1,
			];
			$id = $this->m_sewa->kembali($id, $data);
			if($id){
				$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'msg'=>'Berhasil menyimpan data', 'id' => $id)));

			} else {
				$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>false, 'msg'=>'Gagal menyimpan data')));
			}
		} else {
			$this->load->view('layouts/v_layouts', $data);
		}
	}

	public function delete($id)
	{
		if ($this->m_sewa->deleteData($id)) {
			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'msg'=>'Berhasil menghapus data')));
		} else {
			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>false, 'msg'=>'Gagal menghapus data')));
		}
	}
}
