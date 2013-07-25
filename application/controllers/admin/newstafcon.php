<?php
class newstafcon extends CI_Controller
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
		//	$model = $this->mainModel->selectstafdata();
//			
//			$data['select'] = $model;
//	
			$model = $this->mainModel->selectstafcatdata();
			$data['selectcat'] = $model;
	
			$this->load->view('admin/newstafconview',$data);
			$this->load->view('admin/footer',$data);
	
	}
	
	public function selectchangeitem()
	{
		if(isset($_POST['catname']) == "")
		{
			$this->index();
		}
		else
		{
			$this->load->library('session');
			$data['base'] = $this->config->item('base_url');
			$this->load->database();
			$this->load->Model('mainModel');	
			$catid = $_POST['catname'];
			
			$model = $this->mainModel->selectstafdataselect($catid);
			
				 
				echo   '<div class="form"><table width="100%" border="1">';
				echo '<tr>
					<td><div class="FormLable">No</div></td>
					
					<td><div class="FormLable">Category Id</div></td>
					<td><div class="FormLable">Name</div></td>
					<td><div class="FormLable">Address</div></td>
					<td><div class="FormLable">Email</div></td>
					<td><div class="FormLable">Age</div></td>
					<td><div class="FormLable">Gender</div></td>
					<td><div class="FormLable">Exprience</div></td>
					<td><div class="FormLable">Blood Group</div></td>
					<td><div class="FormLable">Contact</div></td>
					<td><div class="FormLable">Register Date</div></td>
					<td><div class="FormLable">Action</div></td>
					
					</tr>';
					if($model == "")
					{
						echo  '<tr><td colspan="12" align="center">No Found</td></tr>';
					}
					else
					{
						foreach($model as $row)
						{
						echo '<tr>
						<td><div class="FormLable">'.$row->sd_id.'</div></td>
						<td><div class="FormLable">'.$row->cat.'</div></td>
						<td><div class="FormLable">'.$row->name.'</div></td>
						<td><div class="FormLable">'.$row->adds.'</div></td>
						<td><div class="FormLable">'.$row->email.'</div></td>
						<td><div class="FormLable">'.$row->age.'</div></td>
						<td><div class="FormLable">'.$row->gender.'</div></td>
						
						<td><div class="FormLable">'.$row->exprience.'</div></td>
						<td><div class="FormLable">'.$row->bloodgroup.'</div></td>
						<td><div class="FormLable">'.$row->contact.'</div></td>
						<td><div class="FormLable">'.$row->registerdate.'</div></td>
						<td><a href="'.$data['base'].'index.php?admin/newstaf/selectdata/'.$row->sd_id.'">Edit</a> | <a href="'.$data['base'].'index.php?admin/newstafcon/deletedata/'.$row->sd_id.'">Delete</a></td>
						
						</tr>';
						
						}
					}
					echo '</table></div>';
			
			
			
			
		}
	}
	
	public function deletedata($id)
	{
		$this->load->library('session');
			$data['base'] = $this->config->item('base_url');
			$this->load->database();
			$this->load->Model('mainModel');
			$model = $this->mainModel->daletestafdata($id);
			
			$data['delete'] = $model;
	
			$model = $this->mainModel->selectstafdata();
			
			$data['select'] = $model;
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
			$this->load->view('admin/head',$data);
		
			$this->load->view('admin/newstafconview',$data);
			$this->load->view('admin/footer');
		
	}
}
?>