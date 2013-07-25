<script type="text/javascript">
	$(document).ready(function(e) {
		//var Ar = ['User Name','123123'];
		var Ar = ['Your first name','Your Last name','Password','Password','email@exmple.com','Enter Mobile No..','Enter Phone No..'];
		
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
					if (Val.length == 0 || Val.length < 0 || Val.length > 30  || Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'First name Length need to  5 to 30. \n';
						$('.Er').eq(Num).css('visibility','visible').text('First name Length need to  5 to 30. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				
				else if(Num == 1)
				{
					if (Val.length == 0 || Val.length < 0 || Val.length > 30  || Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'First name Length need to  5 to 30. \n';
						$('.Er').eq(Num).css('visibility','visible').text('First name Length need to  5 to 30. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				
				else if(Num == 2)
				{
					var re  = /^[a-zA-Z0-9!@#$%^&*]{8,16}$/;
					if(Val.length < 8 || Val.length > 16  || Val == Ar[(Pr.index($(Obj))/2)-1]){
						rt = false;
						Msg += 'Password Rang  not valid \n';
						$('.Er').eq(Num).css('visibility','visible').text('Password Rang  not valid \n');
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
				
				else if(Num == 3)
				{
					var re  = /^[a-zA-Z0-9!@#$%^&*]{8,16}$/;
					if(Val != $('#Password').val()  || Val == Ar[(Pr.index($(Obj))/2)-1]){
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
				else if(Num == 4)
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
				
				else if(Num == 7)
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
				}
				
		$('.FormBtn').click(function (){
			var fname = document.getElementById("FisrtName").value;
			var lname = document.getElementById("LastName").value;
			var pass = document.getElementById("Password").value;
			var email = document.getElementById("Email").value;
			var contact = document.getElementById("Contact").value;
			var mobile = document.getElementById("Mobile").value;
			//alert(fname+lname+pass+email+contact+mobile);
			
				$.ajax({
					
					type:"POST",
					data: "fname="+fname+"&lname="+lname+"&pass="+pass+"&email="+email+"&mobile="+mobile+"&contact="+contact,
					url:"<?php echo $base?>index.php?admin/newadmin/insertadmin/",
					success: function(html){
					if(html == 1)
					{
						alert("New Admin Is Created Successfully. ")
						//document.getElementById("Contact").value = "";
//						document.getElementById("Contact").focus();
//						document.getElementById("Email").value = "";
//						document.getElementById("Email").focus();
//						document.getElementById("FisrtName").value = "";
//						document.getElementById("FisrtName").focus();
//						document.getElementById("LastName").value = "";
//												document.getElementById("Mobile").focus();
//						document.getElementById("Mobile").value = "";
//												document.getElementById("LastName").focus();
//						document.getElementById("Password").value = "";
//													document.getElementById("Password").focus();
				}
					else if(html == 0)
					{
							alert("New Admin Is Not Created Successfully. ");	
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
        		
				<div class="Formtitle">New Admin</div>
                <div class="FormLable">First Name :</div><input class="FormText"   id="FisrtName" />
                <div class="FormLable">Last Name :</div><input class="FormText"   id="LastName" />
                <div class="FormLable">Password :</div><input class="FormText" type="password" id="Password"   />
                <div class="FormLable">Password :</div><input class="FormText"   type="password"  />
                <div class="FormLable">Email :</div><input class="FormText"  id="Email"  />
                <div class="FormLable">Mobile No :</div><input class="FormText"    id="Mobile"/>
                <div class="FormLable">Contact No :</div><input class="FormText"  id="Contact" />
                
                
                <div class="FormBtm">
                	<div class="FormBtn"> Submit </div>
                </div>
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
