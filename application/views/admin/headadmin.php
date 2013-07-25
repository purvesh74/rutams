<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rutam : Admin</title>
<link href='http://fonts.googleapis.com/css?family=Cuprum' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css"  href="<?php echo $base ?>css/style.css">
<script type="text/javascript" src="<?php echo $base ?>js/jquery-1.7.1.js"></script>
		
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
   			  <div class="Customer">Customer Service: <?php
               if(isset($show))
								   {
									   foreach($show as $r)
									   {
										   echo $r->Contact ;
									   }
								   }
								  
			  ?></div>
              <div class="Menues"></div>
              <div class="Logo">  <?php 
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
                                   <div class="Mntop"><h1>
                                   <?php
								   if(isset($sitetitle))
								   {
									   foreach($sitetitle as $r)
									   {
										   echo $r->sitetitle;
									   }
								   }
								   ?>
                                   </h1></div>
                	</div>
              </div>
              
            </div>
      </div>
    </div>
    
   
   
    
    
