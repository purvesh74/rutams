<?php

class Adminhome extends CI_Controller
{
	public function index()
	{
		$this->load->library('session');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$data['base'] = $this->config->item('base_url');
		$this->load->view('admin/head',$data);
		$this->load->view('admin/adminhomeview',$data);
		$this->load->view('admin/footer',$data);
		
	}
	
	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('admin/adminindexcon');
	}
}

?>