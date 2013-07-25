<?php
class viewappintmentpacon extends CI_Controller
{
	public function index()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('headp',$data);
		$this->load->view('viewappintmentpa',$data);
		$this->load->view('ftr',$data);
	
	}
	
		public function allapp()
	{
		$this->load->database();
		$this->load->Model('mainModel');
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('headp',$data);
		
		$da = $this->session->userdata('login');
	 	$id = $da['email'];
		$date = date('Y-m-d');
		$model = $this->mainModel->selectappointmentpa($id);
		$data['select'] = $model;
		$this->load->view('viewappintmentpa',$data);
		$this->load->view('ftr',$data);
		
	}
	public function searchbydate()
	{
		if(isset($_POST['from']) and isset($_POST['to']) == "")
		{
			
		$date = $_POST['from'];
		$d = date('Y-m-d',strtotime($date));		
		$this->load->library('session');
		
		$da = $this->session->userdata('login');
	 	$id = $da['email'];
		
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('headp',$data);
		
		
		$model = $this->mainModel->todatappointmentpa($d,$id);
		$data['select'] = $model;
		$this->load->view('viewappintmentpa',$data);
		$this->load->view('ftr',$data);
		
		
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
		$d = date('Y-m-d',strtotime($date));	
		$da = $this->session->userdata('login');
	 	$id = $da['email'];
			
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('headp',$data);
		
		$model = $this->mainModel->todatappointmentpa($d,$id);
		$data['select'] = $model;
		$this->load->view('viewappintmentpa',$data);
		$this->load->view('ftr',$data);
		
		
			}
			else
			{
				$this->load->library('session');
	
			$date = $_POST['from'];
		$d = date('Y-m-d',strtotime($date));
		$date1 = $_POST['to'];
		$d1 = date('Y-m-d',strtotime($date1));
		$da = $this->session->userdata('login');
	 	$id = $da['email'];
		
		
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('headp',$data);
		
		$model = $this->mainModel->searbytwodatepa($d,$d1,$id);
		$data['select'] = $model;
		$this->load->view('viewappintmentpa',$data);
		$this->load->view('ftr',$data);	
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
	 	$id = $da['email'];
		$date = date('Y-m-d', time());
		$this->load->database();
		$this->load->Model('mainModel');
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('headp',$data);
		
		$model = $this->mainModel->todatappointmentpa($date,$id);
		$data['select'] = $model;
		$this->load->view('viewappintmentpa',$data);
		$this->load->view('ftr',$data);
		
	}

}
?>