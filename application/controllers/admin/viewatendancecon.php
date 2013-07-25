<?php
class viewatendancecon extends CI_Controller
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
		$this->load->view('admin/viewatendance',$data);
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
		
		$model = $this->mainModel->selectdoctor();
		$data['selectdr'] = $model;
		
		
		$model = $this->mainModel->selectdatareception();
		$data['selectre'] = $model;
		
		$model = $this->mainModel->selectstafdata();
		$data['selectst'] = $model;
		
		$model1 = $this->mainModel->selectdateviaated($d);
		$data['select'] = $model1;
		
				
				$this->load->view('admin/head',$data);
				$this->load->view('admin/viewatendance',$data);
				$this->load->view('admin/footer',$data);
		
		}
		elseif(isset($_POST['from']) and isset($_POST['to']))
		{
			if($_POST['from'] == "" and isset($_POST['to']))
			{
				$date = $_POST['to'];
				$d = date('Y-m-d',strtotime($date));		
			
				$this->load->library('session');
				$data['base'] = $this->config->item('base_url');
				$this->load->database();
				$this->load->Model('mainModel');
					$model = $this->mainModel->showtemp();
				$data['show']=$model;
		
		$model = $this->mainModel->selectdoctor();
		$data['selectdr'] = $model;
		
		
		$model = $this->mainModel->selectdatareception();
		$data['selectre'] = $model;
		
		$model = $this->mainModel->selectstafdata();
		$data['selectst'] = $model;
		
		$model1 = $this->mainModel->selectdateviaated($d);
		$data['select'] = $model1;
		
				
				$this->load->view('admin/head',$data);
				$this->load->view('admin/viewatendance',$data);
				$this->load->view('admin/footer',$data);
				
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
		
		$model = $this->mainModel->selectdoctor();
		$data['selectdr'] = $model;
		
		
		$model = $this->mainModel->selectdatareception();
		$data['selectre'] = $model;
		
		$model = $this->mainModel->selectstafdata();
		$data['selectst'] = $model;
		
		$model1 = $this->mainModel->selectdateviaated($d);
		$data['select'] = $model1;
		
				
				$this->load->view('admin/head',$data);
				$this->load->view('admin/viewatendance',$data);
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
		
		$modeldr = $this->mainModel->selectdoctor();
		$data['selectdr'] = $modeldr;
		
		
		$modelre = $this->mainModel->selectdatareception();
		$data['selectre'] = $modelre;
		
		$modelst = $this->mainModel->selectstafdata();
		$data['selectst'] = $modelst;
				
				$model1 = $this->mainModel->searbytwodateadtall($d,$d1);
				
				if($model1 == "")
				{
				 
				}
				else
				{
		$data['select3'] ="";		
				foreach($model1 as $r)
				{
					$da = $r->a_datesonly;
					$model2 = $this->mainModel->selectdateviaated($da);
		
		$data['select3']  .= '<center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b>';				
		$data['select3']  .= '<table border="1" width="100%">';
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<th width="33%">Doctor Atendance</th>';
		$data['select3']  .= '<th width="33%">Reception Atendance </th>';
		$data['select3']  .= '<th width="33%">Staf Atendance</th>';
		
		$data['select3']  .= '</tr>';
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<td valign="top">';
		if(isset($modeldr))
		{
			$data['select3']  .= '<table width="100%" border="1">';
			foreach($modeldr as $r)	
			{
				$data['select3']  .= '<tr><td>'.$r->fname.'</td><td align="right">';
				
				if(isset($model2))
				{
					
					if($model2 == "")
					{
							$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectdr('.$r->d_id.');" value="'.$r->d_id.'" >';
					
					}
					else
					{
					$i = "";
					foreach($model2 as $r1)
					{
						if($r1->a_did == $r->d_id)
						{
							$i = 1;
						}
						else
						{
						}
					}		
					
					if($i == 1)
					{
						$data['select3']  .= '<input type="checkbox"  disabled="disabled" checked="checked" >';
					}
					else
					{
						$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectdr('.$r->d_id.');" value="'.$r->d_id.'" >';
					}
					}
				}
				
				$data['select3']  .= ' </td></tr> </tr>';
			}
			$data['select3']  .= '</table>';
		}
		$data['select3']  .= '</td>';
		$data['select3']  .= '<td valign="top">';
		if(isset($modelre))
		{
			$data['select3']  .= '<table  width="100%" border="1">';
			foreach($modelre as $r)
			{
				$data['select3']  .= '<tr><td>'.$r->fname.'</td><td>';
				
				
				if(isset($model2))
				{
					
					if($model2 == "")
					{
							$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectre('.$r->r_id.');" value="'.$r->r_id.'" >';
					
					}
					else
					{
					$i = "";
					foreach($model2 as $r1)
					{
						if($r1->a_rid == $r->r_id)
						{
							$i = 1;
							
						}
					}		
					
					if($i == 1)
					{
						$data['select3']  .= '<input type="checkbox" disabled="disabled" checked="checked" >';
					}
					else
					{
						$data['select3']  .= '<input type="checkbox" onclick="selectre('.$r->r_id.');" disabled="disabled" value="'.$r->r_id.'" >';
					}
					}
				}
				
				
				$data['select3']  .= '</td></tr> </tr>';
			}
			$data['select3']  .= '</table>';
	
		}
		$data['select3']  .= '</td>';
		$data['select3']  .= '<td valign="top">';
		if(isset($modelst))
		{
			$data['select3']  .= '<table width="100%" border="1">';
			foreach($modelst as $r)
			{
				$data['select3']  .= '<tr><td>'.$r->name.'</td><td>';
				if(isset($model2))
				{
					if($model2 == "")
					{
							$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectst('.$r->sd_id.');" value="'.$r->sd_id.'" >';

					}
					else
					{
					$i = "";
					foreach($model2 as $r1)
					{
						if($r1->a_sid == $r->sd_id)
						{
							$i = 1;
						}
					}		
					
					if($i == 1)
					{
						$data['select3']  .= '<input type="checkbox"  checked="checked" disabled="disabled">';
					}
					else
					{
						$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectst('.$r->sd_id.');" value="'.$r->sd_id.'" >';
					}
					}
				}
				
				$data['select3']  .= '</td> </tr>';
			}
			$data['select3']  .= '</table>';
	
		}
		$data['select3']  .= '</td>';
		
		
		$data['select3']  .= '</tr>';
		
		
		$data['select3']  .= '</table>';
	
				
				//	$data['model2'] = $model2;
					
				}
				
				}
				$this->load->view('admin/head',$data);
				$this->load->view('admin/viewatendance',$data);
				$this->load->view('admin/footer',$data);	
			}
		}
		
		else
		{
			$this->index();
		}	
	}


	public function searchbymonthyearday()
	{
		
		if(isset($_POST['btngo']))
		{
			if($_POST['day'] and $_POST['month'] and $_POST['year'])
			{
			
			$days = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyearday/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=01;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$modeldr = $this->mainModel->selectdoctor();
		$model1 = $this->mainModel->onlydrssss($year,$month,$days);
	
		$modelmonth = $this->mainModel->selectdateviaatedmothsd($year,$month,$days);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Doctor Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
			
			
				$data['select3']  .= '<td valign="top">';
		
		if($modelmonth == "")
		{
			$data['select3']  .= "No Data Found ";		
		}
		else
		{
			
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= $m->mon;
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		
		$data['select3']  .= $mom;
		$modeld = $this->mainModel->selectdateviaatedatess($yy,$mom,$days);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td>';				
				$data['select3']  .= '</tr>';
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modeldr))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modeldr as $r)	
					{
						$data['select3']  .= '<tr><td>'.$r->fname.'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectdr('.$r->d_id.');" value="'.$r->d_id.'" >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_did == $r->d_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= '<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendancereces/'.$r->d_id.'" >View</a></td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else if($_POST['day'] == "" and $_POST['month'] and $_POST['year'])
			{
				
		$month = $_POST['month'];
		$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyearday/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=01;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
			$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>  ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$modeldr = $this->mainModel->selectdoctor();
		$model1 = $this->mainModel->onlydrsss($year,$month);
	
		$modelmonth = $this->mainModel->selectdateviaatedmoths($year,$month);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Doctor Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
				
				
				
				
	if($modelmonth == "")
	{
	}
	else
	{
	foreach($modelmonth as $m)
	{
		$data['select3']  .= $m->mon;
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$data['select3']  .= $mom;
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		
		if($modeld == "")
			{
				$this->index();
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td>';				
				$data['select3']  .= '</tr>';
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modeldr))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modeldr as $r)	
					{
						$data['select3']  .= '<tr><td>'.$r->fname.'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectdr('.$r->d_id.');" value="'.$r->d_id.'" >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_did == $r->d_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= '<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendancereces/'.$r->d_id.'" >View</a></td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);


			
			
			}
			else if($_POST['day'] == "" and $_POST['month'] == "" and $_POST['year'])
			{
				
				if(isset($_POST['year']))
				{
					$year = $_POST['year'];
				}
				else
				{
					$year = "";
				}
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyearday/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$modeldr = $this->mainModel->selectdoctor();
		$model1 = $this->mainModel->onlydrss($year);
	
		$modelmonth = $this->mainModel->selectdateviaatedmoth($year	);
		
		
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Doctor Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td>';				
				$data['select3']  .= '</tr>';
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modeldr))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modeldr as $r)	
					{
						$data['select3']  .= '<tr><td>'.$r->fname.'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectdr('.$r->d_id.');" value="'.$r->d_id.'" >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_did == $r->d_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= '<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendancereces/'.$r->d_id.'" >View</a></td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

				
					
			}
			else if($_POST['day'] == ""  and $_POST['month'] == "" and $_POST['year'] == "")
			{
				$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyearday/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else
			{
					$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyearday/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	
			}
		}
		else
		{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyearday/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		}
		
	}
	public function doctorattendance()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		
		$modeldr = $this->mainModel->selectdoctor();
		//$data['selectdr'] = $modeldr;
		
		
		$model1 = $this->mainModel->onlydrs();
		
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyearday/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=01;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
		
		foreach($model1 as $r)
		{
					$da = $r->a_datesonly;
					$model2 = $this->mainModel->selectdateviaated($da);
		
		$data['select3']  .= '<table border="1" width="100%">';
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b>';				
		
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<th width="33%">Doctor Attendance</th>';
		
		$data['select3']  .= '</tr>';
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<td valign="top">';
if(isset($modeldr))
		{
			$data['select3']  .= '<table width="100%" border="1">';
			foreach($modeldr as $r)	
			{
				$data['select3']  .= '<tr><td>'.$r->fname.'</td><td align="right">';
				
				if(isset($model2))
				{
					
					if($model2 == "")
					{
							$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectdr('.$r->d_id.');" value="'.$r->d_id.'" >';
					
					}
					else
					{
					$i = "";
					foreach($model2 as $r1)
					{
						if($r1->a_did == $r->d_id)
						{
							$i = 1;
						}
						else
						{
						}
					}		
					
					if($i == 1)
					{
						$data['select3']  .= '<div style="color:green"> Present</div>';
					}
					else
					{
						$data['select3']  .= '<div style="color:red"> Absent</div>';
					}
					}
				}
				
				$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendancereces/'.$r->d_id.'" >View</a></td> </tr>';
			}
			$data['select3']  .= '</table>';
		}
		$data['select3']  .= '</td>';
			
			
			
		}
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function dates($id)
	{
		
		if(isset($_POST['btngo']))
		{
			if($_POST['day'] and $_POST['month'] and $_POST['year'])
			{
			
			$days = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/dates/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
			
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$modeldr = $this->mainModel->selectdrattendid($id);
		$model1 = $this->mainModel->onlydrssss($year,$month,$days);
	
		$modelmonth = $this->mainModel->selectdateviaatedmothsd($year,$month,$days);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Doctor Attendance</th>';
				$data['select3']  .= '</tr>';
				
						$data['select3']  .= '<tr><th width="33%">';
				
				foreach($modeldr as $r)
				{
				$data['select3']  .=	$r->fname;
				}	
				$data['select3']  .= '</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
			
			
				$data['select3']  .= '<td valign="top">';
		
		if($modelmonth == "")
		{
			$data['select3']  .= "No Data Found ";		
		}
		else
		{
			
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedatess($yy,$mom,$days);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modeldr))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modeldr as $r)	
					{
						$data['select3']  .= '<tr><td>'.date('d-m-Y' ,strtotime($da)).'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectdr('.$r->d_id.');" value="'.$r->d_id.'" >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_did == $r->d_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= '<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td></tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else if($_POST['day'] == "" and $_POST['month'] and $_POST['year'])
			{
				
		$month = $_POST['month'];
		$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/dates/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
	$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
				$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
			$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>  ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$modeldr = $this->mainModel->selectdrattendid($id);
		$model1 = $this->mainModel->onlydrsss($year,$month);
	
		$modelmonth = $this->mainModel->selectdateviaatedmoths($year,$month);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Doctor Attendance</th>';
				$data['select3']  .= '</tr>';
						$data['select3']  .= '<tr><th width="33%">';
				
				foreach($modeldr as $r)
				{
				$data['select3']  .=	$r->fname;
				}	
				$data['select3']  .= '</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modeldr))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modeldr as $r)	
					{
						$data['select3']  .= '<tr><td width="50%">'.date('d-m-Y' ,strtotime($da)).'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled" >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_did == $r->d_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= $r1->a_date.'<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);


			
			
			}
			else if($_POST['day'] == "" and $_POST['month'] == "" and $_POST['year'])
			{
				
				if(isset($_POST['year']))
				{
					$year = $_POST['year'];
				}
				else
				{
					$year = "";
				}
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/dates/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
		
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$modeldr =  $this->mainModel->selectdrattendid($id);
		$model1 = $this->mainModel->onlydrss($year);
	
		$modelmonth = $this->mainModel->selectdateviaatedmoth($year	);
		
		
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Doctor Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr><th width="33%">';
				
				foreach($modeldr as $r)
				{
				$data['select3']  .=	$r->fname;
				}	
				$data['select3']  .= '</th>';
				$data['select3']  .= '</tr>';
				
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		
		$modeld1 = $this->mainModel->selectdateviaatedatecountdr($yy,$mom,$id);
		if($modeld1 =="")
		{
				$data['select3']  .= " This Month Present Day is <b>0</b>";
			
		}
		else
		{
		foreach($modeld1 as $r)
		{
			  $data['select3']  .= " This Month Present Day is <b>" .$r->c ."</b>";
			
		}
		}
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modeldr))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modeldr as $r)	
					{
						$data['select3']  .= '<tr><td width="50%">'. date('d-m-Y' ,strtotime($da)) .'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled" onclick="selectdr('.$r->d_id.');" value="'.$r->d_id.'" >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_did == $r->d_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= $r1->a_date.'<div style="color:green">Present</div>';
									
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td></tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

				
					
			}
			else if($_POST['day'] == ""  and $_POST['month'] == "" and $_POST['year'] == "")
			{
				$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/dates/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else
			{
					$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/dates/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	
			}
		}
		else
		{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/dates/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		}
		
	}
		

	
	
	public function particulaerattendancereces($id)
	{
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		
		$model1 = $this->mainModel->onlydrs();
		
		$modelre = $this->mainModel->selectdrattendid($id);
		$name = "";
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Doctor Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/dates/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=01;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
		
		$data['select3']  .= '<table border="1" width="100%">';
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<th colspan="2" width="33%">Doctor Attendance</th>';
		
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<th colspan="2" width="33%">'; 
			foreach($modelre as $r)	
			{
				$name = $r->fname;
			}
			
		$data['select3']  .= $name;	
		$data['select3']  .= '</th>';
		
		$data['select3']  .= '</tr>';
		
				
		foreach($model1 as $r)
		{
					$da = $r->a_datesonly;
					$model2 = $this->mainModel->selectdateviaated($da);
		
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<td><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td>';				
		
		$data['select3']  .= '<td valign="top">';
		
if(isset($modelre))
		{
			$data['select3']  .= '<table width="100%" border="1">';
			
			foreach($modelre as $r)	
			{
				 	$data['select3']  .= '<tr><td align="right">';
				
				if(isset($model2))
				{
					
					if($model2 == "")
					{
							$data['select3']  .= '<input type="checkbox" disabled="disabled" >';
					}
					else
					{
					$i = "";
					$t = "";
					$d = "";
					foreach($model2 as $r1)
					{
						if($r1->a_did == $r->d_id)
						{
							$i = 1;
							$d = $r1->a_date;
						}
						
					}		
					if($i == 1)
					{
						$data['select3']  .= $d.'<div style="color:green"> Present</div>';
					}
					else
					{
						$data['select3']  .= '<div style="color:red"> Absent</div>';
					}
					}
				}
				
				$data['select3']  .= ' </td> </tr>';
			}
			$data['select3']  .= '</table>';
		}
		$data['select3']  .= '</td>';
			
			
		$data['select3']  .= '</tr>';
			
		}
		
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<td colspan="2">';
		
	//
//		$model2 = $this->mainModel->selectdays($da);
//		
//		
//		foreach($model2 as $r)
//		{
//			$data['select3']  .=  $r->day ;
//		}
		
		$data['select3']  .= '</td>';
		
		$data['select3']  .= '</tr>';
		
		$data['select3']  .= '</table>';
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	}
	
	
	
	
	
	
	
	public function searchbymonthyeardayre()
	{
		
		if(isset($_POST['btngo']))
		{
			if($_POST['day'] and $_POST['month'] and $_POST['year'])
			{
			
			$days = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayre/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=01;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		//$modeldr = $this->mainModel->selectdoctor();
		//$model1 = $this->mainModel->onlydrssss($year,$month,$days);
	
		$model1= $this->mainModel->onlyresss($year,$month,$days);
		
		$modelre = $this->mainModel->selectdatareception();
		
		$modelmonth = $this->mainModel->selectdateviaatedmothsd($year,$month,$days);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Reception Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
			
			
				$data['select3']  .= '<td valign="top">';
		
		if($modelmonth == "")
		{
			$data['select3']  .= "No Data Found ";		
		}
		else
		{
			
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= $m->mon;
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		
		$data['select3']  .= $mom;
		$modeld = $this->mainModel->selectdateviaatedatess($yy,$mom,$days);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td>';				
				$data['select3']  .= '</tr>';
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelre))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelre as $r)	
					{
						$data['select3']  .= '<tr><td>'.$r->fname.'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled" >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_rid == $r->r_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= '<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendancerece/'.$r->r_id.'" >View</a></td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else if($_POST['day'] == "" and $_POST['month'] and $_POST['year'])
			{
				
		$month = $_POST['month'];
		$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayre/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=01;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
			$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>  ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		//$modeldr = $this->mainModel->selectdoctor();
		//$model1 = $this->mainModel->onlydrsss($year,$month);
	
		$model1= $this->mainModel->onlyress($year,$month);
		
		$modelre = $this->mainModel->selectdatareception();
		
	
		$modelmonth = $this->mainModel->selectdateviaatedmoths($year,$month);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Reception Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td>';				
				$data['select3']  .= '</tr>';
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelre))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelre as $r)	
					{
						$data['select3']  .= '<tr><td>'.$r->fname.'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled"  >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_rid == $r->r_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= '<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendancerece/'.$r->r_id.'" >View</a></td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);


			
			
			}
			else if($_POST['day'] == "" and $_POST['month'] == "" and $_POST['year'])
			{
				
				if(isset($_POST['year']))
				{
					$year = $_POST['year'];
				}
				else
				{
					$year = "";
				}
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayre/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		//$modeldr = $this->mainModel->selectdoctor();
		//$model1 = $this->mainModel->onlydrss($year);
	
		$model1= $this->mainModel->onlyres($year);
		
		$modelre = $this->mainModel->selectdatareception();
		
		$modelmonth = $this->mainModel->selectdateviaatedmoth($year);
		
		
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Reception Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td>';				
				$data['select3']  .= '</tr>';
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelre))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelre as $r)	
					{
						$data['select3']  .= '<tr><td>'.$r->fname.'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled"  >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_rid == $r->r_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= '<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendancerece/'.$r->r_id.'" >View</a></td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

				
					
			}
			else if($_POST['day'] == ""  and $_POST['month'] == "" and $_POST['year'] == "")
			{
				$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayre/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else
			{
					$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Receptions Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayre/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	
			}
		}
		else
		{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayre/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		}
		
	}
	
	public function reattendance()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		
		
		$model1= $this->mainModel->onlyre();
		
		$modelre = $this->mainModel->selectdatareception();
		
		
		
		$data['select3'] = "";	
	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayre/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
		
		foreach($model1 as $r)
		{
					$da = $r->a_datesonly;
					$model2 = $this->mainModel->selectdateviaated($da);
		
		$data['select3']  .= '<table border="1" width="100%">';
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b>';				
		
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<th width="33%">Reception Attendance</th>';
		
		$data['select3']  .= '</tr>';
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<td valign="top">';
if(isset($modelre))
		{
			$data['select3']  .= '<table width="100%" border="1">';
			foreach($modelre as $r)	
			{
				$data['select3']  .= '<tr><td>'.$r->fname.'</td><td align="right">';
				
				if(isset($model2))
				{
					
					if($model2 == "")
					{
							$data['select3']  .= '<input type="checkbox" disabled="disabled" >';
					
					}
					else
					{
					$i = "";
					foreach($model2 as $r1)
					{
						if($r1->a_rid == $r->r_id)
						{
							$i = 1;
						}
						else
						{
						}
					}		
					
					if($i == 1)
					{
						$data['select3']  .= '<div style="color:green"> Present</div>';
					}
					else
					{
						$data['select3']  .= '<div style="color:red"> Absent</div>';
					}
					}
				}
				
				$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendancerece/'.$r->r_id.'" >View</a></td></tr> </tr>';
			}
			$data['select3']  .= '</table>';
		}
		$data['select3']  .= '</td>';
			
		}
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	}
	
	
	public function searchbymonthyeardayress()
	{
		
		if(isset($_POST['btngo']))
		{
			if($_POST['day'] and $_POST['month'] and $_POST['year'])
			{
			
			$days = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayress/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=01;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
	
		//$model1= $this->mainModel->onlyresss($year,$month,$days);
		//$modelre = $this->mainModel->selectdatareception();
		$model1 = $this->mainModel->onlystafsss($year,$month,$days);
		$modelst = $this->mainModel->selectstafdata();
			
		$modelmonth = $this->mainModel->selectdateviaatedmothsd($year,$month,$days);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Staff Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
			
			
				$data['select3']  .= '<td valign="top">';
		
		if($modelmonth == "")
		{
			$data['select3']  .= "No Data Found ";		
		}
		else
		{
			
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= $m->mon;
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		
		$data['select3']  .= $mom;
		$modeld = $this->mainModel->selectdateviaatedatess($yy,$mom,$days);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td>';				
				$data['select3']  .= '</tr>';
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelst))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelst as $r)	
					{
						$data['select3']  .= '<tr><td>'.$r->name.'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled" >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_sid == $r->sd_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= '<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendance/'.$r->sd_id.'" >View</a></td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else if($_POST['day'] == "" and $_POST['month'] and $_POST['year'])
			{
				
		$month = $_POST['month'];
		$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayress/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=01;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
			$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>  ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		//$modeldr = $this->mainModel->selectdoctor();
		//$model1 = $this->mainModel->onlydrsss($year,$month);
	
		//$model1= $this->mainModel->onlyress($year,$month);
		
		//$modelre = $this->mainModel->selectdatareception();
		
		$model1 = $this->mainModel->onlystafss($year,$month);
		$modelst = $this->mainModel->selectstafdata();
	
	
		$modelmonth = $this->mainModel->selectdateviaatedmoths($year,$month);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Staff Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td>';				
				$data['select3']  .= '</tr>';
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelst))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelst as $r)	
					{
						$data['select3']  .= '<tr><td>'.$r->name.'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled"  >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_sid == $r->sd_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= '<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendance/'.$r->sd_id.'" >View</a></td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);


			
			
			}
			else if($_POST['day'] == "" and $_POST['month'] == "" and $_POST['year'])
			{
				
				if(isset($_POST['year']))
				{
					$year = $_POST['year'];
				}
				else
				{
					$year = "";
				}
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayress/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$model1 = $this->mainModel->onlystafs($year);
		$modelst = $this->mainModel->selectstafdata();
	
		
		$modelmonth = $this->mainModel->selectdateviaatedmoth($year);
		
		
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Staff Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td>';				
				$data['select3']  .= '</tr>';
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelst))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelst as $r)	
					{
						$data['select3']  .= '<tr><td>'.$r->name.'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled"  >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_sid == $r->sd_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= '<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendance/'.$r->sd_id.'" >View</a></td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

				
					
			}
			else if($_POST['day'] == ""  and $_POST['month'] == "" and $_POST['year'] == "")
			{
				$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayress/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else
			{
					$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayress/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	
			}
		}
		else
		{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayress/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		}
		
	}
	
	
	public function stafattendance()
	{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		
		$model1 = $this->mainModel->onlystaf();
		$modelst = $this->mainModel->selectstafdata();
		
		$data['select3'] = "";	
	$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/searchbymonthyeardayress/" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
		
		foreach($model1 as $r)
		{
					$da = $r->a_datesonly;
					$model2 = $this->mainModel->selectdateviaated($da);
		
		$data['select3']  .= '<table border="1" width="100%">';
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b>';				
		
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<th width="33%">Staff Attendance</th>';
		
		$data['select3']  .= '</tr>';
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<td valign="top">';
if(isset($modelst))
		{
			$data['select3']  .= '<table width="100%" border="1">';
			foreach($modelst as $r)	
			{
				$data['select3']  .= '<tr><td>'.$r->name.'</td><td align="right">';
				
				if(isset($model2))
				{
					
					if($model2 == "")
					{
							$data['select3']  .= '<input type="checkbox" disabled="disabled" >';
					
					}
					else
					{
					$i = "";
					foreach($model2 as $r1)
					{
						if($r1->a_sid == $r->sd_id)
						{
							$i = 1;
						}
					}		
					
					if($i == 1)
					{
						$data['select3']  .= '<div style="color:green"> Present</div>';
					}
					else
					{
						$data['select3']  .= '<div style="color:red"> Absent</div>';
					}
					}
				}
				
				$data['select3']  .= ' </td><td><a href="'.$data['base'].'index.php?admin/viewatendancecon/particulaerattendance/'.$r->sd_id.'" >View</a></td>  </tr>';
			}
			$data['select3']  .= '</table>';
		}
		$data['select3']  .= '</td>';
			
			
			
		}
		
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function daterece($id)
	{
		if(isset($_POST['btngo']))
		{
			if($_POST['day'] and $_POST['month'] and $_POST['year'])
			{
			
			$days = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/daterece/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
	
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		//$modeldr = $this->mainModel->selectdoctor();
		//$model1 = $this->mainModel->onlydrssss($year,$month,$days);
	
		$model1= $this->mainModel->onlyresss($year,$month,$days);
		
		$modelre = $this->mainModel->selectrecedataselectid($id);
		
		$modelmonth = $this->mainModel->selectdateviaatedmothsd($year,$month,$days);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Reception Attendance</th>';
				$data['select3']  .= '</tr>';
						$data['select3']  .= '<tr><th width="33%">';
				foreach($modelre as $r)
				{
					$data['select3']  .= $r->fname;
				}
				$data['select3']  .= '</th></tr>';
		
				
				$data['select3']  .= '<tr>';
			
			
				$data['select3']  .= '<td valign="top">';
		
		if($modelmonth == "")
		{
			$data['select3']  .= "No Data Found ";		
		}
		else
		{
			
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		
		$modeld = $this->mainModel->selectdateviaatedatess($yy,$mom,$days);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelre))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelre as $r)	
					{
						$data['select3']  .= '<tr><td width="50%">'.date('d-m-Y' ,strtotime($da)).'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled" >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_rid == $r->r_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= $r1->a_date.'<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td></tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else if($_POST['day'] == "" and $_POST['month'] and $_POST['year'])
			{
				
		$month = $_POST['month'];
		$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/daterece/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
	
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
			$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>  ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		//$modeldr = $this->mainModel->selectdoctor();
		//$model1 = $this->mainModel->onlydrsss($year,$month);
	
		$model1= $this->mainModel->onlyress($year,$month);
		
		$modelre = $this->mainModel->selectrecedataselectid($id);
		
	
		$modelmonth = $this->mainModel->selectdateviaatedmoths($year,$month);
		
		
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Reception Attendance</th>';
				$data['select3']  .= '</tr>';
						$data['select3']  .= '<tr><th width="33%">';
				foreach($modelre as $r)
				{
					$data['select3']  .= $r->fname;
				}
				$data['select3']  .= '</th></tr>';
		
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelre))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelre as $r)	
					{
						$data['select3']  .= '<tr><td width="50%">'.date('d-m-Y' ,strtotime($da)).'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled"  >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_rid == $r->r_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= $r1->a_date.'<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);


			
			
			}
			else if($_POST['day'] == "" and $_POST['month'] == "" and $_POST['year'])
			{
				
				if(isset($_POST['year']))
				{
					$year = $_POST['year'];
				}
				else
				{
					$year = "";
				}
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/daterece/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
	
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';

		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		//$modeldr = $this->mainModel->selectdoctor();
		//$model1 = $this->mainModel->onlydrss($year);
	
		$model1= $this->mainModel->onlyres($year);
		
		$modelre = $this->mainModel->selectrecedataselectid($id);
		
		$modelmonth = $this->mainModel->selectdateviaatedmoth($year);
		
		
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Reception Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr><th width="33%">';
				foreach($modelre as $r)
				{
					$data['select3']  .= $r->fname;
				}
				$data['select3']  .= '</th></tr>';
				
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
			$modeld1 = $this->mainModel->selectdateviaatedatecountre($yy,$mom,$id);
			
			if($modeld1 == "")
			{
				$data['select3']  .= " This Month Present Day is <b>0</b>";
			}
			else
			{
		foreach($modeld1 as $r)
		{
			$data['select3']  .= " This Month Present Day is <b>" .$r->c ."</b>";
		}
			}
	
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				
		
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelre))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelre as $r)	
					{
						$data['select3']  .= '<tr><td width=50%>'.date('d-m-Y' ,strtotime($da)).'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled"  >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_rid == $r->r_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= $r1->a_date.'<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

				
					
			}
			else if($_POST['day'] == ""  and $_POST['month'] == "" and $_POST['year'] == "")
			{
				$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/daterece/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
	
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else
			{
					$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Receptions Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/daterece/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
	
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	
			}
		}
		else
		{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');

		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/daterece/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
	
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		}
	}
	
	public function particulaerattendancerece($id)
	{
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		
		$model1 = $this->mainModel->onlyre();
		
		$modelre = $this->mainModel->selectrecedataselectid($id);
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Reception Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/daterece/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
		
		$data['select3']  .= '<table border="1" width="100%">';
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<th width="33%">Reception Attendance</th>';
		
		$data['select3']  .= '</tr>';
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<th width="33%">';
			$name = "";
			foreach($modelre as $r)	
			{
				$name = $r->fname;
			}
		
		
		$data['select3']  .= $name.'</th></tr>';
		
		foreach($model1 as $r)
		{
					$da = $r->a_datesonly;
					$model2 = $this->mainModel->selectdateviaated($da);
		
	
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<td valign="top" width="50%">';
  if(isset($modelre))
		{
			$data['select3']  .= '<table width="100%" border="1">';
			foreach($modelre as $r)	
			{
				$data['select3']  .= '<tr><td width="50%"><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td><td align="right">';
				
				if(isset($model2))
				{
					
					if($model2 == "")
					{
							$data['select3']  .= '<input type="checkbox" disabled="disabled" >';
					
					}
					else
					{
					$i = "";
					foreach($model2 as $r1)
					{
						if($r1->a_rid == $r->r_id)
						{
							$i = 1;
						}
					}		
					
					if($i == 1)
					{
						$data['select3']  .= $r1->a_date.'<div style="color:green"> Present</div>';
					}
					else
					{
						$data['select3']  .= '<div style="color:red"> Absent</div>';
					}
					}
				}
				
				$data['select3']  .= ' </td> </tr> </tr>';
			}
			$data['select3']  .= '</table>';
		}
		$data['select3']  .= '</td>';
	 }
		
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	}
	
	public function datestaf($id)
	{
		
		
		if(isset($_POST['btngo']))
		{
			if($_POST['day'] and $_POST['month'] and $_POST['year'])
			{
			
			$days = $_POST['day'];
			$month = $_POST['month'];
			$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/datestaf/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=01;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
	
		$model1 = $this->mainModel->onlystafsss($year,$month,$days);
		$modelst = $this->mainModel->selectstafdataselectid($id);
			
		$modelmonth = $this->mainModel->selectdateviaatedmothsd($year,$month,$days);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Staff Attendance</th>';
				$data['select3']  .= '</tr>';
					$data['select3']  .= '<tr><th width="33%">';
				foreach($modelst as $r)
				{
					$data['select3']  .= $r->name;
				}
				$data['select3']  .= '</th></tr>';
				
				$data['select3']  .= '<tr>';
			
			
				$data['select3']  .= '<td valign="top">';
		
		if($modelmonth == "")
		{
			$data['select3']  .= "No Data Found ";		
		}
		else
		{
			
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		
		$modeld = $this->mainModel->selectdateviaatedatess($yy,$mom,$days);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelst))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelst as $r)	
					{
						$data['select3']  .= '<tr><td width="50%">'. date('d-m-Y' ,strtotime($da)).'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled" >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_sid == $r->sd_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= $r1->a_date.'<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td> </tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else if($_POST['day'] == "" and $_POST['month'] and $_POST['year'])
			{
				
		$month = $_POST['month'];
		$year = $_POST['year'];
			
			
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/datestaf/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=01;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
			$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
	
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select>  ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$model1 = $this->mainModel->onlystafss($year,$month);
		$modelst = $this->mainModel->selectstafdataselectid($id);
	
	
		$modelmonth = $this->mainModel->selectdateviaatedmoths($year,$month);
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Staff Attendance</th>';
				$data['select3']  .= '</tr>';
					$data['select3']  .= '<tr><th width="33%">';
				foreach($modelst as $r)
				{
					$data['select3']  .= $r->name;
				}
				$data['select3']  .= '</th></tr>';
				
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				
				$model2 = $this->mainModel->selectdateviaated($da);
				
				if(isset($modelst))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelst as $r)	
					{
						$data['select3']  .= '<tr><td width="50%">'. date('d-m-Y' ,strtotime($da)).'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled"  >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_sid == $r->sd_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{
									$data['select3']  .= $r1->a_date.'<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td></tr>';
					}
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);


			
			
			}
			else if($_POST['day'] == "" and $_POST['month'] == "" and $_POST['year'])
			{
				
				if(isset($_POST['year']))
				{
					$year = $_POST['year'];
				}
				else
				{
					$year = "";
				}
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/datestaf/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		$model1 = $this->mainModel->onlystafs($year);
		$modelst = $this->mainModel->selectstafdataselectid($id);
	
		
		$modelmonth = $this->mainModel->selectdateviaatedmoth($year);
		
		
				
				$data['select3']  .= '<table border="1" width="100%">';
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<th width="33%">Staff Attendance</th>';
				$data['select3']  .= '</tr>';
				$data['select3']  .= '<tr><th width="33%">';
				foreach($modelst as $r)
				{
					$data['select3']  .= $r->name;
				}
				$data['select3']  .= '</th></tr>';
				
				$data['select3']  .= '<tr>';
				$data['select3']  .= '<td valign="top">';
					
					
	foreach($modelmonth as $m)
	{
		$data['select3']  .= '<center><b>'.$m->mon.'</b></center>';
		$yy = $m->y;
		$mom = '0'.$m->m;
		
		$modeld = $this->mainModel->selectdateviaatedate($yy,$mom);
		
		$modeld1 = $this->mainModel->selectdateviaatedatecount($yy,$mom,$id);
		
		if($modeld1 == "")
		{
				$data['select3']  .= " This Month Present Day is <b>0</b>";
		}
		else
		{
		foreach($modeld1 as $r)
		{
			$data['select3']  .= " This Month Present Day is <b>" .$r->c ."</b>";
		}
		}
		
		if($modeld == "")
			{
			}
			else
			{
				foreach($modeld as $r)
				{
			
				$da = $r->a_datesonly;
				
				$model2 = $this->mainModel->selectdateviaated($da);
				if(isset($modelst))
				{
					$data['select3']  .= '<table width="100%" border="1">';
					foreach($modelst as $r)	
					{
						$data['select3']  .= '<tr><td width="50%">'.date('d-m-Y' ,strtotime($da)).'</td><td align="right">';
						
						if(isset($model2))
						{
							
							if($model2 == "")
							{
									$data['select3']  .= '<input type="checkbox" disabled="disabled"  >';
							
							}
							else
							{
								$i = "";
								foreach($model2 as $r1)
								{
									if($r1->a_sid == $r->sd_id)
									{
										$i = 1;
									}
									else
									{
									}
								}		
								
								if($i == 1)
								{	
									$data['select3']  .= $r1->a_date.'<div style="color:green"> Present</div>';
								}
								else
								{
									$data['select3']  .= '<div style="color:red"> Absent</div>';
								}
							}
						}
						
						$data['select3']  .= ' </td></tr>';
						
		
					}
						
					$data['select3']  .= '</table>';
				}
				
			}
		}
	}
				
		
		$data['select3']  .= '</td>';
		
		$data['select3']  .= '</table>';
		
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

				
					
			}
			else if($_POST['day'] == ""  and $_POST['month'] == "" and $_POST['year'] == "")
			{
				$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/datestaf/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		
			}
			else
			{
					$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/datestaf/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		for($i=1;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	
			}
		}
		else
		{
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$data['select3'] = "";	
		
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/datestaf/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
	
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);

		}
		
	
	}
	public function particulaerattendance($id)
	{
		
		$this->load->library('session');
		$data['base'] = $this->config->item('base_url');
		$this->load->database();
		$this->load->Model('mainModel');	
		
		$model = $this->mainModel->showtemp();
		$data['show']=$model;
		
		
		$model1 = $this->mainModel->onlystaf();
		
		$modelst = $this->mainModel->selectstafdataselectid($id);
		
		$data['select3'] = "";	
			
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		$data['select3']  .= '<th width="33%">Staff Attendane Search By Day ,Month ,Year </th>';
		$data['select3']  .= '<th width="33%">';
	
		$data['select3']  .= '<form action="'.$data['base'].'index.php?admin/viewatendancecon/datestaf/'.$id.'" method="post">';
		
		$data['select3']  .= '<select name="day">';
		$data['select3']  .= '<option value="">Select Day</option>';
		$data['select3']  .= '<option value="01">01</option>';
		$data['select3']  .= '<option value="02">02</option>';
		$data['select3']  .= '<option value="03">03</option>';
		$data['select3']  .= '<option value="04">04</option>';
		$data['select3']  .= '<option value="05">05</option>';
		$data['select3']  .= '<option value="06">06</option>';
		$data['select3']  .= '<option value="07">07</option>';
		$data['select3']  .= '<option value="08">08</option>';
		$data['select3']  .= '<option value="09">09</option>';
		
		for($i=10;$i<=31;$i++)
		{
			$data['select3']  .= '<option value="'.$i.'">'.$i.'</option>';
		}
		$data['select3']  .= '</select> - ';
	
	
		$data['select3']  .= '<select name="month">';
		$data['select3']  .= '<option value="">Select Month</option>';
		$data['select3']  .= '<option value="01">January</option>';
		$data['select3']  .= '<option value="02">February</option>';
		$data['select3']  .= '<option value="03">March</option>';
		$data['select3']  .= '<option value="04">April</option>';
		$data['select3']  .= '<option value="05">May</option>';
		$data['select3']  .= '<option value="06">June</option>';
		$data['select3']  .= '<option value="07">July</option>';
		$data['select3']  .= '<option value="08">August</option>';
		$data['select3']  .= '<option value="09">September</option>';
		$data['select3']  .= '<option value="10">October</option>';
		$data['select3']  .= '<option value="11">November</option>';
		$data['select3']  .= '<option value="12">December</option>';
		$data['select3']  .= '</select> - ';
	
		$data['select3']  .= '<select name="year">';
		$data['select3']  .= '<option value="">Select Year</option>';
		$m = $this->mainModel->yearsfind();
		foreach($m as $y)
		{
			$data['select3']  .= '<option value="'.$y->y.'">'.$y->y.'</option>';
		}
		$data['select3']  .= '</select> ';
		
		
		$data['select3']  .= '&nbsp;<input type="submit" value="Go" name="btngo">';
		
		$data['select3']  .= '</form>';
		
		
		$data['select3']  .=  '</th>';
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '</table>';
	
		$data['select3']  .= '<table border="1" width="100%">';
	
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<th width="33%">Staff Attendance</th>';
		
		$data['select3']  .= '</tr>';
	
		$data['select3']  .= '<tr>';
		
		$data['select3']  .= '<th width="33%">';
			$name ="";
			foreach($modelst as $r)	
			{
				$name = $r->name;
			}
		$data['select3']  .= $name.'</th></tr>';
	
	
		foreach($model1 as $r)
		{
					$da = $r->a_datesonly;
					$model2 = $this->mainModel->selectdateviaated($da);
	
		$data['select3']  .= '<tr>';
			
		
		$data['select3']  .= '<td valign="top">';
   if(isset($modelst))
		{
			$data['select3']  .= '<table width="100%" border="1">';
			foreach($modelst as $r)	
			{
				$data['select3']  .= '<tr><td width="50%"><center><b>'. date('d-m-Y' ,strtotime($da)).'</center></b></td><td align="right">';
				
				if(isset($model2))
				{
					
					if($model2 == "")
					{
							$data['select3']  .= '<input type="checkbox" disabled="disabled" >';
					
					}
					else
					{
					$i = "";
					foreach($model2 as $r1)
					{
						if($r1->a_sid == $r->sd_id)
						{
							$i = 1;
						}
					}		
					
					if($i == 1)
					{
						$data['select3']  .= $r1->a_date.'<div style="color:green"> Present</div>';
					}
					else
					{
						$data['select3']  .= '<div style="color:red"> Absent</div>';
					}
					}
				}
				
				$data['select3']  .= ' </td> </tr>';
			}
			$data['select3']  .= '</table>';
		}
		$data['select3']  .= '</td>';
		}
		
		$data['select3']  .= '</tr>';
		$data['select3']  .= '</table>';
		
		$this->load->view('admin/head',$data);
		$this->load->view('admin/viewatendance',$data);
		$this->load->view('admin/footer',$data);
	}
	
}
?>