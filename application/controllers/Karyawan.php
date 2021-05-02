<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {
 	
 	public function __construct()
    {
        parent::__construct();
		$this->title = 'Karyawan';
		$this->link = strtolower($this->title);
		$this->load->model('m_karyawan');
		if (!$this->session->userdata('user')){
            redirect('login');
        }
    }

	public function index()
	{
		$this->load->helper('url');
		$data['title'] = $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'karyawan/v_index';
		$data['dataKaryawan'] = $this->m_karyawan->getIndex();
		$this->load->view('layouts/v_layouts', $data);
	}

	public function create()
	{
		$this->load->helper('url');
		$data['title'] = 'Tambah ' . $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'karyawan/v_create';
		if ($this->input->method() == 'post') {
			$postData = $this->input->post();
			$data = [
				'nama' => $postData['nama'],
				'username' => $postData['username'],
				'password' => md5('Asdf1234'),
				'alamat' => $postData['alamat'],
				'nohp' => $postData['nohp']
			];
			$id = $this->m_karyawan->insertData($data);
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
		$data['content'] = 'karyawan/v_view';
		$data['dataKaryawan'] = $this->m_karyawan->getData($id);
		$this->load->view('layouts/v_layouts', $data);
	}

	public function update($id)
	{
		$this->load->helper('url');
		$data['title'] = 'Ubah ' . $this->title;
		$data['link'] = $this->link;
		$data['content'] = 'karyawan/v_update';
		$data['dataKaryawan'] = $this->m_karyawan->getData($id);
		if ($this->input->method() == 'post') {
			$postData = $this->input->post();
			$data = [
				'nama' => $postData['nama'],
				'alamat' => $postData['alamat'],
				'nohp' => $postData['nohp']
			];
			$id = $postData['id'];
			if($this->m_karyawan->updateData($id, $data)){
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
		if ($this->m_karyawan->deleteData($id)) {
			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>true, 'msg'=>'Berhasil menghapus data')));
		} else {
			$this->output->set_content_type("application/json")->set_output(json_encode(array('status'=>false, 'msg'=>'Gagal menghapus data')));
		}
	}
}
