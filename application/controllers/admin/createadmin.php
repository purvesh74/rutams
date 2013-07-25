<?php
class createadmin extends CI_Controller
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
		$this->load->view('admin/createadminview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function insertadminpanal()
	{
		
		if(isset($_POST['uname']))
		{
			$uname = $_POST['uname'];
			$pass = md5($_POST['pass']);
			$re = md5($_POST['re']);
			$lname = $_POST['lname'];
			
			$this->load->database();
			$this->load->Model('mainModel');
			
			$usercheck = $this->mainModel->insertadmindata($uname,$pass);
			

		}
		else
		{
			$this->index();
		}
		
		
	}
}
?>