<?php
class Newpatient extends CI_Controller
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
		$this->load->view('admin/newpatientview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function insertpationt()
	{
		$fname = $_POST['fname'];
		$add = $_POST['add'];
		$age = $_POST['age'];
		$des = $_POST['description'];
		$mobile = $_POST['mobile'];
		$weight = $_POST['weight'];
		
		$this->load->database();
		$this->load->Model('mainModel');
		$insertdatamodel = $this->mainModel->insertdatapetientmodel($fname,$add,$age,$des,$mobile,$weight);
		
	}
	public function updatepationt()
	{
		$fname = $_POST['fname'];
		$add = $_POST['add'];
		$age = $_POST['age'];
		$des = $_POST['description'];
		$mobile = $_POST['mobile'];
		$weight = $_POST['weight'];
		$id =$_POST['id'];
		$this->load->database();
		$this->load->Model('mainModel');
		$upadatedatamodel = $this->mainModel->updatedatapetientmodel($id,$fname,$add,$age,$des,$mobile,$weight);
	
	}
	public function selectdata($id)
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
		$this->load->database();
		$this->load->Model('mainModel');
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
			$selectdatamodel = $this->mainModel->selectdatapatientmodel($id);
		$data['select']= $selectdatamodel;
		
		$this->load->view('admin/newpatientview',$data);
		$this->load->view('admin/footer');
	
	}

}
?>