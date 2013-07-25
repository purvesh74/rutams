<?php
class newservicetypecon extends CI_Controller
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
		$model = $this->mainModel->selectservicecatdata();
			
		$data['select'] = $model;
		
		$this->load->view('admin/newservicetypeconview',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function deletedata($id)
	{
		$this->load->database();
		$this->load->Model('mainModel');
		$model1 = $this->mainModel->deleteservicecat($id);
		
		$data['delete'] = $model1;
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
		$model2 = $this->mainModel->showtemp();
		$data['show']=$model2;
		
		$this->load->view('admin/head',$data);
		
		$model = $this->mainModel->selectservicecatdata();
	
		if($model == "")
		{
		
				$data['select'] = "0";
	
		}
		else
		{
					$data['select'] = $model;
	
		}
	
		
		$this->load->view('admin/newservicetypeconview',$data);
		$this->load->view('admin/footer');
		
	}

}
?>