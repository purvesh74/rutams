<?php
class Profiledr extends CI_Controller
{
	public function index()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		
		$this->load->database();
		$this->load->Model('mainModel');
		$da = $this->session->userdata('login');
		$id = $da['id'];
		$model = $this->mainModel->selectdatadoctormodel($id);
		$data['select'] = $model;
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/headdr',$data);
		
		$this->load->view('admin/profiledrview',$data);
		$this->load->view('admin/footer',$data);
	}
	public function do_upload()
	{
		if(isset($_POST['btnuploadimg']))
		{
			$config['upload_path'] = './upload/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$this->load->library('upload', $config);
			
			if (!$this->upload->do_upload("name"))
			{
				$error = array('error' => $this->upload->display_errors());
				
				$this->index();
			}
			else
			{
			$this->load->library('session');	
			$da =$this->session->userdata('login');
			$id = $da['id'];
			
				$data = array('upload_data' => $this->upload->data());
				$file = $data['upload_data']['file_name']; 
	
		$data['base'] = $this->config->item('base_url');
		
		$this->load->database();
		$this->load->Model('mainModel');
		$model1 = $this->mainModel->updateprofileimg($id,$file);
		$data['update'] = $model1;
		
		$model = $this->mainModel->selectdatadoctormodel($id);
		$data['select'] = $model;
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/headdr',$data);
		
		$this->load->view('admin/profiledrview',$data);
		$this->load->view('admin/footer',$data);
					
			}
		}
		else
		{
							$this->index();
		}
	}
	public function editdata()
	{
		if(isset($_POST['btnupload']))
		{
			
			$name = $_POST['name'];
			$add = $_POST['add'];
			$bdate = $_POST['bdate'];
			$degree = $_POST['degree'];
			$cfg = $_POST['cfp'];
			$mno = $_POST['mno'];
			$cno = $_POST['cno'];
				$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
				$da = $this->session->userdata('login');
		$id = $da['id'];

		$this->load->database();
		$this->load->Model('mainModel');
		$model = $this->mainModel->updatedrlogindata($id,$name,$add,$bdate,$cfg,$cno,$degree,$mno);
		$data['update'] = $model;
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$model = $this->mainModel->selectdatadoctormodel($id);
		$data['select'] = $model;
		
		$this->load->view('admin/headdr',$data);
		
		$this->load->view('admin/profiledrview',$data);
		$this->load->view('admin/footer',$data);
	
		}
		else
		{
			$this->index();
		}
	}
}
?>