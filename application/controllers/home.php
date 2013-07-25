<?php
class home extends CI_Controller
{
	public function index()
	{
		$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
		
		$this->load->view('headcf',$data);
		$this->load->view('homeview',$data);
		$this->load->view('ftr',$data);
		
	}
	
	
	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->load->helper('url');
		redirect('home');
	}
}
?>