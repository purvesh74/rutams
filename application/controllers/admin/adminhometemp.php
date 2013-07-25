<?php
class adminhometemp extends CI_Controller
{
	public function index()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headtemp',$data);
		$this->load->view('admin/adminhometempview',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function insertsitetitle()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$name = $_POST['name'];
		$id = $_POST['id'];
		
		$this->load->database();
		$this->load->Model('mainModel');	
		$model = $this->mainModel->insertsitetitle($name,$id);
	}
	
	public function headercolor()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$name = $_POST['name'];
		
		$id = $_POST['id'];
		$this->load->database();
		$this->load->Model('mainModel');	
		$model = $this->mainModel->headercolor($name,$id);
		
	}
	
	public function footercolor()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$name = $_POST['name'];
		
		$id = $_POST['id'];
		
		$this->load->database();
		$this->load->Model('mainModel');	
		$model = $this->mainModel->footercolor($name,$id);
		
	}
	
	public function do_upload()
	{
		if(isset($_POST['btnuploadimg']))
		{
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload("name"))
			{
				$error = array('error' => $this->upload->display_errors());
				
				$this->index();
			}
			else
			{
			$this->load->library('session');	
				$id = $_POST['id'];
				$data = array('upload_data' => $this->upload->data());
				$file = $data['upload_data']['file_name']; 
	
		$data['base'] = $this->config->item('base_url');
		$this->load->view('admin/headtemp',$data);
		
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->showtemp();
		$model1 = $this->mainModel->updatelogo($id,$file);
		$data['update'] = $model1;
		
		$data['show']=$model;
		$this->load->view('admin/adminhometempview',$data);
		$this->load->view('admin/footer',$data);
					
			}
		}
		else
		{
							$this->index();
		}
	}
	public function contact()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$name = $_POST['name'];
		
		$id = $_POST['id'];
		
		$this->load->database();
		$this->load->Model('mainModel');	
		$model = $this->mainModel->contact($name,$id);
		
	}
	
	public function fcontant()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$name = $_POST['name'];
		
		$id = $_POST['id'];
		$this->load->database();
		$this->load->Model('mainModel');	
		$model = $this->mainModel->fcontant($name,$id);
		
	}

}

?>