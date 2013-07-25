<?php
class viewadminuser extends CI_Controller
{
	public function index()
	{
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$model = $this->mainModel->adminuserview();
		$data['select']=$model;
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewadminuserview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function deletedata($id)
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
		
			$model1 = $this->mainModel->showtemp();
			$data['show']=$model1;
	
			$model = $this->mainModel->deleteadminuser($id);
			$data['delete'] = $model;
			
		$model = $this->mainModel->adminuserview();
		$data['select']=$model;
			
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewadminuserview',$data);
		$this->load->view('admin/footer',$data);
		
			
	
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
		
		$model = $this->mainModel->selectstafcat($id);
		$data['select'] = $model;
		$this->load->view('admin/newstafcatview',$data);
		$this->load->view('admin/footer',$data);
		
	}
	
	public function updatedata()
	{
			$name = $_POST['name'];
			$id = $_POST['id'];
			
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->updatestafcat($id,$name);
		
	}
}
?>