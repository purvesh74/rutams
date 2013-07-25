<?php
class changepasswordrecon extends CI_Controller
{
		public function index()
	{
		$this->load->library('session');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$data['base'] = $this->config->item('base_url');
		$this->load->view('admin/headre',$data);
		$this->load->view('admin/changepasswordreconview',$data);
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
			if($lname == 4)
			{
			$usercheck = $this->mainModel->usercheckdatare($uname);
			
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
						$passchange = $this->mainModel->passchangere($pass,$uname);
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