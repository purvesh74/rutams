<?php
class patientcons extends CI_Controller
{
	public function index()
	{
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$model = $this->mainModel-> selectpetient();
		$data['select']=$model;
		
		$this->load->view('headcf',$data);
		$this->load->view('patientdetails',$data);
		$this->load->view('ftr',$data);
	
	}

}
?>