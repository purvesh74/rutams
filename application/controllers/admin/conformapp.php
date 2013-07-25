<?php
class conformapp extends CI_Controller
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
		$this->load->view('admin/conformappview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function  conform($id)
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
		$this->load->database();
		$this->load->Model('mainModel');
		
		$model1 = $this->mainModel->conformapp($id);
		$data['conform']=$model1;
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/conformappview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function pdfc()
	{
		
		$date = $_POST['date'];
		$d = date('Y-m-d',strtotime($date));
		$this->load->database();
		$this->load->Model('mainModel');	
		$model = $this->mainModel->todatappointmentvisit($d);
		
		$this->load->library('fpdf');   
		
		
		$pdf=new FPDF();
		$pdf->AddPage();
		
		$pdf->SetFont('Arial','B',10);
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Arial','B',6);
		
		$pdf->Cell(10,4," Appointment By ".$date);
		$pdf->Ln();
		
		$pdf->Cell(20,10,"No");
		
		$pdf->Cell(30,10,"Name");
		$pdf->Cell(20,10,"Date");
		$pdf->Cell(20,10,"Appointment Date");
		$pdf->Cell(40,10,"Description");
		$pdf->Cell(30,10,"Doctor Name");
		$pdf->Ln();
		$pdf->Cell(20,0,"---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");
		$pdf->Ln();
		
			foreach($model as $r)
			{
				$id = $r->id;
				$name = $r->pname;
				$d = $r->date;
				$ad = $r->app_date;
				$des = $r->description;
				$did = $r->fname;
				
				$pdf->Cell(20,5, "$id");
				$pdf->Cell(30,5, "$name");
				$pdf->Cell(20,5, "$d");
				$pdf->Cell(20,5, "$ad");
				$pdf->Cell(40,5, "$des");
				$pdf->Cell(30,5, "$did");
		 			$pdf->Ln();

			}
		
		
			$pdf->Output($date.'.pdf', 'D');
		}
	
	public function visitcheck()
	{
		if(isset($_POST['id']))
		{
			$id = $_POST['id'];
			$this->load->database();
			$this->load->Model('mainModel');
		
			$this->load->library('session');
			$data['base'] = $this->config->item('base_url');
			$model = $this->mainModel->visit($id);
			
		}
		else
		{
			$this->index();
		}
	}
	
	public function allapp()
	{
		$this->load->database();
		$this->load->Model('mainModel');
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
			$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/head',$data);
		
		$date = date('m/d/Y');
		$model = $this->mainModel->selectappointmentconform();
		$data['select'] = $model;
		$this->load->view('admin/conformappview',$data);
		$this->load->view('admin/footer',$data);
			
	}
	public function searchbydate()
	{
		if(isset($_POST['from']) and isset($_POST['to']) == "")
		{
				$date = $_POST['from'];
				$d = date('m/d/Y',strtotime($date));		
				$this->load->library('session');
				$data['base'] = $this->config->item('base_url');
				$this->load->database();
				$this->load->Model('mainModel');
				$model = $this->mainModel->showtemp();
				$data['show']=$model;
				$this->load->view('admin/head',$data);
				$model = $this->mainModel->todayconformappointment($d);
				$data['select'] = $model;
				$this->load->view('admin/conformappview',$data);
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
				$d = date('m/d/Y',strtotime($date));		
				$this->load->library('session');
				$data['base'] = $this->config->item('base_url');
				$this->load->database();
				$this->load->Model('mainModel');
				$model = $this->mainModel->showtemp();
				$data['show']=$model;
				
				$this->load->view('admin/head',$data);
				$model = $this->mainModel->todayconformappointment($d);	
				$data['select'] = $model;
				$this->load->view('admin/conformappview',$data);
				$this->load->view('admin/footer',$data);
			}
			else
			{
			$date = $_POST['from'];
		$d = date('m/d/Y',strtotime($date));
		$date1 = $_POST['to'];
		$d1 = date('m/d/Y',strtotime($date1));
		
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
	$this->load->database();
		$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$this->load->view('admin/head',$data);
	
		$model = $this->mainModel->searbytwodateconform($d,$d1);
		$data['select'] = $model;
		$this->load->view('admin/conformappview',$data);
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
		
		$this->load->view('admin/head',$data);
		
		$date = date('m/d/Y');
		$model = $this->mainModel->todayconformappointment($date);
		$data['select'] = $model;
		$this->load->view('admin/conformappview',$data);
		$this->load->view('admin/footer');
		
	}
	public function deletedata($id)
	{
		$this->load->database();
		$this->load->Model('mainModel');
			$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$model = $this->mainModel->deleteappointment($id);
		$data['delete'] = $model;
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->view('admin/head',$data);
		$model = $this->mainModel->selectappointment();
		$data['select'] = $model;
		$this->load->view('admin/conformappview',$data);
		$this->load->view('admin/footer',$data);
	}

}
?>