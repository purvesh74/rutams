<script>
	$(document).ready(function() {
		var Ar = ['Enter The Full  name','Enter The Email Address','Enter Password','Enter Re-Password','Enter The Contact','Plz Select Any','Enter Anwser'];
		
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
						Msg +=  'Enter Full name. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter Full name. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				
				 else if(Num == 1)
				{
					if (Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter The Email Address. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter The Email Address. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				
				 else if(Num == 2)
				{	var re  = /^[a-zA-Z0-9!@#$%^&*]{0,16}$/;
					if( Val == Ar[(Pr.index($(Obj))/2)-1]){
						rt = false;
						Msg += 'Enter the password \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter the password \n');
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
					var re  = /^[a-zA-Z0-9!@#$%^&*]{0,16}$/;
					if(Val != $('#Pass').val()  || Val == Ar[(Pr.index($(Obj))/2)-1]){
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
					if (Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter Contact No. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter Contact No. \n');
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
					}
					else
					{
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');
					}
				}
				 else if(Num == 6)
				{
					if (Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter Answer. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter answer. \n');
						rt = false;  
						
					}  else {
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
		
				var username = document.getElementById("User").value;
				var password = document.getElementById("Pass").value;
				var ans = document.getElementById("ans").value;
				var contact = document.getElementById("contact").value;
				var email = document.getElementById("email").value;
				var qu = document.getElementById("sq").value;
				
				
				
				$.ajax({
				type:"POST",
				data:"username="+username+"&password="+password+"&email="+email+"&contact="+contact+"&ans="+ans+"&qu="+qu,
				url:"<?php echo $base ?>index.php?reg/regdata/",
				success: function(html)
				{
					if(html == 1)
					{
						window.location = "<?php echo $base ?>index.php?loginc/patient/";
					}
					else if(html == 0)
					{
							
					}
					else
					{
						alert("Same Error Try Again");
					}
				}
				
				});
			}
		}        
    });
</script>

<div class="Center">

	<div class="Scaler">
		<div class="form">
				<div class="Formtitle"><center>
                Registration 
                </center></div>
                
               
                <div class="FormLable">Full Name :</div><input class="FormText" id="User"  />
                <div class="FormLable">Email :</div><input class="FormText" id="email"  />
                <div class="FormLable">Password :</div><input class="FormText" id="Pass" type="password"  />
                <div class="FormLable">Re-Password :</div><input class="FormText" id="re" type="password"   />
                <div class="FormLable">Contact :</div><input class="FormText" id="contact" />
                <div class="FormLable">Security question :</div><select class="FormText" id="sq"  >
                <option value="Select">Select Question</option>
                <option value="what is your nick name">what is your nick name</option>
                <option value="what is your hobby">what is your hobby</option>
                <option value="who is your favorite cricket player">who is your favorite cricket player</option>
                </select>
                <div class="FormLable">Answers :</div><input class="FormText" id="ans"  />
                
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
		width: 178px;
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
</style>
