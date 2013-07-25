<?php
class loginc extends CI_Controller
{
	public function index()
	{
		$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
		
		$this->load->view('headcf',$data);
		$this->load->view('login',$data);
		$this->load->view('ftr',$data);
	}

	public function persystinfotech()
	{
	
		$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
			$data['lgoin']= "Persyst Infotech Ptv Ltd";
			$data['lo']= "3";
			$this->load->view('headcf',$data);
			$this->load->view('login',$data);
			$this->load->view('ftr',$data);	
	}
	
	public function doctor()
	{
	
		$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
			$data['lgoin']= "Doctor Login";
			$data['lo']= "0";
			$this->load->view('headcf',$data);
			$this->load->view('login',$data);
			$this->load->view('ftr',$data);	
	}
	public function patient()
	{
		
		$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
		
			$data['lgoin']= "Patient Login";
			$data['lo']= "2";
			$data['link']= '<a href="'.$data['base'].'index.php?forgetpass" >Forget Paasword? </a>';
			
			
		$this->load->view('headcf',$data);
		$this->load->view('login',$data);
		$this->load->view('ftr',$data);
	}
	public function reception()
	{
		
		$data['base'] = $this->config->item('base_url');
		
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
		$data['lo']= "4";
			$data['lgoin']= "Reception Login";
		$this->load->view('headcf',$data);
		$this->load->view('login',$data);
		$this->load->view('ftr',$data);
	}
	
}
?>