<?php
class Adminindexcon extends CI_Controller
{
		public function index()
		{
			$data['base'] = $this->config->item('base_url');
			$this->load->database();
			$this->load->Model('mainModel');
			$sitetitle = $this->mainModel->showsitetitle();
			$data['sitetitle'] = $sitetitle;
			$model = $this->mainModel->showtemp();
			$data['show']=$model;
		
			$this->load->view('admin/headadmin',$data);
			$this->load->view('admin/adminindex',$data);
			$this->load->view('admin/footer',$data);
			
		}
		public function logincheak()
		{
			if(isset($_POST['username']) == "")
			{
				
				$this->index();
			}
			else
			{
				
				$username = $_POST['username'];
				$password = md5($_POST['password']);
				
				
				$name = $_POST['name'];
				$this->load->database();
				$this->load->library('session');
				$this->load->Model('mainModel');
				
				if($name == 1)
				{
				
				$logincheakdata = $this->mainModel->loginCheakdata($username,$password);
				
				$email ="";
				$pass ="";
					$arr = array();
					foreach($logincheakdata as $row)
					{
						$email .= $row->email;
						$pass .=$row->password;
						$arr = array(
						'id' => $row->id,
						'email' => $row->email,
						'lastvisitdate' => $row->lastvisitdate
						);
					}
					
					if($email == $username and $pass == $password)
						{
							$this->session->set_userdata('login',$arr);
							echo 1;
						}
						else
						{
							echo 0;
						}
				}
				else if($name == 0)
				{
					
				$logincheakdata = $this->mainModel->loginCheakdatadr($username,$password);
				
				$email ="";
				$pass ="";
					$arr = array();
					foreach($logincheakdata as $row)
					{
						$email .= $row->email;
						$pass .=$row->password;
						$arr = array(
						'id' => $row->d_id,
						'email' => $row->email
						);
					}
					
					if($email == $username and $pass == $password)
						{
							$this->session->set_userdata('login',$arr);
							echo 2;
						}
						else
						{
							echo 0;
						}
				}
				else if($name == 2)
				{
					
				$logincheakdata = $this->mainModel->loginCheakdatapa($username,$password);
				
				$email ="";
				$pass ="";
					$arr = array();
					foreach($logincheakdata as $row)
					{
						$email .= $row->pr_email;
						$pass .=$row->pr_pass;
						$arr = array(
						'id' => $row->pr_id,
						'email' => $row->pr_email
						);
					}
					if($email == $username and $pass == $password)
						{
							$this->session->set_userdata('login',$arr);
							echo 5;
						}
						else
						{
							echo 0;
						}
				}
				
				else if($name == 4)
				{
					
				$logincheakdata = $this->mainModel->loginCheakdatare($username,$password);
				
				$email ="";
				$pass ="";
					$arr = array();
					foreach($logincheakdata as $row)
					{
						$email .= $row->email;
						$pass .=$row->password;
						$arr = array(
						'id' => $row->r_id,
						'email' => $row->email
						);
					}
					
					if($email == $username and $pass == $password)
						{
							$this->session->set_userdata('login',$arr);
							echo 4;
						}
						else
						{
							echo 0;
						}
				}
				
				else if($name == 3)
				{
					
							
				$logincheakdata = $this->mainModel->loginCheakdatapre($username,$password);
			
					
				$email ="";
				$pass ="";
				
					$arr = array();
					foreach($logincheakdata as $row)
					{
						$email .= $row->per_username;
						$pass .=$row->per_password;
						$arr = array(
						'id' => $row->per_id,
						'email' => $row->per_username
						);
					}

					
					if($email == $username and $pass == $password)
						{
							$this->session->set_userdata('login',$arr);
							echo 3;
						}
						else
						{
							echo 0;
						}

				}
			
			}
			
		}
}
?>