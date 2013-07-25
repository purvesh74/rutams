<?php
class newservicetype extends CI_Controller
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
		$this->load->view('admin/newservicetypeview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function insertdata()
	{
		if(isset($_POST['name']))
		{
			$name = $_POST['name'];
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->insertservicecat($name);
		}
		else
		{
			$this->index();
		}
	}
	
	public function selectdata($id)
	{
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
			$this->load->database();
			$this->load->Model('mainModel');
			
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		
		$model = $this->mainModel->selectservicecatdatas($id);
		$data['select'] = $model;
		$this->load->view('admin/newservicetypeview',$data);
		$this->load->view('admin/footer',$data);
		
	}
	
	public function updatedata()
	{
			$name = $_POST['name'];
			$id = $_POST['id'];
			
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->updateservicecat($id,$name);
		
	}
}
?>