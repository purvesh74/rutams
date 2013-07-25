<?php
class receptionconview extends CI_Controller
{
	public function index()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->selectdatareception();
		$data['select'] = $model;
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
				$this->load->view('admin/head',$data);

		$this->load->view('admin/receptionconviewcon',$data);
		$this->load->view('admin/footer',$data);
	}
	
	
	public function pdfc()
	{
		$this->load->database();
		$this->load->Model('mainModel');	
		$model = $this->mainModel->selectdoctor();
		
		$this->load->library('fpdf');   
		$pdf=new FPDF();
		$pdf->AddPage();
		
		$pdf->SetFont('Arial','B',10);
		
		$pdf->Ln();
		$pdf->Ln();
		
		$pdf->SetFont('Arial','B',6);
		
		$pdf->Cell(10,4," All Doctor Record ");
		$pdf->Ln();
		
		$pdf->Cell(10,10,"Category");
		$pdf->Cell(30,10,"Dr Name");
		$pdf->Cell(30,10,"Addresss");
		$pdf->Cell(20,10,"Email");
		$pdf->Cell(20,10,"Degree");
		$pdf->Cell(20,10,"Service");
		$pdf->Cell(20,10,"Join Date");
		$pdf->Cell(20,10,"Contact No");
		
		$pdf->Ln();
		$pdf->Cell(20,0,"---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");
		$pdf->Ln();

			foreach($model as $r)
			{
				
				$cat = $r->drcatname;
				$name = $r->fname;
				$add = $r->address;
				$email = $r->email;
				$degree = $r->degree;
				$cname = $r->clgname;
				$img = $r->img;
				$service = $r->checkup_for_patient;
				$date = $r->date;
				$no = $r->mobileno.','.$r->contactno;
				
				
				$pdf->Cell(15,5, "$cat");
				$pdf->Cell(30,5, "$name");
				$pdf->Cell(40,5, "$add");
				$pdf->Cell(30,5, "$email");
				$pdf->Cell(30,5, "$degree");
				$pdf->Cell(20,5, "$service");
				$pdf->Cell(20,5, "$date");
				$pdf->Cell(20,5, "$no");
					$pdf->Ln();

			}
		
		
			$pdf->Output('alldoctor.pdf', 'D');
	}
	
	public function searchbyname()
	{
		if(isset($_POST['from']))
		{
			$name =	$_POST['from'];
			$this->load->library('session');
			$data['base'] = $this->config->item('base_url');
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->searchreception($name);
			$data['select'] = $model;
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
			$this->load->view('admin/head',$data);
			$this->load->view('admin/receptionconviewcon',$data);
			$this->load->view('admin/footer',$data);
		}
		else
		{
			$this->index();
		}
	}
	
	public function deletedata($id)
	{
		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->deletedatareceptionmodel($id);
		$data['delete'] = $model;
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$model = $this->mainModel->selectdatareception();
		$data['select'] = $model;
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/receptionconviewcon',$data);
		$this->load->view('admin/footer',$data);

		
	}
	
	
}
?>
