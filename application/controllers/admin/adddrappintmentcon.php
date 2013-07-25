<?php
class adddrappintmentcon extends CI_Controller
{
	public function index()
	{		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headdr',$data);
		
			$model = $this->mainModel->selectdr();
			
		$data['selectdoctor'] = $model;
		
		$model = $this->mainModel->selectservicecatdata();
		$data['selectservice'] = $model;
		$this->load->view('admin/adddrappintmentconview',$data);
		$this->load->view('admin/footer',$data);

	}
}
?>