<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rutam Hospital</title>
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css"  href="<?php echo $base ?>css/style.css">
<script src="<?php echo $base ?>js/jquery-1.7.1.js" type="text/javascript"></script>
 <script type="text/javascript">
								$(document).ready(function(){
									
									$('.Mncon > .Mntop,  .InCom  > .Mntop').hover(function(){
										$(this).find('.Mninr').eq(0).css('background-color','#00CCFF');
									},function(){
										$(this).find('.Mninr').eq(0).css('background-color','transparent');
									});
									$('.Mntop').hover(function(){
											
											$(this).find('div').eq(0).css('display','block');
											$(this).find('div').eq(1).css('display','block');
											
											
									},
									 function(){
											 $(this).find('.Mns').css('background-image','none').css('color','#000');
											 
											$(this).find('div').eq(0).css('display','none');
											$(this).find('div').eq(1).css('display','none');
									});
									
									  
								})
								
								
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
        
        
    <div class="Header">
   	  <div class="Center">
        	<div class="Scaler">
   			  <div class="Customer">Customer Service:  <?php
               if(isset($show))
								   {
									   foreach($show as $r)
									   {
										   echo $r->Contact ;
									   }
								   }
								  
			  ?></div>
              <div class="Menues">About us | Countact Us | <a href="<?php echo $base ?>index.php?reg/">Patient Registration</a></div>
              
              <div class="Logo">  
			  <?php 
			  if(isset($show))
	   				{
						foreach($show as $r)
			 			 {
			   		     	echo '<img src="'.$base.'upload/'. $r->logo.'">';
			 			 }
					} 
		?></div>
              <div class="HeadMenu">
              	
                <div class="Mn">
            	
                <div class="Mntop"><a href="<?php echo $base?>index.php?home/" class="Mns">Home</a><div class="MnShd"></div></div>
                
                <div class="Mntop"><a href="<?php echo $base?>index.php?patientcons/" class="Mns">Patient And Families</a><div class="MnShd"></div>
<!--                					 <div class="Mncon">
                                        <div class="Mntop"><a href="#" class="Mninr">Easily customised</a></div>
                                        <div class="Mntop"><a href="#" class="Mninr">Easily customised</a></div>
                                        <div class="Mntop"><a href="#" class="Mninr">Easily customised</a>
                                        	 <div class="InCom">
                                             	 <a href="#" class="MnBtm"></a>
                                                <div class="Mntop"><a href="#" class="Mninr">Easily customised</a></div>
                                                <div class="Mntop"><a href="#" class="Mninr">Easily customised</a></div>
                                                <div class="Mntop"><a href="#" class="Mninr">Easily customised</a></div>
                                                <div class="Mntop"><a href="#" class="Mninr">Easily customised</a></div>
                                                <div class="Mntop"><a href="#" class="Mninr">Easily customised</a></div>
                                               <a href="#" class="Mnftr"></a>
                                            </div>
                                        </div>
                                        <div class="Mntop"><a href="#" class="Mninr">Easily customised</a></div>
                                        <div class="Mntop"><a href="#" class="Mninr">Easily customised</a></div>
                                       <a href="#" class="Mnftr"></a>
                                    </div>
-->                                   
                </div> 
                 <div class="Mntop">   <a href="<?php echo $base?>index.php?physician/" class="Mns">Physician</a><div class="MnShd"></div></div>
               <div class="Mntop"><a href="#" class="Mns">Our Services</a><div class="MnShd"></div></div>
               <div class="Mntop"><a href="#" class="Mns">Health Library</a><div class="MnShd"></div></div>
               <div class="Mntop">   <a href="<?php echo $base?>index.php?loginc/doctor/" class="Mns">Login</a><div class="MnShd"></div>
                 	<div class="Mncon">
                        <div class="Mntop"><a href="<?php echo $base?>index.php?loginc/doctor/" class="Mninr">Doctor</a></div>
                        <div class="Mntop"><a href="<?php echo $base?>index.php?loginc/patient/" class="Mninr">Patient</a></div>
                        <div class="Mntop"><a href="<?php echo $base?>index.php?loginc/reception/" class="Mninr">Reception</a></div>
                       <a href="#" class="Mnftr"></a>
                    </div>
                 </div>
               
            
                </div>
              </div>
         	  
              </div>
              </div>
             </div>