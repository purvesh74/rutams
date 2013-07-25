<?php
class viewdrappintmentcon extends CI_Controller
{
	public function index()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headdr',$data);
		$this->load->view('admin/viewdrappintmentconview',$data);
		$this->load->view('admin/footer',$data);
	
	}
	public function visitcheck()
	{
		if(isset($_POST['id']))
		{
			$id = $_POST['id'];
			$this->load->database();
			$this->load->Model('mainModel');
		
			$this->load->library('session');
			$data['base'] = $this->config->item('base_url');
			$model = $this->mainModel->visit($id);
			
		}
		else
		{
			$this->index();
		}
	}
	
	public function allapp()
	{
		$this->load->database();
		$this->load->Model('mainModel');
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headdr',$data);
		
		$da = $this->session->userdata('login');
	 	$id = $da['id'];
		$date = date('m/d/Y');
		$model = $this->mainModel->selectappointmentdr($id);
		$data['select'] = $model;
		$this->load->view('admin/viewdrappintmentconview',$data);
		$this->load->view('admin/footer',$data);
		
	}
	public function searchbydate()
	{
		if(isset($_POST['from']) and isset($_POST['to']) == "")
		{
			
		$date = $_POST['from'];
		$d = date('m/d/Y',strtotime($date));		
		$this->load->library('session');
		
		$da = $this->session->userdata('login');
	 	$id = $da['id'];
		
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/headdr',$data);
		
		
		$model = $this->mainModel->todatappointmentdr($d,$id);
		$data['select'] = $model;
		$this->load->view('admin/viewdrappintmentconview',$data);
		$this->load->view('admin/footer',$data);
		
		
		}
		
		elseif(isset($_POST['from']) and isset($_POST['to']))
		{
		
			if($_POST['from'] == "" and isset($_POST['to']))
			{
				$this->index();
			}
			else if($_POST['to'] == "" and isset($_POST['from']))
			{
		$this->load->library('session');
				
		$date = $_POST['from'];
		$d = date('m/d/Y',strtotime($date));	
		$da = $this->session->userdata('login');
	 	$id = $da['id'];
			
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/headdr',$data);
		
		$model = $this->mainModel->todatappointmentdr($d,$id);
		$data['select'] = $model;
		$this->load->view('admin/viewdrappintmentconview',$data);
		$this->load->view('admin/footer',$data);
		
		
			}
			else
			{
				$this->load->library('session');
	
			$date = $_POST['from'];
		$d = date('m/d/Y',strtotime($date));
		$date1 = $_POST['to'];
		$d1 = date('Y-m-d',strtotime($date1));
		$da = $this->session->userdata('login');
	 	$id = $da['id'];
		
		
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/headdr',$data);
		
		$model = $this->mainModel->searbytwodatedr($d,$d1,$id);
		$data['select'] = $model;
		$this->load->view('admin/viewdrappintmentconview',$data);
		$this->load->view('admin/footer',$data);	
			}
		}
		
		else
		{
			$this->index();
		}
	
	}
	public function todaydata()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
		$da = $this->session->userdata('login');
	 	$id = $da['id'];
		$date = date('m/d/Y', time());
		$this->load->database();
		$this->load->Model('mainModel');
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/headdr',$data);
		
		$model = $this->mainModel->todatappointmentdr($date,$id);
		$data['select'] = $model;
		$this->load->view('admin/viewdrappintmentconview',$data);
		$this->load->view('admin/footer',$data);
		
	}
	
}
?>