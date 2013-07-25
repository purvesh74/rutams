
<div class="Center">
	<div class="Scaler">
		<div class="form">
        
        	<?php
				
				if(isset($select))
				{
					if($select == "")
					{
				echo '<div class="Formtitle"><center>
                Forget Password
                </center></div>
                
               <form action="'.$base.'index.php?forgetpass/usercheck/" method="post">
                <div class="FormLable">User Name :</div><input class="FormText" id="User"  />
                <div class="FormBtm">
                   <div class="FormLable1"><div id="ans"> Username is not Valid Plz Try Again.</div> </div> 	<div class="FormBtn2"> <input type="submit" name="submit" value="Submit"> </div>
                </div></form> ';
				
					}
					else
					{
						
				echo '<div class="Formtitle"><center>
                Forget Password
                </center></div>
                
               <form action="'.$base.'index.php?forgetpass/forget/" method="post">';
			  
                foreach($select as $r)
				{
					
					echo '<input type="hidden" name="email" value="'.$r->pr_email.'"><input type="hidden" name="q" value="'.$r->pr_qu.'">
        				  <div class="FormLable">Security Question :</div><input class="FormText" disabled  value="'.$r->pr_qu.'" name="que"  />
						  <div class="FormLable">Your Answer :</div><input class="FormText"  name="ans"  />';
				}
			  	echo '
					  <div class="FormBtm">
                    	<div class="FormBtn"> <input type="submit" name="submit" value="Submit">
 				      </div>
               		  </div></form> ';
					}
				}
				elseif(isset($check))
				{
				if($check == "")
					{
						
				echo '<div class="Formtitle"><center>
                Check Security
                </center></div>
                
               <form action="'.$base.'index.php?forgetpass/forget/" method="post">';
             
						if(isset($select1))
						{
							foreach($select1 as $r1)
							{
								echo '<input type="hidden" name="email"  value="'.$r1->pr_email.'" ><input type="hidden" name="q" value="'.$r1->pr_qu.'" >
								<div class="FormLable">Security Question :</div><input class="FormText" disabled   name="que" value="'.$r1->pr_qu.'" />
						  ';	
							}
						}  
						
						 echo '
        				  <div class="FormLable">Your Answer :</div><input class="FormText"  name="ans"  />';
				echo '<div class="FormBtm">
                   <div class="FormLable1"><div id="ans"> Security Answer is not valid plz try again.</div> </div> 	<div class="FormBtn2"> <input type="submit" name="submit" value="Submit"> </div>
                </div></form> ';
				
					}
					else
					{
						
				echo '<div class="Formtitle"><center>
                Change Password
                </center></div>
                
               <form action="'.$base.'index.php?forgetpass/chagepass/" method="post">';
			  
                foreach($check as $r)
				{
					
					echo '<input type="hidden" name="email" value="'.$r->pr_email.'">
					<div class="FormLable">Username:</div><input class="FormText" disabled  value="'.$r->pr_email.'" name="user"  />';
				}
			  	echo '
				<div class="FormLable">Password :</div><input class="FormText" type="password" name="password"  />
				<div class="FormLable">Re-Password :</div><input class="FormText" type="password" name="repassword"  />
				
					  <div class="FormBtm">
                    	<div class="FormBtn"> <input type="submit" name="btnsubmit" value="Submit">
 				      </div>
               		  </div></form> ';
					}
				}
			elseif(isset($check1))
				{
						echo '<div class="Formtitle"><center>
						Change Password
						</center></div>
						
					   <form action="'.$base.'index.php?forgetpass/chagepass/" method="post">';
					  	if(isset($select2))
						{
						foreach($select2 as $r)
						{
							
							echo '<input type="hidden" name="email" value="'.$r->pr_email.'">
							<div class="FormLable">Username:</div><input class="FormText" disabled  value="'.$r->pr_email.'" name="user"  />';
						}
						}
						echo '
						<div class="FormLable">Password :</div><input class="FormText" type="password"  name="password"  />
						<div class="FormLable">Re-Password :</div><input class="FormText" type="password" name="repassword"  />
						
							  <div class="FormBtm">
							   <div class="FormLable1"><div id="ans">'.$check1.'</div> </div> 	<div class="FormBtn2"> <input type="submit" name="btnsubmit" value="Submit"> </div>
							  </div></form> ';
				}
				elseif(isset($changepassword))
				{
					if($changepassword == 1)
					{
						echo '<div class="Formtitle"><center>
						Password  Change Successfully. 
						</center></div>';
						echo '
						<div class="FormLable">Go To Login Now <a href="'.$base.'index.php?loginc/patient/"> Click Here.</a> </div>';
						
					}
					else if($changepassword == 0)
					{
						
						echo '<div class="Formtitle"><center>
						Password Change Not Successfully.
						</center></div>';
						
					}
					else
					{
						
						echo '<div class="Formtitle"><center>
						Same Error Plz Try Again.
						</center></div>';
						
					}
					
				}

				else
				{
						echo '<div class="Formtitle"><center>
						Forget Password
						</center></div>
						
					   <form action="'.$base.'index.php?forgetpass/usercheck/" method="post">
						<div class="FormLable">User Name :</div><input class="FormText" id="User" name="username"  />
						<div class="FormBtm">
								<div class="FormBtn"> <input type="submit" name="submit" value="Submit">
						 </div>
						</div></form> ';
				}

       		 ?>
		</div>
	</div>
</div>
<style>
.FormBtn
{
	   border-radius: 5px 5px 5px 5px;
    box-shadow: 0 0 3px 0 #000000;
    cursor: pointer;
    float: right;
    font-family: Cuprumffu;
    height: 24px;
    line-height: 2px;
    margin-right: 20px;
    margin-top: 10px;
    text-align: center;
    width: 67px;
}

.FormBtn2
{
	   border-radius: 5px 5px 5px 5px;
    box-shadow: 0 0 3px 0 #000000;
    cursor: pointer;
    float: right;
    font-family: Cuprumffu;
    height: 24px;
    line-height: 2px;
    margin-right: 20px;
    margin-top: -35px;
    text-align: center;
    width: 67px;
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
		width: 178px;
		float:left;
		margin-bottom:10px;
	}
	
	.FormLable1{
	color: #333333;
    line-height: 45px;
    text-align: left;
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
		width: 636px;
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
		margin-left: 174px;
		width: 650px;
		border:1px solid #CCC;
	
	}
    
</style>
