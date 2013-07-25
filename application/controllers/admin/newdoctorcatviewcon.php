<?php
class newdoctorcatviewcon extends CI_Controller
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
			$model = $this->mainModel->selectdrcatdata();
			$data['select'] = $model;
		$this->load->view('admin/newdoctorcatviewconview',$data);
		$this->load->view('admin/footer',$data);

	}
	
	public function deletedata($id)
	{
				$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
		$this->load->database();
			$this->load->Model('mainModel');
					$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);

			$model = $this->mainModel->deletedrcat($id);
			$data['delete'] = $model;
						$model = $this->mainModel->selectdrcatdata();
			$data['select'] = $model;

			$this->load->view('admin/newdoctorcatviewconview',$data);
			$this->load->view('admin/footer');
		
	}
}
?>