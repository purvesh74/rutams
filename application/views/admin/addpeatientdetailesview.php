

<script type="text/javascript">
	$(document).ready(function(e) {
		//var Ar = ['User Name','123123'];
		var Ar = ['Enter Patient No.','Enter Tablet Name','Enter Dos','Select Time','Enter Patient Checkup dorctor/nurse Name','Enter Patient Condition','Enter Check up Charge'];
		
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
						Msg +=  'Enter Patient No. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter Patient No. \n');
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
						Msg +=  'Enter Tablet. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter Tablet. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				
				 else if(Num == 2)
				{
					if (Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Enter Dos. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter Dos. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				 else if(Num == 3)
				{
					if (Val == Ar[(Pr.index($(Obj))/2)-1])  
					{  
						Msg +=  'Select Time. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Select Time. \n');
						rt = false;  
						
					}  else {
						rt = true;
$('.Er').eq(Num).css('visibility','hidden');  
					}  
				}
				else if(Num == 4)
				{
					if(Val == Ar[(Pr.index($(Obj))/2)-1])
					{
						Msg += 'Enter Doctor/Nurse Name. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter Doctor/Nurse Name. \n');
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
					if(Val == Ar[(Pr.index($(Obj))/2)-1])
					{
						Msg += 'Enter Patient Condition. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter Patient Condition. \n');
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
					if(Val == Ar[(Pr.index($(Obj))/2)-1])
					{
						Msg += 'Enter Price. \n';
						$('.Er').eq(Num).css('visibility','visible').text('Enter Price. \n');
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
				  
				
			var pno = document.getElementById("pno").value;
			var tablet = document.getElementById("tablet").value;
			var dos = document.getElementById("dos").value;
			var timep = document.getElementById("timepicker").value;
			var cname = document.getElementById("cname").value;
			var pcon = document.getElementById("pcondition").value;
			var prices = document.getElementById("price").value;

				$.ajax({
					
					type:"POST",
					data: "pno="+pno+"&tablet="+tablet+"&dos="+dos+"&timep="+timep+"&cname="+cname+"&pcon="+pcon+"&prices="+prices,
					url:"<?php echo $base?>index.php?admin/addpeatientdetailes/insertpationt/",
					success: function(html){
					if(html == 1)
					{
						alert("Patient Detailes Add Successfully. ");
						 document.getElementById("pno").value = "";
						 document.getElementById("tablet").value= "";
						 document.getElementById("dos").value= "";
						 document.getElementById("timepicker").value= "";
						 document.getElementById("cname").value= "";
						 document.getElementById("pcondition").value= "";
						 document.getElementById("price").value= "";
						 document.getElementById("pno").focus();
						 
					}
					else if(html == 0)
					{
							alert("Patient Detailes Add Not Successfully. ");	
					}
					else
					{
							alert("Try Again Same Error. ");
					}
					}
				});	
		
		
			  }
			
		}
		$('#timepicker').timepicker({
    showPeriod: true,
    showLeadingZero: true
});


		$('.FormBtn1').click(function (){
			var fname = document.getElementById("FisrtName").value;
			var add = document.getElementById("Address").value;
			var age = document.getElementById("Age").value;
			var description = document.getElementById("Description").value;
			var weight = document.getElementById("Weight").value;
			var mobile = document.getElementById("Mobile").value;
			var id = document.getElementById("id").value;
			
			//alert(fname+lname+pass+email+contact+mobile);
			
				$.ajax({
					
					type:"POST",
					data: "fname="+fname+"&add="+add+"&age="+age+"&description="+description+"&mobile="+mobile+"&weight="+weight+"&id="+id,
					url:"<?php echo $base?>index.php?admin/newpatient/updatepationt/",
					success: function(html){
					if(html == 1)
					{
						alert("Update Patient Data Is Created Successfully. ")
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
							alert("Update Patient Data Is Not Created Successfully. ");	
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
		
		 $("#pno").blur(function(){
			 
                       var id  = document.getElementById("pno").value;
                        $.ajax({
                                type: "POST",
                                url : "<?php echo $base ?>index.php?admin/addpeatientdetailes/unique_username/",
                                data : "id="+id,
                                success : function(result) {
                                    $("message").html(result.message);
                                    alert(result);
                                }
                        });
                });
				
    });
</script>
<div class="Center">
	<div class="Scaler">
		<div class="form">
        	
            	<?php
				
				if(isset($select))
				{
					foreach($select as $r)
					{
						echo '<input  type="hidden" value="'.$r->p_id.'"   id="id" />';
						echo '<div class="Formtitle">Update Patient Detaile</div>
                <div class="FormLable1">First Name :</div><input class="FormText1" value="'.$r->fname.'"   id="FisrtName" />
                <div class="FormLable1">Address :</div><input class="FormText1" value="'.$r->address.'"   id="Address" />
                <div class="FormLable1">Description :</div><input class="FormText1"  value="'.$r->description.'" id="Description" />
                <div class="FormLable1">Age :</div><input class="FormText1"  value="'.$r->age.'" id="Age" />
                <div class="FormLable1">Weight :</div><input class="FormText1" value="'.$r->weight.'"  id="Weight" />
                <div class="FormLable1">Mobile No :</div><input class="FormText1"  value="'.$r->mobileno.'"  id="Mobile"/>
                
                
                <div class="FormBtm">
                	<div class="FormBtn1"> Update </div>
                </div>';
					}
				}
				else
				{
				
				?>
				<div class="Formtitle">Patient Detailes</div>
                <div class="FormLable">Patient No :</div><input class="FormText"   id="pno" />
                <div class="FormLable">Tablet :</div><select id="tablet" class="FormText" >
               <option > Select Tablets</option>
                <?php
				if(isset($tablet))
				{
					foreach($tablet as $r)
					{
						echo '<option value="'.$r->tab_id.'">'.$r->tab_name.'</option>';
					}
				}
				else
				{
					echo '<option>No Found Tablets</option>';
				}
				?>
                 </select>
                <div class="FormLable">Dos :</div><input class="FormText"   id="dos" />
                <div class="FormLable">Time :</div><input class="FormText"   id="timepicker" />
                <div class="FormLable">Doctor/Nurse Name :</div><input class="FormText"   id="cname" />
                <div class="FormLable">Patient Condition :</div><input class="FormText"    id="pcondition"/>
                <div class="FormLable">Price :</div><input class="FormText"    id="price"/>
                
                
                <div class="FormBtm">
                	<div class="FormBtn"> Submit </div>
                </div>
                <?php
				}
                ?>
		</div>
        <div class="Error">
        		
            	<div id="message"></div>
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
textarea
{
	
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
