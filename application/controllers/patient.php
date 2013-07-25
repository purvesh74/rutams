<?php
class patient extends CI_Controller
{
	public function index()
	{
		$data['base'] = $this->config->item('base_url');
		$this->load->library('session');
		
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$model = $this->mainModel->selectdr();
			
		$data['selectdoctor'] = $model;
		
		$model = $this->mainModel->selectservicecatdata();
		$data['selectservice'] = $model;
		
		$this->load->view('headp',$data);
		$this->load->view('patientview',$data);
		$this->load->view('ftr',$data);
		
	}
	public function insertdata()
	{
		if(isset($_POST['datep']) == "" or isset($_POST['pname']) == "" or isset($_POST['dsc']) == "")
		{
			$this->index();
		}
		else
		{
			$datep = $_POST['datep'];
			$pname = $_POST['pname'];
			$dsc = $_POST['dsc'];
			$dname =$_POST['dname'];
			$stype = $_POST['stype'];
			$Contact = $_POST['Contact'];
			$this->load->library('session');
			
			$da = $this->session->userdata('login');
			$email =$da['email'];
			
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->insertappointmentpa($datep,$dsc,$pname,$dname,$stype,$email,$Contact);
			
		}
	}
	
	

}
?>