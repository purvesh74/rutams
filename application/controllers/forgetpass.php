<?php
class forgetpass extends CI_Controller
{
	public function index()
	{
		$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
		
		$this->load->view('headcf',$data);
		$this->load->view('forgetpassview',$data);
		$this->load->view('ftr',$data);	
	}
	
	public function usercheck()
	{
		if(isset($_POST['username']))
		{
			$user = $_POST['username'];
			$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
			$model = $this->mainModel->usercheck($user);
			$data['select']=$model;
		
		$this->load->view('headcf',$data);
		$this->load->view('forgetpassview',$data);
		$this->load->view('ftr',$data);	

		}
		else
		{
			$this->index();
		}
	}
	public function forget()
	{
		if(isset($_POST['submit']))
		{
			$ans = $_POST['ans'];
			$q = $_POST['q'];
			$email = $_POST['email'];
			
			$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
			
			$model = $this->mainModel->usercheck($email);
			$data['select1']=$model;
			$model = $this->mainModel->usersecurity($ans,$email,$q);
			$data['check']=$model;
		
		$this->load->view('headcf',$data);
		$this->load->view('forgetpassview',$data);
		$this->load->view('ftr',$data);	

		}
		else
		{
			$this->index();
		}
	}
	public function chagepass()
	{
		if(isset($_POST['btnsubmit']))
		{
			$pass = $_POST['password'];
			$repass = $_POST['repassword'];
			$email = $_POST['email'];
			
			if($repass == $pass)
			{
				$p = md5($pass);
			
				$data['base'] = $this->config->item('base_url');
		
				$this->load->database();
				$this->load->Model('mainModel');
				$model = $this->mainModel->showtemp();
				$data['show']=$model;
			
				$model = $this->mainModel->changepass($email,$p);
				$data['changepassword']=$model;
				
				$this->load->view('headcf',$data);
				$this->load->view('forgetpassview',$data);
				$this->load->view('ftr',$data);	
		
			}
			else
			{
				$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
			
			$model = $this->mainModel->usercheck($email);
			$data['select2']=$model;
			$data['check1']= "Password not Match" ;
		
				$this->load->view('headcf',$data);
				$this->load->view('forgetpassview',$data);
				$this->load->view('ftr',$data);	
	
			}
			
		
		}
		else
		{
			$this->index();
		}
	}
	
	
}

?>