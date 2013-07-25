<?php
class newstaf extends CI_Controller
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
		$model = $this->mainModel->selectstafcatdata();
		$data['selectcat'] = $model;
		
		$this->load->view('admin/newstafview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function insertdata()
	{
		$name = $_POST['name'];
		$bgroup = $_POST['bgroup'];
		$add =mysql_escape_string($_POST['add']);
		$catname = $_POST['catname'];
		$cno = $_POST['cno'];
		$email = $_POST['email'];
		$exprience = $_POST['exprience'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->insertstaf($catname,$name,$add,$email,$age,$gender,$exprience,$bgroup,$cno);
		
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
		
		$model = $this->mainModel->selectstafdataid($id);
		$data['select'] = $model;
		$model = $this->mainModel->selectstafcatdata();
		$data['selectcat'] = $model;
		
		$this->load->view('admin/newstafview',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function updatedata()
	{
		$name = $_POST['name'];
		$bgroup = $_POST['bgroup'];
		$add =mysql_escape_string($_POST['add']);
		$catname = $_POST['catname'];
		$cno = $_POST['cno'];
		$email = $_POST['email'];
		$exprience = $_POST['exprience'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$id = $_POST['id'];
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->updatestafdata($id,$catname,$name,$add,$email,$age,$gender,$exprience,$bgroup,$cno);
	}
}
?>