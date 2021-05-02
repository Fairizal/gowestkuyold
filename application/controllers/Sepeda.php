<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sepeda extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->title = 'Sepeda';
		$this->link = strtolower($this->title);
		$this->load->model('m_sepeda');
		// $this->load->model('m_type');
		// $this->load->model('m_merk');
		if (!$this->session->userdata('user')){
            redirect('login');
        }
    }

	public function index()
	{
		$this->load->helper('url');
		$data['title'] = $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'sepeda/v_index';
		$data['dataSepeda'] = $this->m_sepeda->getIndex();
		$this->load->view('layouts/v_layouts', $data);
	}
	
	public function create()
	{
		$this->load->helper('url');
		$data['title'] = 'Tambah ' . $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'sepeda/v_create';
		// $data['dataType'] = $this->m_type->getIndex();
		// $data['dataMerk'] = $this->m_merk->getindex();
		if ($this->input->method() == 'post') {
			$postData = $this->input->post();
			$data = [
				'nama' => $postData['nama'],
				'qty' => $postData['qty'],
				'harga' => $postData['harga'],
			];
			$id = $this->m_sepeda->insertData($data);
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
		$data['content'] = 'sepeda/v_view';
		$data['dataSepeda'] = $this->m_sepeda->getData($id);
		// $data['dataType'] = $this->m_type->getIndex();
		// $data['dataMerk'] = $this->m_merk->getindex();
		$this->load->view('layouts/v_layouts', $data);
	}

	public function update($id)
	{
		$this->load->helper('url');
		$data['title'] = 'Ubah ' . $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'sepeda/v_update';
		$data['dataSepeda'] = $this->m_sepeda->getData($id);
		// $data['dataType'] = $this->m_type->getIndex();
		// $data['dataMerk'] = $this->m_merk->getindex();
		if ($this->input->method() == 'post') {
			$postData = $this->input->post();
			$data = [
				'nama' => $postData['nama'],
				'harga' => $postData['harga'],
			];
			$id = $postData['id'];
			if($this->m_sepeda->updateData($id, $data)){
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
		if ($this->m_sepeda->deleteData($id)) {
			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'msg'=>'Berhasil menghapus data')));
		} else {
			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>false, 'msg'=>'Gagal menghapus data')));
		}
	}
}
