<?php

class newreceptionist extends CI_Controller
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
		$this->load->view('admin/newreceptionistview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function insertreception()
	{
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$pass = $_POST['pass'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$contact = $_POST['contact'];
		
		$this->load->database();
		$this->load->Model('mainModel');
		$insertdatamodel = $this->mainModel->insertdatareceptionmodel($fname,$lname,$pass,$email,$mobile,$contact);
		
	}
}

?>