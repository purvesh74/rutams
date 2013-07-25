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
   			  <div class="Customer">Customer Service: <?php if(isset($show))
	   {
			foreach($show as $r)
			 {
			   echo $r->Contact;
			 }
		} ?> </div>
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
			  ?> <a href="<?php echo $base?>index.php?admin/adminhome/logout" >LOGOUT</a></div> 
              <div class="Logo">
              <?php 
			  if(isset($show))
	   				{
						foreach($show as $r)
			 			 {
			   		     	echo '<img src="'.$base.'upload/'. $r->logo.'">';
			 			 }
					} 
		?>
              </div></a>
              <div class="HeadMenu">
              		<div class="Mn">
                     
                    <div class="Mntop"><a href="<?php echo $base?>index.php?admin/adminhometemp/" class="Mns">Home</a><div class="MnShd"></div></div> 
              		<div class="Mntop"><a href="<?php echo $base?>index.php?admin/changepasswordpersyst/" class="Mns">Change Password</a><div class="MnShd"></div></div> 
              
               
                </div>
              </div>
              
            </div>
      </div>
    </div>
    
   
   
    
    
