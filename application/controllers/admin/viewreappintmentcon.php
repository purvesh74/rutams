<?php
class viewreappintmentcon extends CI_Controller
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
		
			//$model = $this->mainModel->selectappointment();
//			
//		$data['select'] = $model;
		$this->load->view('admin/viewreappintmentconview',$data);
		$this->load->view('admin/footer',$data);
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

	
	public function pdfc()
	{
		$date = $_POST['date'];
		$d = date('m/d/Y',strtotime($date));
		$this->load->database();
		$this->load->Model('mainModel');	
		$model = $this->mainModel->todatappointment($d);
		
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
		$pdf->Cell(30,10,"Description");
		$pdf->Cell(20,10,"Doctor ID");
		$pdf->Ln();
		$pdf->Cell(20,0,"---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");
		$pdf->Ln();
		
		if($model == "")
		{
		$this->load->database();
		$this->load->Model('mainModel');
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
			$model = $this->mainModel->showtemp();
		$data['show']=$model;
			
		$data['nopdf']=  "No Data This Day. Plz Select Any Date";
				
		$this->load->view('admin/headre',$data);
		$this->load->view('admin/viewreappintmentconview',$data);
		$this->load->view('admin/footer',$data);
		
		}
		else
		{
			foreach($model as $r)
			{
				$id = $r->id;
				$name = $r->pname;
				$d = $r->date;
				$ad = $r->app_date;
				$des = $r->description;
				$did = $r->dr_id;
				
				$pdf->Cell(20,5, "$id");
				$pdf->Cell(30,5, "$name");
				$pdf->Cell(20,5, "$d");
				$pdf->Cell(20,5, "$ad");
				$pdf->Cell(30,5, "$des");
				$pdf->Cell(20,5, "$did");
		 			$pdf->Ln();

			}
		
		
			$pdf->Output($date.'.pdf', 'D');
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
		
		$this->load->view('admin/headre',$data);
		
		$date = date('m/d/Y');
		$model = $this->mainModel->selectappointment();
		$data['select'] = $model;
		$this->load->view('admin/viewreappintmentconview',$data);
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
		
		$this->load->view('admin/headre',$data);
		
		$model = $this->mainModel->todatappointment($d);
		$data['select'] = $model;
		$this->load->view('admin/viewreappintmentconview',$data);
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
		
		$this->load->view('admin/headre',$data);
		$model = $this->mainModel->todatappointment($d);
		$data['select'] = $model;
		$this->load->view('admin/viewreappintmentconview',$data);
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
		
		$this->load->view('admin/headre',$data);
	
		$model = $this->mainModel->searbytwodate($d,$d1);
		$data['select'] = $model;
		$this->load->view('admin/viewreappintmentconview',$data);
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
		
		$date = date('m/d/Y');

		$model = $this->mainModel->todatappointment($date);
		$data['select'] = $model;
		$this->load->view('admin/viewreappintmentconview',$data);
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
		$this->load->view('admin/headre',$data);
		$model = $this->mainModel->selectappointment();
		$data['select'] = $model;
		$this->load->view('admin/viewreappintmentconview',$data);
		$this->load->view('admin/footer',$data);
	}

}
?>