<?php
class adminhomedr extends CI_Controller
{
	public function index()
	{
		
		$this->load->library('session');
	$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$data['base'] = $this->config->item('base_url');
		$this->load->view('admin/headdr',$data);
		$this->load->view('admin/adminhomedrview',$data);
		
		
		
		$this->load->view('admin/footer',$data);
	}
	
}
?>