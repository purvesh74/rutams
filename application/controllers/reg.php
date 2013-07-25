<?php
class reg extends CI_Controller
{
	public function index()
	{
		$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
		
		$this->load->view('headcf',$data);
		$this->load->view('regview',$data);
		$this->load->view('ftr',$data);
	}
	public function regdata()
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		$contact = $_POST['contact'];
		$qu = $_POST['qu'];
		$ans = $_POST['ans'];

		$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->regdatain($username,$password,$email,$contact,$qu,$ans);
		

	}

}
?>