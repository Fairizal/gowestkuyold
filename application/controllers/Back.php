<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Back extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
		$this->title = 'Back';
		$this->link = strtolower($this->title);
		$this->load->model('m_sewa');
		$this->load->model('m_sewad');
		$this->load->model('m_back');
		$this->load->model('m_backd');
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
		$data['content'] = 'back/v_index';
		$data['dataBack'] = $this->m_back->getIndex();
		$this->load->view('layouts/v_layouts', $data);
	}

	public function create()
	{
		$this->load->helper('url');
		$data['title'] = 'Tambah ' . $this->title;
		$data['link'] = $this->link;
		$data['dataSepeda'] = $this->m_sepeda->getIndex();
		$data['dataSewa'] = $this->m_sewa->getIndexNotBack();
		$data['content'] = 'back/v_create';
		if ($this->input->method() == 'post') {
			$postData = $this->input->post();
			// die(var_dump($postData));
			$data = [
				'sewa_id' => $postData['sewa_id'],
				'trxno' => $postData['trxno'],
				'tgl_kembali' => $postData['tgl_kembali'],
				'backdays' => $postData['backdays'],
				'total_denda' => $postData['total_denda'],
			];
			$dataDetail = $postData['detail'];
			$id = $this->m_back->insertData($data, $dataDetail);
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
		$data['dataSewa'] = $this->m_sewa->getIndex();
		$data['dataBack'] = $this->m_back->getData($id);
		$data['dataBackd'] = $this->m_backd->getIndex($id);
		$data['content'] = 'back/v_view';
		// if ($this->input->method() == 'post') {
		// 	$postData = $this->input->post();
		// 	$data = [
		// 		'nama' => $postData['nama'],
		// 		'username' => $postData['username'],
		// 		'password' => md5('Asdf1234'),
		// 		'alamat' => $postData['alamat'],
		// 		'nohp' => $postData['nohp']
		// 	];
		// 	$id = $this->m_karyawan->insertData($data);
		// 	if($id){
		// 		$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'msg'=>'Berhasil menyimpan data', 'id' => $id)));

		// 	} else {
		// 		$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>false, 'msg'=>'Gagal menyimpan data')));
		// 	}
		// } else {
			$this->load->view('layouts/v_layouts', $data);
		// }
	}

	public function update($id)
	{
		$this->load->helper('url');
		$data['title'] = 'Ubah ' . $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'back/v_update';
		$data['dataSewa'] = $this->m_sewa->getIndexNotBack();
		$data['dataBack'] = $this->m_back->getData($id);
		$data['dataBackd'] = $this->m_backd->getIndex($id);
		if ($this->input->method() == 'post') {
			$postData = $this->input->post();
			$id = $id;
			$data = [
				'sewa_id' => $postData['sewa_id'],
				'trxno' => $postData['trxno'],
				'tgl_kembali' => $postData['tgl_kembali'],
				'backdays' => $postData['backdays'],
				'total_denda' => $postData['total_denda'],
			];
			$dataDetail = $postData['detail'];
			$id = $this->m_back->updateData($id, $data, $dataDetail);
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
		if ($this->m_back->deleteData($id)) {
			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'msg'=>'Berhasil menghapus data')));
		} else {
			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>false, 'msg'=>'Gagal menghapus data')));
		}
	}

	public function getSewad($id)
	{
		$data = $this->m_sewad->getIndex($id);
		return $this->output->set_content_type("application/json")->set_output(json_encode($data));
	}
}
