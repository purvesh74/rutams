<?php
class receptioncon extends CI_Controller
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
		$insertdatamodel = $this->mainModel->selectdrcatdata();
		$data['selectdrcat'] = $insertdatamodel;
		$this->load->view('admin/receptionconview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function insertdoctor()
	{
		$fname = $_POST['fname'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		
		$mobile = $_POST['mobile'];
		$contact = $_POST['contact'];
		
		$pa = $_POST['pass'];
		
		$pass = md5($pa);
		
		$this->load->database();
		$this->load->Model('mainModel');
		$insertdatamodel = $this->mainModel->insertdatareceptionmodel($pass,$pa,$fname,$address,$email,$mobile,$contact);
		
	}
	public function updatedoctor()
	{
		$fname = $_POST['fname'];
		$address = $_POST['address'];
		$email = $_POST['email'];
	
		$mobile = $_POST['mobile'];
		$contact = $_POST['contact'];
		$id = $_POST['id'];
	
		$this->load->database();
		$this->load->Model('mainModel');
		$updatedatamodel = $this->mainModel->updatedatareceptionmodel($id,$fname,$address,$email,$mobile,$contact);
		
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
		
		
		$selectdatamodel = $this->mainModel->selectdatareceptionmodel($id);
		$data['select']= $selectdatamodel;
		
		$model = $this->mainModel->selectdrcatdata();
		$data['selectdrcat'] = $model;
		$this->load->view('admin/receptionconview',$data);
		$this->load->view('admin/footer',$data);
	}
}
?>