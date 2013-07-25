<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rutam : Admin</title>
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css"  href="<?php echo $base?>css/style.css">
<style type="text/css"> 
			#tabs, #ui-datepicker-div, .ui-datepicker{ font-size: 12px; }
			.example-container{ float:left;}
			.example-container input{ border: solid 1px #000; padding: 4px;  }
		</style> 
		
		<link rel="stylesheet" media="all" type="text/css" href="<?php echo $base?>js/jquery-ui.css" />
		<link rel="stylesheet" media="all" type="text/css" href="<?php echo $base?>Datepicker/jquery-ui-timepicker-addon.css" />
		<script type="text/javascript" src="<?php echo $base?>js/jquery-1.7.1.js"></script>
		<script type="text/javascript" src="<?php echo $base?>js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo $base?>Datepicker/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript" src="<?php echo $base?>Datepicker/jquery-ui-sliderAccess.js"></script>
		<script type="text/javascript">
		
			$(function(){		
				$('#Date').datetimepicker({
					numberOfMonths: 2,
					dateFormat: 'yy-mm-dd',
					timeFormat: 'hh:mm:ss' 
				});
				
								
				$('.Mncon > .Mntop,  .InCom  > .Mntop').hover(function(){
					$(this).find('.Mninr').eq(0).css('background-color','#00CCFF');
				},function(){
					$(this).find('.Mninr').eq(0).css('background-color','transparent');
				});
				$('.Mntop').hover(function(){
						$(this).find('.Mns').css('color','#000');
						
						$(this).find('div').eq(0).css('display','block');
						$(this).find('div').eq(1).css('display','block');
						
						
				},
				 function(){
						 $(this).find('.Mns').css('background-image','none').css('color','#000');
						 
						$(this).find('div').eq(0).css('display','none');
						$(this).find('div').eq(1).css('display','none');
				});
				
			});
			
		</script>
</head>

<body>
<div class="Main">
	<div class="TopLine" style="background-color:<?php if(isset($show))
	   {
			foreach($show as $r)
			 {
			   echo $r->headerlinecolor;
			 }
		} ?>"></div>
    
    <div class="HeaderAdmin">
   	  <div class="Center">
        	<div class="Scaler">
            
   			  <div class="Customer">Customer Service:  <?php
			  $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;
$agent = null;

    if ( empty($agent) ) {
        $agent = $_SERVER['HTTP_USER_AGENT'];

        if ( stripos($agent, 'Firefox') !== false ) {
            $agent = 'firefox';
        } elseif ( stripos($agent, 'MSIE') !== false ) {
            $agent = 'ie';
        } elseif ( stripos($agent, 'iPad') !== false ) {
            $agent = 'ipad';
        } elseif ( stripos($agent, 'Android') !== false ) {
            $agent = 'android';
        } elseif ( stripos($agent, 'Chrome') !== false ) {
            $agent = 'chrome';
        } elseif ( stripos($agent, 'Safari') !== false ) {
            $agent = 'safari';
        } elseif ( stripos($agent, 'AIR') !== false ) {
            $agent = 'air';
        } elseif ( stripos($agent, 'Fluid') !== false ) {
            $agent = 'fluid';
        }

    }


	
	function getOS(){
		     $agent =  $_SERVER['HTTP_USER_AGENT'];
     $info = array();

        $OS = array("Windows"   =>   "/Windows/i",
                    "Linux"     =>   "/Linux/i",
                    "Unix"      =>   "/Unix/i",
                    "Mac"       =>   "/Mac/i"
                    );

        foreach($OS as $key => $value){
            if(preg_match($value, $agent)){
                $info = array_merge($info,array("Operating System" => $key));
                break;
            }
        }
        return $info['Operating System'];
    }
 $o =getOS();
			  $ip = $_SERVER['REMOTE_ADDR'];
			  $os = php_uname('s');
			   mysql_query("insert into websitevisit(w_url,w_ip,w_os,w_browser,w_date,w_dateonly) values('$url','$ip','$o','$agent',NOW(),NOW())");
			//  $re = mysql_query("SELECT * FROM `websitevisit`");
//			  
//			  $date = date('Y-m-d');
//			 
//			 if(mysql_num_rows($re) > 0)
//			 {
//			  while($row = mysql_fetch_array($re))
//			  {
//				  if($ip == $row['w_ip'] and $row['w_dateonly'] == $date)
//				  {
//						//echo "same";		  
//				  }
//				  else
//				  {
//					 mysql_query("insert into websitevisit(w_url,w_ip,w_os,w_browser,w_date,w_dateonly) values('$url','$ip','$os','$browser',NOW(),NOW())");
//			   		//echo "insert into websitevisit(w_url,w_ip,w_os,w_browser,w_date,w_dateonly) values('$url','$ip','$os','$browser',NOW(),NOW())";
//				  }
//			  }
//			  
//			 }
//			 else
//			 {
//				 	 mysql_query("insert into websitevisit(w_url,w_ip,w_os,w_browser,w_date,w_dateonly) values('$url','$ip','$os','$browser',NOW(),NOW())");
//			   	//	echo "insert into websitevisit(w_url,w_ip,w_os,w_browser,w_date,w_dateonly) values('$url','$ip','$os','$browser',NOW(),NOW())";
//				 
//			 }
//			  
			  
			  
               if(isset($show))
								   {
									   foreach($show as $r)
									   {
										   echo $r->Contact ;
									   }
								   }
								  
			  ?></div>
              <div class="Menues1">Rutam Hospital Administration</div>
              <div class="Menues">Wecome <?php
	
	
	
			  $da = $this->session->userdata('login');
				if(!isset($da['email']))	
				{
					$this->load->helper('url');
					redirect('admin/adminindexcon');	
				}
				else
				{
			  		echo $da['email'];
				}
			  ?> </div> 
              <div class="Logo">  <?php 
			  if(isset($show))
	   				{
						foreach($show as $r)
			 			 {
			   		     	echo '<img src="'.$base.'upload/'. $r->logo.'">';
			 			 }
					} 
		?></div></a>
              <div class="HeadMenu">
              		<div class="Mn">
                     
                    <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newdoctorcat/" class="Mns">New Records</a><div class="MnShd"></div>
                					 <div class="Mncon">
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mninr">Patient</a>
                                        <div class="InCom">
                                             	 <a href="#" class="MnBtm"></a>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mninr">Add Patient</a></div>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Add Patient Detailes</a></div>
                                               <a href="#" class="Mnftr"></a>
                                            </div>
                                      
                                      </div>
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newappointment/" class="Mninr">Add Appointment</a></div>
                                      
                                      <a href="#" class="Mnftr"></a>
                                    </div>
                	</div> 
       
     				<div class="Mntop"><a href="<?php echo $base?>index.php?admin/newdoctorcat/" class="Mns">New Doctor</a><div class="MnShd"></div>
                					 <div class="Mncon">
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newdoctorcat/" class="Mninr">Add Doctor Speciality</a></div>
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newdoctor/" class="Mninr">Add Doctor</a></div>
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newservicetype/" class="Mninr">Add Doctor Service</a></div>
                                      <a href="#" class="Mnftr"></a>
                                    </div>
                	</div> 
       				
                    <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newdoctorcat/" class="Mns">New Staff</a><div class="MnShd"></div>
                					 <div class="Mncon">
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newstaf/" class="Mninr">Add New Staff</a></div>
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newstafcat/" class="Mninr">Add New Staff Category</a></div>
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/receptioncon/" class="Mninr">Add New Reception</a></div>
                                     
                                      <a href="#" class="Mnftr"></a>
                                    </div>
                	</div> 
                    
                    <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newdoctorcat/" class="Mns">View Staff</a><div class="MnShd"></div>
                					 <div class="Mncon">
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newdoctorviewcon/" class="Mninr">Doctor List</a></div>
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newservicetypecon/" class="Mninr">Doctor Service List</a></div>
                                      
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/receptionconview/" class="Mninr">Reception List</a></div>
                                       <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newstafcon/" class="Mninr">All Staff</a></div>
                                      <a href="#" class="Mnftr"></a>
                                    </div>
                	</div> 
                    
                    
                    <div class="Mntop"><a href="#" class="Mns">Attendence</a><div class="MnShd"></div>
                					 <div class="Mncon">
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/atendance/" class="Mninr">Attendence</a></div>
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/viewatendancecon/" class="Mninr">View Attendence</a></div>
                                      
                                      <a href="#" class="Mnftr"></a>
                                    </div>
                	</div> 
                    
      				 <div class="Mntop"><a href="#" class="Mns">Report</a><div class="MnShd"></div>
                					 <div class="Mncon">
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newappointmentcon/" class="Mninr">Appointment</a></div>
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/conformapp/" class="Mninr">Conform Appointment</a></div>
                                     
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatientviewcon/" class="Mninr">Patient</a></div>
                                      
                                      <a href="#" class="Mnftr"></a>
                                    </div>
                	</div> 
                    
       				 <div class="Mntop"><a href="#" class="Mns">Setting</a><div class="MnShd"></div>
                					 <div class="Mncon">
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/createadmin/" class="Mninr">Creating Admin User</a></div>
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/viewadminuser/" class="Mninr">User List</a></div>
                                     
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/changepasswordcon/" class="Mninr">Change Password</a></div>
                                       <div class="Mntop"><a href="<?php echo $base?>index.php?admin/visitercon/" class="Mninr">Visiter</a></div>
                                        <div class="Mntop"><a href="<?php echo $base?>index.php?admin/adminhome/logout/" class="Mninr">Logout</a></div>
                                      
                                      <a href="#" class="Mnftr"></a>
                                    </div>
                	</div> 
                    	
       
       
                	
               
                </div>
              </div>
              
            </div>
      </div>
    </div>
    
   
   
    
    
