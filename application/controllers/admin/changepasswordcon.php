<?php
class Changepasswordcon extends CI_Controller
{
	public function index()
	{
		$this->load->library('session');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$data['base'] = $this->config->item('base_url');
		$this->load->view('admin/head',$data);
		$this->load->view('admin/changepasswordview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function updatepass()
	{
		
		if(isset($_POST['uname']))
		{
			$uname = $_POST['uname'];
			$pass = md5($_POST['pass']);
			$re = md5($_POST['re']);
			$lname = $_POST['lname'];
			
			$this->load->database();
			$this->load->Model('mainModel');
			
			if($lname == 1)
			{
			$usercheck = $this->mainModel->usercheckdata($uname);
			
			foreach($usercheck as $r)
			{
				if($r->email == "")
				{
					$this->index();
				}
				else
				{
					
					if($pass == $re)
					{
						$uname = $r->email;
						$passchange = $this->mainModel->passchange($pass,$uname);
					}
					else
					{
						$this->index();
					}
				}
			}
			
			}
			else if($lname == 0)
			{
			$usercheck = $this->mainModel->usercheckdatadr($uname);
			
			foreach($usercheck as $r)
			{
				if($r->email == "")
				{
					$this->index();
				}
				else
				{
					
					if($pass == $re)
					{
						$uname = $r->email;
						$passchange = $this->mainModel->passchangedr($pass,$uname);
					}
					else
					{
						$this->index();
					}
				}
			}
				
			}

		}
		else
		{
			$this->index();
		}
		
		
	}
}
?>