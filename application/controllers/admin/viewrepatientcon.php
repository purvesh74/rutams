<?php
class viewrepatientcon extends CI_Controller
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
	//	$model = $this->mainModel->selectpetient();
//		$data['select'] = $model;
	$this->load->view('admin/viewrepatientconview',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function allapp()
	{
		$this->load->database();
		$this->load->Model('mainModel');
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
			$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headre',$data);
		
		$date = date('Y-m-d');
		$model = $this->mainModel->selectpetient();
		$data['select'] = $model;
		$this->load->view('admin/viewrepatientconview',$data);
		$this->load->view('admin/footer',$data);
		
	}
	public function searchbydate()
	{
		if(isset($_POST['from']) and isset($_POST['to']) == "")
		{
			
		$date = $_POST['from'];
		$d = date('Y-m-d',strtotime($date));		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
		$this->load->database();
		$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headre',$data);
		
		$model = $this->mainModel->todatpateint($d);
		$data['select'] = $model;
		$this->load->view('admin/viewrepatientconview',$data);
		$this->load->view('admin/footer',$data);
		
		
		}
		
		elseif(isset($_POST['from']) and isset($_POST['to']))
		{
		
			if($_POST['from'] == "" and isset($_POST['to']))
			{
				$this->index();
			}
			else if($_POST['to'] == "" and isset($_POST['from']))
			{
				
		$date = $_POST['from'];
		$d = date('Y-m-d',strtotime($date));		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headre',$data);
		$model = $this->mainModel->todatpateint($d);
		$data['select'] = $model;
		$this->load->view('admin/viewrepatientconview',$data);
		$this->load->view('admin/footer',$data);
		
		
			}
			else
			{
			$date = $_POST['from'];
		$d = date('Y-m-d',strtotime($date));
		$date1 = $_POST['to'];
		$d1 = date('Y-m-d',strtotime($date1));
		
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
	$this->load->database();
		$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headre',$data);
	
		$model = $this->mainModel->searbytwodatep($d,$d1);
		$data['select'] = $model;
		$this->load->view('admin/viewrepatientconview',$data);
		$this->load->view('admin/footer',$data);	
			}
		}
		
		else
		{
			$this->index();
		}
	
	}
	public function todaydata()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headre',$data);
		
		$date = date('Y-m-d');

		$model = $this->mainModel->todatpateint($date);
		$data['select'] = $model;
		$this->load->view('admin/viewrepatientconview',$data);
		$this->load->view('admin/footer',$data);
		
	}
	
	public function deletedata($id)
	{
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->deletepatient($id);
		$data['delete'] = $model;
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$model = $this->mainModel->selectpetient();
		$data['select'] = $model;
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/headre',$data);
		
		$this->load->view('admin/viewrepatientconview',$data);
		$this->load->view('admin/footer',$data);

	}
}
?>