<script type="text/javascript">
function nokey(evt)
{
	var cno = (evt.which) ? evt.which : event.keycode;
	if(cno != 46 && cno  > 31 && (cno < 48 || cno >57))
	return false;
}
	$(document).ready(function(e) {
		var Ar = ['Your Full name','Enter The Address','email@exmple.com','Enter Password','Enter The Re-Password','Enter Mobile No..','Enter Phone No..'];
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
				
				else if(Num == 1)
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
				
				else if(Num == 2)
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
				else if(Num == 3)
				{
					var re  = /^[a-zA-Z0-9!@#$%^&*]{0,16}$/;
					if(Val == Ar[(Pr.index($(Obj))/2)-1]){
						rt = false;
						Msg += 'Enter The Password \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter The Password \n');
					}
					else
					{
						rt = re.test(Val);
						if(!rt)
						{
							Msg += 'Password Rang  not valid \n';
							$('.Er').eq(Num).css('visibility','visible').text('Password Rang  not valid \n');
						}
					}
						
				}
				
				else if(Num == 4)
				{
					var re  = /^[a-zA-Z0-9!@#$%^&*]{0,16}$/;
					if(Val != $('#pass').val()  || Val == Ar[(Pr.index($(Obj))/2)-1]){
						Msg += 'Password  not Match \n';
						$('.Er').eq(Num).css('visibility','visible').text('Password  not Match \n');
						rt = false;
						
					}
					else
					{
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');
					}
						
				}

				else if(Num == 5)
				{
					var re  = /^(\+91-|\+91|0)?\d{10}$/;
					if(!re.test(Val)){
						Msg += 'invalid mobile no. \n';
						$('.Er').eq(Num).css('visibility','visible').text('invalid mobile no. \n');
						rt = false;
					}
					else
					{
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');
					}	
				}
				
				else if(Num == 6)
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
					
				
			
			var fname = document.getElementById("FisrtName").value;
			var address = document.getElementById("Address").value;
			var email = document.getElementById("Email").value;
			var mobile = document.getElementById("Mobile").value;
			var contact = document.getElementById("Contact").value;
			var pass = document.getElementById("pass").value;
			
			//alert(fname+lname+pass+email+contact+mobile);
			
				$.ajax({
					
					type:"POST",
					data: "pass="+pass+"&fname="+fname+"&address="+address+"&email="+email+"&mobile="+mobile+"&contact="+contact,
					url:"<?php echo $base?>index.php?admin/receptioncon/insertdoctor/",
					success: function(html){
					if(html == 1)
					{
						alert("New Reception Data Is Created Successfully. ")
						document.getElementById("Contact").value = "";
						document.getElementById("Contact").focus();
						document.getElementById("Address").value = "";
						document.getElementById("Address").focus();
						document.getElementById("Email").value = "";
						document.getElementById("Email").focus();
						document.getElementById("Mobile").value = "";
						document.getElementById("Mobile").focus();
						document.getElementById("FisrtName").value = "";
						document.getElementById("FisrtName").focus();
						document.getElementById("pass").value = "";
						document.getElementById("pass").focus();
						document.getElementById("repass").value = "";
						document.getElementById("repass").focus();
				
				
						
					}
					else if(html == 0)
					{
							alert("New Docotr Data Is Not Created Successfully. ");	
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
			var fname = document.getElementById("FisrtName").value;
			var address = document.getElementById("Address").value;
			var email = document.getElementById("Email").value;
			var mobile = document.getElementById("Mobile").value;
			var contact = document.getElementById("Contact").value;
			var id =document.getElementById("id").value;
			
				$.ajax({
					
					type:"POST",
					data: "fname="+fname+"&address="+address+"&email="+email+"&mobile="+mobile+"&contact="+contact+"&id="+id,
					url:"<?php echo $base?>index.php?admin/receptioncon/updatedoctor/",
					success: function(html){
					if(html == 1)
					{
						alert("Update Reception Data Is Created Successfully. ");
						document.getElementById("Contact").value = "";
						document.getElementById("Contact").focus();
						document.getElementById("Email").value = "";
						document.getElementById("Email").focus();
						document.getElementById("Address").value = "";
						document.getElementById("Address").focus();
						document.getElementById("Mobile").focus();
						document.getElementById("Mobile").value = "";
						
						document.getElementById("FisrtName").value = "";
						document.getElementById("FisrtName").focus();

					}
					else if(html == 0)
					{
							alert("Update Docotr Data Is Not Created Successfully. ");	
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
						echo	'<div class="Formtitle">Update Reception Detaile</div>';
				
						foreach($select as $r)
						{ 
						      echo '<input type="hidden" value="'.$r->r_id.'"   id="id" />';
				
				echo '
                
				
						
								<div class="FormLable1">First Name :</div><input class="FormText1" value="'.$r->fname.'"   id="FisrtName" />
								<div class="FormLable1">Address :</div><input class="FormText1"  value="'.$r->address.'" id="Address" />
								<div class="FormLable1">Email :</div><input class="FormText1" value="'.$r->email.'"  id="Email"  />
								
								<div class="FormLable1">Mobile No :</div><input class="FormText1" value="'.$r->mobileno.'"   id="Mobile"/>
								<div class="FormLable1">Contact No :</div><input class="FormText1" value="'.$r->contactno.'" id="Contact" />
								<div class="FormBtm">
									<div class="FormBtn1"> Update </div>
								</div>
							';
						}
					}
					else
					{
				
				?>
                
                
				<div class="Formtitle">New Reception</div>
                
                <div class="FormLable">Full Name :</div><input class="FormText"   id="FisrtName" />
                <div class="FormLable">Address :</div><input class="FormText"  id="Address"  />
                <div class="FormLable">Email :</div><input class="FormText"  id="Email"  />
                <div class="FormLable">Password :</div><input class="FormText"    id="pass"/>
                <div class="FormLable">Re-Password :</div><input class="FormText"  id="repass" />
                <div class="FormLable">Mobile No :</div><input class="FormText"  onkeypress="return nokey(event)"   id="Mobile"/>
                <div class="FormLable">Contact No :</div><input class="FormText" onkeypress="return nokey(event)"  id="Contact" />
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
    height: 300px;
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
