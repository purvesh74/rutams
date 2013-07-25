<?php
class Newappointment extends CI_Controller
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
		
		$model = $this->mainModel->selectdr();
		$data['selectdoctor'] = $model;
		
		$model = $this->mainModel->selectservicecatdata();
		$data['selectservice'] = $model;
		
		$this->load->view('admin/newappointmentview',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function autosearc()
	{
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
		$this->load->database();
		$this->load->Model('mainModel');	
		
					  
	$term = $_POST['term'];

	$data = array();
    
	$rows = $this->mainModel->sw_search($term);
            foreach( $rows as $row )
            {
                $data[] = array(
                    'label' => $row->pname.', '. $row->app_contactno,
                    'value' => $row->pname);   // here i am taking name as value so it will display name in text field, you can change it as per your choice.
            }
        echo json_encode($data);
        flush();
		
		
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
			$Contact =$_POST['Contact'];
			
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->insertappointment($datep,$dsc,$pname,$dname,$stype,$Contact);
			
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
		$this->load->view('admin/head',$data);
		
		$selectdatamodel = $this->mainModel->selectdataappointmentmodel($id);
		$data['select']= $selectdatamodel;
	
		$this->load->view('admin/newappointmentview',$data);
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