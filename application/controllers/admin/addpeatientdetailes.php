<?php

class addpeatientdetailes extends CI_Controller
{
		public function index()
			{
				$this->load->library('session');
				$data['base'] = $this->config->item('base_url');
				$this->load->database();
				$this->load->Model('mainModel');	
				
				$model = $this->mainModel->showtemp();
				$data['show']=$model;
				
				$model = $this->mainModel->showtablet();
				$data['tablet']=$model;
				
				$this->load->view('admin/head',$data);
				$this->load->view('admin/addpeatientdetailesview',$data);
				$this->load->view('admin/footer',$data);
			}
			
	function unique_username() {
		
            $u = $_POST['id'];
			
			$this->load->database();
			$this->load->Model('mainModel');	
				
			$model = $this->mainModel->petientidcheck($u);
		
		
			
			
			if($model == 1)
			{
				       echo json_encode("It is available!");
			}
			else if($model == 0)
			{
					echo json_encode("It is not available!");
			}
			
			
			
			//$user = array("jhon","neo","margo","hacker","user123");
           
    }
	public function insertpationt()
	{
		
		if(isset($_POST['pno']) == "")
		{
			
			$this->index();

		}
		else
		{
				$pno = $_POST['pno'];
				$tab = $_POST['tablet'];
				$dos = $_POST['dos'];
				$timep = $_POST['timep'];
				$cname = $_POST['cname'];
				$pcon = $_POST['pcon'];
				$price = $_POST['prices'];				
			
				$this->load->library('session');
				$data['base'] = $this->config->item('base_url');
				$this->load->database();
				$this->load->Model('mainModel');	
				
				$model = $this->mainModel->showtemp();
				$data['show']=$model;
		
				$model1 = $this->mainModel->insertpatientdetailes($pno,$tab,$dos,$timep,$cname,$pcon,$price);
		}
	}
}
?>