<?php
class visitercon extends CI_Controller
{
	public function index()
	{
				
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;

		$model = $this->mainModel->visiters();
		$data['visiters']=$model;
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/visiter',$data);
		$this->load->view('admin/footer',$data);

	}
}
?>