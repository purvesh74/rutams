<?php
class changepasswordpersyst extends CI_Controller
{
	
	public function index()
	{	$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headtemp',$data);
		$this->load->view('admin/changepasswordpersystview',$data);
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
			$usercheck = $this->mainModel->usercheckdataper($uname);
			
			foreach($usercheck as $r)
			{
				if($r->per_username == "")
				{
					$this->index();
				}
				else
				{
					
					if($pass == $re)
					{
						$uname = $r->per_username;
						$passchange = $this->mainModel->passchangeper($pass,$uname);
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