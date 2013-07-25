<?php
class atendance extends CI_Controller
{
	public function index()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/head',$data);
		
		$model = $this->mainModel->selectdoctor();
		$data['selectdr'] = $model;
		
		$date = date('Y-m-d');
		$model = $this->mainModel->selectad($date);
		$data['select'] = $model;
		
		$model = $this->mainModel->selectdatareception();
		$data['selectre'] = $model;
		
		$model = $this->mainModel->selectstafdata();
		$data['selectst'] = $model;
		
		
	$this->load->view('admin/atendanceview',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function selectdead()
	{
		$id = $_POST['id'];
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->selectdoctoridated($id);
		
	}
	public function selectstad()
	{
		$id = $_POST['id'];
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->selectstafidated($id);
		
	}
	public function selectread()
	{
		$id = $_POST['id'];
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->selectreceidated($id);
		
	}
	
}
?>