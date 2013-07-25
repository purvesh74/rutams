<?php
class  adminhomereception extends CI_Controller
{
	public function index()
	{
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headre',$data);
		
			$model = $this->mainModel->selectdr();
			
		$data['selectdoctor'] = $model;
		$model = $this->mainModel->selectservicecatdata();
		$data['selectservice'] = $model;
		
		$this->load->view('admin/adminhomereception',$data);
		$this->load->view('admin/footer',$data);
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
			
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->insertappointment($datep,$dsc,$pname,$dname,$stype);
			
		}
	}
	
	public function selectdata($id)
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
		$this->load->database();
		$this->load->Model('mainModel');
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/headre',$data);
		
		$selectdatamodel = $this->mainModel->selectdataappointmentmodel($id);
		$data['select']= $selectdatamodel;
	
		$this->load->view('admin/adminhomereception',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function updatedata()
	{
			$datep = $_POST['datep'];
			$pname = $_POST['pname'];
			$dsc = $_POST['dsc'];
			$dname =$_POST['dname'];
			$id = $_POST['id'];
			
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->updateappointment($id,$datep,$dsc,$pname,$dname);
		
	}
}
?>