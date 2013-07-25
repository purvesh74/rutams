<?php
class Newastafcatcon extends CI_Controller
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
			$model = $this->mainModel->selectstafcatdata();
			
		$data['select'] = $model;
		
		$this->load->view('admin/newastafcatconview',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function deletedata($id)
	{
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->deletestafcat($id);
		$data['delete'] = $model;
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
		$model = $this->mainModel->selectstafcatdata();
		$data['select'] = $model;
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		
		$this->load->view('admin/newastafcatconview',$data);
		$this->load->view('admin/footer');
		
	}
	
}
?>