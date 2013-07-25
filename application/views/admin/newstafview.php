<script type="text/javascript">
function nokey(evt)
{
	var cno = (evt.which) ? evt.which : event.keycode;
	if(cno != 46 && cno  > 31 && (cno < 48 || cno >57))
	return false;
}
	$(document).ready(function(e) {
		//var Ar = ['User Name','123123'];
		var Ar = ['','Enter Name','Enter Address','Enter Email Address','Enter Age','Enter Gender','Enter Exprience','Enter Blood Group','Enter Contact no'];
		
		var Pr = $('.form').children();
		
		$('.FormText').focusin(function(){
			if($(this).val() == Ar[(Pr.index($(this))/2)-1])
			{
				$(this).val(Ar[""]);
			}
		});
		
		$('.FormText').focusout(function(){
			Valid((Pr.index($(this))/2)-1,$(this).val(),$(this))
		});
		var Msg = "";
		function Valid(Num,Val,Obj)
		{
			var rt = false;
			if(Val == "" )
			{
				Obj.val(Ar[(Pr.index($(Obj))/2)-1]);
				Obj.css('border','#f00 solid 1px');
				$('.Er').eq(Num).css('visibility','visible').text('Fill blank..');
				return (false);
			}
			else
			{
				if(Num == 0)
				{
					var re  = /^(\+91-|\+91|0)?\d{10}$/;
					if(Val == 'Select'){
						Msg += 'Plz Select any one... \n';
						$('.Er').eq(Num).css('visibility','visible').text('Plz Select any one... \n');
						rt = false;
					}
					else
					{
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');
					}
					
					  
				}
				
				else if(Num == 1)
				{
					if ( Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter The Full Name. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter The Full Name. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				
				else if(Num == 2)
				{
					if ( Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter The Address. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter The Address. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}
				}
				
				else if(Num == 3)
				{
				
					if(Val ==  Ar[(Pr.index($(Obj))/2)-1]){
						Msg += 'Enter valid  Address \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter valid  Address \n');
					}
					else
					{
						var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						if(!re.test(Val))
						{
							Msg += 'Enter valid  Address \n';
							$('.Er').eq(Num).css('visibility','visible').text('Enter valid  Address \n');
							rt = false;
						}
						else
						{
							rt = true;
$('.Er').eq(Num).css('visibility','hidden');
						}
					}						
				}
				else if(Num == 4)
				{
					if ( Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter The Degree. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter The Age. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}
				}
				
				else if(Num == 5)
				{
					var re  = /^(\+91-|\+91|0)?\d{10}$/;
					if(Val == 'Select'){
						Msg += 'Plz Select any one... \n';
						$('.Er').eq(Num).css('visibility','visible').text('Plz Select any one... \n');
						rt = false;
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}
					
						
				}
				else if(Num == 6)
				{
					if ( Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter The Degree. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter The Exprience. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}
				}
				else if(Num == 7)
				{
					if ( Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter The Degree. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter The Blood Group. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}	
				}
				
				else if(Num == 8)
				{
					var re  = /^(\+91-|\+91|0)?\d{10}$/;
					if(!re.test(Val)){
						Msg += 'invalid contact no. \n';
						$('.Er').eq(Num).css('visibility','visible').text('invalid contact no. \n');
						rt = false;
					}
					else
					{
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');
					}
					
				}

				
				if(rt == false)
				{
					Obj.css('border','#f00 solid 1px');
					return false;
				}
				else
				{
					Obj.css('border','none');
					return true;
				}
				}
		}
		
		$('.FormText').keypress(function(Key) {
			  if(Key.keyCode == 13){
				  onCheck();
			  }
		});
		
		$('.FormBtn').click(onCheck);
			
		var Blank = 0;
		Msg = "";
		function onCheck()
		{
			Blank = 0;
			Msg = "";
			$('.FormText').each(function(index) {
				if(!Valid(index,$(this).val(),$(this)))
				{
					Blank  += 1;
				}
       		});  
			
		
			if(Blank == 0)
			  {
			  
			  
			var bgroup = document.getElementById("Bgroup").value;
			var add = document.getElementById("add").value;
			var age = document.getElementById("age").value;
			var catname = document.getElementById("catname").value;
			var cno = document.getElementById("cno").value;
			var email = document.getElementById("email").value;
			var exprience = document.getElementById("exprience").value;
			var gender = document.getElementById("gender").value;
			var name = document.getElementById("name").value;
			
			//alert(fname+lname+pass+email+contact+mobile);
			
				$.ajax({
					
					type:"POST",
					data: "name="+name+"&bgroup="+bgroup+"&add="+add+"&catname="+catname+"&cno="+cno+"&email="+email+"&exprience="+exprience+"&gender="+gender+"&age="+age,	
					url:"<?php echo $base?>index.php?admin/newstaf/insertdata/",
					success: function(html){
					if(html == 1)
					{
						alert("Staf Category Save Successfully. ")
			 document.getElementById("Bgroup").value = "";
			document.getElementById("add").value = "";
			 document.getElementById("age").value = "";
			 document.getElementById("catname").value = "";
			 document.getElementById("cno").value = "";
			 document.getElementById("email").value = "";
			 document.getElementById("exprience").value = "";
			document.getElementById("gender").value = "";
			document.getElementById("name").value = "";
		
			 document.getElementById("Bgroup").focus();
			document.getElementById("add").focus();
			 document.getElementById("age").focus();
			 document.getElementById("catname").focus();
			 document.getElementById("cno").focus();
			 document.getElementById("email").focus();
			 document.getElementById("exprience").focus();
			document.getElementById("gender").focus();
			document.getElementById("name").focus();
					
					}
					else if(html == 0)
					{
							alert("Staf Category Not Save Successfully. ");	
					}
					else
					{
							alert("Try Again Same Error. ");
					}
					}
				});	
		}
			  
		}


$('.FormBtn1').click(function (){
			
			var bgroup = document.getElementById("Bgroup").value;
			var add = document.getElementById("add").value;
			var age = document.getElementById("age").value;
			var catname = document.getElementById("catname").value;
			var cno = document.getElementById("cno").value;
			var email = document.getElementById("email").value;
			var exprience = document.getElementById("exprience").value;
			var gender = document.getElementById("gender").value;
			var name = document.getElementById("name").value;
			var id = document.getElementById("id").value;
			
			//alert(fname+lname+pass+email+contact+mobile);
			
				$.ajax({
					
					type:"POST",
					data: "name="+name+"&bgroup="+bgroup+"&add="+add+"&catname="+catname+"&cno="+cno+"&email="+email+"&exprience="+exprience+"&gender="+gender+"&age="+age+"&id="+id,	
					url:"<?php echo $base?>index.php?admin/newstaf/updatedata/",
					success: function(html){
					if(html == 1)
					{
						alert("Staf Category Update Successfully. ")
						//document.getElementById("Contact").value = "";
//						document.getElementById("Contact").focus();
//						document.getElementById("Email").value = "";
//						document.getElementById("Email").focus();
//						document.getElementById("FisrtName").value = "";
//						document.getElementById("FisrtName").focus();
//						document.getElementById("LastName").value = "";
//						document.getElementById("Mobile").focus();
//						document.getElementById("Mobile").value = "";
//						document.getElementById("LastName").focus();
//						document.getElementById("Password").value = "";
//						document.getElementById("Password").focus();
					}
					else if(html == 0)
					{
							alert("Staf Category Not Update Successfully. ");	
					}
					else
					{
							alert("Try Again Same Error. ");
					}
					}
				});	
		
		});


		var Dr = ['prashant','Bhagat','123123123','123123123','Prashnt@gmail.com','+918866857118','+918866857118'];
		$('.FormText').each(function(index) {
				$(this).val(Ar[index]);
       	});
    });
</script>
<div class="Center">
	<div class="Scaler">
		<div class="form">
        	<?php
			
			
          
            if(isset($select))
            {
				 echo '<div class="Formtitle">Update Staf</div>
				
				<div class="FormLable">Select Category :</div><Select class="FormText1"   id="catname" >
                <option value="Select">Select Category....</option>';
            
				if(isset($selectcat))
				{
					foreach($selectcat as $r)
					{
					echo '<option value="'.$r->c_id.'">'.$r->cat.'</option>';						
					}
				}
				else
				{
					echo '<option value="Select">No Found</option>';	
				}
			
				echo ' </Select>';
				foreach($select as $r)
				{
					echo '<input type="hidden" id="id" value="'.$r->sd_id.'">';
				
		        echo '
                <div class="FormLable1">Staf Category Name :</div><input class="FormText1" value="'.$r->cat.'" />
                <div class="FormLable1">Name :</div><input class="FormText1" value="'.$r->name.'"   id="name" />
                <div class="FormLable1">Address :</div><input class="FormText1"   value="'.$r->adds.'" id="add" />
                <div class="FormLable1">Email Id :</div><input class="FormText1"  value="'.$r->email.'"  id="email" />
                <div class="FormLable1">Age :</div><input class="FormText1"  value="'.$r->age.'"  id="age" />
                <div class="FormLable1">Gender :</div><input class="FormText1"  value="'.$r->gender.'"  id="gender" />
                <div class="FormLable1">Exprience :</div><input class="FormText1" value="'.$r->exprience.'"   id="exprience" />
                <div class="FormLable1">Blood Group :</div><input class="FormText1"   value="'.$r->bloodgroup.'" id="Bgroup" />
                <div class="FormLable1">Contact No :</div><input class="FormText1"  value="'.$r->contact.'"  id="cno" />
                
                <div class="FormBtm">
                	<div class="FormBtn1"> Edit </div>
                </div>';
	
				}
			}
			else
			{
			
			?>
				<div class="Formtitle">Add Staf</div>
                <div class="FormLable">Staf Category Name :</div><Select class="FormText"  id="catname">
                <option value="Select">Select Category....</option>
                <?php
				if(isset($selectcat))
				{
					foreach($selectcat as $r)
					{
					echo '<option value="'.$r->c_id.'">'.$r->cat.'</option>';						
					}
				}
				else
				{
					echo '<option value="Select">No Found</option>';	
				}
				?>
				 </Select>
                <div class="FormLable">Name :</div><input class="FormText"    id="name" />
                <div class="FormLable">Address :</div><input class="FormText"    id="add" />
                <div class="FormLable">Email Id :</div><input class="FormText"    id="email" />
                <div class="FormLable">Age :</div><input class="FormText"    id="age" />
                <div class="FormLable">Gender :</div><Select class="FormText"  id="gender">
                <option value="Select">Select Gender....</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            
				 </Select>
                <div class="FormLable">Exprience :</div><input class="FormText"    id="exprience" />
                <div class="FormLable">Blood Group :</div><input class="FormText"    id="Bgroup" />
                <div class="FormLable">Contact No :</div><input class="FormText"  onkeypress="return nokey(event)"   id="cno" />
                
                <div class="FormBtm">
                	<div class="FormBtn"> Submit </div>
                </div>
                <?php
    					}            
	                ?>
		
        </div>
        <div class="Error">
        		<div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
                <div class="Er"></div>
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
    height: 0;
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
