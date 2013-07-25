<script type="text/javascript">
			
			$(function(){		
				
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
						 
						$(this).find('div').eq(0).css('display','none');
						$(this).find('div').eq(1).css('display','none');
				});
				
			});
			
		</script>

<div class="Center">
	<div class="Scaler">
		<div class="form">
        
							<div class="left">       
                            	<div class="Formtitle1">Menu</div>
                                	<div class="Mn">
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mns">New Records</a>
                                        <div class="InCom">
                                             	 <a href="#" class="MnBtm"></a>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mninr">Add New Appointment</a></div>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Add New Patient</a></div>
                                               <a href="#" class="Mnftr"></a>
                                            </div>
                                      </div>
                                       <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mns">Report</a>
                                        <div class="InCom">
                                             	 <a href="#" class="MnBtm"></a>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mninr">Appointment</a></div>
	                                            <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Patient</a></div>
                                               <a href="#" class="Mnftr"></a>
                                            </div>
                                      
                                      </div>

                                         <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mns">New Doctor</a>
                                        <div class="InCom">
                                             	 <a href="#" class="MnBtm"></a>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mninr">Add Doctor</a></div>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Add Doctor Speciality</a></div>
                                               
                                               <a href="#" class="Mnftr"></a>
                                            </div>
                                      
                                      </div>
                                   <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mns">New Staff</a>
                                        <div class="InCom">
                                             	 <a href="#" class="MnBtm"></a>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mninr">Add New Staf</a></div>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Add New Staff Categorys </a></div>
                                               
                                               <a href="#" class="Mnftr"></a>
                                            </div>
                                      
                                      </div>
                                      
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mns">View Staff</a>
                                        <div class="InCom">
                                             	 <a href="#" class="MnBtm"></a>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mninr">Doctor List</a></div>
	                                            <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Doctor Speciality List</a></div>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Satff  List</a></div>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Satff Category List</a></div>
                                               
                                               <a href="#" class="Mnftr"></a>
                                            </div>
                                      
                                      </div>
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mns">Attendence</a>
                                        <div class="InCom">
                                             	 <a href="#" class="MnBtm"></a>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mninr">Doctor</a></div>
	                                            <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Reception</a></div>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">All Staff</a></div>
                                               
                                               <a href="#" class="Mnftr"></a>
                                            </div>
                                      
                                      </div>
                                   
                                   
                                      <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mns">Setting</a>
                                        <div class="InCom">
                                             	 <a href="#" class="MnBtm"></a>
                                               <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Profile</a></div>
                                                <div class="Mntop"><a href="<?php echo $base?>index.php?admin/newpatient/" class="Mninr">Creating Admin User</a></div>
	                                            <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">User List</a></div>
                                               <div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Change Password</a></div>
   												<div class="Mntop"><a href="<?php echo $base?>index.php?admin/addpeatientdetailes/" class="Mninr">Logout</a></div>                                            
                                               <a href="#" class="Mnftr"></a>
                                            </div>
                                      
                                      </div>
                                   
                                   
				</div></div>
              <div class="right"><div class="Formtitle">New Appointment</div>
        </div>
                 
		</div>
	</div>
</div>
<style>

.Er
{
	background-color: #CCCCCC;
    border: 1px solid #FFFFFF;
    border-radius: 5px 5px 5px 5px;
    color: #FF0000;
    float: left;
    height: 30px;
    line-height: 30px;
    margin-bottom: 11px;
    margin-left: 6px;
    margin-top: 2px;
    min-width: 200px;
    padding-left: 10px;
    padding-right: 10px;
    width: 200px;
	visibility:hidden;
	
}
.Error{
	
    float: left;
    height: 100px;
    margin-left: -100px;
    margin-top: 56px;
    width: 100px;
}
.FormBtn
{
	   background-color: #FFFFFF;
		border: 1px solid #000000;
		border-radius: 5px 5px 5px 5px;
		box-shadow: 0 0 3px 0 #000000;
		cursor: pointer;
		float: right;
		font-family: Cuprumffu;
		height: 26px;
		line-height: 26px;
		margin-right: 21px;
		margin-top: 10px;
		text-align: center;
		width: 100px;
}
	.FormText{
		background-color: #CCCCCC;
		border: 0 none;
		border-radius: 5px 5px 5px 5px;
		box-shadow: 0 0 3px 0 #333333 inset;
		color: #333333;
		float: left;
		height: 35px;
		line-height: 35px;
		margin-bottom: 10px;
		margin-left: 9px;
		padding-left: 10px;
		padding-right: 10px;
		width: 358px;
	}
	.FormLable{
		color: #333333;
		height: 35px;
		line-height: 35px;
		text-align: right;
		width: 169px;
		float:left;
		margin-bottom:10px;
	}
	
	.FormBtn1
{
	   background-color: #FFFFFF;
		border: 1px solid #000000;
		border-radius: 5px 5px 5px 5px;
		box-shadow: 0 0 3px 0 #000000;
		cursor: pointer;
		float: right;
		font-family: Cuprumffu;
		height: 26px;
		line-height: 26px;
		margin-right: 21px;
		margin-top: 10px;
		text-align: center;
		width: 100px;
}
	.FormText1{
		background-color: #CCCCCC;
		border: 0 none;
		border-radius: 5px 5px 5px 5px;
		box-shadow: 0 0 3px 0 #333333 inset;
		color: #333333;
		float: left;
		height: 35px;
		line-height: 35px;
		margin-bottom: 10px;
		margin-left: 9px;
		padding-left: 10px;
		padding-right: 10px;
		width: 358px;
	}
	.FormLable1{
		color: #333333;
		height: 35px;
		line-height: 35px;
		text-align: right;
		width: 169px;
		float:left;
		margin-bottom:10px;
	}
	
	.Formtitle1
	{
		margin-bottom:20px;
		border-bottom: 1px solid #CCCCCC;
		float: left;
		font-size: 19px;
		height: 35px;
		line-height: 35px;
		padding-left: 14px;
		width: 94%;
	}
	.Formtitle
	{
		margin-bottom:20px;
		border-bottom: 1px solid #CCCCCC;
		float: left;
		font-size: 19px;
		height: 35px;
		line-height: 35px;
		padding-left: 14px;
		width: 100%;
	}
	.FormBtm
	{
		border-top: 1px solid #CCCCCC;
    float: left;
    font-size: 19px;
    height: 45px;
    line-height: 35px;
    margin-top: 10px;
    padding-left: 14px;
    width: 636px;
	}
    .form{
		background: none repeat scroll 0 0 #FFFFFF;
		border: 1px solid #CCCCCC;
		border-radius: 5px 5px 5px 5px;
		float: left;
		height: auto;
		margin-bottom: 10px;
		width: 100%;
		border:1px solid #CCC;
	}
    
</style>
